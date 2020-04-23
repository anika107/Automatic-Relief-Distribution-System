#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <SPI.h>
#include <MFRC522.h>
#include <Servo.h>

#define SS_PIN D2  //--> SDA D2
#define RST_PIN D1  //--> RST D1
MFRC522 mfrc522(SS_PIN, RST_PIN);
Servo servo;

int servoPin = 2;  // Nodemcu D4
int Red = 0;  // Nodemcu D3
int Green = 16; // Nodemcu D0
int Blue = 15; // Nodemcu D8

const char* ssid = "UIU";
const char* password = "xyz";

ESP8266WebServer server(80);  //--> Server on port 80

int readsuccess;
byte readcard[4];
char str[32] = "";
String StrUID;

void setup() {
  Serial.begin(115200);
  servo.attach(servoPin);
  SPI.begin();      // SPI bus
  mfrc522.PCD_Init(); //MFRC522 card

  delay(500);

  WiFi.begin(ssid, password);
  Serial.println("");

  pinMode(Red, OUTPUT);
  pinMode(Green, OUTPUT);
  pinMode(Blue, OUTPUT);
  digitalWrite(Blue, HIGH); 

  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    
    digitalWrite(Blue, LOW);
    delay(250);
    digitalWrite(Blue, HIGH);
    delay(250);
  }
 
  Serial.println("");
  Serial.print("Successfully connected to : ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

  Serial.println("Please tag a card or keychain to see the UID !");
  Serial.println("");

  servo.write(0);   
  delay(100);
  servo.detach();
}

void loop() {
  // put your main code here, to run repeatedly
  readsuccess = getid();

  if (readsuccess) {
    HTTPClient http;    //Declare object of class HTTPClient
    String UIDresultSend, postData;
    UIDresultSend = StrUID;

    postData = "UIDresult=" + UIDresultSend;
    http.begin("http://192.168.0.104/IOT/check.php");  //Specify request destination
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); //Specify content-type header

    int httpCode = http.POST(postData);   //Send the request
    String payload = http.getString();    //Get the response payload
    
    Serial.println(UIDresultSend);
    Serial.println(httpCode);   //Print HTTP return code
    Serial.println(payload);    //Print request response payload

    if(payload == "ok"){
      digitalWrite(Green,HIGH);
      digitalWrite(Red,LOW);
        servo.attach(servoPin);
        servo.write(0);
        delay(500);
        servo.write(120);
        delay(4000);  //Post Data at every 5 seconds
        servo.write(0);
        servo.detach();
        digitalWrite(Green,LOW);
    }
    else {
      digitalWrite(Red,HIGH);
      digitalWrite(Green,LOW);
      delay(4000);  //Post Data at every 5 seconds
      digitalWrite(Red,LOW);
      }

    http.end();  //Close connection
  }
}

int getid() {
  if (!mfrc522.PICC_IsNewCardPresent()) {
    return 0;
  }
  if (!mfrc522.PICC_ReadCardSerial()) {
    return 0;
  }


  Serial.print("THE UID OF THE SCANNED CARD IS : ");

  for (int i = 0; i < 4; i++) {
    readcard[i] = mfrc522.uid.uidByte[i]; //storing the UID of the tag in readcard
    array_to_string(readcard, 4, str);
    StrUID = str;
  }
  mfrc522.PICC_HaltA();
  return 1;
}

void array_to_string(byte array[], unsigned int len, char buffer[]) {
  for (unsigned int i = 0; i < len; i++)
  {
    byte nib1 = (array[i] >> 4) & 0x0F;
    byte nib2 = (array[i] >> 0) & 0x0F;
    buffer[i * 2 + 0] = nib1  < 0xA ? '0' + nib1  : 'A' + nib1  - 0xA;
    buffer[i * 2 + 1] = nib2  < 0xA ? '0' + nib2  : 'A' + nib2  - 0xA;
  }
  buffer[len * 2] = '\0';
}

INSERT INTO doctor(BMDC_reg_no, full_name, specialization) VALUES
("A-234-567", "Prof. Dr. M.A. Rouf", "Cardiologist");
INSERT INTO doctor(BMDC_reg_no, full_name, specialization) VALUES
("A-100-200", "Prof. Dr. Nazir Ahmed ", "Anesthesiologist");
INSERT INTO doctor(BMDC_reg_no, full_name, specialization) VALUES
("A-400-300", "Dr. Jesmin Hossain", "Echocardiography");

INSERT INTO patient(NID_or_birth_certificate_No, age, admitted_date) VALUES
("01286382", 30, "2020-04-12");
INSERT INTO patient(NID_or_birth_certificate_No, age, admitted_date) VALUES
("12137838989", 50, "2020-04-14");
INSERT INTO patient(NID_or_birth_certificate_No, age, admitted_date) VALUES
("010239123", 20, "2020-04-19");

INSERT INTO hospital(doctor_id, patient_id, hospital_name, location, phone) VALUES
(1, 1, "Dhaka Medical College and Hospital", "Dhaka 1000", "02-55165088");
INSERT INTO hospital(doctor_id, patient_id, hospital_name, location, phone) VALUES
(2, 2, "Rangpur Medica College and Hospital", "Rangpur", "01521-63388");
INSERT INTO hospital(doctor_id, patient_id, hospital_name, location, phone) VALUES
(2, 3, "Khulna Medical College and Hospital", "Khulna", "041-760350");

INSERT INTO test(date_time, is_positive, patient_id, hospital_id) VALUES
("2020-04-13 00:00:00", 1, 1, 1);
INSERT INTO test(date_time, is_positive, patient_id, hospital_id) VALUES
("2020-04-15 00:00:00", 1, 2, 1);
INSERT INTO test(date_time, is_positive, patient_id, hospital_id) VALUES
("2020-04-21 00:00:00", 1, 2, 3);

INSERT INTO released(patient_id, hospital_id, release_date) VALUES
(3, 1, "2020-04-20");
INSERT INTO released(patient_id, hospital_id, release_date) VALUES
(2, 2, "2020-04-25");
INSERT INTO released(patient_id, hospital_id, release_date) VALUES
(1, 1, "2020-04-30");

INSERT INTO patient_location(patient_id, city, district, post_code) VALUES
(1, "Mirpur", "Dhaka", "1216");
INSERT INTO patient_location(patient_id, city, district, post_code) VALUES
(2, "Rangpur", "Rangpur", "5402");
INSERT INTO patient_location(patient_id, city, district, post_code) VALUES
(3, "Khulna", "Khulna", "9202");

INSERT INTO death VALUES(1, "2020-04-10");
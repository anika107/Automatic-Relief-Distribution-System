-- CREATE DATABASE CORONA;

CREATE TABLE HOSPITAL
(
    id            BIGINT       NOT NULL AUTO_INCREMENT,
    doctor_id     BIGINT,
    patient_id    BIGINT,
    hospital_name VARCHAR(200) NOT NULL UNIQUE,
    location      VARCHAR(500),
    phone         VARCHAR(11)  NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE DOCTOR
(
    id             BIGINT AUTO_INCREMENT NOT NULL,
    BMDC_reg_no    VARCHAR(20)           NOT NULL UNIQUE,
    full_name      VARCHAR(200)          NOT NULL,
    specialization VARCHAR(50)           NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE PATIENT
(
    id                          BIGINT AUTO_INCREMENT,
    NID_or_birth_certificate_No VARCHAR(255) UNIQUE NOT NULL,
    age                         INT                 NOT NULL,
    admitted_date               DATETIME            NOT NULL,

    PRIMARY KEY (id)
);

CREATE TABLE TEST
(
    id          BIGINT(11) AUTO_INCREMENT,
    name        varchar(50)      DEFAULT "Coronavirus" NOT NULL,
    date_time   DATETIME         NOT NULL,
    is_positive BOOLEAN NOT NULL default 0,
    patient_id  BIGINT,
    hospital_id BIGINT(11),

    PRIMARY KEY (id)
);

CREATE TABLE PATIENT_LOCATION
(
    id         BIGINT AUTO_INCREMENT,
    patient_id BIGINT,
    house_no   VARCHAR(50),
    road_no    VARCHAR(50),
    city       VARCHAR(50) NOT NULL,
    district   VARCHAR(50) NOT NULL,
    post_code  VARCHAR(50) NOT NULL,

    PRIMARY KEY (id)
);

ALTER TABLE TEST
    ADD CONSTRAINT fk_patientID_for_test FOREIGN KEY (patient_id) REFERENCES PATIENT (id);

ALTER TABLE TEST
    ADD CONSTRAINT fk_hospitalID_for_test FOREIGN KEY (hospital_id) REFERENCES HOSPITAL (id);


CREATE TABLE DEATH
(
    patient_id BIGINT,
    death_date DATETIME NOT NULL
);

CREATE TABLE RELEASED
(
    patient_id   BIGINT   NOT NULL,
    hospital_id  BIGINT   NOT NULL,
    release_date DATETIME NOT NULL
);













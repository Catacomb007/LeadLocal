﻿DROP DATABASE IF EXISTS KODIAK;

CREATE DATABASE IF NOT EXISTS KODIAK;
USE KODIAK;

CREATE TABLE tourist (
    ID          int NOT NULL AUTO_INCREMENT,
    username    VARCHAR(50) NOT NULL UNIQUE,
    password    VARCHAR(128) NOT NULL,
    type        VARCHAR(1) DEFAULT "c",
    email       VARCHAR(50),
    contactInfo VARCHAR(300),
    PRIMARY KEY (ID)
);
CREATE TABLE employee (
    ID          int NOT NULL AUTO_INCREMENT,
    username    VARCHAR(50) NOT NULL UNIQUE,
    password    VARCHAR(128) NOT NULL,
    type        VARCHAR(1) DEFAULT "e",
    email       VARCHAR(50),
    contactInfo VARCHAR(300),
    rating      DECIMAL(4,3) NOT NULL,
    PRIMARY KEY (ID)
);
CREATE TABLE task (
    ID      int NOT NULL AUTO_INCREMENT,
    lang    VARCHAR(75),
    loc     VARCHAR(75),
    reserv  VARCHAR(25),
    tag     VARCHAR(100),
    detail  VARCHAR(1000),
    los     VARCHAR(10),
    tourist int NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (tourist) REFERENCES tourist(ID)
);

CREATE TABLE tasklist (
    task        int NOT NULL,
    employee    int NOT NULL,
    PRIMARY KEY (task, employee),
    FOREIGN KEY (task) REFERENCES task(ID),
    FOREIGN KEY (employee) REFERENCES employee(ID)
);

INSERT INTO employee(username, password, rating) VALUES ("admin", "1234", 3.5);
INSERT INTO employee(username, password, rating) VALUES ("John Carter", "OF MARS", 0.2);

INSERT INTO tourist(username, password) VALUES ("Pizza Man", "littleKaiser");
INSERT INTO tourist(username, password) VALUES ("Jack Arch", "words");


CREATE TABLE users(
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(128) NOT NULL,
    type     VARCHAR(1) NOT NULL,
    salt     VARCHAR(128) DEFAULT NULL,
    PRIMARY KEY (username)
);

INSERT INTO users(username, password, type) SELECT username, password, type FROM tourist UNION SELECT username, password, type FROM employee;
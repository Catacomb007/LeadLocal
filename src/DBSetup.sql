DROP DATABASE IF EXISTS KODIAK;

CREATE DATABASE IF NOT EXISTS KODIAK;
USE KODIAK;

CREATE TABLE tourist (
    ID          int NOT NULL AUTO_INCREMENT,
    username    VARCHAR(50) NOT NULL UNIQUE,
    password    VARCHAR(128) NOT NULL,
    type        VARCHAR(1) DEFAULT "c",
    email       VARCHAR(50),
    contactInfo VARCHAR(300),
	introInfo   VARCHAR(1000),
	pic	  		VARCHAR(300) DEFAULT "img/UserDefault.png",
    PRIMARY KEY (ID)
);
CREATE TABLE employee (
    ID          int NOT NULL AUTO_INCREMENT,
    username    VARCHAR(50) NOT NULL UNIQUE,
    password    VARCHAR(128) NOT NULL,
    type        VARCHAR(1) DEFAULT "e",
    email       VARCHAR(50),
    contactInfo VARCHAR(300),
    rating      int NOT NULL DEFAULT 1,
	introInfo   VARCHAR(1000),
	pic	   		VARCHAR(300) DEFAULT "img/UserDefault.png",
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
    tourist VARCHAR(50) NOT NULL,
	taken   int DEFAULT 0,
    PRIMARY KEY (ID),
    FOREIGN KEY (tourist) REFERENCES tourist(username)
);

CREATE TABLE tasklist (
    task        int NOT NULL,
    employee    VARCHAR(50) NOT NULL,
    PRIMARY KEY (task, employee),
    FOREIGN KEY (task) REFERENCES task(ID),
    FOREIGN KEY (employee) REFERENCES employee(username)
);

CREATE TABLE users(
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(128) NOT NULL,
    type     VARCHAR(1) NOT NULL,
    salt     VARCHAR(128) DEFAULT NULL,
    PRIMARY KEY (username)
);
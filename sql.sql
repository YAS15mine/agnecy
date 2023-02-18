CREATE DATABASE Homes_Agency ;

USE Homes_Agency ;

CREATE TABLE Client(
   `ClientId` INT NOT NULL AUTO_INCREMENT,
   `FirstName` VARCHAR(50),
   `LastName` VARCHAR(50),
   `Email` VARCHAR(100) UNIQUE,
   `Phone` VARCHAR(20) UNIQUE,
   `Password` VARCHAR(100),
   PRIMARY KEY(`ClientId`)
);

CREATE TABLE Annonce(
   `AnnounceId` INT NOT NULL AUTO_INCREMENT,
   `Tittle` VARCHAR(100),
   `Price` VARCHAR(50) CHECK ("Price">0),
   `PublishDate` VARCHAR(50) DEFAULT CURDATE(),
   `LastModified`VARCHAR(50),
   `Type` VARCHAR(50),
   `StreetName` VARCHAR(50),
   `streetNumber` VARCHAR(50),
   `City` VARCHAR(50),
   `Country` VARCHAR(50),
   `ZipCode` VARCHAR(50),
   `ClientId` INT,
   PRIMARY KEY(`AnnounceId`),
   FOREIGN KEY(`ClientId`) REFERENCES Client(`ClientId`)
);

CREATE TABLE Images(
   `ImageId` INT NOT NULL AUTO_INCREMENT,
   `IsPricipale` BOOLEAN NOT NULL,
   `ImageURL` VARCHAR(50),
   `AnnounceId` INT NOT NULL,
   PRIMARY KEY(`ImageId`),
   FOREIGN KEY(`AnnounceId`) REFERENCES Annonce(`AnnounceId`)
);
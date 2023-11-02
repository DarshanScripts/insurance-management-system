CREATE DATABASE Insurance;

USE Insurance;


CREATE TABLE User
(
    uId INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(15) NOT NULL,
    lastName VARCHAR(15) NOT NULL,
    email VARCHAR(35) NOT NULL,
    password CHAR(32),
    userType CHAR(1) DEFAULT 'U',
    creationDate DATETIME
);


CREATE TABLE InsurancePlan
(
    pId INT PRIMARY KEY AUTO_INCREMENT,
    pName VARCHAR(30) NOT NULL,
    price DECIMAL(8,2)
);

INSERT INTO InsurancePlan(pName,price) VALUES
("Reliance  Health",5000.00),
("HDFC Health Plan",8000.00),
("Emcure HealthCare",3200.00),
("Max Life Insurance",6500.00);


CREATE TABLE PurchasedPlans
(
    puId INT,
    ppId INT,
    purchasedDate DATETIME,
    PRIMARY KEY(puId,ppId),
    FOREIGN KEY (puId) REFERENCES User(uId), 
    FOREIGN KEY (ppId) REFERENCES InsurancePlan(pId)
);
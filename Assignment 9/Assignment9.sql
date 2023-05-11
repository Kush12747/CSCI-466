/*
* Assignment 9
* Name: Kush Gandhi
* z1968933
* CSCI 466-PE1
* 4/7/23
*/

CREATE TABLE S (
    S CHAR(2) NOT NULL,
    SNAME CHAR(50) NOT NULL,
    SSTATUS INT NOT NULL,
    CITY CHAR(15) NOT NULL,
    PRIMARY KEY (S)
);

INSERT INTO S
    (S, SNAME, SSTATUS, CITY) VALUES 
    ('S1', 'Smith', 20, 'London'),
    ('S2', 'Jones', 10, 'Paris'),
    ('S3', 'Blake', 30, 'Paris'),
    ('S4', 'Clark', 20, 'London'),
    ('S5', 'Adams', 30, 'Athens');

CREATE TABLE P (
    P CHAR(2) NOT NULL,
    PNAME CHAR(50) NOT NULL,
    COLOR CHAR(10) NOT NULL,
    WEIGHT INT NOT NULL,
    PRIMARY KEY (P)
);

INSERT INTO P
    (P, PNAME, COLOR, WEIGHT) VALUES
    ('P1', 'Nut', 'Red', 12),
    ('P2', 'Bolt', 'Green', 17),
    ('P3', 'Screw', 'Blue', 17),
    ('P4', 'Screw', 'Red', 14),
    ('P5', 'Cam', 'Blue', 12),
    ('P6', 'Cog', 'Red' , 19);

CREATE TABLE SP (
    S CHAR(2) NOT NULL,
    P CHAR(2) NOT NULL,
    QTY INT NOT NULL,
    PRIMARY KEY (S, P),
    FOREIGN KEY (S) REFERENCES S(S),
    FOREIGN KEY (P) REFERENCES P(P)
);

INSERT INTO SP
    (S, P, QTY) VALUES
    ('S1', 'P1', 300),
    ('S1', 'P2', 200),
    ('S1', 'P3', 400),
    ('S1', 'P4', 200),
    ('S1', 'P5', 100),
    ('S1', 'P6', 100),
    ('S2', 'P1', 300),
    ('S2', 'P2', 400),
    ('S3', 'P2', 200),
    ('S4', 'P2', 200),
    ('S4', 'P4', 300),
    ('S4', 'P5', 400);

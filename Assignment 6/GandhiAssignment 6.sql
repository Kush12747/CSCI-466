/*
Assignment 6

Name:     Kush Gandhi
ID:       z1968933
Section:  CSCI 466-PE1
*/

-- 1. sets the database to BabyName
USE BabyName;

-- 2. lists all of the tables in BabyName
SHOW TABLES;

-- 3. shows all names from my birth year (2002)
SELECT DISTINCT Name
FROM BabyName
WHERE Year = 2002
LIMIT 50;

-- 4. lists the columns in BabyName
SHOW COLUMNS FROM BabyName;

-- 5. lists how many unique name there are
SELECT COUNT(DISTINCT Name)
FROM BabyName
LIMIT 50;

-- 6. shows the years where my first name appears by using chad
SELECT DISTINCT Year
FROM BabyName
WHERE Name = 'Chad'
LIMIT 50;

-- 7. Displays the most popular male and female names but only male is working
SELECT Gender, Name, COUNT(Name)
FROM BabyName
WHERE YEAR = 1984;

-- 8. shows information about the names in order by name, count, and year
SELECT *
FROM BabyName
WHERE Name = 'Kush'
ORDER BY Name, Count, Year
LIMIT 50; 

-- 9. shows the count of how many unique name there were in 1946
SELECT COUNT(DISTINCT Name)
FROM BabyName
WHERE Year = 1946
LIMIT 50;

-- 10. shows the number of rows in the table
SELECT COUNT(*)
   FROM BabyName;

-- 11. shows the number of names in the table as sex in 1948
SELECT COUNT(Gender)
FROM BabyName
WHERE Year = 1968
GROUP BY Gender
LIMIT 50;

-- 12. Shows a table of first letter and the frequency of names 
SELECT Name AS 'First Letter', COUNT(DISTINCT Name) AS 'Frequency'
FROM BabyName
GROUP BY Count
LIMIT 50;
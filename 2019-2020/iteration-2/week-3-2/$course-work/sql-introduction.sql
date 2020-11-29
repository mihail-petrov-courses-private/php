-- create new schema / folder 
CREATE DATABASE flashcat;

USE flashcat;

CREATE TABLE flashcat.users(
	username 	VARCHAR(256) NULL,
    fname 		VARCHAR(256) NULL,
    lname 		VARCHAR(256) NULL,
    password 	VARCHAR(256) NULL,
    email  		VARCHAR(256) NULL,
    city   		VARCHAR(128) NULL,
    address		VARCHAR(512) NULL,
    phone		VARCHAR(16)  NULL,
    egn			VARCHAR(10)  NULL,
    age			INTEGER
);

-- CREATE NEW DATA / INSERT NEW DATA
INSERT INTO flashcat.users(username)
	   VALUES('mihail.petrov');

INSERT INTO flashcat.users(username, fname, lname, age)
	   VALUES(10, 'ivan.ivanov', 'Ivanov', 'Ivan');

INSERT INTO flashcat.users(username, fname, lname, age)
	   VALUES('ivan.ivanov', 'Ivan', 'Ivanov', 10);


-- SELECT INFROMATIOn FROM TABLE
SELECT * 
FROM flashcat.users;

-- only usernames
SELECT username, fname, lname 
FROM flashcat.users;

-- select with column modification
SELECT username AS 'user name', fname AS 'first name', lname AS 'last name' 
FROM flashcat.users;

-- Cannot concat with + / . 
SELECT username AS 'user name', (fname || lname) AS 'full name' 
FROM flashcat.users;

-- Select with filtering 
SELECT * FROM flashcat.users WHERE username = 'mihail.petrov';
SELECT * FROM flashcat.users WHERE age > 5;
SELECT * FROM flashcat.users WHERE age != 5;
SELECT * FROM flashcat.users WHERE age <> 5;

-- DELETE data from table
DELETE FROM flashcat.users WHERE username = 'mihail.petrov';

-- UPDATE
UPDATE flashcat.users SET age = 18 WHERE username = 'mihail.petrov';
UPDATE flashcat.users SET age = 19;

-- CREATE TABLE FROM TABLE 
CREATE TABLE flashcat.vip_users 
AS 
(SELECT username, age FROM flashcat.users);

-- CREATE TABLE FROM TABLE 
CREATE TABLE flashcat.vup_users 
AS 
(SELECT username, age FROM flashcat.users WHERE 1 = 2);

SELECT * FROM flashcat.vup_users;

-- REMOVE SCHEMA TABLES
DROP TABLE flashcat.vip_users;
TRUNCATE TABLE flashcat.users;

-- Buy Buy database
DROP DATABASE flashcat
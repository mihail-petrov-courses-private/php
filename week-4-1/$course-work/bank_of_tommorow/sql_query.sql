-- SQL
/*
var o = {
	fname : "Mihail",
    lname : "Petrov"
}
*/
-- DDL
CREATE DATABASE bank_of_tommorow;

CREATE TABLE users (
	fname 		VARCHAR(36), 
    lname 		VARCHAR(36),
    extraname 	VARCHAR(36),
    address 	VARCHAR(156),
    mobile		VARCHAR(15),
    email 		VARCHAR(156),
    role 		VARCHAR(156),
    department 	VARCHAR(156)
);

-- add new column 
ALTER TABLE users 
ADD COLUMN manager VARCHAR(72);

CREATE TABLE extra_users (
	fname 		VARCHAR(36), 
    lname 		VARCHAR(36),
    extraname 	VARCHAR(36),
    address 	VARCHAR(156),
    mobile		VARCHAR(15),
    email 		VARCHAR(156) PRIMARY KEY,
    role 		VARCHAR(156),
    department 	VARCHAR(156)
);

ALTER TABLE extra_users 
ADD COLUMN manager VARCHAR(72);

-- DROP single table 
DROP TABLE bank_of_tommorow.users;

-- DROP database
DROP DATABASE bank_of_tommorow;

-- DML
-- SELECT / INSERT / UPDATE / DELETE
-- CREATE / READ / UPDATE / DELETE (CRUD)

-- INSERT (data into sers)
INSERT INTO users(fname, lname, address, mobile, email, role, department)
VALUES('Mihail', "Petrov", 'Plovdiv', '0886504011', 'mail@mihail-petrov.me', 'Dev', 'IT');

INSERT INTO users(fname, lname) 
VALUES('Todor', 'Nenov');

INSERT INTO extra_users(fname, lname, address, mobile, email, role, department)
VALUES('Mihail', "Petrov", 'Plovdiv', '0886504011', 'mail@mihail-petrov.me', 'Dev', 'IT');

INSERT INTO extra_users(fname, lname, address, mobile, email, role, department)
VALUES('Mihail', "Todorov", 'Plovdiv', '0886504011', 'mail@mihail-todorov.me', 'Dev', 'IT');


-- SELECT ALL columns
SELECT * 
FROM users;

SELECT * 
FROM extra_users;

-- SELECT specific columns
SELECT fname, lname 
FROM users;

-- SELECT specific columns with ALIAS
SELECT 	fname AS first_name, 
		lname AS last_name 
FROM users;

SELECT 	fname first_name, 
		lname last_name 
FROM users;

-- SELECT specific column by table name 
SELECT users.department, users.* from users;
SELECT u.department, u.* from users AS u;

-- SELECT with mixed case
SeLeCt u.department, u.* fRoM uSeRs As u;
 
-- UPDATE single user manager
-- cannot update table without primary key
UPDATE users  SET manager = 'Manol' WHERE fname = 'Mihail';

-- DELETE 
-- cannot delete table without primary key
DELETE FROM users WHERE fname = 'Mihail';

-- DELETE
-- specific primary keu record
DELETE FROM bank_of_tommorow.extra_users 
WHERE email = 'mail@mihail-petrov.me';

-- UPDATE 
-- single record manager
UPDATE extra_users 
SET manager = 'Manol'
WHERE email = 'mail@mihail-petrov.me';

-- cannot update multiple records 
-- by default
UPDATE extra_users 
SET manager = 'Manol'
WHERE address = 'Plovdiv';

-- UPDATE 
-- single record but multiple colums
UPDATE extra_users 
SET extra_users.manager 	= 'Manol', 
	extra_users.department 	= 'Marketing',
    extra_users.role		= 'Admin'
WHERE email = 'mail@mihail-petrov.me';


-- specify explicity database with USE
USE bank_of_tommorow;
SELECT * FROM extra_users;

-- specify explicity database with database name is table name 
SELECT * FROM bank_of_tommorow.extra_users;

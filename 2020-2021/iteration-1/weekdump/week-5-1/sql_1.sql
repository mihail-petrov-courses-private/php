-- 1. създаве на нова таблица
-- tb - (table)
-- tm - table maintenens 
CREATE TABLE bank.tb_users(
	
    id 			INTEGER AUTO_INCREMENT PRIMARY KEY,
    fname 		VARCHAR(150),
    lname 		VARCHAR(150),
    extra_name 	VARCHAR(150),
    -- egn 		VARCHAR(10),
    address 	VARCHAR(150),
    phone 		VARCHAR(10),
    ocupation 	VARCHAR(100),
    department 	VARCHAR(45)
);

USE bank;
CREATE TABLE tb_departments(
	title VARCHAR(100)
);

-- 2. Пълнене на данни в таблици
INSERT INTO bank.tb_users(
    fname 		,
    lname 		,
    extra_name 	,
    address 	,
    phone 		,
    ocupation 	,
    department 	
)
VALUES(
    'Mihail'	, 
    'Petrov'	,
    'Todorov'	,
    'Plovdiv'	,
    '0886504013',
    'Developer'	,
    'IT'
);

INSERT INTO bank.tb_departments(
	title
)
VALUES('');

-- 3. Селектиране на данни от таблица
SELECT *
FROM bank.tb_departments;

-- 4. Унищожаване на таблица.
DROP TABLE bank.tb_departments;

-- 5. Нова и подобрена версия на tb_departments
CREATE TABLE bank.tb_departments(
	id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(250) UNIQUE
);

-- 6. Нови данни за департаментите
INSERT INTO bank.tb_departments(
	title
)
VALUES(
	'Счетоводство'
);

-- 7. Вземи всички данни от таблицата bank.tb_users
SELECT * 
FROM bank.tb_users;

-- 8. Изтриване на данни от таблица
DELETE FROM bank.tb_users
WHERE id = 1;

DELETE FROM bank.tb_users
WHERE id IN ( 3, 5, 7  );

-- 8.1 : Поголовна сеч, унищожаване на данните
TRUNCATE bank.tb_users;

-- 9. Промени в таблицата за служителите
ALTER TABLE `bank`.`tb_users` 
CHANGE COLUMN `department` `department_id` INT NULL DEFAULT NULL;

-- 10. Актуализация на данните за екипите
INSERT INTO bank.tb_users(
    fname 		,
    lname 		,
    extra_name 	,
    address 	,
    phone 		,
    ocupation 	,
    department_id 	
)
VALUES(
    'Mihail'	, 
    'Petrov'	,
    'Todorov'	,
    'Plovdiv'	,
    '0886504013',
    'Developer'	,
    1
);

-- 11. Актуализация на телефонните данни на г-н Петров
UPDATE bank.tb_users
SET phone = '0886504012'
WHERE id = 1
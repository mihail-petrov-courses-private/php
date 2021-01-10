CREATE DATABASE bank_of_tomorow;

USE bank_of_tomorow;

-- 1. Служители 
CREATE TABLE tb_employ (
	id 		INT PRIMARY KEY AUTO_INCREMENT,
	fname 	VARCHAR(125),
    lname 	VARCHAR(125),
    ename 	VARCHAR(125),
    address VARCHAR(125),
    phone 	VARCHAR(15),
    mail 	VARCHAR(125),
    -- 
    ocupation_id INT,
    department_id INT,
    superviser_id INT
);

-- 2. таблица за длъжности
CREATE TABLE tm_ocupation(
	id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(125)
);

-- 3. таблица за отдели
CREATE TABLE tm_department(
	id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(125)
);

-- 4. таблица за клиенти
CREATE TABLE tb_customer(
	id 		INT PRIMARY KEY AUTO_INCREMENT,
	fname 	VARCHAR(125),
    lname 	VARCHAR(125),
    ename 	VARCHAR(125),
    address VARCHAR(125),
    phone 	VARCHAR(15),
    mail 	VARCHAR(125)
);

-- 5. таблица със сметки
CREATE TABLE tb_customer_account(
	id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    amount DECIMAL,
    ccy CHAR(3) DEFAULT 'BGN'
);

-- 6. свързваща таблица за потребители и сметки
CREATE TABLE tm_customer__customer_account(
	customer_id INT,
    customer_account_id INT,
    PRIMARY KEY(customer_id, customer_account_id )
);

-- Популиране на данни - отдела
INSERT INTO tm_department(title) VALUES('IT');
INSERT INTO tm_department(title) VALUE('Операции');
INSERT INTO tm_department(title)VALUES('Счетоводство');

-- Популиране на данни - длъжността
INSERT INTO tm_ocupation(title) VALUES('програмист');
INSERT INTO tm_ocupation(title) VALUES('администратор');
INSERT INTO tm_ocupation(title) VALUES('оператор');
INSERT INTO tm_ocupation(title) VALUES('счетоводител');

-- Популиране на данни - служители
INSERT INTO tb_employ(
fname, lname, ename, address, phone, mail, ocupation_id,
department_id
)
VALUES('Михаил', 'Петров', 'Тодоров', 'Пловдив', '0886504013',
'mihail@mail.bg', 1, 1);

INSERT INTO tb_employ(
fname, lname, ename, address, phone, mail, ocupation_id,
department_id, superviser_id
)
VALUES('Тодор', 'Наков', 'Ванков', 'Пловдив', '0886504014',
'todor@mail.bg', 1, 1, 1);

INSERT INTO tb_employ(
fname, lname, ename, address, phone, mail, ocupation_id,
department_id, superviser_id
)
VALUES('Георги', 'Станков', 'Лалов', 'Пловдив', '0886504015',
'georgi@mail.bg', 1, 1, 1);

INSERT INTO tb_employ(
fname, lname, ename, address, phone, mail, ocupation_id,
department_id
)
VALUES('Наско', 'Иванов', 'Петков', 'София', '0886505015',
'nasko@mail.bg', 2, 2);


-- Бизнес заявки част  1. 
-- 1. Листинг на всички отдели в банката
SELECT * FROM tm_department

-- 2. Всички служители и техните отдели 
SELECT * FROM tb_employ

SELECT fname, ename, lname  
FROM tb_employ

-- Неофицялен inner JOIN (вътрешно свързане)
SELECT 	a.fname, 
		a.ename, 
        a.lname, 
        b.title, 
        c.title,
        -- как да направим от две колонки една нова ?
        (SELECT fname FROM tb_employ WHERE id = a.superviser_id) AS supervisor_fname,
        (SELECT lname FROM tb_employ WHERE id = a.superviser_id) AS supervisor_lname
FROM tb_employ 		AS a,
	 tm_department	AS b,
     tm_ocupation 	AS c
WHERE a.department_id = b.id AND 
	  a.ocupation_id  = c.id

-- Офицялен inner JOIN (вътрешно свързане)
SELECT 	a.fname AS 'first_name', 
		a.ename, 
        a.lname, 
        b.title, 
        c.title
FROM tb_employ AS a 
INNER JOIN tm_department	AS b
		ON a.department_id = b.id
INNER JOIN tm_ocupation AS c
		ON a.ocupation_id = c.id;
    
-- Популация на данни за клиенти и сметки
INSERT INTO tb_customer(fname , lname , ename , address, phone , mail)
VALUES(
    'Богатир', 'Богатиров','Богатски','Симитли','0884541236','bogatir@mail.bg'
);

INSERT INTO tb_customer(fname , lname , ename , address, phone , mail)
VALUES(
    'Наката', 'Беднев','Бедняшки','Злокучене','0883541236','nakata@mail.bg'
);

INSERT INTO tb_customer(fname , lname , ename , address, phone , mail)
VALUES(
    'Сашо', 'Кътев','Цънев','Софията','0884541236','oisashko@mail.bg'
);

-- 5. таблица със сметки
INSERT INTO tb_customer_account(title, amount)
VALUES('Сметка богата', 10000);

INSERT INTO tb_customer_account(title, amount)
VALUES('Сметка бедна', 2);

INSERT INTO tb_customer_account(title, amount)
VALUES('Сметка средна', 50000);

INSERT INTO tb_customer_account(title, amount, ccy)
VALUES('Сметка валутна', 15400, 'EUR');

INSERT INTO tb_customer_account(title, amount, ccy)
VALUES('Сметка грешна', 10400, 'EU');

select * from tb_customer_account;
-- не трием никога никога никога 
DELETE FROM tb_customer_account WHERE id = 5;
UPDATE tb_customer_account 
SET is_open = 'N' 
WHERE id = 6;

-- Как мога да вкарам стойнисти наведнъж ? 
INSERT INTO tm_customer__customer_account(customer_id, customer_account_id)
VALUES(1,1);
INSERT INTO tm_customer__customer_account(customer_id, customer_account_id)
VALUES(1,2);
INSERT INTO tm_customer__customer_account(customer_id, customer_account_id)
VALUES(1,3);
INSERT INTO tm_customer__customer_account(customer_id, customer_account_id)
VALUES(1,4);
INSERT INTO tm_customer__customer_account(customer_id, customer_account_id)
VALUES(2,2);
INSERT INTO tm_customer__customer_account(customer_id, customer_account_id)
VALUES(3,3);
INSERT INTO tm_customer__customer_account(customer_id, customer_account_id)
VALUES(3,6);

select * from tm_customer__customer_account

-- връзка между таблица 
-- * tb_customer  
-- * tm_customer__customer_account
-- * tb_customer_account

SELECT a.fname, a.lname, b.id AS account_number, b.title, b.amount, b.ccy
FROM tb_customer 					AS a,
	 tb_customer_account 			AS b,
     tm_customer__customer_account 	AS c
WHERE c.customer_id 		= a.id AND 
	  c.customer_account_id = b.id AND 
      b.is_open 			= 'Y'	AND 
      b.amount 				< (SELECT MAX(amount) / 2 FROM tb_customer_account)
ORDER BY a.fname

-- Колко сметки има в банката ?
SELECT COUNT(*) AS number_of_accounts
FROM tb_customer_account

-- Коя сметка има най-много пари ?
SELECT MAX(amount) / 2
FROM tb_customer_account

SELECT 	a.fname, 
		a.ename, 
        a.lname, 
        b.title, 
        c.title,
        -- как да направим от две колонки една нова ?
        (SELECT fname FROM tb_employ WHERE id = a.superviser_id) AS supervisor_fname,
        (SELECT lname FROM tb_employ WHERE id = a.superviser_id) AS supervisor_lname
FROM tb_employ 		AS a,
	 tm_department	AS b,
     tm_ocupation 	AS c
WHERE a.department_id = b.id AND 
	  a.ocupation_id  = c.id AND 
      a.superviser_id IS NULL

        
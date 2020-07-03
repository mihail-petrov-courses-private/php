CREATE DATABASE bank_of_tomorow;

-- tb_  table containing general infromation
-- tm_  table containing configurations

CREATE TABLE bank_of_tomorow.tb_employ(
	id				INTEGER auto_increment PRIMARY KEY,
	first_name 		VARCHAR(256),
    last_name  		VARCHAR(256),
    extra_name 		VARCHAR(256),
    address 		VARCHAR(256),
    mobile_phone 	VARCHAR(16),
    ocupation 		VARCHAR(256),
    department 		VARCHAR(256) -- Marketing / Legal / Loan administartion
);


TRUNCATE bank_of_tomorow.tb_employ;
DELETE FROM bank_of_tomorow.tb_employ;
SELECT * FROM bank_of_tomorow.tb_employ;

ALTER TABLE bank_of_tomorow.tb_employ ADD manager_id INTEGER;
ALTER TABLE bank_of_tomorow.tb_employ ADD COLUMN manager_id INTEGER;
ALTER TABLE bank_of_tomorow.tb_employ DROP COLUMN manager_id;

INSERT INTO bank_of_tomorow.tb_employ(first_name, last_name,
    address, mobile_phone, ocupation, department_id
)
VALUES('Mihail', 'Petrov', 'Plovdiv', '0886505050', 'Developer', 1 );

INSERT INTO bank_of_tomorow.tb_employ(first_name, last_name,
    address, mobile_phone, ocupation, department_id, superviser_id
)
VALUES('Ivan', 'Gachev', 'Plovdiv', '0886505040', 'Jr. Developer', 1, 1 );

INSERT INTO bank_of_tomorow.tb_employ(first_name, last_name,
    address, mobile_phone, ocupation, department_id, superviser_id
)
VALUES('Pesho', 'Peshev', 'Sofia', '0886505030', 'Intern. Developer', 1, 1 );


CREATE TABLE bank_of_tomorow.tb_departments (
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(256) NOT NULL 
);


ALTER TABLE bank_of_tomorow.tb_employ DROP COLUMN department
ALTER TABLE bank_of_tomorow.tb_employ ADD COLUMN department_id INTEGER NOT NULL 


INSERT INTO bank_of_tomorow.tb_departments(title) VALUES('IT');
INSERT INTO bank_of_tomorow.tb_departments(title) VALUES('Loan Administration');
INSERT INTO bank_of_tomorow.tb_departments(title) VALUES('E - Bank');


-- select jopin information employ and department
SELECT * FROM bank_of_tomorow.tb_employ 		AS a,
			  bank_of_tomorow.tb_departments 	AS b
				WHERE a.department_id = b.id;
                
SELECT first_name, last_name, (SELECT first_name 
								FROM bank_of_tomorow.tb_employ b 
                                WHERE b.id = a.superviser_id) AS supervisor_name
FROM bank_of_tomorow.tb_employ a

-- combo ultimate QUERY 
SELECT a.first_name	, 
	   a.last_name	,
       (SELECT first_name FROM bank_of_tomorow.tb_employ inner_b
		WHERE inner_b.id = a.superviser_id) AS supervisor_id,
       b.title 
FROM bank_of_tomorow.tb_employ 			AS a,
	 bank_of_tomorow.tb_departments 	AS b
WHERE a.department_id = b.id;

CREATE TABLE bank_of_tomorow.tb_customers(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(256),
    last_name VARCHAR(256),
    extra_name VARCHAR(256),
	address VARCHAR(256),
    mobile_phone VARCHAR(256),
    email VARCHAR(256)
)

CREATE TABLE bank_of_tomorow.tb_customer_account(
	account CHAR(5) PRIMARY KEY,
	ccy CHAR(3) NOT NULL DEFAULT 'BGN',
    
    customer_id INTEGER
)

INSERT INTO bank_of_tomorow.tb_customers(first_name, last_name)
VALUES('Derko', 'Manov')
SELECT * FROM bank_of_tomorow.tb_customers

SELECT * FROM bank_of_tomorow.tb_customer_account
INSERT INTO bank_of_tomorow.tb_customer_account(account, customer_id)
VALUES('YYYHY', 4);


SELECT * FROM bank_of_tomorow.tb_customer_account
INSERT INTO bank_of_tomorow.tb_customer_account(account, customer_id)
VALUES('GGGGG', 3);


SELECT a.first_name, 
		a.last_name,
        b.account,
        b.ccy
 FROM bank_of_tomorow.tb_customers 		AS a,
			  bank_of_tomorow.tb_customer_account 	AS b
              WHERE a.id = b.customer_id AND 
					b.account = 'QAQWS'
              
              


CREATE TABLE bank_of_tomorow.tb_customer__customer_account(
	customer_id INTEGER,
	account_id CHAR(5),
    PRIMARY KEY(customer_id, account_id)
)



SELECT * FROM bank_of_tomorow.tb_customer_account
ALTER TABLE bank_of_tomorow.tb_customer_account DROP COLUMN customer_id


INSERT INTO bank_of_tomorow.tb_customer__customer_account(customer_id, account_id)
VALUES(1, 'ABCDE');
INSERT INTO bank_of_tomorow.tb_customer__customer_account(customer_id, account_id)
VALUES(2, 'ABCDE');

INSERT INTO bank_of_tomorow.tb_customer__customer_account(customer_id, account_id)
VALUES(3, 'ABCDE');

INSERT INTO bank_of_tomorow.tb_customer__customer_account(customer_id, account_id)
VALUES(3, 'GGGGG');


SELECT a.first_name, 
		a.last_name,
        b.account,
        b.ccy
 FROM bank_of_tomorow.tb_customers 					AS a,
	  bank_of_tomorow.tb_customer_account 			AS b,
      bank_of_tomorow.tb_customer__customer_account AS c
              WHERE a.id = c.customer_id AND 
					b.account = c.account_id

DROP DATABASE bank_of_tomorow;

CREATE DATABASE bank_of_tomorow;

USE bank_of_tomorow;
CREATE TABLE users(
	
    -- artificial column
    id INTEGER PRIMARY KEY AUTO_INCREMENT,

	fname 			VARCHAR(36),
    lname 			VARCHAR(36),
    extra_name 		VARCHAR(36),
    address 		VARCHAR(156),
    mobile 			VARCHAR(15),
    email 			VARCHAR(156),
    ocupation 		VARCHAR(156),
    department_id 	INTEGER NOT NULL,  -- do not store the bname store the id 
    manager_id 		INTEGER NOT NULL
);

create table departments (
	id INTEGER PRIMARY KEY auto_increment,
	name VARCHAR(156)
);

CREATE TABLE customers(
	
    -- artificial column
    id INTEGER PRIMARY KEY AUTO_INCREMENT,

	fname 			VARCHAR(36),
    lname 			VARCHAR(36),
    extra_name 		VARCHAR(36),
    address 		VARCHAR(156),
    mobile 			VARCHAR(15),
    email 			VARCHAR(156)
);

CREATE TABLE accounts(
  `id` INT NOT NULL AUTO_INCREMENT,
  `account_name` VARCHAR(156) NULL,
  `account_number` VARCHAR(45) NOT NULL,
  `amount` DECIMAL(5) NULL,
  `currency` CHAR(3) NULL DEFAULT 'BGN',
   PRIMARY KEY (`id`, `account_number`)
);

-- LINK table betweek customer_id and account_id
CREATE TABLE `customer_account` (
  `customer_id` INT NOT NULL,
  `account_id` INT NOT NULL,
  PRIMARY KEY (`customer_id`, `account_id`));
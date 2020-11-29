INSERT INTO departments(name) VALUES('IT');
INSERT INTO departments(name) VALUES('Marketing');
INSERT INTO departments(name) VALUES('Support');
INSERT INTO departments(name) VALUES('Risk');

select * from departments;

-- users insert
INSERT INTO users( fname,  lname,  extra_name,  address,  mobile,  email,  ocupation, department_id, manager_id)
VALUES('Mihail', 'Petrov', 'Todor', 'Plovdiv', '0886504011', 'mail@mihail-petrov.me', 'Dev', 1, 1);
INSERT INTO users( fname,  lname,  extra_name,  address,  mobile,  email,  ocupation, department_id, manager_id)
VALUES('Todor', 'Petrov', 'Todorov', 'Plovdiv', '0886504011', 'mail@mihail-petrov.me', 'Dev', 1, 1);
INSERT INTO users( fname,  lname,  extra_name,  address,  mobile,  email,  ocupation, department_id, manager_id)
VALUES('Ivan', 'Petrov', 'Ivanov', 'Plovdiv', '0886504011', 'mail@mihail-petrov.me', 'Marketing expert', 2, 3);


select 	users.id,  
		users.fname, 
        users.lname, 
        users.ocupation, 
        departments.name
from users, departments;


select 	users.id,  
		users.fname, 
        users.lname, 
        users.ocupation, 
        departments.name
from users, departments
where users.department_id = departments.id 
	  AND users.fname = 'Mihail';
      
select 	a.id,  
		a.fname, 
        a.lname, 
        a.ocupation, 
        b.name
from 	users a, 
		departments b
where a.department_id = b.id 
	  AND a.fname = 'Mihail';    
      

-- where users.department_id = 1 AND departments.id = 1


-- select all users whit there managers
SELECT fname, lname, manager_id 
from users
WHERE department_id = (SELECT id FROm departments WHERE name = 'IT'); -- sub query


-- SELECT fname FROM users where manager_id = 1

-- 1 : 1
SELECT 	fname, 
		lname, 
        (SELECT users.fname FROM users where id = a.manager_id) manager_fname,
        (SELECT users.lname FROM users where id = a.manager_id) manager_lname
FROM users a;

INSERT INTO `bank_of_tomorow`.`customers` (`fname`, `lname`, `address`, `mobile`, `email`) 
VALUES ('Mihail', 'Petrov', 'Plovdiv', '1', '1');

INSERT INTO `bank_of_tomorow`.`customers` (`fname`, `lname`, `address`, `mobile`, `email`) 
VALUES ('Todor', 'Ivanov', 'Sofia', '2', '2');


INSERT INTO `bank_of_tomorow`.`accounts` (`account_name`, `account_number`, `amount`, `currency`) 
VALUES ('A1', 'AABBCC', '10', 'BGN');
INSERT INTO `bank_of_tomorow`.`accounts` (`account_name`, `account_number`, `amount`) 
VALUES ('A2', 'AABB11', '20');
INSERT INTO `bank_of_tomorow`.`accounts` (`account_name`, `account_number`, `amount`) 
VALUES ('A3', 'AABB22', '30');
INSERT INTO `bank_of_tomorow`.`accounts` (`account_name`, `account_number`, `amount`, `currency`) 
VALUES ('A4', 'AABB33', '40', 'USD');
INSERT INTO `bank_of_tomorow`.`accounts` (`account_name`, `account_number`, `amount`, `currency`) 
VALUES ('A5', 'AABB44', '50', 'EUR');

-- Many : Many 
SELECT  fname, account_number 
FROM  	customers, 
		accounts,  
        customer_account   
WHERE 	customer_account.customer_id = customers.id AND 
		customer_account.account_id = accounts.id AND 
        fname = 'Mihail'
	
        
        




SELECT * FROM cms.tb_users;

CREATE TABLE tm_role(
		id INTEGER AUTO_INCREMENT PRIMARY KEY,
        title varchar(256)
);

CREATE TABLE tm_users__user_role(
		user_id INTEGER,
        role_id INTEGER,
        primary key(user_id, role_id)
);

INSERT INTO tm_role(title) VALUES('USER');
INSERT INTO tm_role(title) VALUES('MODERATOR');
INSERT INTO tm_role(title) VALUES('ADMIN');


SELECT * FROM tm_users__user_role;

SELECT b.title 
FROM tm_users__user_role a, 
	 tm_role b
WHERE a.user_id = 3 AND 
	  a.role_id = b.id
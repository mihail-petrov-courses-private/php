CREATE TABLE mycms.tm_roles (
	id iNTEGER auto_increment PRIMARY KEY,
    title VARCHAR(256) NOT NULL
);

INSERT INTO mycms.tm_roles(title) VALUES('USER'		);
INSERT INTO mycms.tm_roles(title) VALUES('MODERATOR');
INSERT INTO mycms.tm_roles(title) VALUES('ADMIN'	);

CREATE TABLE mycms.tb_user__role(
	user_id INTEGER,
    role_id INTEGER,
    PRIMARY KEY(user_id, role_id)
);
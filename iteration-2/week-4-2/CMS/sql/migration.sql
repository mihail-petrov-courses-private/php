CREATE DATABASE mycms;

CREATE TABLE mycms.tb_blog_post (
	id 		INTEGER AUTO_INCREMENT PRIMARY KEY		,
    title 	VARCHAR(512) NOT NULL					, 
    content TEXT NOT NULL							,
    priview_content VARCHAR(1024)
);

INSERT INTO mycms.tb_blog_post(title, content, priview_content)
VALUES('Последни клюки', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', 'Това са най-последните клюки на света');

INSERT INTO mycms.tb_blog_post(title, content, priview_content)
VALUES('Политика служба тика', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', 'Политиката е като, ..... ');

INSERT INTO mycms.tb_blog_post(title, content, priview_content)
VALUES('Сашо Роман президент', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', 'Бъдещето е сега, ееее тра ла ла');

INSERT INTO mycms.tb_blog_post(title, content, priview_content)
VALUES('Излезе HTML 8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', 'Невероятно но факт');

INSERT INTO mycms.tb_blog_post(title, content, priview_content)
VALUES('Почнахме да пишем бази', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore', 'Еми почнахме');

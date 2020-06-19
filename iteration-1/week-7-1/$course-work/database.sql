CREATE DATABASE cms;

CREATE TABLE cms.cms_posts(
	id 				INTEGER AUTO_INCREMENT PRIMARY KEY,
    title 			VARCHAR(256) 	NOT NULL,
    preview_contet 	VARCHAR(512) 	NOT NULL,
    content 		TEXT 		 	NOT NULL
);

CREATE TABLE cms.cms_groups(
	id 			INTEGER AUTO_INCREMENT PRIMARY KEY,
    title 		VARCHAR(256) NOT NULL,
    priority 	INTEGER DEFAULT 0
);

CREATE TABLE cms.cms_group_post(
	post_id INTEGER,
    group_id INTEGER
);

CREATE TABLE cms.users(
	id 			INTEGER AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(256) NOT NULL,
    email    VARCHAR(256) NOT NULL,
    password VARCHAR(256) NOT NULL,
    role	 tinyint DEFAULT 0
);

CREATE TABLE cms.user_personal_data(
	user_id INTEGER PRIMARY KEY,
    fname   VARCHAR(256),
    lname   VARCHAR(256),
    city    VARCHAR(256),
    address VARCHAR(256),
    age     VARCHAR(256)
);

CREATE TABLE cms.menus(
	id 			INTEGER AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(256),
    placeholder VARCHAR(256)
);

CREATE TABLE cms.menu_items(
	id 			INTEGER AUTO_INCREMENT PRIMARY KEY,
    menu_id 	INTEGER,
    title 		VARCHAR(256),
    link 		VARCHAR(256)
)
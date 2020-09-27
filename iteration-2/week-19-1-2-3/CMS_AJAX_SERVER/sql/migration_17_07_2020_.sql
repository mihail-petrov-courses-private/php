CREATE TABLE mycms.tm_categories(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(4000) NOT NULL
);

INSERT INTO mycms.tm_categories(title) VALUES('Клюки');
INSERT INTO mycms.tm_categories(title) VALUES('Политика');
INSERT INTO mycms.tm_categories(title) VALUES('Програмиране');


CREATE TABLE mycms.tb_blog_post__categories(
	blog_post_id INTEGER,
    category_id INTEGER,
    PRIMARY KEY(blog_post_id, category_id)
);


INSERT INTO mycms.tb_blog_post__categories(blog_post_id, category_id) VALUES(1, 1);
INSERT INTO mycms.tb_blog_post__categories(blog_post_id, category_id) VALUES(2, 2);
INSERT INTO mycms.tb_blog_post__categories(blog_post_id, category_id) VALUES(3, 2);
INSERT INTO mycms.tb_blog_post__categories(blog_post_id, category_id) VALUES(4, 3);
INSERT INTO mycms.tb_blog_post__categories(blog_post_id, category_id) VALUES(5, 3);

select * from tb_blog_post__categories


SELECT * FROM tb_blog_post a,
			  tb_blog_post__categories b
              WHERE a.id = b.blog_post_id AND 
					b.category_id = 
              
              
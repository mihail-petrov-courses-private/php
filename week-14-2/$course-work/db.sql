CREATE DATABASE public_board;

USE public_board;

CREATE TABLE topicks(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(256)
);

CREATE TABLE opinions(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
    topick_id INTEGER,
    content TEXT,
    author VARCHAR(256)
);



SELECT * FROM topicks
SELECT * FROm opinions


SELECT a.id AS topick_id,
a.title, 
b.id AS opinion_id,
b.content, 
b.author 
FROM public_board.topicks a, public_board.opinions b
WHERE a.id = b.topick_id AND a.id = 1
LIMIT 0,2
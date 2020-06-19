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


SELECT MIN(b.id)  AS opinion_id
FROM public_board.topicks a, public_board.opinions b
WHERE a.id = b.topick_id AND a.id = 1

SELECT MAX(b.id)  AS opinion_id
FROM public_board.topicks a, public_board.opinions b
WHERE a.id = b.topick_id AND a.id = 1

SELECT COUNT(b.id) count_rows
FROM public_board.topicks a, public_board.opinions b
WHERE a.id = b.topick_id AND a.id = 1


SELECT a.id AS topick_id,
a.title, 
b.id AS opinion_id,
b.content, 
b.author 
FROM public_board.topicks a, public_board.opinions b
WHERE a.id = b.topick_id AND a.id = 1 AND b.id = (
	SELECT MAX(b.id)  AS opinion_id
	FROM public_board.topicks a, public_board.opinions b
	WHERE a.id = b.topick_id AND a.id = 1	
)


USE public_board;

CREATE TABLE public_board.user_moods (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(45)
);

INSERT INTO public_board.user_moods(title) VALUES('sad');
INSERT INTO public_board.user_moods(title) VALUES('hater');
INSERT INTO public_board.user_moods(title) VALUES('liker');
INSERT INTO public_board.user_moods(title) VALUES('depresed');

select * from public_board.user_moods;
select * from public_board.opinions;

UPDATE public_board.opinions SET mood_id = 5


ALTER TABLE public_board.opinions DROP COLUMN mood_id
ALTER TABLE public_board.opinions ADD mood_id INTEGER

ALTER TABLE public_board.opinions ADD upload_img VARCHAR(256)
ALTER TABLE public_board.opinions ADD upload_img_extention VARCHAR(256)


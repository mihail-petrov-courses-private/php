-- 
SELECT * FROM cms.cms_posts WHERE title LIKE '%world%'

--
SELECT * FROM cms.cms_posts 
WHERE content LIKE '%Sample%'

SELECT * FROM cms.cms_posts WHERE content LIKE '%world%'

CREATE TABLE cms.cms_comments (
	id INTEGER NOT NULL PRIMARY KEY,
    post_id INTEGER, 
    content TEXT,
    author VARCHAR(256)
)

select * from cms.cms_posts
select * from cms.cms_comments

SELECT * FROm cms.cms_comments WHERE post_id = 1




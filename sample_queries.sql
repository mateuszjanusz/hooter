INSERT INTO posts (post_text, user_id) VALUES ("new post", 1); 

SELECT p.post_text, p.date_created, p.image, p.reply_id, u.username 
FROM posts p 
INNER JOIN users u ON p.user_id

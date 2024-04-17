-- Creating the 'users' table
CREATE TABLE users (
                       userid INT AUTO_INCREMENT PRIMARY KEY,
                       password VARCHAR(255) NOT NULL,
                       email VARCHAR(255) NOT NULL UNIQUE,
                       username VARCHAR(255) NOT NULL UNIQUE
);

-- Creating the 'posts' table
CREATE TABLE posts (
                       postid INT AUTO_INCREMENT PRIMARY KEY,
                       title VARCHAR(255) NOT NULL,
                       body TEXT NOT NULL CHECK (CHAR_LENGTH(body) <= 5000),
                       userid INT NOT NULL,
                       datetime_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                       FOREIGN KEY (userid) REFERENCES users(userid)
);

-- Creating the 'comments' table
CREATE TABLE comments (
                          commentid INT AUTO_INCREMENT PRIMARY KEY,
                          userid INT NOT NULL,
                          body TEXT NOT NULL CHECK (CHAR_LENGTH(body) <= 5000),
                          postid INT NOT NULL,
                          datetime_commented DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                          FOREIGN KEY (userid) REFERENCES users(userid),
                          FOREIGN KEY (postid) REFERENCES posts(postid)
);
-- Creating the 'post_likes' table
CREATE TABLE post_likes (
                            userid INT NOT NULL,
                            postid INT NOT NULL,
                            PRIMARY KEY (userid, postid),
                            FOREIGN KEY (userid) REFERENCES users(userid),
                            FOREIGN KEY (postid) REFERENCES posts(postid)
);

-- Creating the 'comment_likes' table
CREATE TABLE comment_likes (
                               userid INT NOT NULL,
                               commentid INT NOT NULL,
                               PRIMARY KEY (userid, commentid),
                               FOREIGN KEY (userid) REFERENCES users(userid),
                               FOREIGN KEY (commentid) REFERENCES comments(commentid)
);

-- Creating the 'private_messages' table
CREATE TABLE private_messages (
                                  id INT AUTO_INCREMENT PRIMARY KEY,
                                  sender_id INT NOT NULL,
                                  receiver_id INT NOT NULL,
                                  subject VARCHAR(255),
                                  body TEXT NOT NULL CHECK (CHAR_LENGTH(body) <= 5000),
                                  datetime_sent DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                  read_status BOOLEAN NOT NULL DEFAULT FALSE,
                                  FOREIGN KEY (sender_id) REFERENCES users(userid),
                                  FOREIGN KEY (receiver_id) REFERENCES users(userid)
);

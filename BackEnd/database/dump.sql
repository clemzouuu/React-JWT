CREATE TABLE IF NOT EXISTS User
(
    id        INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username  VARCHAR(255) NOT NULL UNIQUE,
    password  VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Post
(
    id      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content TEXT,
);


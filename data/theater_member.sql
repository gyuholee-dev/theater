CREATE TABLE theater_member (
    userid CHAR(20) NOT NULL,
    password BLOB,
    nickname VARCHAR(20),
    email CHAR(30),
    phone CHAR(13),
    points INT DEFAULT 10000,
    groups CHAR(10) DEFAULT 'user',
    PRIMARY KEY (userid)
);
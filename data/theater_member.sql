CREATE TABLE theater_member (
    userid CHAR(20) NOT NULL,
    password BLOB,
    username VARCHAR(20),
    email CHAR(30),
    phone CHAR(13),
    points INT DEFAULT 10000,
    groups CHAR(10) DEFAULT 'user',
    PRIMARY KEY (userid)
);

INSERT INTO theater_member
(userid, password, username, email, phone, points, groups)
VALUES
('testuser', '1234', 'TestUser', 'test@test.com', '000-0000-0000', 10000, 'user');

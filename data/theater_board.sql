CREATE TABLE theater_board (
    postnum INT AUTO_INCREMENT,
    category CHAR(10),
    title VARCHAR(80),
    regdate INT,
    userid CHAR(20),
    nickname VARCHAR(20),
    content TEXT,
    secret BOOLEAN DEFAULT 0,
    hit INT DEFAULT 0,
    PRIMARY KEY (postnum)
);
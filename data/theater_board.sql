CREATE TABLE theater_board (
    postnum INT AUTO_INCREMENT,
    category CHAR(10),
    title VARCHAR(80),
    regdate CHAR(19),
    writer CHAR(20),
    content TEXT,
    secret BOOLEAN DEFAULT 0,
    hit INT DEFAULT 0,
    PRIMARY KEY (postnum)
);
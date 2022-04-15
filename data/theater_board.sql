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

INSERT INTO theater_board
(category, title, regdate, writer, content)
VALUES
('notice', '테스트 타이틀', '2022-04-14 12:00:00', 'testuser', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque fuga commodi obcaecati delectus quaerat earum ad odit ducimus placeat doloremque corporis modi quia, harum cum exercitationem, veritatis velit aliquid nam.');

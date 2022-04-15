/* theater (우선순위)
screen
ticket
member
movie
board
*/

/* screen 상영관
-- 프라이머리키 세개
-- 상영일정에 따라 계속 생성
-- 시작시간 및 종료시간 체크해서 티켓 처리
-- 좌석 필드는 총 50개
scrnday 상영일: 2022-04-15
scrnnum 상영관번호: 01
scrncnt 상영회차: 01
scrnstart 상영시작시간 12:15
scrnend 상영종료시간 14:30
firmcode 영화코드

price_a A좌석가격 (기본값 2000원)
price_b B좌석가격 (기본값 2000원)
price_c C좌석가격 (기본값 2000원)
price_d D좌석가격 (기본값 2000원)
price_e E좌석가격 (기본값 2000원)

seat_a01 A01좌석: null, block, pending, ticketnum
seat_a02 A02좌석
...
seat_e10 E10좌석
*/
CREATE TABLE theater_screen (
    scrnday CHAR(10) NOT NULL,
    scrnnum CHAR(2) NOT NULL,
    scrncnt CHAR(2) NOT NULL,
    scrnstart CHAR(5),
    scrnend CHAR(5),
    firmcode CHAR(10),
    
    price_a INT DEFAULT 2000,
    price_b INT DEFAULT 2000,
    price_c INT DEFAULT 2000,
    price_d INT DEFAULT 2000,
    price_e INT DEFAULT 2000,

    seat_a01 CHAR(18),
    seat_a02 CHAR(18),
    seat_a03 CHAR(18),
    seat_a04 CHAR(18),
    seat_a05 CHAR(18),
    seat_a06 CHAR(18),
    seat_a07 CHAR(18),
    seat_a08 CHAR(18),
    seat_a09 CHAR(18),
    seat_a10 CHAR(18),
    seat_b01 CHAR(18),
    seat_b02 CHAR(18),
    seat_b03 CHAR(18),
    seat_b04 CHAR(18),
    seat_b05 CHAR(18),
    seat_b06 CHAR(18),
    seat_b07 CHAR(18),
    seat_b08 CHAR(18),
    seat_b09 CHAR(18),
    seat_b10 CHAR(18),
    seat_c01 CHAR(18),
    seat_c02 CHAR(18),
    seat_c03 CHAR(18),
    seat_c04 CHAR(18),
    seat_c05 CHAR(18),
    seat_c06 CHAR(18),
    seat_c07 CHAR(18),
    seat_c08 CHAR(18),
    seat_c09 CHAR(18),
    seat_c10 CHAR(18),
    seat_d01 CHAR(18),
    seat_d02 CHAR(18),
    seat_d03 CHAR(18),
    seat_d04 CHAR(18),
    seat_d05 CHAR(18),
    seat_d06 CHAR(18),
    seat_d07 CHAR(18),
    seat_d08 CHAR(18),
    seat_d09 CHAR(18),
    seat_d10 CHAR(18),
    seat_e01 CHAR(18),
    seat_e02 CHAR(18),
    seat_e03 CHAR(18),
    seat_e04 CHAR(18),
    seat_e05 CHAR(18),
    seat_e06 CHAR(18),
    seat_e07 CHAR(18),
    seat_e08 CHAR(18),
    seat_e09 CHAR(18),
    seat_e10 CHAR(18),

    PRIMARY KEY (scrnday, scrnnum, scrncnt)
);
INSERT INTO theater_screen
(scrnday, scrnnum, scrncnt, scrnstart, scrnend, firmcode)
VALUES
('2022-04-23', '01', '01', '12:15', '14:30', '20192206D');
UPDATE theater_screen 
SET seat_b05 = '0101-0423-1268-231'
WHERE scrnday = '2022-04-23' AND scrnnum = '01' AND scrncnt = '01';



/* ticket 티켓
-- 상영관 조회시 상영관번호, 좌석번호=예매번호
ticketnum 예매번호 0000-0000-0000-000 [상영관번호+상영회차]-[날짜]-[인덱스(4)-(3)]
scrnnum 상영관번호
scrncnt 상영회차
firmcode 영화코드
seatnum 좌석번호
userid 회원아이디
payment 지불금액 2000
*/
CREATE TABLE theater_ticket (
    ticketnum CHAR(18),
    scrnnum CHAR(2),
    scrncnt CHAR(2),
    firmcode CHAR(10),
    seatnum CHAR(3),
    userid CHAR(20),
    payment INT,
    PRIMARY KEY (ticketnum)
);
INSERT INTO theater_ticket
(ticketnum, scrnnum, scrncnt, firmcode, seatnum, userid, payment)
VALUES
('0101-0423-1268-231', '01', '01', '20192206D', 'b05', 'testuser', 2000);

/* member 회원
userid 회원아이디
password 비밀번호
username 회원이름
email 이메일
phone 휴대폰번호 010-1234-5678

points 포인트
groups 권한 그룹: admin, user

-- 패스워드 암호화 참고:
-- https://zinoui.com/blog/storing-password s-securely
-- AES_ENCRYPT('password', 'key')
-- AES_DECRYPT('password', 'key')
*/
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

/* movie 영화
firmcode 영화코드 (https://www.kobis.or.kr/kobis/business/mast/mvie/searchUserMovCdList.do)
firmtitle 영화제목
director 감독
actors 출연진 
summary 요약: 어드벤처, 드라마 | 2022년 | 128분 0초 | 12세이상관람가 | 한국
topimg 대표이미지(포스터)
image1 스틸컷1
image2 스틸컷2
image3 스틸컷3
image4 스틸컷4
synopsis 줄거리
*/
CREATE TABLE theater_movie (
    firmcode CHAR(10) NOT NULL,
    firmtitle VARCHAR(80),
    director CHAR(20),
    actors VARCHAR(40),
    summary VARCHAR(140),

    topimg VARCHAR(120),
    image1 VARCHAR(120),
    image2 VARCHAR(120),
    image3 VARCHAR(120),
    image4 VARCHAR(120),
    image5 VARCHAR(120),

    synopsis TEXT,

    PRIMARY KEY (firmcode)
);
INSERT INTO theater_movie
(firmcode, firmtitle, director, actors, summary, topimg, image1, image2, image3, image4, image5, synopsis)
VALUES
('20192206D', '백두산', 'director', 'actors', 'summary', 'topimg', 'image1', 'image2', 'image3', 'image4', 'image5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque fuga commodi obcaecati delectus quaerat earum ad odit ducimus placeat doloremque corporis modi quia, harum cum exercitationem, veritatis velit aliquid nam.');

/* board 게시판
postnum 게시물번호: 자동증가
category 게시판 카테고리: notice, qna, review, etc...
title 게시물제목: 최대 80자
regdate 게시물작성일: Y-m-d H:i:s (19자)
writer 게시물작성자: = member userid

content 게시물내용: 최대 1000자

secret 게시물비밀글: 0(공개), 1(비밀글)
hit 게시물 조회수
*/
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




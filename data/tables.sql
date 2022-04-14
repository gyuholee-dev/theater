/* theater
movie
seats
ticket
member
board
*/

/* movie 영화
idx 인덱스(자동증가)
code 코드 (https://www.kobis.or.kr/kobis/business/mast/mvie/searchUserMovCdList.do)

title 타이틀
director 감독
actors 출연진 
summary 요약: 어드벤처, 드라마 | 2022년 | 128분 0초 | 12세이상관람가 | 한국

topimg 대표이미지(포스터)
image1 스틸컷1
image2 스틸컷2
image3 스틸컷3
image4 스틸컷4

schedule 상영일정 20220414~20220515
time 

*/

CREATE TABLE theater_movie (
    idx INT AUTO_INCREMENT,
    code CHAR(10) NOT NULL,
    title VARCHAR(80),
    director CHAR(20),
    actors CHAR(20),
    summary VARCHAR(140),

    topimg VARCHAR(120),
    image1 VARCHAR(120),
    image2 VARCHAR(120),
    image3 VARCHAR(120),
    image4 VARCHAR(120),
    image5 VARCHAR(120),

    schedule CHAR(21),
    description TEXT,

    PRIMARY KEY (idx)
);

/* ticket 예약
ordernum 주문번호(자동증가)

*/
CREATE TABLE theater_ticket (
    ordernum INT AUTO_INCREMENT,
    orderdate CHAR(19), 
    itemcode CHAR(8),
    schedule CHAR(21),
    location CHAR(20),
    number INT,
    flight VARCHAR(80),
    price INT,
    PRIMARY KEY (ordernum)
);

/* member 회원
userid 회원아이디
password 비밀번호
username 회원이름
avatar 프로필사진
email 이메일
phone 휴대폰번호 010-1234-5678
address 주소
pgroup 권한 그룹: admin, user...
*/
-- 패스워드 암호화 참고:
-- https://zinoui.com/blog/storing-passwords-securely
-- AES_ENCRYPT('password', 'key')
-- AES_DECRYPT('password', 'key')

CREATE TABLE theater_member (
    userid CHAR(20) NOT NULL,
    password BLOB,
    nickname VARCHAR(20),
    email CHAR(30),
    phone CHAR(13),
    address VARCHAR(120),
    avatar VARCHAR(120),
    groups CHAR(10) DEFAULT 'user',
    PRIMARY KEY (userid)
);

/* board 게시판
postnum 게시물번호: 자동증가
category 게시판 카테고리: notice, qna, review, etc...
title 게시물제목: 최대 80자
content 게시물내용: 최대 1000자
writer 게시물작성자: = member userid
regdate 게시물작성일: Y-m-d H:i:s (19자)
secret 게시물비밀글: 0(공개), 1(비밀글)
hit 게시물 조회수
*/
CREATE TABLE theater_board (
    postnum INT AUTO_INCREMENT,
    category CHAR(10),
    title VARCHAR(80),
    content TEXT,
    writer CHAR(20),
    regdate CHAR(19),
    secret BOOLEAN DEFAULT 0,
    hit INT,
    PRIMARY KEY (postnum)
);




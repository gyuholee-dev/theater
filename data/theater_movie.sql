DROP TABLE IF EXISTS theater_movie;

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
(
    '20192206D', 
    '백두산', 
    '이해준,김병서', 
    '이병헌,하정우,마동석,전혜진,배수지', 
    '어드벤처, 드라마 | 2022년 | 128분 0초 | 12세이상관람가 | 한국', 
    'topimg', 
    'image1', 
    'image2', 
    'image3', 
    'image4', 
    'image5', 
    '대한민국 관측 역사상 최대 규모의 백두산 폭발 발생.\n
    갑작스러운 재난에 한반도는 순식간에 아비규환이 되고,\n
    남과 북 모두를 집어삼킬 추가 폭발이 예측된다.\n
    \n
    사상 초유의 재난을 막기 위해 \'전유경\'(전혜진)은\n
    백두산 폭발을 연구해 온 지질학 교수 \'강봉래\'(마동석)의 이론에 따른 작전을 계획하고,\n
    전역을 앞둔 특전사 EOD 대위 \'조인창\'(하정우)이 남과 북의 운명이 걸린 비밀 작전에 투입된다.\n
    작전의 키를 쥔 북한 무력부 소속 일급 자원 \'리준평\'(이병헌)과 접선에 성공한 \'인창\'.\n
    하지만 \'준평\'은 속을 알 수 없는 행동으로 \'인창\'을 곤란하게 만든다.\n
    한편, \'인창\'이 북한에서 펼쳐지는 작전에 투입된 사실도 모른 채\n
    서울에 홀로 남은 \'최지영\'(배수지)은 재난에 맞서 살아남기 위해 고군분투하고\n
    그 사이, 백두산 마지막 폭발까지의 시간은 점점 가까워 가는데...!'
);

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

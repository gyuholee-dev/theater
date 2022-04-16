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
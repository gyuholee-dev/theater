CREATE TABLE theater_ticket (
    ticketnum CHAR(18),
    firmcode CHAR(10),
    scrncode CHAR(14),
    seatnum CHAR(3),
    userid CHAR(20),
    paydate INT,
    payment INT,
    PRIMARY KEY (ticketnum)
);
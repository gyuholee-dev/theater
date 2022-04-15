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

CREATE DATABASE airlines;

USE airlines;

CREATE TABLE admin(
    admin_id INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    full_name VARCHAR(30) NOT NULL,
    email VARCHAR(30) DEFAULT NULL,
    password VARCHAR(30) NOT NULL
);

CREATE TABLE customer(
    cust_id INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    full_name VARCHAR(30) NOT NULL,
    email VARCHAR(30) DEFAULT NULL,
    password VARCHAR(30) NOT NULL,
    phone_no VARCHAR(15) DEFAULT NULL,
    address VARCHAR(30) DEFAULT NULL
);

CREATE TABLE jet(
    jet_id VARCHAR(20) PRIMARY KEY NOT NULL,
    type VARCHAR(30) NOT NULL,
    total_capacity VARCHAR(30) NOT NULL
);

INSERT INTO jet(jet_id, type, total_capacity) VALUES
('10001', 'Boeing 737', 300),
('10002', 'Boeing 737', 300);






CREATE TABLE flight_details(
    flight_no VARCHAR(20) NOT NULL PRIMARY KEY, 
    from_city VARCHAR(30) NOT NULL,
    to_city VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    arrival_date DATE,
    departure_time TIME NOT NULL,
    arrival_time TIME,
    seats_economy int(5) DEFAULT NULL,
    seats_business int(5) DEFAULT NULL,
    price_economy int(10) DEFAULT NULL,
    price_business int(10) DEFAULT NULL,
    jet_id VARCHAR(20),
    FOREIGN KEY (jet_id) REFERENCES jet(jet_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE ticket(
    pnr INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    rsrv_date DATE NOT NULL,
    class VARCHAR(10) NOT NULL,
    booking_status VARCHAR(20),
    passengers_num int(5),
    cust_id INT(8),
    flight_no VARCHAR(20),
    jet_id VARCHAR(20),
    FOREIGN KEY (flight_no) REFERENCES flight_details(flight_no) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (cust_id) REFERENCES customer(cust_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (jet_id) REFERENCES jet(jet_id) ON DELETE CASCADE ON UPDATE CASCADE
);

ALTER TABLE ticket AUTO_INCREMENT = 100;

CREATE TABLE payments(
    payment_id INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    date DATE NOT NULL,
    price int(15) NOT NULL,
    pnr INT(8),
    jet_id VARCHAR(20),
    FOREIGN KEY (pnr) REFERENCES ticket(pnr) ON UPDATE CASCADE,
    FOREIGN KEY (jet_id) REFERENCES jet(jet_id) ON DELETE CASCADE ON UPDATE CASCADE
);





INSERT INTO flight_details (flight_no, from_city, to_city, departure_date, arrival_date, departure_time, arrival_time, jet_id, seats_economy, seats_business, price_economy, price_business) VALUES
('AA101', 'almaty', 'astana', '2022-12-01', '2022-12-02', '21:00:00', '01:00:00', '10001', 195, 96, 25000, 47500 ),
('AA102', 'almaty', 'astana', '2022-12-01', '2022-12-02', '23:00:00', '03:00:00', '10002', 195, 96, 25000, 47500 );

INSERT INTO customer (full_name, email, password, phone_no, address) VALUES 
('Son', 'son@gmail.com', 'son1234', '8888', 'son`s address')


-- SEARCH ONE WAY TICKET
SELECT * FROM flight_details WHERE from_city = '$from' AND to_city = '$to' AND departure_date = '@dep_date';

-- SEARCH ROUND WAY TICKET
SELECT * FROM flight_details WHERE from_city = '$from' AND to_city = '$to' AND departure_date = '@dep_date' AND arrival_date = '$arr_date';



-- getting customer ID using name and password
SELECT cust_id FROM customer WHERE full_name = 'Son' AND password= 'son1234';


-- Booking flight
-- The class should be either 'economy' or 'business'
-- Booking status: 'waiting for payment', 'confirmed', 'canceled'
INSERT INTO ticket(rsrv_date, class, booking_status, passengers_num, cust_id, flight_no, jet_id) VALUES 
(CURRENT_DATE(), 'business', 'waiting for payment', 1, 1, 'AA101', '10001')

-- Payment process
-- $price = $passengers_num * flight_price
-- $pnr, $passengers_num  = SELECT pnr, passengers_num FROM ticket WHERE cust_id = '$cust_id' AND booking_status = 'waiting for payment'
INSERT INTO payments(date, price, pnr, jet_id) VALUES 
(CURRENT_DATE(), '$price', '$pnr', '$jet_id')

UPDATE ticket SET booking_status = 'confirmed' WHERE pnr = '$pnr';


-- Cancellation process
-- if the time before departure / rental is more than 3 hours
SELECT price FROM payments WHERE pnr = '$pnr';

DELETE FROM payments WHERE pnr = '$pnr';

UPDATE ticket SET booking_status = 'canceled' WHERE pnr = '$pnr';


-- More expensive price during the day, cheaper at night. 
SHOW processlist;


-- SET GLOBAL event_scheduler = ON;
-- CREATE EVENT IF NOT EXISTS price_night
-- ON SCHEDULE AT CURRENT_TIMESTAMP
-- DO
--     UPDATE flight_details SET price_economy = price_economy * 0.9, price_business = price_business * 0.9;

CREATE EVENT IF NOT EXISTS price_day
ON SCHEDULE 
EVERY '1 06' DAY_HOUR
COMMENT 'The prices will be higher to 10% at 06:00 daily!'
DO
    UPDATE flight_details SET price_economy = price_economy * 1.1, price_business = price_business * 1.1;



INSERT INTO jet(jet_id, type, total_capacity) VALUES
('10003', 'Air Asia', 300),
('10004', 'Air India', 300),
('10005', 'Alliance Air', 150),
('10006', 'Air Astana', 350),
('10007', 'Scat', 300),
('10008', 'Vistara', 300),
('10009', 'Indigo', 350),
('10010', 'Alaska Airlines', 300);


INSERT INTO flight_details 
(flight_no, from_city, to_city, departure_date, arrival_date, departure_time, arrival_time, jet_id, seats_economy, seats_business, price_economy, price_business) 
VALUES
('AA103', 'almaty', 'astana', '2022-12-01', '2022-12-02', '21:00:00', '01:00:00', '10006', 195, 96, 25000, 47500 ),
('AA104', 'astana', 'alaska', '2022-12-01', '2022-12-01', '06:00:00', '12:00:00', '10010', 200, 95, 365000, 395000 ),
('AA105', 'almaty', 'india', '2022-12-01', '2022-12-01', '10:00:00', '14:00:00', '10009', 200, 95, 215000, 265000 ),
('AA106', 'almaty', 'atlanta', '2022-12-09', '2022-12-09', '06:00:00', '12:00:00', '10008', 195, 96, 325000, 375500 ),
('AA107', 'almaty', 'bali', '2022-12-09', '2022-12-09', '09:00:00', '14:00:00', '10007', 195, 96, 365000, 395000 ),
('AA108', 'almaty', 'moscow', '2022-12-09', '2022-12-09', '09:15:00', '13:15:00', '10005', 195, 96, 125000, 155000 ),
('AA109', 'almaty', 'astana', '2022-12-10', '2022-12-10', '18:00:00', '21:00:00', '10006', 195, 96, 25000, 47500 ),
('AB101', 'astana', 'india', '2022-12-10', '2022-12-11', '23:40:00', '04:40:00', '10004', 200, 95, 255000, 305000 ),
('AB102', 'almaty', 'india', '2022-12-11', '2022-12-11', '01:00:00', '05:00:00', '10009', 200, 95, 215000, 265000 ),
('AB103', 'almaty', 'atlanta', '2022-12-11', '2022-12-11', '06:00:00', '12:00:00', '10008', 195, 96, 325000, 375500 );
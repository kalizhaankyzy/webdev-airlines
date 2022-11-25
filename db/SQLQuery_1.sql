CREATE DATABASE airlines;

USE airlines;

CREATE TABLE admin(
    admin_id VARCHAR(20) PRIMARY KEY NOT NULL,
    full_name VARCHAR(30) NOT NULL,
    email VARCHAR(30) DEFAULT NULL,
    password VARCHAR(30) NOT NULL
)

CREATE TABLE customer(
    cust_id VARCHAR(20) PRIMARY KEY NOT NULL,
    full_name VARCHAR(30) NOT NULL,
    email VARCHAR(30) DEFAULT NULL,
    password VARCHAR(30) NOT NULL,
    phone_no VARCHAR(15) DEFAULT NULL,
    address VARCHAR(30) DEFAULT NULL
)

CREATE TABLE jet(
    jet_id VARCHAR(20) PRIMARY KEY NOT NULL,
    type VARCHAR(30) NOT NULL,
    total_capacity VARCHAR(30) NOT NULL
)

CREATE TABLE flight_details(
    flight_no VARCHAR(20) NOT NULL, 
    from_city VARCHAR(30) NOT NULL,
    to_city VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    arrival_date DATE,
    departure_time TIME NOT NULL,
    arrival_time TIME,
    jet_id VARCHAR(20),
    seats_economy int(5) DEFAULT NULL,
    seats_business int(5) DEFAULT NULL,
    price_economy int(10) DEFAULT NULL,
    price_business int(10) DEFAULT NULL,
    FOREIGN KEY (jet_id) REFERENCES jet(jet_id) ON DELETE CASCADE ON UPDATE CASCADE
)

ALTER TABLE `flight_details`
ADD PRIMARY KEY (`flight_no`,`departure_date`);


CREATE TABLE ticket(
    pnr VARCHAR(20) PRIMARY KEY NOT NULL,
    rsrv_date DATE NOT NULL,
    flight_no VARCHAR(20),
    departure_date DATE DEFAULT NULL,
    class VARCHAR(10) NOT NULL,
    booking_status VARCHAR(20),
    passengers_num int(5),
    cust_id VARCHAR(20),
    payment_id VARCHAR(20) DEFAULT NULL,
    FOREIGN KEY (flight_no, departure_date) REFERENCES flight_details(flight_no, departure_date) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (cust_id) REFERENCES customer(cust_id) ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE payments(
    payment_id VARCHAR(20) PRIMARY KEY NOT NULL,
    date DATE NOT NULL,
    price int(15) NOT NULL,
    pnr VARCHAR(20),
    FOREIGN KEY (pnr) REFERENCES ticket(pnr) ON UPDATE CASCADE
)


CREATE TRIGGER `update_ticket_after_payment` AFTER INSERT ON `payments` FOR EACH ROW UPDATE ticket
     SET booking_status='CONFIRMED', payment_id= NEW.payment_id
   WHERE pnr = NEW.pnr

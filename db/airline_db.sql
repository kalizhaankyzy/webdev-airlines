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

INSERT INTO jet(jet_id, type, total_capacity) VALUES
('10001', 'Boeing 737', 300),
('10002', 'Boeing 737', 300)


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

INSERT INTO flight_details (flight_no, from_city, to_city, departure_date, arrival_date, departure_time, arrival_time, jet_id, seats_economy, seats_business, price_economy, price_business) VALUES
('AA101', 'almaty', 'astana', '2022-12-01', '2022-12-02', '21:00:00', '01:00:00', '10001', 195, 96, 25000, 47500 ),
('AA102', 'almaty', 'astana', '2022-12-01', '2022-12-02', '23:00:00', '03:00:00', '10002', 195, 96, 25000, 47500 );

CREATE TABLE ticket(
    pnr VARCHAR(20) PRIMARY KEY NOT NULL,
    rsrv_date DATE NOT NULL,
    flight_no VARCHAR(20),
    class VARCHAR(10) NOT NULL,
    booking_status VARCHAR(20),
    passengers_num int(5),
    cust_id VARCHAR(20),
    FOREIGN KEY (flight_no) REFERENCES flight_details(flight_no) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (cust_id) REFERENCES customer(cust_id) ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE payments(
    payment_id VARCHAR(20) PRIMARY KEY NOT NULL,
    date DATE NOT NULL,
    price int(15) NOT NULL,
    pnr VARCHAR(20),
    FOREIGN KEY (pnr) REFERENCES ticket(pnr) ON UPDATE CASCADE
)

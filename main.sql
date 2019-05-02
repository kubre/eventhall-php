CREATE TABLE halls
(
    id integer unsigned AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL,
    contact varchar(20) NOT NULL,
    price varchar(20) NOT NULL,
    descr varchar(1000) NOT NULL,
    size varchar(10) NOT NULL,
    adder1 varchar(255) NOT NULL,
    adder2 varchar(255) NOT NULL,
    city varchar(50) NOT NULL,
    password varchar(255) NOT NULL,
    photo1 varchar(255) NOT NULL,
    photo2 varchar(255) NOT NULL
);

CREATE TABLE bookings
(
    id integer unsigned AUTO_INCREMENT PRIMARY KEY,
    hall_id integer unsigned NOT NULL,
    fname varchar(255) NOT NULL,
    lname varchar(255) NOT NULL,
    contact varchar(20) NOT NULL,
    adder varchar(255) NOT NULL,
    date date NOT NULL,
    days integer(3) NOT NULL,
    payment varchar(30) NOT NULL,
    queries varchar(255) NOT NULL 
);

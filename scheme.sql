
/*	CREATE DATABASE COMMANDS */
CREATE DATABASE IF NOT EXISTS `bike_rental_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bike_rental_system`;



/*	CREATE TABLE COMMANDS */

CREATE TABLE br_user (  /*	'user' table name conflits in myphp admin , use br_user instend */
    id VARCHAR(255) PRIMARY KEY NOT NULL,
    username varchar(255),
    password varchar(255),
    role varchar(255),
    email varchar(255),
    dob date,
    profile_photo BLOB,
    date_created TIMESTAMP DEFAULT NOW(),
    date_modified TIMESTAMP DEFAULT NOW() ON UPDATE NOW()
);

 

CREATE TABLE bike(
    id VARCHAR(255) PRIMARY KEY NOT NULL,
    vendor_id VARCHAR(255),
    photo BLOB,
    category VARCHAR(255),
    current_station VARCHAR(255),
    is_return BOOLEAN,
    unit_price DOUBLE,
    description VARCHAR(255),
    date_created TIMESTAMP DEFAULT NOW(),
    date_modified TIMESTAMP DEFAULT NOW() ON UPDATE NOW()
); 

CREATE TABLE category(
    id VARCHAR(255) PRIMARY KEY NOT NULL,
    name VARCHAR(255),
    description VARCHAR(255),
    date_created TIMESTAMP DEFAULT NOW(),
    date_modified TIMESTAMP DEFAULT NOW() ON UPDATE NOW()
); 

CREATE TABLE rental(
    id VARCHAR(255) PRIMARY KEY NOT NULL,
    customer_id VARCHAR(255),
    vendor_id VARCHAR(255),
    bike_id VARCHAR(255),
    check_in_time DATETIME,
    check_out_time DATETIME,
    check_in_station VARCHAR(255),
    check_out_station VARCHAR(255),
    total_price DOUBLE,
    is_complete BOOLEAN,
    feedback_id VARCHAR(255),
    date_created TIMESTAMP DEFAULT NOW(),
    date_modified TIMESTAMP DEFAULT NOW() ON UPDATE NOW()
); 

CREATE TABLE station(
    id VARCHAR(255) PRIMARY KEY NOT NULL,
    name VARCHAR(255),
    address VARCHAR(255),
    date_created TIMESTAMP DEFAULT NOW(),
    date_modified TIMESTAMP DEFAULT NOW() ON UPDATE NOW()
); 

CREATE TABLE feedback(
    id VARCHAR(255) PRIMARY KEY NOT NULL,
    rating INT,
    description VARCHAR(255),
    date_created TIMESTAMP DEFAULT NOW(),
    date_modified TIMESTAMP DEFAULT NOW() ON UPDATE NOW()
);




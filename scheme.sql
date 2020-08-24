
/*	CREATE DATABASE COMMANDS */
CREATE DATABASE FWDDRENTALSYS CHARACTER SET latin2 COLLATE latin2_general_ci;
USE FWDDRENTALSYS;



/*	CREATE TABLE COMMANDS */

CREATE TABLE user (
id varchar(255) NOT NULL,
username varchar(255) NOT NULL,
password varchar(255) NOT NULL,
role char(1) NOT NULL,
email varchar(255) NOT NULL,
dob date NOT NULL,
profile_photo byte[] NULL
);

CREATE TABLE vendor(
    id VARCHAR(255) PRIMARY KEY NOT NULL,
    user_id VARCHAR(255) 
); 

CREATE TABLE customer(
    id VARCHAR(255) PRIMARY KEY NOT NULL,
    user_id VARCHAR(255) 
); 

CREATE TABLE admin(
    id VARCHAR(255) PRIMARY KEY NOT NULL,
    user_id VARCHAR(255) 
); 

CREATE TABLE bike(
    id VARCHAR(255) PRIMARY KEY NOT NULL,
    vendor_id VARCHAR(255),
    photo BLOB,
    category VARCHAR(255),
    current_station VARCHAR(255),
    is_return BOOLEAN,
    unit_price DOUBLE,
    description VARCHAR(255)
); 

CREATE TABLE category(
    id VARCHAR(255) PRIMARY KEY NOT NULL,
    name VARCHAR(255),
    description VARCHAR(255)
); 

CREATE TABLE rental(
    id VARCHAR(255) PRIMARY KEY NOT NULL,
    customer_id VARCHAR(255) NOT NULL,
    bike_id VARCHAR(255) NOT NULL,
    start_time DATETIME NOT NULL,
    end_time DATETIME NOT NULL,
    pick_up_station VARCHAR(255) NOT NULL,
    return_station VARCHAR(255) NOT NULL,
    total_price DOUBLE NOT NULL,
    is_complete BOOLEAN NOT NULL,
    feedback_id VARCHAR(255) NOT NULL
); 

CREATE TABLE station(
    id VARCHAR(255) PRIMARY KEY NOT NULL,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL
); 

CREATE TABLE feedback(
    id VARCHAR(255) PRIMARY KEY NOT NULL,
    created_time TIMESTAMP,
    rating INT,
    description VARCHAR(255)
);




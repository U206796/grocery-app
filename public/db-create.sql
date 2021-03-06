CREATE DATABASE grocery_app;

use grocery_app;

CREATE TABLE lists (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	catergory VARCHAR(30) NOT NULL,
	items VARCHAR(50) NOT NULL,
	deadline VARCHAR(30),
    shop VARCHAR(30),
	date TIMESTAMP
);

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

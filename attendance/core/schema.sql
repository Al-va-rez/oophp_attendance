CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userRole ENUM('Student', 'Admin') NOT NULL,
    username VARCHAR(255) NOT NULL,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    password text
);


CREATE TABLE Courses (

);


CREATE TABLE Attendances (

);
CREATE DATABASE IF NOT EXISTS pageant_validation_db;
USE pageant_validation_db;

CREATE TABLE IF NOT EXISTS user (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Role VARCHAR(20) NOT NULL DEFAULT 'admin'
);

INSERT INTO user (Username, Password, Role) VALUES ('admin', 'admin123', 'admin');

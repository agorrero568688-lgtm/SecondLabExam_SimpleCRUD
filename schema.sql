CREATE DATABASE IF NOT EXISTS healthcare_db CHARACTER SET utf8mb4;
USE healthcare_db;
CREATE TABLE IF NOT EXISTS patients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(60) NOT NULL,
  last_name VARCHAR(60) NOT NULL,
  date_of_birth DATE NOT NULL,
  gender ENUM('Male','Female','Other') NOT NULL,
  blood_type VARCHAR(3) DEFAULT NULL,
  phone VARCHAR(30) DEFAULT NULL,
  email VARCHAR(100) DEFAULT NULL,
  address VARCHAR(255) DEFAULT NULL,
  allergies TEXT,
  diagnosis TEXT,
  admission_date DATE DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO patients (first_name,last_name,date_of_birth,gender,blood_type,phone,email,address,allergies,diagnosis,admission_date) VALUES
('Andrea','Talomo','1985-03-14','Female','O+','0917-123-4567','drea@example.com','Davao City','Penicillin','Hypertension','2026-09-20'),
('Xirel','Dela Cerna','1972-11-02','Male','A-','0928-765-4321','xixi@example.com','Tagum City','None','Type 2 Diabetes','2026-10-01'),
('Mark','Arguilles','1999-07-23','Male','B+','0905-555-0199','mark@example.com','Digos City','Dust','Asthma',NULL);

-- ============================================================
-- I.K HOLINESS HOME CARE SERVICES - Database Schema & Seeds
-- Ready for direct import via InfinityFree phpMyAdmin
-- ============================================================

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS payments;
DROP TABLE IF EXISTS invoice_items;
DROP TABLE IF EXISTS invoices;
DROP TABLE IF EXISTS appointments;
DROP TABLE IF EXISTS visits;
DROP TABLE IF EXISTS clients;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS settings;
SET FOREIGN_KEY_CHECKS = 1;

-- 1. Clinic Settings Table
CREATE TABLE settings (
    id INT PRIMARY KEY DEFAULT 1,
    clinic_name VARCHAR(255) NOT NULL,
    clinic_address TEXT NOT NULL,
    phone_number VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    logo VARCHAR(255) NULL,
    currency VARCHAR(10) NOT NULL DEFAULT 'GH₵',
    CHECK (id = 1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. System Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'staff') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY idx_username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Clients/Patients Table
CREATE TABLE clients (
    client_id VARCHAR(20) PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    dob DATE NOT NULL,
    age INT NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    emergency_name VARCHAR(255) NOT NULL,
    emergency_phone VARCHAR(20) NOT NULL,
    registration_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_fullname (full_name),
    INDEX idx_phone (phone)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Clinic Visits Table
CREATE TABLE visits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id VARCHAR(20) NOT NULL,
    visit_date DATETIME NOT NULL,
    complaint TEXT NOT NULL,
    symptoms TEXT NULL,
    temperature VARCHAR(10) NULL,
    bp VARCHAR(20) NULL,
    weight VARCHAR(10) NULL,
    diagnosis TEXT NULL,
    treatment TEXT NULL,
    prescription TEXT NULL,
    notes TEXT NULL,
    attending_staff_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(client_id) ON DELETE CASCADE,
    FOREIGN KEY (attending_staff_id) REFERENCES users(id) ON DELETE RESTRICT,
    INDEX idx_visit_date (visit_date)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Appointments Table
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id VARCHAR(20) NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    reason VARCHAR(255) NOT NULL,
    status ENUM('Scheduled', 'Completed', 'Cancelled', 'Missed') NOT NULL DEFAULT 'Scheduled',
    notes TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(client_id) ON DELETE CASCADE,
    INDEX idx_appointment_datetime (appointment_date, appointment_time),
    INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Invoices/Billing Statements Table
CREATE TABLE invoices (
    invoice_number VARCHAR(20) PRIMARY KEY,
    client_id VARCHAR(20) NOT NULL,
    invoice_date DATE NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    amount_paid DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    balance DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    payment_status ENUM('Paid', 'Partially Paid', 'Unpaid') NOT NULL DEFAULT 'Unpaid',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(client_id) ON DELETE CASCADE,
    INDEX idx_invoice_date (invoice_date),
    INDEX idx_payment_status (payment_status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. Invoice Items Table
CREATE TABLE invoice_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_number VARCHAR(20) NOT NULL,
    service_description VARCHAR(255) NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    unit_price DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (invoice_number) REFERENCES invoices(invoice_number) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. Payments Table
CREATE TABLE payments (
    payment_id VARCHAR(20) PRIMARY KEY,
    receipt_number VARCHAR(20) NOT NULL,
    client_id VARCHAR(20) NOT NULL,
    invoice_number VARCHAR(20) NOT NULL,
    payment_date DATETIME NOT NULL,
    amount_paid DECIMAL(10,2) NOT NULL,
    payment_method ENUM('Cash', 'Mobile Money', 'Card', 'Bank Transfer') NOT NULL,
    staff_id INT NOT NULL,
    notes TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY idx_receipt (receipt_number),
    FOREIGN KEY (client_id) REFERENCES clients(client_id) ON DELETE CASCADE,
    FOREIGN KEY (invoice_number) REFERENCES invoices(invoice_number) ON DELETE CASCADE,
    FOREIGN KEY (staff_id) REFERENCES users(id) ON DELETE RESTRICT,
    INDEX idx_payment_date (payment_date)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- ============================================================
-- INITIAL SEED DATA
-- ============================================================

-- A. Seed Clinic Settings
INSERT INTO settings (id, clinic_name, clinic_address, phone_number, email, logo, currency)
VALUES (1, 'I.K HOLINESS HOME CARE SERVICES', 'Pankrono, Kumasi, Ghana', '0241974447 / 0550974126', 'kisaiahh@icloud.com', NULL, 'GH₵')
ON DUPLICATE KEY UPDATE 
    clinic_name = VALUES(clinic_name),
    clinic_address = VALUES(clinic_address),
    phone_number = VALUES(phone_number),
    email = VALUES(email);

-- B. Seed Staff & Admin Accounts (admin / admin123  &  staff / staff123)
INSERT INTO users (id, username, password_hash, full_name, role)
VALUES 
(1, 'admin', '$2y$10$ckJb7xTJ3rj2BOf.0AInYujuactfO9FvP0yUI3.521rNEowe/dHIe', 'Dr. I.K Holiness', 'admin'),
(2, 'staff', '$2y$10$s8hwj6quw6YVXWreZdQT8uWBb6ugPaybmCMeQUXxl2hH8Tn8rfjKC', 'Clinical Staff Nurse', 'staff')
ON DUPLICATE KEY UPDATE 
    password_hash = VALUES(password_hash),
    full_name = VALUES(full_name),
    role = VALUES(role);

-- C. Seed Demonstration Patients
INSERT INTO clients (client_id, full_name, gender, dob, age, phone, address, emergency_name, emergency_phone, registration_date)
VALUES 
('CL-000001', 'Madam Akua Serwaa', 'Female', '1958-04-12', 68, '0244112233', 'Plot 12, Pankrono Estate, Kumasi', 'Kofi Serwaa (Son)', '0555998877', CURDATE()),
('CL-000002', 'Opanin Kwabena Osei', 'Male', '1962-09-24', 64, '0208776655', 'Near Pankrono High School, Kumasi', 'Abena Osei (Wife)', '0243332211', CURDATE()),
('CL-000003', 'Mrs. Beatrice Appiah', 'Female', '1975-11-03', 51, '0501234567', 'House 8B, Tafo Nhyiaeso, Kumasi', 'Dr. Emmanuel Appiah', '0241974447', CURDATE())
ON DUPLICATE KEY UPDATE full_name = VALUES(full_name);

-- D. Seed Demonstration Clinical Encounter
INSERT INTO visits (id, client_id, visit_date, complaint, symptoms, temperature, bp, weight, diagnosis, treatment, prescription, notes, attending_staff_id)
VALUES 
(1, 'CL-000001', NOW(), 'Routine diabetic checkup and minor leg ulcer dressing.', 'Fasting blood sugar high, mild localized swelling on right ankle.', '36.7', '135/85', '68.0', 'Type 2 Diabetes Mellitus & Stage 1 Superficial Ulcer', 'Wound debridement, normal saline irrigation, and sterile hydrocolloid dressing applied.', 'Tab Metformin 500mg BD x 30 days\nTab Vitamin C 1000mg Daily x 14 days', 'Review wound healing in 5 days. Low carbohydrate dietary reinforcement.', 1)
ON DUPLICATE KEY UPDATE complaint = VALUES(complaint);

-- E. Seed Demonstration Invoice & Invoice Items
INSERT INTO invoices (invoice_number, client_id, invoice_date, total_amount, amount_paid, balance, payment_status)
VALUES 
('INV-000001', 'CL-000001', CURDATE(), 180.00, 180.00, 0.00, 'Paid')
ON DUPLICATE KEY UPDATE total_amount = VALUES(total_amount);

INSERT INTO invoice_items (id, invoice_number, service_description, quantity, unit_price, subtotal)
VALUES 
(1, 'INV-000001', 'Glucose Monitoring & Vital Signs Check', 1, 60.00, 60.00),
(2, 'INV-000001', 'Wound Dressing & Aseptic Care', 1, 120.00, 120.00)
ON DUPLICATE KEY UPDATE subtotal = VALUES(subtotal);

-- F. Seed Demonstration Payment Receipt
INSERT INTO payments (payment_id, receipt_number, client_id, invoice_number, payment_date, amount_paid, payment_method, staff_id, notes)
VALUES 
('PAY-000001', 'REC-000001', 'CL-000001', 'INV-000001', NOW(), 180.00, 'Mobile Money', 1, 'MoMo Reference: MM202688990')
ON DUPLICATE KEY UPDATE amount_paid = VALUES(amount_paid);

-- G. Seed Demonstration Appointment
INSERT INTO appointments (id, client_id, appointment_date, appointment_time, reason, status, notes)
VALUES 
(1, 'CL-000002', CURDATE(), '10:30:00', 'Catheter Replacement & Vital Signs Monitoring', 'Scheduled', 'Patient residence near Pankrono High School.')
ON DUPLICATE KEY UPDATE status = VALUES(status);
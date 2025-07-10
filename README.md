# Logistics Management System - Work Breakdown Structure (WBS)

## Project Overview
A web-based **Logistics Management System** built with **raw PHP (PDO)** to help Admins manage and track logistics activities such as shipments, deliveries, truck schedules, reporting, and admin management.

---

## 📦 1. Project Setup

- [ ] Initialize Project Folder Structure
- [ ] Setup `index.php`, `login.php`, `dashboard.php`
- [ ] Install Composer & Required Packages

### Suggested Composer Dependencies

- `vlucas/phpdotenv` — For environment variable management
- `respect/validation` — For form input validation
- `phpmailer/phpmailer` *(optional)* — For email notifications (if needed)
- `dompdf/dompdf` *(optional)* — For PDF report generation
- `firebase/php-jwt` *(optional)* — For secure token handling (optional)

---

## 🔐 2. Authentication System

- [ ] Design `admins` table
- [ ] Implement secure login using **PDO** and **password_hash**
- [ ] Session management for admin login/logout
- [ ] Optional: Password recovery/reset
- [ ] Optional: Multi-role support (Super Admin, Admin)

---

## 🏠 3. Dashboard UI/UX

- [ ] Reusable header, sidebar, footer (`includes/`)
- [ ] Welcome stats (Shipments today, Deliveries in transit, Total trucks)
- [ ] Notifications panel (optional)
- [ ] Quick actions (Add Shipment, View Reports)

---

## 🚚 4. Core Modules

### 4.1 Shipments Management

- [ ] Add/Edit/Delete shipments
- [ ] View shipment details
- [ ] Assign vehicle & admin responsible
- [ ] Set shipment status: Pending, In-transit, Delivered, Cancelled

### 4.2 Deliveries Tracking

- [ ] Record deliveries linked to shipments
- [ ] Update delivery status
- [ ] Optional: Add delivery timeline/ETA

### 4.3 Truck/Vehicle Schedules

- [ ] Add/Edit/Delete vehicle records
- [ ] Assign vehicles to shipments
- [ ] Track vehicle availability

### 4.4 User Management (Admins)

- [ ] Add/Edit/Delete admin accounts
- [ ] Assign roles (optional)
- [ ] Activity logs (optional)

### 4.5 Reports & Exports

- [ ] Generate daily/weekly/monthly reports
- [ ] Export as PDF (optional)
- [ ] Export as Excel (optional)

### 4.6 Notifications & Alerts *(Optional)*

- [ ] Email or system alerts for status changes
- [ ] Low vehicle availability alert

### 4.7 System Settings *(Optional)*

- [ ] Company info update
- [ ] Admin profile management
- [ ] Theme customization (optional)

---

## 🗄 5. Database Design

### 5.1 Tables Overview

| Table Name     | Purpose                                  |
|---------------|-------------------------------------------|
| `admins`      | Store admin users                         |
| `shipments`   | Store shipment records                    |
| `deliveries`  | Track deliveries linked to shipments      |
| `vehicles`    | Store vehicle details                     |
| `notifications` *(optional)* | Store alerts/notifications       |
| `activity_logs` *(optional)* | Store admin activity history     |

### 5.2 Tables Schema (Draft)

#### `admins`
```sql
CREATE TABLE admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('super', 'admin') DEFAULT 'admin',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

#### `vehicles`
```sql
CREATE TABLE vehicles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  vehicle_name VARCHAR(100) NOT NULL,
  license_plate VARCHAR(50) NOT NULL,
  status ENUM('available', 'assigned', 'maintenance') DEFAULT 'available',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

#### `shipments`
```sql
CREATE TABLE shipments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  shipment_code VARCHAR(100) NOT NULL UNIQUE,
  origin VARCHAR(255) NOT NULL,
  destination VARCHAR(255) NOT NULL,
  vehicle_id INT,
  status ENUM('pending', 'in-transit', 'delivered', 'cancelled') DEFAULT 'pending',
  created_by INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

#### `deliveries`
```sql
CREATE TABLE deliveries (
  id INT AUTO_INCREMENT PRIMARY KEY,
  shipment_id INT NOT NULL,
  delivery_date DATE,
  status ENUM('pending', 'in-progress', 'completed') DEFAULT 'pending',
  notes TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

#### `notifications` *(Optional)*
```sql
CREATE TABLE notifications (
  id INT AUTO_INCREMENT PRIMARY KEY,
  admin_id INT,
  message TEXT NOT NULL,
  is_read BOOLEAN DEFAULT FALSE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

#### `activity_logs` *(Optional)*
```sql
CREATE TABLE activity_logs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  admin_id INT,
  action VARCHAR(255),
  ip_address VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 🚀 6. Optional Features for Future Expansion

- [ ] Multi-language support
- [ ] Mobile responsiveness (PWA or dedicated mobile app)
- [ ] Driver management module
- [ ] Customer-facing portal (optional)
- [ ] API endpoints for mobile app integration
- [ ] Blockchain delivery tracking (optional)

---

## 📌 Development Milestones

| Milestone                        | Tasks                                           |
|-----------------------------------|-------------------------------------------------|
| **M1:** Project Skeleton          | Setup folders, login system, base dashboard      |
| **M2:** Core Module: Shipments    | CRUD shipments, statuses, vehicle assignment     |
| **M3:** Core Module: Deliveries   | CRUD deliveries, status updates                  |
| **M4:** Reports & Exports         | Reporting, PDF/Excel exports                     |
| **M5:** Optional Features         | Notifications, settings, multi-role, etc.        |

---

## ✅ Notes & Best Practices

- Use **prepared statements** for all DB queries (PDO)
- Sanitize and validate all inputs (Respect/Validation or custom)
- Apply **CSRF protection** on forms (optional but recommended)
- Passwords must be hashed using `password_hash()`
- Manage sessions securely (session_regenerate_id, etc.)

---

> This document serves as both a **Work Breakdown Structure (WBS)** and a **feature roadmap** for the Logistics Management System. It is designed to be **GitHub Copilot-friendly** to aid development in small, manageable sprints.

---

*Generated: July 2025*
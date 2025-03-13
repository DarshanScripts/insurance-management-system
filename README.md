# 🛡 Insurance Management System

## Overview

The **Insurance Management System** is a web-based application built using PHP that facilitates managing insurance policies, customers, and administrative operations. The project implements **CRUD operations, AJAX, and form validations** to ensure a smooth user experience.

## ⭐ Features

### User Features
- **User Authentication** – Secure login, registration, and logout functionality.
- **Policy Management** – Add, edit, and delete insurance policies.
- **Customer Management** – View and update customer details.
- **Admin Dashboard** – Manage customers, policies, and system settings.
- **AJAX Integration** – Ensures seamless, real-time interactions.
- **Form Validations** – Prevents incorrect data entry.

---

## 📥 Installation Guide

### Step 1: Clone the Repository
Download the project from GitHub:
```sh
git clone https://github.com/DarshanScripts/insurance-management-system.git
```

### Step 2: Set Up the Database
1. Open **phpMyAdmin** (or any MySQL database manager).
2. Create a new database (e.g., `Insurance`).
3. Copy the provided SQL file, paste it into the SQL panel & run it successfully.
4. Open `DBConnection.php` and update the database credentials.

### Step 3: Configure the Server
1. Move the project folder to `htdocs` (for XAMPP) or `www` (for WAMP/LAMP).
2. Start **Apache** and **MySQL** services using XAMPP/WAMP/LAMP.
3. Open a browser and go to:
   ```sh
   http://localhost/insurance-management-system/
   ```

---

## 📂 Project Structure

```
insurance-management-system/
│── Index.php                # Homepage
│── Login.php                # User Login
│── Logout.php               # Logout Functionality
│── Registration.php         # User Registration
│── DBConnection.php         # Database Configuration
│── TableStructure.sql       # SQL Database Dump
│
├── Admin/
│   ├── Dashboard.php        # Admin Dashboard
│   ├── EditCust.php         # Edit Customer Details
│   ├── FetchCustomer.php    # Fetch Customer Details
│
├── Customer/
│   ├── Homepage.php         # Customer Dashboard
│   ├── UpdateProfile.php    # Profile Management
```

---

## 💻 Technologies Used
- **PHP** – Backend logic and CRUD operations
- **MySQL** – Database for storing user and policy data
- **AJAX** – Dynamic interactions
- **HTML, CSS, JavaScript** – Frontend development
- **Bootstrap** – Enhances UI design

---

## 📜 License
This project is licensed under the **MIT License**.

---

## 👨‍💻 Author
Developed by **Darshan Shah**. Connect with me:

- **LinkedIn**: [Darshan Shah](https://www.linkedin.com/in/darshan-shah-tech/)
- **Facebook**: [DarshanScripts](https://www.facebook.com/DarshanScripts)
- **GitHub**: [DarshanScripts](https://github.com/DarshanScripts)
- **Quora**: [Darshan Shah](https://www.quora.com/profile/Darshan-Shah-1056)
- **Medium**: [DarshanScripts](https://medium.com/@DarshanScripts)
- **Fiverr**: [DarshanScripts](https://www.fiverr.com/darshanscripts)

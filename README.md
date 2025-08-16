🌐 GovConnect – Government Service Management System

GovConnect is a **web-based platform** built to enhance the efficiency of **government services** by enabling **digital appointments, employee management, feedback collection, and user authentication** in one place.

This system bridges the gap between **citizens and government officers**, making services **faster, more transparent, and accessible online**.

---

📖 Table of Contents

1. [Introduction](#-introduction)
2. [Features](#-features)
3. [Tech Stack](#-tech-stack)
4. [Project Structure](#-project-structure)
5. [Installation Guide](#-installation-guide)
6. [Database Setup](#-database-setup)
7. [Usage](#-usage)
8. [Future Improvements](#-future-improvements)
9. [Contributing](#-contributing)
10. [License](#-license)
11. [Credits](#-credits)

---

📌 Introduction

Government service delivery is often slowed down by manual processes such as:

- Citizens waiting in queues for appointments
- Lack of real-time tracking for services
- Inefficient employee and case management
- Limited feedback collection from citizens

GovConnect solves these problems by providing a **digital-first approach** to:

- Book and manage appointments online
- Allow government officers to manage service requests
- Collect structured citizen feedback
- Ensure secure login and identity verification

---

🚀 Features

👤 User Features

- Register and log in securely
- Book appointments with government officers
- Track appointment status
- Submit feedback and rate services
- Reset password and verify identity

🏢 Government Officer Features

- Manage and approve/reject appointments
- View appointment details in real-time
- Access feedback reports
- Maintain employee records

⚙️ System Features

- Responsive UI with Tailwind CSS
- Secure PHP-based backend
- MySQL database integration
- Modular and scalable code structure
- Git version control for team collaboration

---

🛠️ Tech Stack

| Layer               | Technologies Used               |
| ------------------- | ------------------------------- |
| **Frontend**        | HTML5, Tailwind CSS, JavaScript |
| **Backend**         | PHP 8+                          |
| **Database**        | MySQL / MariaDB                 |
| **Server**          | Apache (XAMPP, WAMP, or LAMP)   |
| **Version Control** | Git & GitHub                    |

---

📂 Project Structure

```
ClusterCode_GovConnect/
│── dashboard.php                     # Officer Dashboard
│── employee.php                      # Employee Management Module
│── feedback.php                      # Feedback Management
│── government-officer-single-appointment-view.php # Appointment Details
│── index.php                         # Landing/Login Page
│── signup.php                        # Citizen Registration
│── UserForgotPassowrdPage.php        # Forgot Password Page
│── UserVerificationPage.php          # OTP/Email Verification
│── tailwind.config.js                # Tailwind CSS Config
│── 2.html                            # Demo/Test Page
│── .gitignore                        # Ignored files
│── README.md                         # Project Documentation
```

---

⚙️ Installation Guide

1. Clone the Repository

```bash
git clone https://github.com/your-username/ClusterCode_GovConnect.git
cd ClusterCode_GovConnect
```

2. Move Project to Server Directory

- For **XAMPP**: Move to `htdocs/ClusterCode_GovConnect/`
- For **WAMP**: Move to `www/ClusterCode_GovConnect/`

3. Start Local Server

- Start **Apache** and **MySQL** from XAMPP/WAMP control panel.

4. Configure Database Connection  
   Open the PHP files that interact with DB and set:

```php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "govconnect";
```

5. Access Project in Browser

```
http://localhost/ClusterCode_GovConnect/
```

---

🗄️ Database Setup

Run the following SQL script to create the required database:

```sql
CREATE DATABASE govconnect;

USE govconnect;

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('citizen', 'officer', 'admin') DEFAULT 'citizen',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Appointments Table
CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    officer_id INT,
    date DATE NOT NULL,
    time TIME NOT NULL,
    status ENUM('pending','approved','rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (officer_id) REFERENCES users(id)
);

-- Employees Table
CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    position VARCHAR(100),
    department VARCHAR(100),
    email VARCHAR(100) UNIQUE
);

-- Feedback Table
CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
```

---

🎯 Usage

1. **Citizen User**

   - Sign up and verify account
   - Book an appointment
   - Submit feedback after appointment

2. **Government Officer**

   - Log in via dashboard
   - View and approve/reject appointments
   - Review citizen feedback

3. **Admin**
   - Manage employees
   - Oversee system activity


🔮 Future Improvements

- ✅ SMS/Email Notifications for appointments
- ✅ Multi-language support (Sinhala, Tamil, English)
- ✅ Analytics dashboard for feedback trends
- ✅ AI-powered chatbot for citizen queries
- ✅ Mobile app integration with Flutter

---

🤝 Contributing

We welcome contributions!

1. Fork this repo
2. Create your feature branch (`git checkout -b feature/awesome-feature`)
3. Commit changes (`git commit -m "Added awesome feature"`)
4. Push to branch (`git push origin feature/awesome-feature`)
5. Open a Pull Request 🎉

---

📜 License

This project is licensed under the **MIT License**.

---

🙌 Credits

Developed by **ClusterCode Team** 💻  
Special thanks to all contributors and testers.

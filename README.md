# 🧾 PHP Form Login System

A simple PHP-based authentication system with form-based registration and login. Supports profile picture upload and cookie-based sessions.

---

## 🚀 Features

- ✅ **Registration Page** – Create a new user account.
- ✅ **Login Page** – Authenticate existing users.
- ✅ **Protected Routes** – Restrict access to authenticated users only.
- ✅ **Sign Out** – Logout and destroy session.
- ✅ **Profile Picture Upload** – Upload and save user image.
- ✅ **Cookie-Based Login** – Stay logged in using cookies.

---

## ⚙️ Setup Guide

1. **Database Name**: `test`  
2. **Database User**: `root`  
3. **Database Password**: *(empty string)*  
4. **Database Host**: `localhost`

> 📌 Make sure to import the database structure before running the project.

---

## 🔄 How the Project Works

1. The app **starts at the registration page**, where a user fills in their details and uploads a profile picture.
2. The form sends a POST request to `index.php`, which acts as the central handler.
3. `index.php` **routes the request to the appropriate controller** (e.g. `RegisterController`).
4. The controller performs all **validations** (email, username, password, image, etc.).
5. Once validated, the user data is **stored in the database**.
6. After registration, the user can **log in** via the login page.
7. Upon successful login, the session is started and the user is redirected to **protected pages**.
8. Users can **log out**, which destroys the session and clears cookies.

---


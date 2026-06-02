# 🚀 Full Stack Blog Platform (Laravel + Vue.js)

A full-stack blog application built using **Laravel REST API** for the backend and **Vue.js 3** for the frontend.  
This project demonstrates authentication, role-based authorization, CRUD operations, comments system, and protected routes using token-based authentication.

---

## 📌 Features

- 🔐 User Registration & Login  
- 🪪 Token-Based Authentication (Laravel Sanctum / Bearer Token)  
- 👥 Role-Based Access Control (Admin, Manager, User)  
- 📝 Create, Read, Update & Delete Blog Posts  
- 💬 Add & View Comments on Posts  
- 🔒 Protected Routes using Vue Router Guards  
- ⚡ Axios API Integration with Laravel  
- 📡 Dynamic Data Rendering from REST API  
- 🧠 Secure authorization using roles & permissions  

---

## 🧑‍⚖️ Role-Based Access Control (RBAC)

### 👤 User
- Can create blog posts  
- Can edit **only their own posts**  
- Can delete **only their own posts**  

---

### 🧑‍💼 Manager
- Can create blog posts  
- Can edit **any user’s posts**  
- Can delete **any user’s posts**  
- Focuses on content moderation  

---

### 🛡️ Admin
- Full system access  
- Can create new users  
- Can delete existing users  
- Can update user roles (User / Manager / Admin)  
- Can manage all blog posts  
- Complete control over the system  


## 🛠️ Tech Stack

### Backend
- Laravel (REST API)
- MySQL
- Laravel Sanctum / Token Authentication

### Frontend
- Vue.js 3
- Vue Router
- Axios
- JavaScript (ES6+)

---

## 📁 Project Structure

- `/backend` → Laravel API
- `/frontend` → Vue.js Application

---

## ScreenShots

<img width="1909" height="927" alt="Image" src="https://github.com/user-attachments/assets/04046618-cdfc-4783-848d-5e0b5205e7c2" />
<img width="1909" height="927" alt="Image" src="https://github.com/user-attachments/assets/240d1af6-45f7-48b9-8cdb-7f146cbe936c" />
<img width="1909" height="927" alt="Image" src="https://github.com/user-attachments/assets/61521945-3aa8-4d9c-b332-3c23ddb29621" />
<img width="1909" height="927" alt="Image" src="https://github.com/user-attachments/assets/9bcef4ae-846f-4014-a64c-4415cf90a4f8" />
<img width="1926" height="1005" alt="Image" src="https://github.com/user-attachments/assets/0da63471-68c9-4414-ab64-40675f011857" />
<img width="1926" height="1005" alt="Image" src="https://github.com/user-attachments/assets/8a275d71-37ec-4831-9d38-bf19677b834a" />
<img width="1926" height="1005" alt="Image" src="https://github.com/user-attachments/assets/b75f4c40-4dc7-4bf5-aef8-c88a8c3f031f" />

## ⚙️ Installation

### 1. Clone Repository
```bash
git clone https://github.com/muhammadtayyab0404/vue-laravel-blog-app
cd vue-laravel-blog-app

## Backend Setup (Laravel)

cd backend

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve

## Frontend Setup (Vue.js)
cd frontend

npm install

npm run dev

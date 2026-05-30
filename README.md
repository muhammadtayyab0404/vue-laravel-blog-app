# 🚀 Full Stack Blog Platform (Laravel + Vue.js)

A full-stack blog application built using **Laravel REST API** for the backend and **Vue.js 3** for the frontend. This project demonstrates authentication, CRUD operations, comments system, and protected routes using token-based authentication.

---

## 📌 Features

- 🔐 User Registration & Login
- 🪪 Token-Based Authentication (Bearer Token)
- 📝 Create, Read, Update, Delete Blog Posts
- 💬 Add & View Comments on Posts
- 🔒 Protected Routes using Vue Router Guards
- ⚡ Axios API Integration with Laravel
- 📡 Dynamic data rendering from REST API

---

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

## ⚙️ Installation

### 1. Clone Repository
```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name

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
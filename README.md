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


<img width="1926" height="1005" alt="Image" src="https://github.com/user-attachments/assets/074b9e80-f365-4cdf-b9d6-0da6691b9e05" />
<img width="1926" height="1005" alt="Image" src="https://github.com/user-attachments/assets/588def16-c9e9-4dda-98b3-7b5897fd0d55" />
<img width="1926" height="1005" alt="Image" src="https://github.com/user-attachments/assets/0da63471-68c9-4414-ab64-40675f011857" />
<img width="1926" height="1005" alt="Image" src="https://github.com/user-attachments/assets/8a275d71-37ec-4831-9d38-bf19677b834a" />
<img width="1926" height="1005" alt="Image" src="https://github.com/user-attachments/assets/b75f4c40-4dc7-4bf5-aef8-c88a8c3f031f" />

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

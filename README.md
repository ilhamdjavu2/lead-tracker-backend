# 📊 Lead Tracker API (Laravel)

## 🧾 Project Overview
Lead Tracker API is a RESTful API built with Laravel as part of a full-stack developer technical assessment for The Bali Houses.  

The project is designed to demonstrate clean backend architecture, including Service Layer, Repository Pattern, and a standardized custom API response structure for scalable and maintainable.

---

## ⚙️ System Requirements

- PHP >= 8.2
- Composer >= 2.9
- MySQL >= 8.0
- Laravel 12

---

## 🚀 Tech Stack

- Laravel Framework (Backend API)
- MySQL 8 (Database)
- Eloquent ORM
- Service Layer Pattern
- Repository Pattern
- REST API
- Custom API Response Wrapper
- Standardized Pagination

---

## 📦 API Endpoints

### Health Check
- GET /api/health

### Leads
- GET /api/health
- GET /api/leads
- POST /api/leads
- PATCH /api/leads/{id}
- DELETE /api/leads/{id}

---

## 🧠 Architecture

Controller → Service → Repository → Model

---

## 📁 Project Structure
```
app/
├── Enums/
├── Helpers/
├── Http/
│   ├── Controllers/
│   ├── Middleware/
│   ├── Requests/
├── Models/
├── Providers/
├── Repositories/
│   ├── Interfaces/
├── Services/
routes/
```

---

## ⚙️ Installation

```bash
git clone https://github.com/your-repo/lead-tracker.git
cd lead-tracker-backend
composer install
cp .env.example .env
php artisan key:generate
```

### Migration
```bash
php artisan migrate
```

### Run Project
```bash
php artisan serve --port=8001
```

## 📬 Postman Collection

👉 Import Postman Collection:
https://documenter.getpostman.com/view/1813672/2sBXirk8dd

---

## 🧾 Example cURL

```bash
curl --location '/api/health' --header 'Accept: application/json' --header 'x-api-key;'
```

---

## 👨‍💻 Author
Muhammad Ilham

---

## 📜 License
MIT License

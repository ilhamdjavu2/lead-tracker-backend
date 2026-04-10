# 📊 Lead Tracker API (Laravel)

## 🧾 Project Overview
Lead Tracker API is a RESTful API built with Laravel 12 for managing lead data as part of a full-stack developer technical assessment for The Bali Houses.  
Featuring a layered architecture (Controller → Service → Repository) and a standardized API response system to ensure consistency across endpoints.

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
This project follows a layered architecture:

- Controller: Handle HTTP requests
- Service: Business logic layer
- Repository: Data access layer
- Model: Eloquent ORM models

app/
├── Http/
│   ├── Controllers/
│   ├── Middleware/
│   ├── Requests/
├── Services/
├── Repositories/
│   ├── Interfaces/
├── Models/
├── Enums/
├── Helpers/
├── Providers/
routes/
```

---

## ⚙️ Installation

```bash
git clone https://github.com/ilhamdjavu2/lead-tracker-backend.git
```
```bash
cd lead-tracker-backend
```
```bash
composer install
```
```bash
cp .env.example .env
```
```bash
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
```bash
https://documenter.getpostman.com/view/1813672/2sBXirk8dd
```

---

## 🧾 Example cURL

```bash
curl --location 'http://localhost:8001/api/health' --header 'Accept: application/json' --header 'x-api-key;'
```

### Api Response Example
```bash
{
    "success": true,
    "message": "Leads Found",
    "result": {
        "draw": 0,
        "recordsTotal": 1,
        "recordsFiltered": 1,
        "data": [],
        "disableOrdering": false
    }
}
```

### Error Response Example
```bash
{
    "error": "The name and email fields are required"
}
```
---

## 👨‍💻 Author
Muhammad Ilham

---

## 📜 License
MIT License

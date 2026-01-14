# 🎓 School Management System

A modern web application for managing schools and students built with **Laravel 12**.

![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-Build-646CFF?style=flat-square&logo=vite&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

## 📖 About

This is a **School Management System** designed to efficiently manage educational institutions and their students. The application provides a complete CRUD (Create, Read, Update, Delete) interface for managing student information across multiple schools.

### Key Features

- 🏫 **School Management** - Register and manage multiple schools with principal and address information
- 👨‍🎓 **Student Management** - Full CRUD operations for student records
- 🔗 **Relationship Handling** - One-to-many relationship between schools and students
- ✅ **Form Validation** - Server-side validation for all input data
- 📄 **Pagination** - Efficient data display with pagination support
- 🎨 **Modern UI** - Clean, responsive interface using Blade templates

## 🛠️ Tech Stack

| Category | Technology |
|----------|------------|
| **Backend** | PHP 8.2+, Laravel 12 |
| **Database** | MySQL |
| **Frontend** | Blade Templates, Vite |
| **Testing** | Pest PHP |
| **Development** | Laravel Sail, Laravel Pint |

## 📁 Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   └── StudentController.php    # Student CRUD operations
│   └── Models/
│       ├── School.php               # School model with hasMany relationship
│       └── Student.php              # Student model with belongsTo relationship
├── database/
│   ├── factories/                   # Model factories for testing
│   └── migrations/                  # Database schema migrations
├── resources/
│   └── views/
│       ├── layouts/                 # Base layout templates
│       └── students/                # Student views (index, create, edit)
└── routes/
    └── web.php                      # Web routes with resource controller
```

## 🚀 Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & npm
- MySQL

### Quick Setup

```bash
# Clone the repository
git clone <repository-url>
cd EXAM2026.1B

# Run the setup script
composer setup
```

### Manual Setup

```bash
# Install PHP dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your database in .env file
# DB_DATABASE=SchoolManagement
# DB_USERNAME=root
# DB_PASSWORD=

# Run migrations
php artisan migrate

# Install frontend dependencies
npm install

# Build assets
npm run build
```

## 💻 Usage

### Development Server

```bash
# Start all services (server, queue, vite) concurrently
composer dev
```

Or run services separately:

```bash
# Start Laravel server
php artisan serve

# In another terminal, run Vite
npm run dev
```

### Running Tests

```bash
composer test
```

## 📊 Database Schema

### Schools Table

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| name | varchar | School name (unique) |
| principal | varchar | Principal's name |
| address | varchar | School address |
| timestamps | - | created_at, updated_at |

### Students Table

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| school_id | bigint | Foreign key to schools |
| full_name | varchar | Student's full name |
| student_id | varchar | Student ID (unique) |
| email | varchar | Email address (unique) |
| phone | varchar | Phone number (nullable) |
| timestamps | - | created_at, updated_at |

## 🔒 Validation Rules

### Student Creation/Update

- **full_name**: Required, string
- **student_id**: Required, unique
- **email**: Required, valid email, unique
- **phone**: Optional, numeric
- **school_id**: Required, must exist in schools table

## 📝 API Routes

| Method | URI | Action | Description |
|--------|-----|--------|-------------|
| GET | `/students` | index | List all students |
| GET | `/students/create` | create | Show create form |
| POST | `/students` | store | Create new student |
| GET | `/students/{id}/edit` | edit | Show edit form |
| PUT | `/students/{id}` | update | Update student |
| DELETE | `/students/{id}` | destroy | Delete student |

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

**Author**: [Your Name]  
**Date**: January 2026

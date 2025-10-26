# 📘 Course Creation System - Installation Guide

A **Laravel-based Course Creation System** that allows users to **create, manage, and view courses** with modules and video content.  
Includes user authentication, file uploads, AJAX form submission, and real-time validation.

---

## 🧩 Overview

This system provides:
- Course creation
- Module and video content uploads
- AJAX-based real-time validation
- User authentication (for instructors and students)
- Responsive front-end using Blade and Bootstrap

---

## 🧰 Prerequisites

Before installation, ensure you have the following installed:

- **PHP** 8.1 or higher
- **Composer**
- **MySQL** 5.7 or higher
- **Node.js** and **NPM**
- **Web server** (Apache or Nginx)

---

## ⚙️ Installation Steps

### 1. Clone the Project
```bash
git clone https://github.com/mdshiabulcse/softvence-course-create.git
cd softvence-course-create
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install JavaScript Dependencies
```bash
npm install
```

### 4. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

Edit the `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=course_management
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Database Setup
```bash
php artisan migrate
```

### 6. Storage Link
Create a symbolic link for file storage:
```bash
php artisan storage:link
```

### 7. Generate Application Key
```bash
php artisan key:generate
```

### 8. Build Frontend Assets
```bash
npm run dev
# or for production
npm run build
```

### 9. Serve the Application
```bash
php artisan serve
```

Visit: [http://localhost:8000](http://localhost:8000)

---

## 🧑‍💻 Usage Guide

### For Students/Visitors
- **Browse Courses:** Visit the home page to see all available courses
- **View Course Details:** Click any course to see its modules and content
- **Register/Login:** Create an account to access more features

### For Instructors
- **Create Account:** Register as a new user
- **Login:** Access your instructor dashboard
- **Create Course:**
    1. Click **"Create Course"**
    2. Fill in course details (title, category, description)
    3. Upload feature video and image
    4. Add modules with content (videos, titles, lengths)
    5. Save the course
- **Manage Courses:** View all created courses in **"My Courses"** section

---

## ✨ Features for Authenticated Users

- Create unlimited courses
- Add multiple modules per course
- Upload video content for each module
- Real-time form validation
- AJAX form submission
- Responsive display

---

## 🗂️ File Structure

```
app/
├── Http/Controllers/
│   ├── CourseController.php
│   └── HomeController.php
├── Models/
│   ├── Course.php
│   ├── Module.php
│   └── Content.php
resources/views/
├── layouts/
│   └── app.blade.php
│── create.blade.php
│── index.blade.php
│── show.blade.php
│── public-index.blade.php
├── auth/
│   ├── login.blade.php
│   └── register.blade.php
└── welcome.blade.php
```

---

## 🧭 API Routes

| Method | Route | Description |
|--------|--------|-------------|
| **GET** | `/` | Welcome page |
| **GET** | `/courses` | Public course listing |
| **GET** | `/courses/{course}` | View specific course |
| **GET** | `/my-courses` | User's courses (authenticated) |
| **GET** | `/courses/create` | Create course form (authenticated) |
| **POST** | `/courses` | Store new course (authenticated) |

---

## 💾 Storage Configuration

The application stores files in the following directories:

| Type | Path |
|------|------|
| Feature Videos | `storage/app/public/courses/feature-videos/` |
| Feature Images | `storage/app/public/courses/feature-images/` |
| Content Videos | `storage/app/public/courses/content-videos/` |

---

## 🔒 Security Features

- CSRF protection
- Form validation
- File type validation
- Authentication required for course creation
- Secure file upload handling

---

## 🧩 Troubleshooting

### ⚠️ Common Issues

#### File Upload Errors
- Check `storage/` directory permissions
- Verify `upload_max_filesize` and `post_max_size` in `php.ini`
- Ensure symbolic link exists (`php artisan storage:link`)

#### Database Connection
- Verify credentials in `.env`
- Ensure MySQL service is running
- Database must exist before migration

#### Storage Link Issues
```bash
php artisan storage:link
php artisan config:clear
php artisan cache:clear
```

#### Permission Issues
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

---

## 🧱 Development Commands

```bash
# Clear cache
php artisan config:clear
php artisan cache:clear

# Reset database
php artisan migrate:fresh


```

---

## 🏁 Conclusion

You now have a fully functional **Course Management System** built with Laravel.  
This project demonstrates **real-world Laravel application development** with CRUD, file uploads, authentication, and AJAX form handling.

---

**Author:** Md. Shiabul Islam  
📧 Email: md.shiabul.cse@gmail.com  
📍 Dhaka, Bangladesh

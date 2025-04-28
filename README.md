# **Monata V2**  
[![License](https://img.shields.io/badge/license-MIT-green)](LICENSE)

**Monata V2** is a Laravel-based application developed to address the limitations of **Monata V1**.  
This version specifically focuses on fixing the **Occupation Port OLT Unspec** issue that was not properly handled in the first version.

---

## 🚀 **Key Features**
- **Improved Occupation Port OLT Unspec Handling**  
  Fixes issues with detecting and managing unspecified OLT ports in Monata V2.
  
- **Mass Scanning of Unspec OLT Ports (Coming Soon)**  
  A planned feature to allow mass scanning of OLT ports that are unspec, improving technician workflows.

- **Mancore Connectivity FTM System Integration (Coming Soon)**  
  A system that integrates Mancore FTM for better fiber optic management.

---

## 🛠️ **Technologies Used**
- **PHP** (Laravel Framework)
- **MySQL** / **MariaDB**
- **HTML**, **TailwindCSS** (optional for frontend)
- **JavaScript**

---

## ⚙️ **Installation Instructions**

Follow these steps to set up the project locally:

### 1. **Clone the repository**
```bash
git clone https://github.com/username/monatav2.git
cd monatav2

```
Install Dependencies
```bash
composer install
npm install && npm run dev
```

 Copy .env file
 ```bash
cp .env.example .env
```

 Generate Application Key
 ```bash
php artisan key:generate
```

Set up Database
Configure your database connection in the .env file, then run migrations:
```bash
php artisan migrate
```

Start the Development Server
```bash
php artisan serve
```


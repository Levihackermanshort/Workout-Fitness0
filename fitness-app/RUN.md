# How to Run the Fitness Journal Application

## Quick Start Commands (Linux/Mac)

1. **Navigate to the application directory:**
   ```bash
   cd fitness-app
   ```

2. **Remove old lock file and update dependencies:**
   ```bash
   rm composer.lock
   composer update
   ```
   This will regenerate the lock file with Laravel 9 (compatible with PHP 8.0).

3. **Set up environment (if .env doesn't exist):**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Note: If `.env.example` doesn't exist, create a `.env` file manually.

4. **Set up database:**
   ```bash
   php setup.php
   ```
   OR manually using Laravel migrations:
   ```bash
   php artisan migrate
   ```

5. **Start the server:**
   ```bash
   php artisan serve
   ```

## Quick Start Commands (Windows PowerShell)

1. **Navigate to the application directory:**
   ```powershell
   cd fitness-app
   ```

2. **Update composer dependencies:**
   ```powershell
   composer update
   ```

3. **Set up environment:**
   ```powershell
   copy .env.example .env
   php artisan key:generate
   ```

4. **Set up database:**
   ```powershell
   php setup.php
   ```

5. **Start the server:**
   ```powershell
   php artisan serve
   ```

6. **Access the application:**
   Open your browser and go to: `http://localhost:8000`

## Prerequisites

- PHP 8.2 or higher
- Composer
- MySQL/MariaDB running
- Database credentials (default):
  - Host: `127.0.0.1`
  - Port: `3306`
  - Username: `root`
  - Password: (empty)
  - Database: `fitness_journal_db`

## Test Credentials (if using setup.php)

- Username: `john_doe`, Password: `password123`
- Username: `jane_smith`, Password: `password123`
- Username: `mike_j`, Password: `password123`
- Username: `sarah_w`, Password: `password123`
- Username: `david_b`, Password: `password123`


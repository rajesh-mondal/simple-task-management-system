# 📝 Task Manager Application

A simple yet efficient Task Management system built using the Laravel framework, designed to help users organize and manage their daily tasks with ease. The application provides a clean and intuitive interface where users can create, update, and delete tasks while keeping track of their progress through structured status categories.

The application includes basic validation, pagination for better data handling, and confirmation prompts for safe deletion, ensuring a smooth and user-friendly experience.


## ✨ Key Features

- **Task Management:** Easily create, update, and delete tasks with a simple and intuitive interface.

- **Status Tracking:** Assign and manage task statuses such as Pending, In Progress, and Completed.

- **Bulk Deletion:** Remove all tasks at once with a confirmation prompt to prevent accidental actions.

- **Pagination:** Displays tasks in a paginated format (10 per page) for better performance and usability.

- **Input Validation:** Ensures required fields like title are properly validated before submission.

- **User-Friendly Interface:** Clean and responsive UI built with Bootstrap for better user experience.


## 🛠 Tech Stack

- **Framework:** Laravel (PHP) – Utilizing MVC architecture for scalability and security.  
- **Database:** MySQL – Relational database for efficient management of records.  
- **Frontend:** Bootstrap & JavaScript – Ensuring a responsive and interactive user interface.


## 🤔 Assumptions & Decisions

- Task status is limited to three predefined values: `pending`, `in_progress`, and `completed`
- Basic validation is applied on form inputs (e.g., title is required)
- Pagination is limited to 10 tasks per page for better usability
- A confirmation dialog is used before deleting tasks to prevent accidental actions
- `truncate()` is used for "Delete All" functionality for simplicity and performance


## 🧪 Testing Approach

Basic feature tests were implemented to ensure core functionalities work correctly:

- Task creation
- Validation handling
- Task update
- Task deletion
- Route accessibility

Laravel’s built-in testing tools and `RefreshDatabase` trait were used to ensure:

- Clean database state before each test
- Reliable and repeatable test execution

Run tests using:

```bash
php artisan test
```

## ⚙️ Installation and Setup

Follow these steps to get a local copy of the project up and running.


### 1. Clone the repository

```bash
git clone https://github.com/rajesh-mondal/simple-task-management-system.git
cd simple-task-management-system
```

### 2. Install Dependencies
Install the backend dependencies using Composer:
```bash
composer install
```

### 3. Environment Configuration
1. Copy the example environment file:
```bash
cp .env.example .env
```

2. Generate a unique application key:
```bash
php artisan key:generate
```

3. Generate a unique application key:
Edit the `.env` file and update your database credentials, JWT secret (if required), and any other necessary configuration:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_qtec
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Database Setup
Run the migrations to create the necessary tables 
```bash
php artisan migrate
```

### 4. Running the Application
Start the Laravel development server: 
```bash
php artisan serve
```
The application will typically be available at `http://127.0.0.1:8000`.

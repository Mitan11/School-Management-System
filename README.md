# 📚 School Management System 📅

The **School Management System** is a comprehensive software solution designed to manage and streamline the day-to-day operations of educational institutions. It aims to automate various administrative tasks, improve communication, and enhance the overall learning experience for students, teachers, and parents.

## ✨ Features

### Admin Panel

- 👨‍💼 **Login**: Secure access for administrators.
- 👥 **Manage Parent/Teacher Accounts**: Add, update, or remove user accounts.
- 📘 **Manage Courses and Subjects**: Add and update course details.
- 🗓️ **Manage Timetable**: Create and modify class schedules.
- 🎉 **Manage Event Gallery**: Upload and organize event photos.
- 💵 **Manage Fees**: Oversee fee collection and status.
- 🔒 **Logout**: Secure logout functionality.

### Teacher Panel

- 👨‍🏫 **Login**: Secure access for teachers.
- 📋 **Manage Attendance**: Track and update student attendance.
- 📝 **Provide Homework/Notes**: Assign homework and share notes.
- 📅 **Provide Timetable**: Set and update class schedules.
- 🎉 **Manage Event Gallery**: Add and organize event photos.
- 💵 **View Fees Details**: Access fee payment records.
- 🔒 **Logout**: Secure logout functionality.

### Parent Panel

- 👪 **Login**: Secure access for parents.
- 📊 **View Attendance**: Check student attendance records.
- 📚 **View Homework**: See assigned homework and notes.
- 🗓️ **View Timetable**: Access the student's timetable.
- 💳 **Pay Fees**: Online fee payment feature.
- 🎉 **View Event Gallery**: Browse event photos.
- 🔒 **Logout**: Secure logout functionality.

### Common Features

- 📋 **Attendance Tracking**: Calendar view for tracking attendance (✅ Present, ❌ Absent, 🏖️ Leave, ⏰ Late).
- 📅 **Timetable Management**: Admins and teachers can manage timetables.
- 💳 **Fees Payment**: Parents can pay fees online.

## 🛠️ Technologies Used

- 🐘 PHP
- 🐬 MySQL
- 🌐 HTML
- 🎨 CSS and it's Framework BOOTSTRAP
- 💻 JavaScript and it's Librarie JQUERY

## 🚀 Setup Instructions

### 📋 Prerequisites

- 🐘 PHP 7.0 or higher
- 🐬 MySQL 5.6 or higher
- 🌐 Web server (e.g., Apache, Nginx)

### 📥 Installation

1. 📂 Clone the repository to your local machine:

   ```sh
   git clone https://github.com/Mitan11/School-Management-System.git
   ```

2. 📁 Navigate to the project directory:

   ```sh
   School-Management-System
   ```

3. 🗄️ Import the database schema:

   - Create a new database in MySQL named

   ```sh
   schoolmanagementsystem
   ```

   - Import the `schoolmanagementsystem.sql` file into your database.

4. 🛠️ Update the database connection details (host, username, password, database name) if required. By default, in XAMPP, the host is `localhost`, the username is `root`, the password is `''`, and the database name will be `SchoolManagementSystem`.

   ```php
   <?php
   $db_connection = mysqli_connect('localhost', 'username', 'password', 'database_name');

   if (!$db_connection) {
       die("Connection failed: " . mysqli_connect_error());
   }
   ?>
   ```

5. 🌐 Start your web server and navigate to the project directory in your browser.

```sh
http://localhost/School-Management-System/
```

## 📖 Usage

1. **Login to the System**:
    - 🌐 Navigate to the login page.
    - 🔑 Enter your credentials (admin, teacher, or parent).
    - 🖱️ Click the login button to access the appropriate dashboard.

2. **Admin Features**:
    - 👤 **Manage Accounts**: Add, edit, or remove parent and teacher accounts.
    - 📘 **Manage Courses and Subjects**: Create new courses or subjects and assign them to classes.
    - 🗓️ **Manage Timetable**: Set class schedules, assign teachers, and handle conflicts.
    - 🎉 **Event Gallery**: Upload event images, create galleries, and manage existing events gallery.
    - 💰 **Manage Fees**: Track fee payments, generate receipts, and send payment reminders to parents.

3. **Teacher Features**:
    - 📋 **Manage Attendance**: Mark daily attendance for each class, including options for marking students as present, absent, late, or on leave.
    - 📝 **Provide Homework/Notes**: Assign homework or notes to specific classes and track submission status.
    - 📅 **View Timetable**:  Set class schedules, assign teachers, and handle conflicts.
    - 🎉 **Manage Event Gallery**: Upload images related to school events from your classes.
    - 💵 **View Fee Details**: Check fee status and reminders for students in your class.

4. **Parent Features**:
    - 📊 **View Attendance**: Check your child’s attendance history and view details for each day.
    - 📚 **View Homework and Notes**: Monitor assigned homework and notes uploaded by teachers.
    - 📅 **View Timetable**: Access your personal class schedule, including subjects, timings, and assigned rooms.
    - 💳 **Pay Fees**: Use the secure fee payment gateway to clear dues online, view payment history, and download receipts.
    - 🎉 **View Event Gallery**: Explore galleries showcasing school events and activities your child participated in.

7. **Logout**:
    - 🚪 Click on the "Logout" button to securely exit the system after completing your tasks.

## 🙏 Acknowledgements

- Thanks to all the contributors and open-source projects that made this project possible.

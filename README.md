# Private Campus Website

This project is a web-based system for a private campus, developed as part of the **Web Application Development Project** practical exam for the Diploma in Information and Communication Technology.

The website is built using **PHP**, **HTML**, **CSS**, and uses a **WAMP server** for hosting and database management.

---

## Features

### 1. Website Login Page
- Provides secure access to the website for administrators or authorized users.

### 2. Student Registration Page
- Enables the registration of new students.
- Required fields:
  - NIC
  - Name
  - Address
  - Telephone Number
  - Course

### 3. Search Student Details
- Allows users to search for a student by their details.
- Displays information of the selected student.

### 4. Update Student Details
- Updates information of a registered student using their NIC.

### 5. Remove Student Records
- Allows the removal of unwanted or inactive student records from the database.

---

## Setup Instructions

1. Install **WAMP Server** on your local machine.
2. Clone this repository or download the source code.
3. Place the project folder in the **`www`** directory of your WAMP installation.
4. Start the WAMP server and ensure that **Apache** and **MySQL** services are running.
5. Create a new database in **phpMyAdmin** and import the provided SQL file to set up the database schema.
6. Update the database connection details in the PHP files, if necessary.
7. Access the website by navigating to `http://localhost/{project-folder-name}` in your web browser.

---

## Technologies Used

- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL
- **Server**: WAMP Server

---

## Project Structure

- `index.php` - Login page
- `register.php` - Student registration page
- `search.php` - Student search functionality
- `update.php` - Update student details
- `delete.php` - Remove student records
- `db_config.php` - Database connection file

---

## Evaluation Criteria

This project follows the requirements for the **Web Application Development Project**:
- Database management system integration.
- Functional implementation of all specified features.
- Adherence to PHP, HTML, and CSS usage for development.
- Proper hosting setup using the WAMP server.

---


# BIT3208 - Week 6: CRUD Operations

## Student Information
**Name:** Abdullahi Mohammed Mahid  
**Registration Number:** BSCCS/2024/38409  
**Unit:** BIT3208 - Advanced Web Design and Development

## Projects

### 1. Student Management System
A system to manage student records including full name, email, and course.

**Features:**
Add new students
View all students in a table
Edit student information
Delete student records

**Tech stack:** PHP, MySQL, HTML, CSS

### 2. Library Book Management System
A system to manage library books including title, author, and category.

**Features:**
Add new books
View all books in a table
Edit book information
Delete book records

**Tech stack:** PHP, MySQL, HTML, CSS

## Reflection Questions

**1. Why are databases important in web applications?**
Databases allow web applications to store, organize, and retrieve data 
persistently. Without them, information entered by users would be lost 
every time the page reloads or the server restarts.

**2. What is the difference between static and dynamic websites?**
Static websites display fixed content that doesn't change unless the code 
is edited. Dynamic websites generate content in real time based on 
user input or database records, such as displaying different products or 
user profiles.

**3. Explain CRUD operations with examples.**
CRUD stands for Create, Read, Update, Delete. For example, in the Student 
Management System: Create adds a new student, Read displays the list of 
students, Update edits a student's course, and Delete removes a student 
record from the database.

**4. How does PHP communicate with MySQL?**
PHP connects to MySQL using functions like mysqli_connect() to establish 
a connection, then uses mysqli_query() to send SQL commands such as 
SELECT, INSERT, UPDATE, and DELETE to interact with the database.

**5. Why should developers validate user input?**
Validating input ensures the data entered is correct, complete, and safe. 
It prevents errors, protects against malicious input like SQL injection, 
and ensures the database only stores clean, expected data.

**6. What security risks can arise from poor database design?**
Poor database design can lead to SQL injection attacks, data loss and unauthorized access to sensitive 
information if proper validation and structure are not enforced.

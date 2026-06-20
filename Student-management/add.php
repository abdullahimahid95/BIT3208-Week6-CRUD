<?php
include 'includes/db.php';

$success = "";
$error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    if($full_name == "" || $email == "" || $course == ""){
        $error = "All fields are required.";
    } else {
        $query = "INSERT INTO students(full_name, email, course) VALUES('$full_name', '$email', '$course')";
        
        if(mysqli_query($conn, $query)){
            $success = "Student added successfully!";
        } else {
            $error = "Error adding student.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Student Management System</h2>
    <h3>Add New Student</h3>

    <?php if($success != ""): ?>
        <p class="success">✓ <?php echo $success; ?></p>
    <?php endif; ?>

    <?php if($error != ""): ?>
        <p class="error">✗ <?php echo $error; ?></p>
    <?php endif; ?>

    <div class="form-container">
        <form method="POST">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="course" placeholder="Course" required>
            <button type="submit" class="btn-submit">Add Student</button>
        </form>
        <br>
        <a href="index.php"><button class="btn btn-edit">← Back to Students</button></a>
    </div>
</body>
</html>
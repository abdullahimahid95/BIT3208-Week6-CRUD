<?php
include 'includes/db.php';

$success = "";
$error = "";

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$student = mysqli_fetch_assoc($result);

if(!$student){
    header("Location: index.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    if($full_name == "" || $email == "" || $course == ""){
        $error = "All fields are required.";
    } else {
        $query = "UPDATE students SET full_name='$full_name', email='$email', course='$course' WHERE id=$id";
        
        if(mysqli_query($conn, $query)){
            $success = "Student updated successfully!";
            $result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
            $student = mysqli_fetch_assoc($result);
        } else {
            $error = "Error updating student.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Student Management System</h2>
    <h3>Edit Student</h3>

    <?php if($success != ""): ?>
        <p class="success">✓ <?php echo $success; ?></p>
    <?php endif; ?>

    <?php if($error != ""): ?>
        <p class="error">✗ <?php echo $error; ?></p>
    <?php endif; ?>

    <div class="form-container">
        <form method="POST">
            <input type="text" name="full_name" value="<?php echo $student['full_name']; ?>" required>
            <input type="email" name="email" value="<?php echo $student['email']; ?>" required>
            <input type="text" name="course" value="<?php echo $student['course']; ?>" required>
            <button type="submit" class="btn-submit">Update Student</button>
        </form>
        <br>
        <a href="index.php"><button class="btn btn-edit">← Back to Students</button></a>
    </div>
</body>
</html>
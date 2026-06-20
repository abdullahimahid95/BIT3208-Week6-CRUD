<?php
include 'includes/db.php';

$success = "";
$error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];
    $category = $_POST['category'];

    if($book_title == "" || $author == "" || $category == ""){
        $error = "All fields are required.";
    } else {
        $query = "INSERT INTO books(book_title, author, category) VALUES('$book_title', '$author', '$category')";
        
        if(mysqli_query($conn, $query)){
            $success = "Book added successfully!";
        } else {
            $error = "Error adding book.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Library Book Management System</h2>
    <h3>Add New Book</h3>

    <?php if($success != ""): ?>
        <p class="success">✓ <?php echo $success; ?></p>
    <?php endif; ?>

    <?php if($error != ""): ?>
        <p class="error">✗ <?php echo $error; ?></p>
    <?php endif; ?>

    <div class="form-container">
        <form method="POST">
            <input type="text" name="book_title" placeholder="Book Title" required>
            <input type="text" name="author" placeholder="Author" required>
            <input type="text" name="category" placeholder="Category" required>
            <button type="submit" class="btn-submit">Add Book</button>
        </form>
        <br>
        <a href="index.php"><button class="btn btn-edit">← Back to Books</button></a>
    </div>
</body>
</html>
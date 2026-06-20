<?php
include 'includes/db.php';

$success = "";
$error = "";

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM books WHERE id=$id");
$book = mysqli_fetch_assoc($result);

if(!$book){
    header("Location: index.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];
    $category = $_POST['category'];

    if($book_title == "" || $author == "" || $category == ""){
        $error = "All fields are required.";
    } else {
        $query = "UPDATE books SET book_title='$book_title', author='$author', category='$category' WHERE id=$id";
        
        if(mysqli_query($conn, $query)){
            $success = "Book updated successfully!";
            $result = mysqli_query($conn, "SELECT * FROM books WHERE id=$id");
            $book = mysqli_fetch_assoc($result);
        } else {
            $error = "Error updating book.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Library Book Management System</h2>
    <h3>Edit Book</h3>

    <?php if($success != ""): ?>
        <p class="success">✓ <?php echo $success; ?></p>
    <?php endif; ?>

    <?php if($error != ""): ?>
        <p class="error">✗ <?php echo $error; ?></p>
    <?php endif; ?>

    <div class="form-container">
        <form method="POST">
            <input type="text" name="book_title" value="<?php echo $book['book_title']; ?>" required>
            <input type="text" name="author" value="<?php echo $book['author']; ?>" required>
            <input type="text" name="category" value="<?php echo $book['category']; ?>" required>
            <button type="submit" class="btn-submit">Update Book</button>
        </form>
        <br>
        <a href="index.php"><button class="btn btn-edit">← Back to Books</button></a>
    </div>
</body>
</html>
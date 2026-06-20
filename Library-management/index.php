<?php
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Book Management</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Library Book Management System</h2>
    <h3>BIT3208 - Week 6 Practical Task</h3>

    <a href="add.php"><button class="btn btn-add">+ Add New Book</button></a>
    <br><br>

    <?php if(isset($_GET['success'])): ?>
        <p class="success">✓ Action completed successfully!</p>
    <?php endif; ?>

    <table>
        <tr>
            <th>Book ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Added On</th>
            <th>Actions</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM books ORDER BY id DESC");

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['book_title'] . "</td>
                    <td>" . $row['author'] . "</td>
                    <td>" . $row['category'] . "</td>
                    <td>" . $row['created_at'] . "</td>
                    <td>
                        <a href='edit.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                        <a href='delete.php?id=" . $row['id'] . "' class='btn btn-delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center; color:#999;'>No books found. Add your first book!</td></tr>";
        }
        ?>
    </table>
</body>
</html>
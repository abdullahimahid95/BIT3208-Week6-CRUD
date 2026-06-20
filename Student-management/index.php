<?php
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Student Management System</h2>
    <h3>BIT3208 - Week 6 Practical Task</h3>

    <a href="add.php"><button class="btn btn-add">+ Add New Student</button></a>
    <br><br>

    <?php if(isset($_GET['success'])): ?>
        <p class="success">✓ Action completed successfully!</p>
    <?php endif; ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Registered On</th>
            <th>Actions</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC");

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['full_name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['course'] . "</td>
                    <td>" . $row['created_at'] . "</td>
                    <td>
                        <a href='edit.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a>
                        <a href='delete.php?id=" . $row['id'] . "' class='btn btn-delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center; color:#999;'>No students found. Add your first student!</td></tr>";
        }
        ?>
    </table>
</body>
</html>
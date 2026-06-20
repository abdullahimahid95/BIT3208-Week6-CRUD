<?php
include 'includes/db.php';

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$query = "DELETE FROM students WHERE id=$id";

if(mysqli_query($conn, $query)){
    header("Location: index.php?success=1");
    exit();
} else {
    header("Location: index.php?error=1");
    exit();
}
?>
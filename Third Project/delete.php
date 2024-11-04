<?php
include("connection.php");

$id = $_GET['id'];

if($id==''){
    header("location:read.php");  //Php Redirection Method
}

// sql to delete a record
$result = "DELETE FROM mamber WHERE id='".$id."'";

if ($conn->query($result) ===TRUE) {
    echo "<script>alert('Data Deleted');window.location.href='read.php';</script>";  //JavaScript Redirection Method
} else {
    echo "Error deleting record: " . $conn->error;
}



?>
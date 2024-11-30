<?php
session_start();


if (!isset($_SESSION['username'])) {
    header('Location: jorlog.php'); 
    exit();
}


$db = mysqli_connect('localhost', 'root', '', 'project');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}


$username = $_SESSION['username'];


$query = "DELETE FROM user WHERE username='$username'";

if (mysqli_query($db, $query)) {
 
    session_unset(); 
    session_destroy();
    header('Location: jorlog.php'); 
    exit();
} else {
 
    echo "Error deleting account: " . mysqli_error($db);
}


mysqli_close($db);
?>

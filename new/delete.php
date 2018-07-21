<?php 
session_start();

$servername = "localhost";
$username = "root";
$password = "a7a55555";
$dbname = "new";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id=$_GET['id'];
// sql to delete a record
$sql = "DELETE FROM tasks WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    $var=$_SESSION['id'];
    echo "Record deleted successfully";
    header ("Location: profile.php?id=$var");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

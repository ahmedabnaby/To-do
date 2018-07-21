<?php

session_start();

$con=mysqli_connect("localhost","root","a7a55555","new");

$id=$_POST["id"];
$title=$_POST["title"];
$text=$_POST["text"];

$sql="update tasks set title='$title', todo='$text' where id=$id";
$query=mysqli_query($con, $sql);

if ($query) 
{
    $var=$_SESSION['id'];   
    header ("Location: profile.php?id=$var");
} else {
    echo "Error Updating record: " . mysqli_error($con);
}

mysqli_close($con);
?>

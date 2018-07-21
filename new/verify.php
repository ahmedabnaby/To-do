<?php 
if(isset($_POST['submit'])){ 
    $dbHost = "localhost";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "a7a55555";            //Database Password 
    $dbDatabase = "new";    //Database Name 
     
    $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database."); 
    
    $usr = mysqli_real_escape_string($db, $_POST['username']); 
    $pas = mysqli_real_escape_string($db,$_POST['password']); 
    
    $sql = "SELECT * FROM users 
        WHERE username='$usr' AND 
        password='$pas' 
        LIMIT 1"; 
    
    $result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result) == 1){ 
        $row = mysqli_fetch_array($result); 
        session_start(); 
        $_SESSION['username'] = $row['username']; 
        $_SESSION['id'] = $row['id']; 
        $_SESSION['fname'] = $row['first_name']; 
        $_SESSION['lname'] = $row['last_name']; 
        $_SESSION['logged'] = TRUE; 
        
        header("Location: welcome.php"); // Modify to go to the page you would like 
        exit; 
    }else{ 
        header("Location: index.php"); 
        exit; 
    } 
}else{    //If the form button wasn't submitted go to the index page, or login page 
    header("Location: index.php");     
    exit; 
} 
?> 
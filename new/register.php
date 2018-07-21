<?php 
if(isset($_POST['reg'])){ 
    $dbHost = "localhost";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "a7a55555";            //Database Password 
    $dbDatabase = "new";    //Database Name 
     
    $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database."); 
    /* 
    The Above code can be in a different file, then you can place include'filename.php'; instead. 
    */ 
     
    //Lets search the databse for the user name and password 
    //Choose some sort of password encryption, I choose sha256 
    //Password function (Not In all versions of MySQL). 
    $username = mysqli_real_escape_string($db, $_POST['username']); 
    $password = mysqli_real_escape_string($db,$_POST['password']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']); 
    $email = mysqli_real_escape_string($db,$_POST['email']); 
    $firstname = mysqli_real_escape_string($db,$_POST['firstname']); 
        
         $error = array();//initializing the $error
            if (empty($firstname)) {
                header("location: register.php");
            $error[] = 'You forgot to enter your first name!';
            }

            if (empty($lastname)) {
                header("location: register.php");
            $error[] = 'You forgot to enter your last name!';
            }

            if (empty($username)) {
                header("location: register.php");
            $error[] = 'You forgot to choose a username!';
            }

            if (empty($password)) {
                header("location: register.php");
            $error[] = 'You forgot to choose a password!';
            }
            if (empty($email)) {
                header("location: register.php");
            $error[] = 'You forgot to choose an email!';
            }

            if(!empty($error))//if error occured
            {
               die(implode('<br />', $error));//Stops the script and prints the errors if any occured
            }
            // Insert the data from the form into the DB:

            $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`, `username`) VALUES 
            ('$_POST[firstname]', '$_POST[lastname]','$_POST[email]', '$_POST[password]', '$_POST[username]')";

            // Enter the info the end user type if everything is ok:

            if (!mysqli_query($db,$sql))
            {
            die('Error: ' . mysqli_error($db));
            }
            else
            {
                $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                $result=mysqli_query($db,$sql);
                $row = mysqli_fetch_array($result); 
                session_start(); 
                $_SESSION['username'] = $row['username'];
                $_SESSION['fname'] = $row['first_name'];
                $_SESSION['id'] = $row['id']; 
                $_SESSION['logged'] = TRUE; 
                header("Location: welcome.php"); // Modify to go to the page you would like 
                exit; 
            }

            // Close the connection:

            mysqli_close($db);
}
 ?>

<!DOCTYPE html>

<html>
    
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/custom.css" rel="stylesheet">
    <script type="text/javascript">
                function validate()
                {
                    var fname1=document.updateform.firstname.value;
                    var lname1=document.updateform.lastname.value;
                    var uname=document.updateform.username.value;
                    var email=document.updateform.email.value;
                    var pass1=document.updateform.password.value;
                    var conf1=document.updateform.confirmpassword.value;
                    
                    if (fname1===""||fname1===null)
                    {
                        alert("Firstname can't be empty");
                    }
                    if (lname1===""||lname1===null)
                    {
                       alert("Lastname can't be empty");
                    }
                    if (uname===""||uname===null)
                    {
                       alert("Username can't be empty");
                    }
                    if (email===""||email===null)
                    {
                       alert("Email can't be empty");
                    }
                    if (pass1===""||pass1===null)
                    {
                       alert("Password can't be empty");
                       return false;
                    }
                    if(pass1!=conf1)
                    {
                        alert("Password and password configuration don't match");
                    }
                }
            </script>
</head>
    
<body style="background-image:url('images/fog-calm-lake-forest-autumn-sadness.jpg')">
    
    <div class="container">

      
          
          
          <div class="col-md-8">
              <div class="alert alert-info" role="alert">Register here!</div>
              <form role="form" class="navbar-form navbar-right" method="post" name="updateform" action="register.php" onsubmit="validate();">
                  <div class="form-group">
                    <input type="text" class="form-control" name="firstname" placeholder="First Name" >
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" >
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="User Name" >
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" >
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" >
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" >
                  </div>
                  
                  <button type="submit" class="btn btn-success" name="reg">Register</button>
                  <br>
             </form>
                  
              <div class="footer">
              Already have account?<a href="index.php"> Login now!</a>
                </div>
          </div>
          
     
    
    </div>
        
</body>
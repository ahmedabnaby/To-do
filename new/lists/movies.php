<?php 
session_start();
if(isset($_POST['save'])){ 
    $dbHost = "localhost";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "a7a55555";            //Database Password 
    $dbDatabase = "new";    //Database Name 
     
    $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database."); 
    
    $title = mysqli_real_escape_string($db, $_POST['title']); 
    $text = mysqli_real_escape_string($db,$_POST['text']);
        
    $list_id = $_GET['id'];


            $sql = "INSERT INTO `tasks` (`title`, `todo`,  `user_id`) VALUES 
            ('$_POST[title]','$_POST[text]', '$_SESSION[id]')";

            // Enter the info the end user type if everything is ok:

            if (!mysqli_query($db,$sql))
            {
            die('Error: ' . mysqli_error($db));
            }
            else
            {
                $var=$_SESSION['id'];
                
                $_SESSION['logged'] = TRUE; 
                header ("Location: ../profile.php?id=$var"); // Modify to go to the page you would like 
                exit; 
            }


            // Close the connection:

            mysqli_close($db);
}
 ?>
<html>
    
<head>
    <meta charset="utf-8">
    <title>Movies</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../css/custom.css" rel="stylesheet">
</head>
    
<body style="background-image:url('../images/movie-background-wallpaper-maxresdefault.jpg')">
    
    <div class="container">

        <ul class="nav nav-pills">
              <div class='btn btn-primary' style="cursor:default;margin-left:100px;margin-top:10px;">
            <?php echo "“".$_SESSION['fname']."”"; ?>
            </div>
  <li role="presentation" class="btn"><a href="../welcome.php" class="btn-warning" ><b>Home</b></a></li>
              <li role="presentation" class="btn"><a  href="../profile.php?id=<?php echo $_SESSION['id'];?> " class="btn-info"><i><b>Profile</b></i></a></li>
  <li role="presentation" class="btn"><a href="../about.php" class="btn-success" ><b>About Us</b></a></li>
  <li role="presentation" class="btn"><a href="../logout.php"  class="btn-danger"><i><b>LogOut</b></i></a></li>
              
          </ul>
      
          
        
          <div class="col-md-8">
              
              
              <form class="navbar-form navbar-right" method="post" name="updateform" action="movies.php" onsubmit="validate();">
                  <div class="form-group">
                      
                    <input type="text" class="form-control" name="title" placeholder="Title" required>
                  </div>
                  <div class="form-group" style="margin-left:170px;">
                    <textarea class="form-control input-lg" id="inputlg" name="text" type="text" placeholder="To-do" required></textarea>
                  </div>
                  <button type="submit" class="btn btn-success" name="save">Save</button>
                  <br>
             </form>
                  
                  
          </div>
          
     
    
    </div>
        
</body>
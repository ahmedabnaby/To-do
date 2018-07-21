<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/custom.css" rel="stylesheet">
    <head>
<meta charset="utf-8">
    <title>Profile</title>
</head>
    <body style="background-image:url('images/1920x1080-color-background-surface-solid-wallpaper-wpt100934.jpg')">
       
      <div class="container">
          
    <ul class="nav nav-pills">
        <div class='btn btn-info' style="cursor:default;margin-left:100px;margin-top:16px;">
            <?php echo "“".$_SESSION['fname']."”"; ?>
            </div>
  <li role="presentation" class="btn"><a href="welcome.php" class="btn-warning" >Home</a></li>
  <li role="presentation" class="btn"><a href="profile.php?id=<?php echo $_SESSION['id'];?>" class="btn-info">Profile</a></li>
  <li role="presentation" class="btn"><a href="about.php" class="btn-success">AboutUs</a></li>
  <li role="presentation" class="btn"><a href="logout.php"  class="btn-danger">Log Out</a></li>
          </ul>
    </div>
    </body>
</html>

    <?php
 
    $dbHost = "localhost";        //Location Of Database usually its localhost 
    $dbUser = "root";            //Database User Name 
    $dbPass = "a7a55555";            //Database Password 
    $dbDatabase = "new";    //Database Name 
     
    $db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase)or die("Error connecting to database."); 
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $sql = "SELECT * FROM tasks WHERE user_id='$id'";
    
    $result=mysqli_query($db,$sql);
    echo "<div class='panel panel-primary'>";
    echo "<div class='panel-heading'>Displays Tasks</div>";

    echo "<table class='table' style='background-color:#9999ff;'>";
    
    
    echo "<tr>";
    echo "<th>Title</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th>Todo</th><th></th>";
    echo "</tr>";
    
    while($row=mysqli_fetch_array($result))
    {
        $var=$row['id'];
    echo "<tr>";
    echo "<td>".$row["title"]."</td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td>".$row["todo"]."</td>";
    
    
    echo "<td><a class='btn btn-success' href='update.php?id=$var'>Update</a><a class='btn btn-danger' href='delete.php?id=$var'>Delete</a></td>";
    echo "</tr>";
    
    }
    echo "</table>";
    echo "</div>";
    mysqli_close($db);
?> 


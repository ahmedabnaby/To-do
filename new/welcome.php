<?php 
session_start(); 
if(!$_SESSION['logged']){ 
    header("Location: login_page.php"); 
    exit; 
}
$con=mysqli_connect("localhost","root","a7a55555","new");

$sql="SELECT * FROM lists";

$query=mysqli_query($con,$sql);

mysqli_close($con);

?>
<!DOCTYPE html>

<html>
    
<head>
    <meta charset="utf-8">
    <title>To-do!</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/custom.css" rel="stylesheet">
</head>
    
<body style="background-image:url('images/1019953_black-blue-world-map-of-the-wallpapers-for-pc_2560x1600_h.jpg')">
       
      <div class="container">
          
          <ul class="nav nav-pills">
              <div class='btn btn-primary' style="cursor:default;margin-left:100px;margin-top:10px;">
            Welcome :  <?php echo "“".$_SESSION['fname']."”"; ?>
            </div>
  <li role="presentation" class="btn"><a href="#" class="btn-warning" ><b>Home</b></a></li>
              <li role="presentation" class="btn"><a  href="profile.php?id=<?php echo $_SESSION['id'];?> " class="btn-info"><i><b>Profile</b></i></a></li>
  <li role="presentation" class="btn"><a href="about.php" class="btn-success" ><b>About Us</b></a></li>
  <li role="presentation" class="btn"><a href="logout.php"  class="btn-danger"><i><b>LogOut</b></i></a></li>
              
          </ul>
        
          <div class="col-md-8" style="margin-top:50px;">
              
              <div class="alert alert-success" role="alert"><i>Welcome to “The best to-do list website”</i></div>
              <div class="new" style="margin-left:220px;" >
              
         <div class="panel panel-info " style="width:60%;">         
          <div class="panel-heading" style="text-align:center";>
              <div class="panel-heading">
              <p class="panel-title" style="font-size:22px;font-family: 'Arial Black';">
                  <b>Create your own list</b>  
              </p>
                  </div>
          </div>
                  
                      
             
                  <?php
                    
                  
                    echo "<ul class='list-group'>";
                    while ($row=mysqli_fetch_array($query))
                    {
                        
                        $id=$row['id'];
                        $name=$row['name'];
                        $sname=$row['sname'];
                        echo "<i>";
                        echo "<li class='list-group-item list-group-item-success' style='text-align:left;'><a style='text-decoration:none;color:#00b3b3;font-size:16px; 'href='lists/$sname?id=$id'>$name</a></li>";
                        echo "</i>";
                    }
                    echo "</ul>";

                    ?>
      </div>
              
          </div>
              </div>
          
     
    
    </div>
        
        
</body>
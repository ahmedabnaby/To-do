
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

$sql = "SELECT * FROM tasks WHERE id=$id";

$query=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($query);



mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <title>Travel</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/custom.css" rel="stylesheet">
</head>
    
<body style="background-image:url('images/login-page-background-images-hd-5.jpg')">
    
    <div class="container">

        <ul class="nav nav-pills">
  <li role="presentation" class="btn"><a href="welcome.php" class="btn-warning" >Home</a></li>
  <li role="presentation" class="btn"><a href="profile.php?id=<?php echo $_SESSION['id'];?>" class="btn-info">Profile</a></li>
  <li role="presentation" class="btn"><a href="#" class="btn-success">Messages</a></li>
  <li role="presentation" class="btn"><a href="logout.php"  class="btn-danger">Log Out</a></li>
          </ul>
      
          
        
          <div class="col-md-8">
              
              
              <form class="navbar-form navbar-right" method="post" action="update_ok.php">
                  <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $id=$row["id"];?>">
                    Title: <input type="text" class="form-control" name="title" value="<?php echo $row["title"];?>" required>
                  </div>
                  <div class="form-group" style="margin-left:170px;">
                   TO-D<textarea class="form-control input-lg" id="inputlg" name="text" type="text" value="<?php echo $row["todo"];?>" ></textarea>
                  </div>
                  <button type="submit" class="btn btn-success" name="insrt">Update</button>
                  <br>
             </form>
              
                  
                  
          </div>
          
     
    
    </div>
        
</body>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>About us</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">To-do webapp</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="welcome.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="profile.php">Profile</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
        <?php 
        session_start();
        ?>
      <div>
          <br>
          <br>
          <br>
        <h1>About Us</h1>
        <h2>Welcome <?php echo $_SESSION['fname']; ?>. </h2>
        <p class="lead">This is a page you can use to contact us, </p>
        <p class="lead">You are welcome to share your feedback with us. </p>
        <span style="color:blue;"><p class="lead">Email: ahmedabnaby.97@gmail.com </p></span>
      </div>

    </div>
  </body>
</html>

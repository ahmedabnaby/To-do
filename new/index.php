<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/custom.css" rel="stylesheet">
    <script type="text/javascript">
                function validate()
                {
                    var fname1=document.updateform.username.value;
                    var pass1=document.updateform.password.value;
                    
                    if (fname1===""||fname1===null)
                    {
                        alert("Username can't be empty");
                    }
                    if (pass1===""||pass1===null)
                    {
                       alert("Password can't be empty");
                       return false;
                    }
                }
            </script>
</head>
    
<body style="background-image:url('images/fog-calm-lake-forest-autumn-sadness.jpg')">
    
    <div class="container">

      
          <div class="row">
          
          <div class="col-md-8">
              
              <div class="alert alert-danger" role="alert">Login in here!</div>
              
                  <form class="navbar-form navbar-right" name="updateform" action="verify.php" method="post" onsubmit="validate();">
                  
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" >
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                  
                  </div>
                      <button type="submit" class="btn btn-success" name="submit">Login</button>
                      <br>
    <a href="register.php" class="btn btn-info" style="margin-left:290px;">Register Here!</a>
                      
             
                  </form>
                  <br>
              
              
                
             
                  
                  
              
          </div>
              
          </div>
     
    
    </div>
        
</body>
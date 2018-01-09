<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/button.css">
	  <link rel="icon" href="media/imagenes/B.png" type="image/png">
    <title>Login</title>
  </head>
  <body>
<div class="container">
<div id="login" class="signin-card">
  <div class="logo-image">
  <center><img src="media/imagenes/logo.jpg" alt="Logo" title="Logo" width="138" ></center>
  </div>
  <br></br>
  <form action="usuario/validaLogin.php" method="post">
    <center><h2>Timer</h2></center>
    <div id="form-login-username" class="form-group">
      <input id="username" class="form-control" name="username" type="text" size="18" alt="login" required>
      <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="username" class="float-label">usuario</label>
    </div>
    <div id="form-login-password" class="form-group">
      <input id="passwd" class="form-control" name="password" type="password" size="18" alt="password" required>
      <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="password" class="float-label">password</label>
    </div>
    
	 <div id="" class="form-group">
      <div >       
          
              
      </div>
    </div>
    <div>
      <input class="btn btn-block btn-info ripple-effect" type="submit" name="Submit" alt="sign in" value="Sign in">  
	  </div>

    </div>
  </form>
</div>
</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/index.js"></script>

  </body>
</html>

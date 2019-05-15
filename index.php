<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <strong>Login<hr></strong>
  </head>
  <body>
  	<form action="authenticate-login.php" method="POST" id="login">
  	  Email:
  		<br><input type="text" name="email"><br>
  	  Password:
  		<br><input type="text" name="password"><br>
  		<button type="submit">Login</button>
  	</form>
  	<form action="signup.php" id="signup">
  		<input type="submit" value="Sign Up">
  	</form>

  	<?php
        session_start();
  	    $full_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        
        if (strpos($full_url, 'empty'))
          exit('Error: Email and/or password field are empty.');

        if (strpos($full_url, 'email-password'))
          exit('Error: Email and/or password did not match, try again.');

        if (strpos($full_url, 'fail'))
          exit('Error: Connection to the server has failed.');

        if (strpos($full_url, 'query'))
          exit('Error: Query to the database has failed.');

        if (strpos($full_url, 'login'))
          exit('Error: You are not signed in.');
  	?>
  </body>
</html>
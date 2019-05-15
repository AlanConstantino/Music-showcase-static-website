<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <strong>Sign Up<hr></strong>
  </head>
  <body>
  	<form action="/authenticate-signup.php" method="POST">
  		First name: <br> <input type="text" name="firstname"> <br>
  		Last name:  <br> <input type="text" name="lastname"> <br>
      Username:   <br> <input type="text" name="username"> <br>
      Email:      <br> <input type="text" name="email"> <br>
      Password:   <br> <input type="text" name="password"> <br>
  		<button type="submit">Register</button>
  	</form>
    <?php
      $full_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      
      if (strpos($full_url, 'empty'))
        exit('Error: One or more fields are empty.');

      if (strpos($full_url, 'email'))
        exit('Error: Email is already in use, try again.');

      if (strpos($full_url, 'username'))
        exit('Error: Username is already in use, try again.');

      if (strpos($full_url, 'insert'))
        exit('Error: Could not add user to database, try again later.');
    ?>
  </body>
</html>
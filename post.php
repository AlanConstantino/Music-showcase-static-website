<!DOCTYPE html>
<html>
  <head>
  	<meta charset="UTF-8">
  	<title>Create post</title>
    <strong>Create Post<hr></strong>
    <ul>
      <li><a href="../welcome.php">Home</a></li>
      <li><a href="../logout.php">Logout</a></li>
    </ul>
  </head>
  <body>
    <form action="../authenticate-post.php" method="POST">
      Title: <br><input type="text" name="title" maxlength="100"><br>
      Body:  <br><textarea name="body" rows="5" cols="50" maxlength="500"></textarea><br>
      <button type="submit">Post</button>
    </form>
  </body>
  <?php
    session_start();
    
    if (!(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == TRUE)))
      header('Location: ../index.php?welcome=login');

    $full_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($full_url, 'post=fail'))
      exit('Error: Failed to create post, try again.');
  ?>
</html>
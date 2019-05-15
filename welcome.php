<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Home</title>
    <strong>Home<hr></strong>
  </head>
  <body>
  	<header>
  		<?php
			  session_start();

			  if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == TRUE))
				  echo 'Welcome, ' . $_SESSION['username'] . '!';
			  else
				  exit(header('Location: ../index.php?welcome=login'));
  		?>
  	</header>
  	<ul>
  		<li><a href="../post.php">Create Post</a></li>
  		<li><a href="../logout.php">Logout</a></li>
  	</ul>
  	<?php
  		$full_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    	if (strpos($full_url, 'post=success'))
        echo 'Successfully created post.<br>';

    	if (strpos($full_url, 'post=fail'))
        echo 'Failed trying to create post.<br>';

		  $connection = new mysqli('localhost', 'root', 'root', 'myDB');
      
      if ($connection->connect_error)
        exit(header('Location: ../index.php?connection=fail'));

      $sql = "SELECT * FROM Posts ORDER BY id DESC";
  	  $valid_query = mysqli_query($connection, $sql);
		  echo '<hr>';

  	  if(mysqli_num_rows($valid_query) > 0){
  		  while($row = mysqli_fetch_assoc($valid_query)){
  			  echo '<strong>' . $row['title'] . '</strong><br>';
  			  echo $row['body'] . '<br><br><br>';
  			  echo 'by ' . $row['username'] . '<hr>';
  		  }
  	  }
  	?>
  </body>
</html>
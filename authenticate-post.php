<?php
session_start();



// check if user is logged in
if (!(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == True)))
	exit(header('Location: ../index.php?welcome=login'));



// check if variables are empty
if (empty($_POST['title']) || empty($_POST['body']))
	exit(header('Location: ../welcome.php?signup=empty'));



// establish and check connection
$connection = new mysqli('localhost', 'root', 'root', 'myDB');

if ($connection->connect_error)
	exit(header('Location: ../index.php?connection=fail'));



// save user's post to database
$sql = "INSERT INTO posts (title, body, user_id, username) 
        VALUES ('" . $_POST['title'] . "', '" . $_POST['body'] . "', 
                '" . $_SESSION['id'] . "', '" . $_SESSION['username']."')";
$valid_query = mysqli_query($connection, $sql);

if (!$valid_query)
	exit(header('Location: ../post.php?post=fail'));
else
	exit(header('Location: ../welcome.php'));



// close the connection
mysqli_close($connection);
?>
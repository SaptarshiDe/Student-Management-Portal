<?php 
session_start();
?>
<html>
    <head>
        <title>Admin Home Page</title>
        <link rel="stylesheet" type="text/css" href="../assets/styles.css">
    </head>
    <body id="admin_home">
        <h1 id="admin_home_h1"> Student Details</h1>
<?php include '../connection/connection.php';
    if($_SESSION["user"]==="admin"){
    display();
    }
    else
    header('Location: '.'/helloworld/index.html');
?>
	   <form action="../other/signout.php" method="post">
		  <input type="submit" name="signout_button" id="admin_home_signout" value="Signout">
	   </form>
	</body>
</html>
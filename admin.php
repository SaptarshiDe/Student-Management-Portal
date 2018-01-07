<?php 
session_start();
?>
<html>
<style>
body {
    height: 200px;
    overflow-x: true;
    overflow-y: true;
    position: fixed;
    left: 50%;
    margin-top:50px;
    margin-left: -300px;
    background-color: orange;
}
</style>
<body>
<h1 style="margin-left:200px;"> Student Details</h1>
<?php include 'connection.php';
if($_SESSION["user"]==="admin"){
display();
}
else
header('Location: '.'/helloworld/index.html');
?>
	<form action="signout.php" method="post">
		<input type="submit" name="signout_button" style="height:40px;width:100px;font-size: 15px;margin-top:15px;margin-left:250px;float:left" value="Signout">
	</form>
	</body>
</html>
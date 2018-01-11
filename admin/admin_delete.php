<?php 
session_start();
include '../connection/connection.php';
if($_SESSION["user"]==="admin"){
	if(isset($_POST["delete_button"])){
		delete_user($_POST["key1"]);
		delete($_POST["key1"]);
		echo '<script type="text/javascript">
		alert("Student Details Deleted!");
		location="../admin/admin_home.php";
		</script>';

	}
}
else
header('Location: '.'/helloworld/index.html');
?>
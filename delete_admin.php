<?php 
session_start();
?>
<?php
include 'connection.php';
if($_SESSION["user"]==="admin"){
	if(isset($_POST["delete_button"])){
		echo $_POST["key1"];
		delete_user($_POST["key1"]);
		delete($_POST["key1"]);
// 		echo '<script type="text/javascript">
// alert("Student Details Deleted!");
// location="admin.php";
// </script>';

}
}
else
header('Location: '.'/helloworld/index.html');
		
	
		?>
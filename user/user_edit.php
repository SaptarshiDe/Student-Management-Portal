<?php 
session_start();
include '../connection/connection.php';
if($_SESSION["user"]==="signedin"){
	if(isset($_POST["Edit"])){
		if(update_user(array($_POST["age_edit"],$_POST["college_edit"],$_SESSION["student"],$_POST["name_edit"],$_POST["year_edit"]))===1){
			echo '<script type="text/javascript">
			alert("Data updated");
			location="user_home.php";
			</script>';
		}
	}
}
else
header('Location: '.'/helloworld/index.html');
?>
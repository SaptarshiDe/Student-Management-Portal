<?php 
session_start();
include '../connection/connection.php';
if(isset($_POST["submit_button"])){
	if( $_POST["type"]==="user"){
		if(verify_user(array($_POST["email"],$_POST["password"],"user"))===1){
			$_SESSION["user"]="signedin";
			$_SESSION["student"]=$_POST["email"];
			header('Location: '.'/helloworld/user/user_home.php');
		}
		else{
			echo '<script type="text/javascript">
			alert("Wrong Username or Password");
			location="../index.html";
			</script>';
		}
	}
	else if($_POST["type"]==="admin"){
		if(verify_user(array($_POST["email"],$_POST["password"],"admin"))===1){
			session_start();
			$_SESSION["user"]="admin";
			header('Location: '.'/helloworld/admin/admin_home.php');
		}
		else{
			echo '<script type="text/javascript">
			alert("Wrong Username or Password");
			location="../index.html";
			</script>';
		}
	}
	else{
		echo '<script type="text/javascript">
		alert("Choose User or Faculty");
		location="../index.html";
		</script>';
			
	}
}
?>
		
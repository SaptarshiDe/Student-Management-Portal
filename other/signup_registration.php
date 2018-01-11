<?php include '../connection/connection.php';
	if(isset($_POST["signin_button"])){
		if($_POST["password"]===$_POST["confirm_password"]){
			$user=array($_POST["email"],$_POST["password"],"user");
			insert($user);
			$user=array($_POST["email"],$_POST["name"]);
			insert_user($user);
			echo '<script type="text/javascript">
			alert("Now kindly login to your account");
			location="../index.html";
			</script>';
		}
		else{
			echo '<script>alert("Passwords not matching");
			location="signup.html";
			</script>';
		}
	}
	
?>
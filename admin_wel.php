<?php 
session_start();
?>
<?php
include 'connection.php';
if($_SESSION["user"]==="signedin"){
	if(isset($_POST["Edit"])){
		if(update_user(array($_POST["age_edit"],$_POST["college_edit"],$_SESSION["student"],$_POST["name_edit"],$_POST["year_edit"]))===1){
		echo '<script type="text/javascript">
alert("Data updated");
location="main.php";
</script>';
}
}
}
else
header('Location: '.'/helloworld/index.html');
		
	
		?>
<?php 
session_start();
?>
<?php
include 'connection.php';
if($_SESSION["user"]==="admin"){
	if(isset($_POST["Edit"])){
		if(update_user(array($_POST["age_edit"],$_POST["attendance_edit"],$_POST["college_edit"],$_POST["email_edit"],$_POST["marks_edit"],$_POST["name_edit"],$_POST["year_edit"]))===1){
		echo '<script type="text/javascript">
alert("Data updated");
location="admin.php";
</script>';
}
}
}
else
header('Location: '.'/helloworld/index.html');
		
	
		?>
<?php
session_start();
if(isset($_POST["signout_button"])){
	session_destroy();
	header('Location: '.'/helloworld/index.html');
}
?>
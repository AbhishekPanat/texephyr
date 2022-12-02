<?php 
include_once("include/all.php");

unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
unset($_SESSION['USER_EMAIL']);
unset($_SESSION['USER_PASSWORD']);
unset($_SESSION['event_list']);

redirect('index.php');	

?>
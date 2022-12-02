<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
//$con = new mysqli("localhost","root","","texephyr_db");
$con = new mysqli("localhost","u570306383_texephyr22","MitTex@22","u570306383_texephyr");

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}

?>
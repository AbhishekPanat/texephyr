<?php
require '../include/all.php';
require 'vendor/autoload.php';
$html1 = register_content('Abhishek Panat','TEX25172');
echo sendEmail($html1,'Texephyr 2022',"abhipanat767@gmail.com","Abhishek Panat");
?>
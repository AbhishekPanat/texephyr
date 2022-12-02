<?php 

/*define('SENDGRID_API_KEY','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');
define('FROM_EMAIL','texephyr2021@gmail.com');
define('FROM_NAME','Abhishek Panat');*/

define('SENDGRID_API_KEY','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');
define('FROM_EMAIL','team@texephyr.in');
define('FROM_NAME','Texephyr Team');

define('SERVER_PATH','https://texephyr.in/');
//define('SERVER_PATH','http://localhost/texephyr22-website/');
define('MAIN_SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/');

//image upload folder url
define('IMAGE_PATHs',SERVER_PATH.'image/');

define('IMAGE_PATH',SERVER_PATH.'image/idcard/');
define('IMAGE_PATH_FOLDER',$_SERVER['DOCUMENT_ROOT'].'/image/idcard/');


//image upload folder url
define('INDEX_PATH','http://localhost/texephyr22-website/index.php');

// PAYTM CALLBACK URL
define('PAYTM_CALLBACK_URL','https://texephyr.in/payment/pgResponse.php');

//
define('CSV_SERVER_PATH',SERVER_PATH.'csv_upload/');

?>
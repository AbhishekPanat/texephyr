<?php
include_once("../include/all.php");
//require 'phpmail/PHPMailerAutoload.php';

$response = array(
    'status' => 0,
    'message' => 'Registration failed, please try again.'
);
$date = date("Y-m-d H:i:s");
/*pr($_FILES);
 */
//prx($_POST);
// If form is submitted
if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['phone']) || isset($_POST['message'])){
    // Get the submitted form data
    $name = safe($_POST['name']);
    $email = safe($_POST['email']);
    $phone = safe($_POST['phone']);
    $message = safe($_POST['message']);

    // Check whether submitted data is not empty
    if(!empty($name) && !empty($email) && !empty($phone) && !empty($message) && !empty($email) ) {
            $uploadStatus = 1;

            if($uploadStatus == 1){
                 //echo $sql;
                $sql = "INSERT INTO `contact`(`name`, `email`, `phone`, `message`, `status`, `created_at`) VALUES 
                ('$name','$email','$phone','$message','1','$date')";
                $insert = mysqli_query($con,$sql);

                if($insert){
                    $response['status'] = 1;
                    $response['message'] = 'Thank you for contacting , We will reply soon.';
                }
                else
                {
                    $response['status'] = 0;
                    $response['message'] = 'Failed, please try again.';
                }
            }
    }else{
         $response['message'] = 'Please fill all the mandatory fields';
    }
}

// Return response
echo json_encode($response);

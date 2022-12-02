<?php
include_once("../include/all.php");
//require 'phpmail/PHPMailerAutoload.php';

$response = array(
    'status' => 0,
    'message' => 'Login failed, please try again.'
);
/*pr($_FILES);
 */
//prx($_POST);
// If form is submitted
if(isset($_POST['email']) || isset($_POST['password']) ){
    // Get the submitted form data
    $email = safe($_POST['email']);
    $password = safe($_POST['password']);
    $enctype = password_hash($password, PASSWORD_BCRYPT);

    // Check whether submitted data is not empty
    if(!empty($email) && !empty($password) ) {
            $uploadStatus = 1;

            if($uploadStatus == 1){

                $sql="select * from users where email='$email'";
                 //echo $sql;
                $res = mysqli_query($con,$sql);
                if(mysqli_num_rows($res) > 0)
                {
                    $row=mysqli_fetch_assoc($res);
                    $dbpwd = $row['user_password'];
                        if(password_verify($password, $dbpwd))
                        {
                            $_SESSION['USER_ID']=$row['fest_id'];
                            $_SESSION['USER_NAME']=$row['name'];
                            $_SESSION['USER_EMAIL']=$row['email'];
                            $_SESSION['USER_PASSWORD']=$password;
                            $response['status'] = 1;
                            $response['message'] = 'Login Sucessfully';
                        }
                        else
                        {
                            $response['status'] = 0;
                            $response['message'] = 'Password Is Wrong';
                        }
                }
                else
                {
                    $response['status'] = 0;
                    $response['message'] = 'Login failed, please try again.';
                }
            }
    }else{
         $response['message'] = 'Please fill all the mandatory fields';
    }
}

// Return response
echo json_encode($response);

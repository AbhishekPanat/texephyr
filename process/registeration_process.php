<?php
require '../include/all.php';
require 'vendor/autoload.php';
//include_once("../include/vendor/autoload.php");
//require 'phpmail/PHPMailerAutoload.php';

$response = array(
    'status' => 0,
    'message' => 'Registration failed, please try again.'
);
$fest_id = 'TEX'.rand_num('5');
$date = date("Y-m-d H:i:s");
/*pr($_FILES);
 */
//prx($_POST);
// If form is submitted
if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['mobileno']) || isset($_POST['password']) || isset($_POST['college']) ){
    // Get the submitted form data
    $name = safe($_POST['name']);
    $email = safe($_POST['email']);
    $mobileno = safe($_POST['mobileno']);
    $password = safe($_POST['password']);
    $college = safe($_POST['college']);
    $clgname = safe($_POST['clgname']);
    $referal = safe($_POST['referal']);
    $year = safe($_POST['year']);
    $link = $_FILES['link']['name'];
    $enctype = password_hash($password, PASSWORD_BCRYPT);

    // Check whether submitted data is not empty
    if(!empty($name) && !empty($email) && !empty($mobileno) && !empty($password) ) {
            $uploadStatus = 1;

            // Upload file
            $uploadedFile = '';
            if(!empty($_FILES["link"]["name"])){

                // File path config
                $fileName = basename($_FILES["link"]["name"]);
                $targetFilePath =  IMAGE_PATH_FOLDER.$fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                // Allow certain file formats
                $allowTypes = array('jpg', 'png', 'jpeg');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to the server
                    if(move_uploaded_file($_FILES["link"]["tmp_name"], $targetFilePath)){
                        $uploadedFile = $fileName;
                    }else{
                        $uploadStatus = 0;
                        $response['message'] = 'Sorry, there was an error uploading your file.';
                    }
                }else{
                    $uploadStatus = 0;
                    $response['message'] = 'Sorry, only JPG, JPEG, & PNG files are allowed to upload.';
                }
            }

            if($uploadStatus == 1){

                 if($college == "0")
                 {
                    $sql="INSERT INTO users (name,fest_id,email,user_password,phone_no,college,college_name,id_card,referal_code,year,created_at) VALUES ('$name','$fest_id','$email','$enctype','$mobileno','$college','MIT-WPU','$link','$referal','$year','$date')";
                 }
                 else
                 {
                    $sql="INSERT INTO users (name,fest_id,email,user_password,phone_no,college,college_name,id_card,referal_code,year,created_at) VALUES ('$name','$fest_id','$email','$enctype','$mobileno','$college','$clgname','$link','$referal','$year','$date')";
                 }
                 //echo $sql;
                $insert = mysqli_query($con,$sql);
                
                $html1 = register_content($name,$fest_id);
                sendEmail($html1,'Team Texephyr 2022',$email,$name);

                if($insert){
                    $response['status'] = 1;
                    $response['message'] = 'Registration Sucessfully, Now Sign In';
                }
                else
                {
                    $response['status'] = 0;
                    $response['message'] = 'Registration failed, please try again.';
                }
            }
    }else{
         $response['message'] = 'Please fill all the mandatory fields';
    }
}

// Return response
echo json_encode($response);

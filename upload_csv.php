<?php
include_once("include/all.php");

$festid = '';
$name = '';
if(isset($_SESSION['USER_ID']))
{
    $festid = $_SESSION['USER_ID'];
    $name = get_user_value($festid,'name');
}

$response = array(
    'status' => 0,
    'message' => 'Uploaded Not Sucessfully'
);

if($_FILES['file']['name'] != '' && isset($_FILES['file']['name']))
{
    $sql = "SELECT * FROM datathon_leaderboards WHERE fest_id = '$festid'";
    $res = mysqli_query($con , $sql);
    $count = mysqli_num_rows($res);
    if($count == '5')
    {
         $response['message']='Number of attempts is exceeded!';
    }
    else
    {
        $count = $count + 1;
        if($count <= '5')
        {
            $file_name = $festid.'_'.$count;
        }

        $filename = '';
        $tmp = $_FILES['file']['tmp_name'];
        $type = $_FILES['file']['type'];
        $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $filename = $file_name.'.'.$extension;

                $curl = curl_init();
                $data= array('file' => curl_file_create($tmp,$type,$filename));
                curl_setopt($curl, CURLOPT_URL, "https://datathon-api.herokuapp.com/api/");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:multipart/form-data'));
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                $curl_response = curl_exec($curl);
                curl_close($curl);
                $data = json_decode($curl_response,true);
                pr($data);
                $value = $data['score'];

            if($value == "ERROR")
            {
                $response['message']='Rows and Column is not matching please check your csv file.';
            }
            else
            {
                move_uploaded_file($_FILES["file"]["tmp_name"], CSV_SERVER_PATH.$filename);

                $sql="INSERT INTO `datathon_leaderboards`(`name`, `fest_id`, `f1_score`, `status`) VALUES ('$name','$festid','$value','1')";
                $check = mysqli_query($con,$sql);
                if($check)
                {
                    $response['status'] = 1;
                    $response['message'] = 'Uploaded Sucessfully';
                }

            }
        }
    }
    else
        {
            $response['message']='Uploading Problem!!!';
        }
echo json_encode($response);
?>
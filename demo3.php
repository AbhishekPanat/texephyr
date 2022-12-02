<?php
require_once('library/php-excel-reader/excel_reader2.php');
require_once('library/SpreadsheetReader.php');
require_once('include/all.php');

if(isset($_POST['submit'])){

echo "done";
$mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
if(in_array($_FILES["file"]["type"],$mimes)){
}

$uploadFilePatd = 'upload/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePatd);


    $Reader = new SpreadsheetReader($uploadFilePatd);


    $totalSheet = count($Reader->sheets());


    //echo "You have total ".$totalSheet." sheets";


    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){


      $Reader->ChangeSheet($i);

          //echo"<pre>";
          //print_r($Reader);
          
         
      foreach ($Reader as $Row)
      {
        
         if(!empty($Row))
         {
        
        //echo"<pre>";
         //print_r($Row);
        
        // Labour 
        $name = isset($Row[0]) ? $Row[0] : '';
        $ques = isset($Row[1]) ? $Row[1] : '';
        $option = isset($Row[2]) ? $Row[2] : '';
        $email = isset($Row[3]) ? $Row[3] : '';
        //$date = date('d-m-Y h:i:s');
        //$sql = "INSERT INTO `question_table`(`online_exam_id`, `type`, `question_title`, `answer_option`) VALUES ('5','$type','$ques','$option')";
        //$check = mysqli_query($con,$sql);
        
       //$sql = "INSERT INTO `option_table`(`question_id`, `option_number`, `option_title`) VALUES ('$type','$ques','$option')";
        //$check = mysqli_query($con,$sql);
        
        
        //$sql = "INSERT INTO `algo_round_2`( `name`, `email`) VALUES ('$name','$ques')";
        //$check = mysqli_query($con,$sql);
        // $fest = 'TEX'.rand_num('5');
        
        // $text = explode(" ",$name);
        
        // $pwd = $text[0].'12345';
        
        // $pass = password_hash($pwd, PASSWORD_DEFAULT);
        
        // $order = 'ORDER'.rand_num('8');
        
        //     //$res = mysqli_query($con,"SELECT * FROM users u, receipts r WHERE u.fest_id = r.user_id AND u.name = '$name' AND r.receipt_status = '1'");
        //     $res = mysqli_query($con,"SELECT * FROM users u WHERE u.email = '$email'");
        //     if(mysqli_num_rows($res)>0)
        //     {
        //         while($row = mysqli_fetch_assoc($res))
        //         {
        //             //echo $row['fest_id'].'-'.$name.'<br>';
        //         }
        //     }
        //     else
        //     {
        //         echo $email.'<br>';
        //     }
        
        
            /*$res = mysqli_query($con,"SELECT * FROM users WHERE name = '$name'");
            if(mysqli_num_rows($res)>0)
            {
                while($row = mysqli_fetch_assoc($res)>0)
                {
                    $result = mysqli_query($con,"SELECT * FROM receipts WHERE user_id = '".$row['fest_id']."'");
                    if(mysqli_num_rows($res)>0)
                    {
                        mysqli_query($con,"UPDATE receipts SET receipt_status = '1' WHERE user_id = '".$row['fest_id']."'");
                    }
                    else
                    {
                        $sqls="INSERT INTO `receipts`(`order_id`, `user_id`, `type`, `workshop_id`, `receipt_amount`, `receipt_status`, `receipt_payment_mode`, `receipt_transaction_id`, `receipt_bank_transaction_id`) VALUES ('$order','".$row['fest_id']."','0','','$option','1','CASH','','')";
                
                        $check = mysqli_query($con,$sqls);
                        
                        if($check)
                        {
                            $receipt = mysqli_insert_id($con);
                            $sqlss="INSERT INTO `receipts_event_participant`(`receipt_id`, `event_id`, `user_id`) VALUES ('$receipt','$ques','".$row['fest_id']."')";
                            mysqli_query($con,$sqlss);
                        }
                    }
                }
                
               
            }
            else
            {
                 $sql="INSERT INTO `users`(`name`, `fest_id`, `email`, `user_password`, `phone_no`, `college`, `college_name`, `id_card`, `referal_code`, `year`) VALUES('$name','$fest','$email','$pass','','0','MITWPU','','','0')";
                
                mysqli_query($con,$sql);
                
                $sqls="INSERT INTO `receipts`(`order_id`, `user_id`, `type`, `workshop_id`, `receipt_amount`, `receipt_status`, `receipt_payment_mode`, `receipt_transaction_id`, `receipt_bank_transaction_id`) VALUES ('$order','$fest','0','','$option','1','CASH','','')";
                
                $check = mysqli_query($con,$sqls);
                
                if($check)
                {
                    $receipt = mysqli_insert_id($con);
                    $sqlss="INSERT INTO `receipts_event_participant`(`receipt_id`, `event_id`, `user_id`) VALUES ('$receipt','$ques','$fest')";
                    mysqli_query($con,$sqlss);
                }
            }*/
         }
       }
    }
}
//echo payment_content('Abhishek Panat','Tex99012');
?>

<form method="post" action="demo3.php" enctype="multipart/form-data">
    
    <input type="file" name="file">
    <input type="submit" name="submit" value="submit">
    
</form>
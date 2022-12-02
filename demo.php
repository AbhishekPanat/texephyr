<?php
include("include/all.php");


$r = array();

$res = mysqli_query($con,"SELECT DISTINCT u.referal_code FROM `receipts` r , users u WHERE r.user_id = u.fest_id AND r.receipt_status = '1' AND r.type = '0';");
while($row=mysqli_fetch_assoc($res))
{
   $sql = "SELECT u.referal_code FROM `receipts` r , users u WHERE r.user_id = u.fest_id AND r.receipt_status = '1' AND r.type = '0' AND referal_code = '".$row['referal_code']."';";
   $resul = mysqli_query($con,$sql);
   $count  = mysqli_num_rows($resul);
   
   $r[]= [
        'user'=>$row['referal_code'],
        'count'=>$count,
       ];
}
function sortByAge($a, $b) {
   return $a['count'] < $b['count'];
}
usort($r, 'sortByAge');
?>
<html>
    <head>
  <title>REFERAL COUNT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
    <body>
<div class="container">
  <h2>REFERAL COUNT</h2>          
  <table class="table">
    <thead>
      <tr>
        <th>User</th>
        <th>Count</th>
      </tr>
    </thead>
    <tbody>
        <?php
        foreach($r as $index => $rows)
        {
            ?>
            <tr>
                <td>
                    <?php echo $rows['user']; ?>
                </td>
                <td>
                    <?php echo $rows['count']; ?>
                </td>
            </tr>
            
            <?php
        }
        ?>
    </tbody>
  </table>
</div>
</body>
</html>

<?

//prx($r);


die();

$demo = [
    ["email"=>"nevilp111@gmail.com","txnid"=>"209764873001"],
    ["email"=>"patkar.aditi5803@gmail.com","txnid"=>"209747502788"],
    ["email"=>"devashree.amberkar@gmail.com","txnid"=>"209755612228"],
    ["email"=>"pats75602@gmail.com","txnid"=>"209702950152"],
    ["email"=>"janaishabomanjee@gmail.com","txnid"=>"209821554795"],
    [
        "email"=>"janaishabomanjee@gmail.com",
        "txnid"=>"209821554795"
    ],
    [
        "email"=>"tarushtb@gmail.com",
        "txnid"=>"210277447273"
    ],
    [
        "email"=>"prathamsalunke1103@gmail.com",
        "txnid"=>"210271428708"
    ],
    [
        "email"=>"ishan.rko@outlook.com",
        "txnid"=>"210216317444"
    ],
    [
        "email"=>"kailashbangari200@gmail.com",
        "txnid"=>"210275714447"
    ],
    [
        "email"=>"anujsingh2409@gmail.com",
        "txnid"=>"210247671855"
    ],[
        "email"=>"khileesinghal@gmail.com",
        "txnid"=>"210215129068"
    ],
];




foreach($demo as $key => $value)
{
    $sql="SELECT u.name ,u.email, u.fest_id,r.receipt_id,r.order_id,r.receipt_amount,r.receipt_status FROM `users` u , `receipts_dummy` r WHERE u.fest_id = r.user_id AND r.receipt_status = '0' AND u.email = '".$value['email']."';";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res)>0)
    {
       while($row = mysqli_fetch_assoc($res))
       {
           $receipt = $row['receipt_id'];
           $date = date('Y-m-d h:i:s');
            mysqli_query($con,"UPDATE receipts_dummy SET receipt_transaction_id = '".$value['txnid']."' , receipt_payment_mode = 'UPI', receipt_status='1', receipt_created_by='$date' WHERE receipt_id = '$receipt'");
       }
    }
    else
    {
        echo "not done<br>";
        echo $value['txnid']."<br>";
    }
}
die();
require_once('library/php-excel-reader/excel_reader2.php');
require_once('library/SpreadsheetReader.php');

if(isset($_POST['submit'])){

echo "done";
$mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
if(in_array($_FILES["file"]["type"],$mimes)){


    $uploadFilePatd = 'upload/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePatd);


    $Reader = new SpreadsheetReader($uploadFilePatd);


    $totalSheet = count($Reader->sheets());


    echo "You have total ".$totalSheet." sheets";


    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){


      $Reader->ChangeSheet($i);

          //echo"<pre>";
          //print_r($Reader);
      foreach ($Reader as $Row)
      {
        echo"<pre>";
         print_r($Row);

        
        // Labour 
        $name = isset($Row[0]) ? $Row[0] : '';
        $yaer = isset($Row[1]) ? $Row[1] : '';
        $dept = isset($Row[2]) ? $Row[2] : '';
        $ref = isset($Row[3]) ? $Row[3] : '';
        //$date = date('d-m-Y h:i:s');
        $sql = "INSERT INTO `referal_users`(`ru_name`, `ru_year`, `ru_depart`, `ru_referal_code`, `ru_status`) VALUES ('$name','$yaer','$dept','$ref','1')";
        $check = mysqli_query($con,$sql);
       }
    }
}
}
//echo payment_content('Abhishek Panat','Tex99012');
?>

<form method="post" action="demo.php" enctype="multipart/form-data">
    
    <input type="file" name="file">
    <input type="submit" name="submit" value="submit">
    
</form>
<?php 
    include('include/all.php');
    
    $array = array();
    $farray = array();
    $sql = "SELECT DISTINCT(r.receipt_id), r.order_id, r.user_id, u.name, u.college_name, u.phone_no, u.email, r.receipt_amount, r.receipt_payment_mode, r.receipt_transaction_id , r.receipt_created_by FROM receipts r INNER JOIN users u ON u.fest_id = r.user_id and r.receipt_status = '1' and r.type = '0' ORDER BY r.receipt_id DESC;";
    $res = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($res))
    {
        $receipt = $row['receipt_id'];
        $events = getReceiptEvents($receipt);
        pr($events);
        if(!in_array("1", $events))
        {
            array_push($array,$row);
        }
        else
        {
            
        }
    }
    
    foreach($array as $sortarray)
    {
        $receipt = $sortarray['receipt_id'];
        $events = getReceiptEvents($receipt);
        pr($events);
        if(!in_array("2", $events))
        {
            
        }
        else
        {
            array_push($farray,$sortarray);
        }
    }
echo count($farray);
prx($farray);


?>
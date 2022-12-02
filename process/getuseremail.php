<?php 
include_once("../include/all.php");

$type=$_REQUEST['type'];

if($type == 'user')
{
	$festid = safe($_REQUEST['festid']);
	$output="";
	$res = mysqli_query($con,"SELECT * FROM users where fest_id='$festid'");

	if(mysqli_num_rows($res) > 0)
	{
		$output = "already";
	}
	else
	{
		$output="error";
	}

}
else if($type == 'extrauser')
{
	$festid = safe($_REQUEST['festid']);
	$event = safe($_REQUEST['event']);
	$output="";
	$check = 0;
	if(isset($_SESSION['event_list']))
	{
		foreach($_SESSION['event_list'] as $key => $value )
		{
			if($value['event'] == $event)
			{
				if(in_array($festid,$value['users']))
				{
					$check = 1;
				}
				else
				{
					$check = 0;
				}
			}
		}
		if($check == 1)
		{
			$output="exist";
		}
		else
		{
			$res = mysqli_query($con,"SELECT * FROM users where fest_id='$festid'");

			if(mysqli_num_rows($res) > 0)
			{
				$output = "already";
			}
			else
			{
				$output="error";
			}
		}
	}
}
else if ($type == "getcartdetail") {
	$output = 0;
	if(isset($_SESSION['event_list']))
	{
		$output = count($_SESSION['event_list']);
	}
}
else if ($type == "getcart") {
	$output = '';
	if(!isset($_SESSION['event_list']) || empty($_SESSION['event_list']))
	{
															
        $output .='<center><h2>Basket Is Empty</h2></center>
        <center><h4>Just Add Events</h4></center>';
    }
	else
	{
		foreach($_SESSION['event_list'] as $key => $value){
		    
		    $mit = get_event_value($value['event'],'base_price');
            $nonmit = get_event_value($value['event'],'fees');
    $amount = (isset($_SESSION['USER_ID']))?((get_user_value($_SESSION['USER_ID'],'college')=="0")?($mit):($nonmit)):('10000');
																		
		$output .='<div class="schedule-listing" style="background: none !important;">
		    <div class="schedule-item">

		    <div class="sc-pic">
		    <img src="'.IMAGE_PATHs.get_event_value($value['event'],'cover_img').'" class="img-circle" alt="">
		    </div>

		    <div class="sc-name">
		    <button class="btn btn-custom text-white" id="'.$value['event'].'" type="button" onclick="remove(this.id);">Remove</button>
		    </div>
		    <div class="sc-info">
		    <h3>'.get_event_value($value['event'],'title').'</h3>
		    <p>'.get_event_value($value['event'],'introduction').'</p>
		    </div>
		     <div class="pric" style="float:right;padding: 10px 90px 10px 10px;">

		       <h4><b>₹ '.$amount.'</b></h4>
		     </div>
		       <div class="clearfix"></div>
		   </div>
	</div>';
																	
		}
    	$output .='<a href="payment/pgRedirect.php" class="btn btn-custom text-white m-5">Proceed for Payment</a>';
    }
                                                      
}
else if ($type == "removeUser"){
    
    $event = safe($_POST['event']);
    $receipt = safe($_POST['receipt']);
    $user = safe($_POST['user']);
    
    $sql="delete from receipts_event_participant where receipt_id='$receipt' and event_id='$event' and user_id='$user' ";
    if(mysqli_query($con,$sql))
    {
        $output="success";
    }
    else
    {
        $output="error";
    }
}
else if ($type == "addUser"){
    
    $event = safe($_POST['event']);
    $receipt = safe($_POST['receipt']);
    $user = safe($_POST['user']);
    
    $sql="INSERT INTO `receipts_event_participant`(`receipt_id`, `event_id`, `user_id`) VALUES ('$receipt','$event','$user')";
    if(mysqli_query($con,$sql))
    {
        $output="success";
    }
    else
    {
        $output="error";
    }
}
else
{
	$email = safe($_REQUEST['email']);
	$output="";
	$res = mysqli_query($con,"SELECT * FROM users where email='$email'");

	if(mysqli_num_rows($res) > 0)
	{
		$output = "already";
	}
	else
	{
		$output="new";
	}
}



echo $output;
?>
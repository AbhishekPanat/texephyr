<?php
include 'include/all.php';

//pr(array_filter($_POST['users']));
//prx($_POST);

$users = [];
$event=safe($_POST['event']);
$type=safe($_POST['type']);
$output = '';

if($type=="add")
{
	$users=array_filter($_POST['users']);
	if(isset($_SESSION['event_list']))
	{
		$myitem=array_column($_SESSION['event_list'], 'event');
		if(in_array($event, $myitem))
		{
			$output = 'Added';
		}
		else{
			$count_event_list = count($_SESSION['event_list']);
			$_SESSION['event_list'][$count_event_list] = array('event' => $event , 'users' => array_values($users));
			$output='success';
			/*alertredirect('Event is added successfully!!!','event.php');*/	
		}
		
	}
	else
	{
		$_SESSION['event_list'][0] = array('event' => $event , 'users' => array_values($users));
		$output='success';
		//print_r($_SESSION['event_list']);
		/*alertredirect('Event is added successfully!!!','event.php');*/
		
	}
}
else if($type=="adds")
{
	$users=$_POST['users'];
	if(isset($_SESSION['event_list']))
	{
		$myitem=array_column($_SESSION['event_list'], 'event');
		if(in_array($event, $myitem))
		{
			$output = 'Added';
		}
		else{
			$count_event_list = count($_SESSION['event_list']);
			$_SESSION['event_list'][$count_event_list] = array('event' => $event , 'users' => array($users));
			$output='success';
			/*alertredirect('Event is added successfully!!!','event.php');*/	
		}
		
	}
	else
	{
		$_SESSION['event_list'][0] = array('event' => $event , 'users' => array($users));
		$output='success';
		//print_r($_SESSION['event_list']);
		/*alertredirect('Event is added successfully!!!','event.php');*/
		
	}
}
else if($type=="addmul")
{
	$users=$_POST['users'];
	$user1=$_POST['user1'];
	$user2=$_POST['user2'];
	$user3=$_POST['user3'];

	if($user3 != '')
	{
		if(isset($_SESSION['event_list']))
		{
			$myitem=array_column($_SESSION['event_list'], 'event');
			if(in_array($event, $myitem))
			{
				$output = 'Added';
			}
			else{
				$count_event_list = count($_SESSION['event_list']);
				$_SESSION['event_list'][$count_event_list] = array('event' => $event , 'users' => array($users,$user1,$user2,$user3));
				$output='success';
				/*alertredirect('Event is added successfully!!!','event.php');*/	
			}
			
		}
		else
		{
			$_SESSION['event_list'][0] = array('event' => $event , 'users' => array($users,$user1,$user2,$user3));
			$output='success';
			//print_r($_SESSION['event_list']);
			/*alertredirect('Event is added successfully!!!','event.php');*/
			
		}
	}
	else if($user2 != '')
	{
		if(isset($_SESSION['event_list']))
		{
			$myitem=array_column($_SESSION['event_list'], 'event');
			if(in_array($event, $myitem))
			{
				$output = 'Added';
			}
			else{
				$count_event_list = count($_SESSION['event_list']);
				$_SESSION['event_list'][$count_event_list] = array('event' => $event , 'users' => array($users,$user1,$user2));
				$output='success';
				/*alertredirect('Event is added successfully!!!','event.php');*/	
			}
			
		}
		else
		{
			$_SESSION['event_list'][0] = array('event' => $event , 'users' => array($users,$user1,$user2));
			$output='success';
			//print_r($_SESSION['event_list']);
			/*alertredirect('Event is added successfully!!!','event.php');*/
			
		}
	}
	else if($user1 != '')
	{
		if(isset($_SESSION['event_list']))
		{
			$myitem=array_column($_SESSION['event_list'], 'event');
			if(in_array($event, $myitem))
			{
				$output = 'Added';
			}
			else{
				$count_event_list = count($_SESSION['event_list']);
				$_SESSION['event_list'][$count_event_list] = array('event' => $event , 'users' => array($users,$user1));
				$output='success';
				/*alertredirect('Event is added successfully!!!','event.php');*/	
			}
			
		}
		else
		{
			$_SESSION['event_list'][0] = array('event' => $event , 'users' => array($users,$user1));
			$output='success';
			//print_r($_SESSION['event_list']);
			/*alertredirect('Event is added successfully!!!','event.php');*/
			
		}
	}
	else
	{
		if(isset($_SESSION['event_list']))
		{
			$myitem=array_column($_SESSION['event_list'], 'event');
			if(in_array($event, $myitem))
			{
				$output = 'Added';
			}
			else{
				$count_event_list = count($_SESSION['event_list']);
				$_SESSION['event_list'][$count_event_list] = array('event' => $event , 'users' => array($users));
				$output='success';
				/*alertredirect('Event is added successfully!!!','event.php');*/	
			}
			
		}
		else
		{
			$_SESSION['event_list'][0] = array('event' => $event , 'users' => array($users));
			$output='success';
			//print_r($_SESSION['event_list']);
			/*alertredirect('Event is added successfully!!!','event.php');*/
			
		}
	}

	
}
else if($type == "remove")
{
	$user=$_POST['user'];
	$counter=0;
	foreach ($_SESSION['event_list'] as $key => $value) {

		if($value['event'] == $event )
		{

			$count = count($value['users']);

            for($i=0;$i<$count;$i++)
              {
              	if($value['users'][$i] == $user)
				{
					//pr( $value['users']);
					unset($_SESSION['event_list'][$counter]['users'][$i]);	
					$_SESSION['event_list'][$counter]['users'] = array_values($_SESSION['event_list'][$counter]['users']);
					//pr($_SESSION['event_list']);
					//alertredirect('Participant Is Removed','basket.php');
					$output = "success";
				}
              }
			
		}
	$counter++;}

}
else if($type == "adduser")
{
	$users=array_filter($_POST['users']);
	foreach ($_SESSION['event_list'] as $key => $value) {

		if($value['event'] == $event )
		{
		    foreach($users as $k => $v)
		    {
		        array_push($_SESSION['event_list'][$key]['users'],$v);
		    }
			//pr($_SESSION['event_list']);
			$output = "success";
		}
	}
}
else if($type == "addbasket")
{
	$users=$_POST['users'];
	foreach ($_SESSION['event_list'] as $key => $value) {

		if($value['event'] == $event )
		{
			$count = count($users);
			/*echo $_SESSION['event_list'][$key]['users'];*/
			for ($i=0; $i < $count ; $i++) { 

				array_push($_SESSION['event_list'][$key]['users'],$users[$i]);				
			
			}

			alertredirect('Participant Is Added','basket.php');
			//pr($_SESSION['event_list']);
		}
	}
}
else if($type == "eventremove")
{
	foreach ($_SESSION['event_list'] as $key => $value) {
		if($value['event'] == $event)
		{
			unset($_SESSION['event_list'][$key]);
			$_SESSION['event_list'] = array_values($_SESSION['event_list']); 
/*			pr($_SESSION['event_list']);*/
			$output='success';			
		}
	}
}
echo $output;
?>
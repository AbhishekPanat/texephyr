<?php 

global $con;

function rand_num($digit=0){
    $str=str_shuffle("1234567890123456789012345678901234567890123456789012345678901234567890");
    return $str = substr($str,0,$digit);
}

function pr($arr)
{
	echo "<pre>";
	print_r($arr);
}
function prx($arr)
{
	echo "<pre>";
	print_r($arr);
	die;
}

function safe($string)
{
	global $con;
    $string = mysqli_real_escape_string($con,$string);
    return $string;
}

function redirect($link)
{
  ?>
  <script>
    window.location.href='<?php echo $link ?>';
  </script>
  <?php
  die();
}
function alertredirect($msg,$link)
{
	?>
	<script>
		alert('<?php echo $msg ?>');
		window.location.href='<?php echo $link ?>';
	</script>
	<?php
	die();
}
 // --------------- Events ----------------------------
function get_event_list($department='')
{
    global $con;
    $sqls = "SELECT * FROM event ";
    if($department!='')
    {
        $sqls .="WHERE department = '$department' and status='1'";
    }
	$res=mysqli_query($con,$sqls);
	$datas=array();
	if(mysqli_num_rows($res)>0)
	{
	    while($row = mysqli_fetch_assoc($res))
	    {
	        $datas[]=$row;    
	    }
	}
	return $datas;
}

function get_event($eventid='')
{
    global $con;
    $sqls = "SELECT * FROM event ";
    if($eventid!='')
    {
        $sqls .="WHERE event_ID = '$eventid' ";
    }
	$res=mysqli_query($con,$sqls);
	$datas=array();
	if(mysqli_num_rows($res)>0)
	{
	    while($row = mysqli_fetch_assoc($res))
	    {
	        $datas[]=$row;    
	    }
	}
	return $datas;
}
function get_event_value($eventid='',$field='')
{
    global $con;
    $sqls = "SELECT * FROM event ";
    if($eventid!='')
    {
        $sqls .="WHERE event_ID = '$eventid' ";
    }
	$res=mysqli_query($con,$sqls);
	$datas="";
	if(mysqli_num_rows($res)>0)
	{
	    while($row = mysqli_fetch_assoc($res))
	    {
	        $datas=$row[$field];    
	    }
	}
	return $datas;
}
// ---------------------- Workshop ---------------------------------------------
function get_workshop_list()
{
    global $con;
    $sqls = "SELECT * FROM workshop where status='1'";
	$res=mysqli_query($con,$sqls);
	$datas=array();
	if(mysqli_num_rows($res)>0)
	{
	    while($row = mysqli_fetch_assoc($res))
	    {
	        $datas[]=$row;    
	    }
	}
	return $datas;
}

function get_workshop_value($workid='',$field='')
{
    global $con;
    $sqls = "SELECT * FROM workshop ";
    if($workid!='')
    {
        $sqls .="WHERE work_id = '$workid' ";
    }
	$res=mysqli_query($con,$sqls);
	$datas="";
	if(mysqli_num_rows($res)>0)
	{
	    while($row = mysqli_fetch_assoc($res))
	    {
	        $datas=$row[$field];    
	    }
	}
	return $datas;
}


// ---------------------- Users ---------------------------------------------
function get_user_value($userid='',$field='')
{
    global $con;
    $sqls = "SELECT * FROM users ";
    if($userid!='')
    {
        $sqls .="WHERE fest_id = '$userid' ";
    }
	$res=mysqli_query($con,$sqls);
	$datas="";
	if(mysqli_num_rows($res)>0)
	{
	    while($row = mysqli_fetch_assoc($res))
	    {
	        $datas=$row[$field];    
	    }
	}
	return $datas;
}

// ---------------------- RECEIPT ---------------------------------------------
function get_receipt_list($userid='',$type='')
{
    global $con;
    $sqls = "SELECT * FROM receipts ";
    if($userid!='')
    {
        $sqls .="WHERE user_id = '$userid' and type='$type' and receipt_status = '1' ";
    }
	$res=mysqli_query($con,$sqls);
	$datas=array();
	if(mysqli_num_rows($res)>0)
	{
	    while($row = mysqli_fetch_assoc($res))
	    {
	        $datas[]=$row;    
	    }
	}
	return $datas;
}

function get_receipt_event_list($userid='')
{
    global $con;
    $sqls = "SELECT * FROM receipts_events ";
    if($userid!='')
    {
        $sqls .="WHERE receipts_id = '$userid'";
    }
    //echo $sqls;
	$res=mysqli_query($con,$sqls);
	$datas=array();
	if(mysqli_num_rows($res)>0)
	{
	    while($row = mysqli_fetch_assoc($res))
	    {
	        $datas[]=$row;    
	    }
	}
	return $datas;
}

// ---------------------- Contact Us Mail Content ---------------------------------------------

function contact_content($name='')
{
    $html='<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; chaRs. et=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-Rs. pace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectoRs. ] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 15px;" bgcolor="#3E7399">
                           
                            <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;"
                                class="mobile-hide">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"
                                    style="max-width:300px;">
                                    <tr>
                                        <td align="center" valign="top"
                                            style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                            <img style="height: 3rem;" src="https://www.texephyr.in/images-event/Logotex.png" alt="Tex Logo" >
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;"
                            bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="max-width:600px;">
                                <tr>
                                    <td align="center"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                        <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png"
                                            width="125" height="120" style="display: block; border: 0px;" /><br>
                                        <h2
                                            style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                            Greetings From Team Texephyr </h2>
                                            
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                   <tr>
                        <td align="center" style="padding: 0px 35px 0px 35px; background-color: #ffffff;"
                            bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="max-width:600px;">
                                <tr>
                                    <td align="left"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                            <p
                                            style="font-size: 15px; font-weight: 800; color: #333333; margin: 0;">
                                            Hey! '.$name.',</p>
                                            <p
                                            style="font-size: 14px; line-height: 20px; color: #333333;">
                                            Thanks for contacting us. We will get back to you soon.<br>
                                            Hope to see you at the fest!<br>
                                            Regards,<br>
                                            Team Texephyr
                                            </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="max-width:600px;">
                                <tr>
                                    <td align="center"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                                        <p
                                            style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">
                                            To Know More Details Visit <a href="https://texephyr.in" target="_blank"
                                                style="color: #777777;">Texephyr Website</a>. </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>';
return $html;
}

// ---------------------- Register Mail Content ---------------------------------------------

function register_content($name='',$festid='')
{
    $html='<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; chaRs. et=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-Rs. pace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectoRs. ] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 15px;" bgcolor="#101010">
                           
                            <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;"
                                class="mobile-hide">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"
                                    style="max-width:300px;">
                                    <tr>
                                        <td align="center" valign="top"
                                            style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                            <img style="height: 3rem;" src="https://www.texephyr.in/images-event/Logotex.png" alt="Tex Logo" >
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 0px 35px 20px 35px; background-color: #ffffff;"
                            bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="max-width:600px;">
                                <tr>
                                    <td align="center"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                        <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png"
                                            width="125" height="120" style="display: block; border: 0px;" /><br>
                                        <h2
                                            style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                            Greetings From Team Texephyr </h2>
                                            <h2
                                            style="font-size: 15px; font-weight: 800; line-height: 52px; color: #333333; margin: 0;">
                                            Hello! '.$name.', Thanks For Registering </h2>
                                            <p
                                            style="font-size: 14px; font-weight: 800; line-height: 20px; color: #333333;">
                                            Your Fest Id is <span style="font-size: 16px;color: #EC167F;">'.$festid.'</span>
                                            </p>
                                            <p
                                            style="font-size: 14px; font-weight: 800; line-height: 20px; color: #333333;">
                                            Congrats!!! You are now officially a part of TEXEPHYR 2022.
                                            </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                   

                    <tr>
                        <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="max-width:600px;">
                                <tr>
                                    <td align="center"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                                        <p
                                            style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">
                                            To Know More Details Visit <a href="https://texephyr.in" target="_blank"
                                                style="color: #777777;">Texephyr Website</a>. </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>';
return $html;
}

// ---------------------- Payment Mail Content ---------------------------------------------

function payment_content($name='',$festid='')
{
    $html='<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; chaRs. et=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-Rs. pace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectoRs. ] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
    <div
        style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
        For what reason would it be advisable for me to think about business content? That might be little bit risky to
        have crew member like them.
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 15px;" bgcolor="#101010">
                           
                            <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;"
                                class="mobile-hide">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"
                                    style="max-width:300px;">
                                    <tr>
                                        <td align="center" valign="top"
                                            style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                            <img style="height: 3rem;" src="https://www.texephyr.in/images-event/Logotex.png" alt="Tex Logo" >
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 0px 35px 20px 35px; background-color: #ffffff;"
                            bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="max-width:600px;">
                                <tr>
                                    <td align="center"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                        <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png"
                                            width="125" height="120" style="display: block; border: 0px;" /><br>
                                        <h2
                                            style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                            Thank You For Your Payment! </h2>
                                            <h2
                                            style="font-size: 16px; font-weight: 600; line-height: 56px; color: #333333; margin: 0;">
                                            Your Order id is ORDER123213123 </h2>
                                            <h2
                                            style="font-size: 16px; font-weight: 600; color: #333333; margin: 0;">
                                            Your Transaction id is ORDER123213123 </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                        <p
                                            style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                             </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" bgcolor="#eeeeee"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                    Events </td>
                                                <td width="25%" align="left" bgcolor="#eeeeee"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">
                                                    Price </td>
                                            </tr>
                                            <tr>
                                                <td width="75%" align="left"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                                    Purchased Item (1) </td>
                                                <td width="25%" align="left"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">
                                                    Rs. 100.00 </td>
                                            </tr>
                                            <tr>
                                                <td width="75%" align="left"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                    Shipping + Handling </td>
                                                <td width="25%" align="left"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                    Rs. 10.00 </td>
                                            </tr>
                                            <tr>
                                                <td width="75%" align="left"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                    Sales Tax </td>
                                                <td width="25%" align="left"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">
                                                    Rs. 5.00 </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                                    TOTAL </td>
                                                <td width="25%" align="left"
                                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">
                                                    Rs. 115.00 </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                   

                    <tr>
                        <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="max-width:600px;">
                                <tr>
                                    <td align="left"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                                        <p
                                            style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">
                                            To Know More Details Visit Your Profile On <a href="https://texephyr.in/profile" target="_blank"
                                                style="color: #777777;">Texephyr Website</a>. </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>';
return $html;
}

// ---------------------- Workshop Mail Content ---------------------------------------------

function workshop_content($name='',$orderid='',$txnid='',$amtid='')
{
    $html='<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; chaRs. et=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-Rs. pace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectoRs. ] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 15px;" bgcolor="#101010">
                           
                            <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;"
                                class="mobile-hide">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%"
                                    style="max-width:300px;">
                                    <tr>
                                        <td align="center" valign="top"
                                            style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                            <img style="height: 3rem;" src="https://www.texephyr.in/images-event/Logotex.png" alt="Tex Logo" >
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 0px 35px 20px 35px; background-color: #ffffff;"
                            bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="max-width:600px;">
                                <tr>
                                    <td align="center"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                                        <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png"
                                            width="125" height="120" style="display: block; border: 0px;" /><br>
                                        <h2
                                            style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                            Thank You For Your Payment </h2>
                                            <h2
                                            style="font-size: 15px; font-weight: 800; line-height: 52px; color: #333333; margin: 0;">
                                            Hello! '.$name.', Thanks For Payment </h2>
                                            <p
                                            style="font-size: 14px; font-weight: 800; line-height: 20px; color: #333333;">
                                            Your Order Id is <span style="font-size: 16px;color: #EC167F;">'.$orderid.'</span>
                                            </p>
                                            <p
                                            style="font-size: 14px; font-weight: 800; line-height: 20px; color: #333333;">
                                            Your Transaction Id is <span style="font-size: 16px;color: #EC167F;">'.$txnid.'</span>
                                            </p>
                                            <p
                                            style="font-size: 14px; font-weight: 800; line-height: 20px; color: #333333;">
                                            Your Amount is <span style="font-size: 16px;color: #EC167F;">'.$amtid.'</span>
                                            </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                   

                    <tr>
                        <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
                                style="max-width:600px;">
                                <tr>
                                    <td align="center"
                                        style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                                        <p
                                            style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">
                                            To Know More Details Visit <a href="https://texephyr.in" target="_blank"
                                                style="color: #777777;">Texephyr Website</a>. </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>';
return $html;
}

// ---------------------- Mail Send Function ---------------------------------------------

function sendEmail($html1='',$subject='',$to_email='',$to_name='')
{
    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom( FROM_EMAIL , FROM_NAME );
    $email->setSubject($subject);
    $email->addTo($to_email, $to_name);
    //$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
    $email->addContent(
        "text/html", $html1
    );
    $sendgrid = new \SendGrid( SENDGRID_API_KEY );
    try {
        $response = $sendgrid->send($email);
        return $response->statusCode();
    } catch (Exception $e) {
        echo "Caught exception: ". $e->getMessage() ."\n";
    }
}


// ---------------------- Check User Has Taken A Event OR Not ---------------------------------------------

function check_user_event($event='',$user='')
{
    global $con;
    $sqls = "SELECT * FROM `receipts` a, `receipts_event_participant` b WHERE a.receipt_id = b.receipt_id and a.receipt_status = '1' and b.event_id = '$event' and b.user_id = '$user'";
	$res=mysqli_query($con,$sqls);
	$datas="false";
	if(mysqli_num_rows($res)>0)
	{
	    $datas="true";    
	}
	return $datas;
}

// ---------------------- Get Participants ---------------------------------------------

function get_participants($event_id='',$receipt_id='')
{
    global $con;
    $sqls = "SELECT * FROM receipts_event_participant ";
    if($event_id!='')
    {
        $sqls .="WHERE event_id ='$event_id' and receipt_id='$receipt_id'";
    }
	$res=mysqli_query($con,$sqls);
	$datas=array();
	if(mysqli_num_rows($res)>0)
	{
	    while($row = mysqli_fetch_assoc($res))
	    {
	        $datas[]=$row['user_id'];    
	    }
	}
	return $datas;
}


if(isset($_SESSION['USER_ID']))
{
    function checkUSERS($userid='')
    {
        return $_SESSION['USER_ID'] != $userid;
    }
}

function Encrypted($string=''){
    
    $ciphering = "AES-128-CTR";
  
    // Use OpenSSl Encryption method
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
  
    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '1234567891011121';
  
    // Store the encryption key
    $encryption_key = "lbwfImpbj49D74C";
    
    $encryption = openssl_encrypt($string, $ciphering,
            $encryption_key, $options, $encryption_iv);
            
    return $encryption;        
}

function Decrypted($encryption=''){
    
    $ciphering = "AES-128-CTR";
  
    // Use OpenSSl Encryption method
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
  
    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '1234567891011121';
  
    // Store the encryption key
    $encryption_key = "lbwfImpbj49D74C";
    
    $encryption = openssl_encrypt($encryption, $ciphering,
            $encryption_key, $options, $encryption_iv);
            
    return $encryption;        
}


function vehicle_fuel($catid='',$field='')
{
    global $con;
    $sqls = "SELECT * FROM tbl_master_vehicle_fuel ";
    if($catid!='')
    {
        $sqls .="WHERE id ='$catid'";
    }
	$res=mysqli_query($con,$sqls);
	$datas="";
	if(mysqli_num_rows($res)>0)
	{
	    while($row = mysqli_fetch_assoc($res))
	    {
	        $datas=$row[$field];    
	    }
	}
	return $datas;
}

function getReceiptEvents($catid='',$field='')
{
    global $con;
    $sqls = "SELECT * FROM receipts_events ";
    if($catid!='')
    {
        $sqls .="WHERE receipts_id ='$catid'";
    }
	$res=mysqli_query($con,$sqls);
	$datas=array();
	if(mysqli_num_rows($res)>0)
	{
	    while($row = mysqli_fetch_assoc($res))
	    {
	        $datas[]=$row['event_id'];    
	    }
	}
	return $datas;
}


?>
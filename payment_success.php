<?php 
	include('header.php');
?>
            <!-- section begin -->
            <section id="section-register">
                <div class="wm wm-border dark wow fadeInDown">Payment</div>
                <div class="row">
                	<div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                		<h1>Payment Status</h1>
                        <div class="separator"><span><i class="fa fa-square"></i></span></div>
                        <div class="spacer-single"></div>
                	</div>
                </div>
                <div class="row">
                	 <div class="col-md-8 offset-md-2 mt-3 wow fadeInUp">
                	     <?php  
                	        if(isset($_POST['ORDER_STATUS']))
                	        {
                	            $STATUS = safe($_POST['ORDER_STATUS']);
                	            $ORDERID = safe($_POST['ORDERID']);
                	            $TXNID = safe($_POST['TXNID']);
                	            $TXNAMOUNT = safe($_POST['TXNAMOUNT']);
                	            $RESPMSG = safe($_POST['RESPMSG']);
                	            
                	            if($STATUS == "SUCCESS")
                	            {
                	                $TXNDATE = safe($_POST['TXNDATE']);
                	                $BANKTXNID = safe($_POST['BANKTXNID']);
                	                $GATEWAYNAME = safe($_POST['GATEWAYNAME']);
                	                
                	                ?>
                	                    <div class="text-center" style="display: flex;flex-direction: column;gap: 1rem;">
                                	        <h1>Your transaction is successfully done !!!</h1>
                                	 	    <h2 style="color:var(--primary-color-1);margin-bottom:0;">Thank you for your payment</h2>
                                	 	    <h6>Your order # is: <?php echo $ORDERID; ?></h6>
                                	 	    <h6>Your transaction # is: <?php echo $TXNID; ?></h6>
                                	 	    <h6>Your amount # is: <?php echo $TXNAMOUNT; ?></h6>
                                	 	    <p>You will receive an confirmation email with details of your payment or you can check your profile.</p>
                                	 	    <a href="/" class="">Back to home</a>
                                	     </div>
                	                <?php 
                	                $sql = "UPDATE `receipts` SET `receipt_status`='1',`receipt_payment_mode`='$GATEWAYNAME',`receipt_transaction_id`='$TXNID' , `receipt_bank_transaction_id` = '$BANKTXNID' , `receipt_created_by` = '$TXNDATE' WHERE order_id = '$ORDERID' ";
                	               $check = mysqli_query($con,$sql);
                	               
                	               if(isset($_SESSION['event_list'])){
                	                    if($check){unset($_SESSION['event_list']);}
                	               }
                	               //require 'Sheets API/data.php';
                	               //require 'Sheets API/user.php';
                	               require 'Sheets API/event_detail.php';
                	               require 'Sheets API/event_users.php';
                	               require 'Sheets API/events_count.php';
                	               
                	               $name = get_user_value($_SESSION['USER_ID'],'name');
                	               $email = get_user_value($_SESSION['USER_ID'],'email');
                	               
                	               $html = workshop_content($name,$ORDERID,$TXNID,$TXNAMOUNT);
                	               //sendEmail($html,'Team Texephyr 2022',$email,$name);
                	            }
                	            else
                	            {
                	                ?>
                	                <div class="text-center" style="display: flex;flex-direction: column;gap: 1rem;">
                            	        <h1>Your transaction is failed !!!</h1>
                            	 	    <h6>Your order # is: <?php echo $ORDERID; ?></h6>
                                	 	<h6>Your transaction # is: <?php echo $TXNID; ?></h6>
                            	 	    <p><?php echo $RESPMSG; ?></p>
                            	 	    <a href="/" class="">Back to home</a>
                            	    </div>
                	                <?php
                	            }
                	            
                	        }
                	        else
                	        {
                	            redirect('/');   
                	        }
                	     ?>
                	     
                	     
                	 </div>
                </div>
            </section>
            <!-- section close -->
<?php 
	include('footer.php');
?>
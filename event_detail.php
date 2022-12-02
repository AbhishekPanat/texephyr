<?php
	include('header.php');

	if(isset($_GET['id']))
	{
		$event = get_event(safe($_GET['id']));	
	}
	//pr($event);
	
?>
<style>
        .de_tab_content{
            color: white;
        }
        .compi-title{
        font-family: 'Red Hat Display',Arial, Helvetica, sans-serif;;
        letter-spacing: 1px;
        font-size: 2.5vw;
        margin-top: 1vw;
        color:white;
        }
        .money{
            margin-top: -0.7vw;
            font-family: 'Red Hat Display',Arial, Helvetica, sans-serif;;
            letter-spacing: 1px;
            font-size: 2vw;
            color: white;
        }
        .amt{
            color:white;
        }
        .compi-indi-img{
        width:300px;
        height:300px;
        }
        .com-btn{
        width:300px;
        font-family: 'Red Hat Display',Arial, Helvetica, sans-serif !important;
        font-size: 20px;
        letter-spacing: 1px;
        height:35px;
        display:flex;
        align-items:center;
        justify-content:center;
        background: rgba(255,255,255,0.1);
        border-radius: 5px;
        border: 0.5px solid white;
        color: white;
      }
      .com-btn:hover{
          color: white;
          text-decoration: none;
          background: rgba(255,255,255,0.2);
      }
     
    </style>
<section id="section-schedule" aria-label="section-services-tab" data-bgimage="url(images-event/bg/1.jpg) fixed center no-repeat">
      <div  style="margin-top: 5vw;" class="container">

          <div  class="row">
              <div class="col-12 col-lg-4">
                  <img style="border-radius: 5px;border: 1px solid white;" class="compi-indi-img" src="<?php echo IMAGE_PATHs.$event[0]['cover_img']; ?>" alt="Image Processing Image">
                  
                  
                  
                  <?php
                    if(check_user_event(safe($_GET['id']),$_SESSION['USER_ID']) === "false"){ 
                        if($event[0]['max_participants'] > 1){ 
                  ?>
                  <a href="participants.php?id=<?php echo safe($_GET['id']); ?>" class="btn btn-line mt-3" style="padding: 10px 90px 10px 90px;">Add to basket</a>
                  <?php }else{ ?>
                  <button class="btn btn-line mt-3" style="padding: 10px 90px 10px 90px;" id="addtobasket">Add to basket</button>
                  <?php 
                        }
                    }
                    else
                    {
                        ?>
                    <a href="profile" class="btn btn-line mt-3" style="padding: 10px 90px 10px 90px;">View Profile</a>    
                        <?php
                    }
                  ?>
                <!--   <a style="border: 0;" class=" com-btn mt-3 mb-3" target="_blank" href="">Problem Statement</a>
                  <a style="font-size: 18px;" class="text-white " target="_blank" href="">How to <span style="font-weight: 600;">Register?</span> </a> -->
              </div>
              <div class="col-12 col-lg-8">

                  <h2 class="compi-title"><?php echo $event[0]['title']; ?></h2><br>
                  <h2 class="money">INR <span class="amt"><?php 
                  
                  $mit = $event[0]['base_price']; 
                  $nonmit = $event[0]['fees']; 
                  echo (isset($_SESSION['USER_ID']))?((get_user_value($_SESSION['USER_ID'],'college')=="0")?($mit):($nonmit)):($mit)
                  ?></span> </h2><h2 class="money ml-5 mr-4">DATE</h2><span class="amt" style="font-size:24px;"><?php echo $event[0]['event_date']; ?></span>
                  <div class="de_tab tab_style_4 text-center">
                            <ul class="de_nav de_nav_dark" style="display: block;border: solid 1px var(--primary-color-1);background-color: #202020;">
                                <li class="active" data-link="#section-services-tab">
                                    <h3><span style="font-size: 16px !important;">ABOUT</span></h3>
                                </li>
                                <li data-link="#section-services-tab">
                                    <h3><span style="font-size: 16px !important;">STRUCTURE</span></h3>
                                </li>
                                <li data-link="#section-services-tab">
                                    <h3><span style="font-size: 16px !important;">RULES</span></h3>
                                </li>
                                <li data-link="#section-services-tab">
                                    <h3><span style="font-size: 16px !important;">ELIGIBILITY CRITERIA</span></h3>
                                </li>
                            </ul>

                            <div class="de_tab_content text-left">

                                <div id="tab1" class="tab_single_content dark">
                                    <div class="row">
                                        <div class="col-md-11 ml-3" style="background-color: #0000008f;">
                                        	<p><?php echo $event[0]['introduction']; ?> </p>
                                        </div>
                                    </div>
                                </div>

                                <div id="tab2" class="tab_single_content dark">
                                    <div class="row">
                                        <div class="col-md-11 ml-3" style="background-color: #0000008f;">
                                            <?php 
                                                $sql="select * from round where event_ID = '".safe($_GET['id'])."'";
                                                $res=mysqli_query($con,$sql);
                                                while($row=mysqli_fetch_assoc($res))
                                                //pr($row);
                                                {
                                                    ?>
                                                    <p> <span style="font-family: 'Red Hat Display',Arial, Helvetica, sans-serif;letter-spacing: 1px;font-size: 20px !important;"><?php echo $row['round_title']; ?>: </span> <br>
					                                <?php echo $row['round_detail']; ?></p>
                                                    <?php
                                                }
                                            ?>
					                          
                                        </div>
                                    </div>
                                </div>

                                <div id="tab3" class="tab_single_content dark">
                                    <div class="row">
                                        <div class="col-md-11 ml-3" style="background-color: #0000008f;">
                                        	<ol class="p-3 ml-3">
                                        	<?php 
                                        		$rules = explode("*",$event[0]['rules']);
                                        		foreach ($rules as $key => $value) {
                                        			
                                        		 	?>
                                        		 		<li><?php echo $value; ?></li>
                                        		 	<?php
                                        		 	
                                        		 } 
                                        	?>
                                        	</ol>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="tab4" class="tab_single_content dark">
                                    <div class="row">
                                        <div class="col-md-11 ml-3" style="background-color: #0000008f;">
                                        	<p>Any student with valid ID card of their educational institute can participate.<br>
                                                Prize money may be subjected to change.<br> Organisers reserve the right to
                                                change any rules. </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

              </div>
          </div>
      </div>
  </section>
<?php
	include('footer.php');
?>
<script type="text/javascript">
	 $('#addtobasket').click(function() {
            var event = "<?php echo safe($_GET['id']); ?>";
            var users = "<?php echo (isset($_SESSION['USER_ID']))?(safe($_SESSION['USER_ID'])):('false'); ?>";
            var type = "adds";
            console.log(event,users);
            if(users === "false")
            {
                  toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": true,
                      "progressBar": true,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "5000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    }
                    toastr["error"]("Login First !!!", "Error");
            }
            else
            {            
            console.log(event,users);
            $.ajax({
            url:'addevent.php',
            type:'POST',
            data:'event='+event+'&users='+users+'&type='+type,
            success: function(result){
                console.log(result);
                if(result == 'success')
                {
                    toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": true,
                      "progressBar": true,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "5000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    }
                    toastr["success"]("Event Added Successfully !!!", "Success");
                    getcartdetail();
                }
                else if(result == 'Added')
                {
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }
                      toastr["warning"]("Event is already added.", "ALREADY ADDED");
                }                
            }
        });
          }

});
</script>

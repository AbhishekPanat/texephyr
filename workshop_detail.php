<?php 
	include('header.php');
	if(isset($_GET['id']))
	{
	    $id = safe($_GET['id']);
	}
?>
<style>
    .btn-line:after{
        content:'';
    }
    .btn-line{
        padding-right: 30px;
    }
    .uppercase{
        text-transform: uppercase;
    }
</style>
            <!-- section begin -->
            <section id="section-register">
                <div class="wm wm-border dark wow fadeInDown">Workshop</div>
                <div class="row">
                	<div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                		<h1><?php echo get_workshop_value($id,'title'); ?> </h1>
                        <div class="separator"><span><i class="fa fa-square"></i></span></div>
                        <div class="spacer-single"></div>
                	</div>
                </div>
                <div class="row">
                	 <div class="col-md-8 offset-md-2 mt-3 wow fadeInUp">
                	 
                	 	<p><?php echo get_workshop_value($id,'long_desc'); ?></p>
                	 	<p> 
                	 	    <?php 
                                $arr = explode('*',get_workshop_value($id,'short_desc'));
                                                            
                                foreach($arr as $k => $v)
                                {
                                    echo $v.'<br>';
                                }
                                
                            ?>
                	 	</p>
                	 	<?php
                	 	   if(strval($id) == '3'){
                	 	?>
                	 	    <div class="col-md-12 mt-5" style="display:flex; align-items: center; justify-content:center;">
                                                <button type="button" class="btn btn-line" onclick="register('<?php echo $id; ?>','1');">Pay Now</button>
                            </div>
                        <?php
                	 	   }
                	 	   else{
                	 	?>     
                	 	  
                	 	<div class="de_tab tab_style_4 text-center">
                	 	    <ul class="de_nav de_nav_dark">
                                <li class="active" data-link="#section-services-tab">
                                    <h3>&#8377; 400 <span> / Person</span></h3>
                                    <h4>Individual</h4>
                                </li>
                                <li data-link="#section-services-tab">
                                    <h3>&#8377; 350 <span> / Person</span></h3>
                                    <h4>Group Of 2 Person</h4>
                                </li>
                                <li data-link="#section-services-tab">
                                    <h3>&#8377; 300 <span> / Person</span></h3>
                                    <h4>Group Of 4 Person</h4>
                                </li>
                                
                            </ul>

                            <div class="de_tab_content text-left">

                                <div id="tab1" class="tab_single_content dark">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Person 1 Fest Id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="pid_1_1" class="form-control" placeholder="Enter Person 1 Fest Id" value="<?php echo (isset($_SESSION['USER_ID']))?(safe($_SESSION['USER_ID'])):(''); ?>" disabled />
                                        </div>
                                        <div class="col-md-12 mt-5" style="display:flex; align-items: center; justify-content:center;">
                                            <button type="button" class="btn btn-line" onclick="register('<?php echo $id; ?>','1');">Pay Now</button>
                                        </div>
                                    </div>
                                </div>

                                <div id="tab2" class="tab_single_content dark">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Person 1 Fest Id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="pid_2_1" class="form-control" placeholder="Enter Person 1 Fest Id" value="<?php echo (isset($_SESSION['USER_ID']))?(safe($_SESSION['USER_ID'])):(''); ?>" disabled />
                                        </div>
                                        <div class="col-md-6">
                                            <label>Person 2 Fest Id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="pid_2_2" class="form-control uppercase"  placeholder="Enter Person 2 Fest Id" onchange="validation(this.value,'pid_2_2');"/>
                                        </div>
                                        <div class="col-md-12 mt-5" style="display:flex; align-items: center; justify-content:center;">
                                            <button type="button" class="btn btn-line" onclick="register('<?php echo $id; ?>','2');">Pay Now</button>
                                        </div>
                                    </div>
                                </div>

                                <div id="tab3" class="tab_single_content dark">
                                    <div class="row">
                                            <div class="col-md-6">
                                                <label>Person 1 Fest Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="pid_4_1" class="form-control" placeholder="Enter Person 1 Fest Id"  value="<?php echo (isset($_SESSION['USER_ID']))?(safe($_SESSION['USER_ID'])):(''); ?>" disabled />
                                            </div>
                                            <div class="col-md-6">
                                                <label>Person 2 Fest Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="pid_4_2" class="form-control uppercase" placeholder="Enter Person 2 Fest Id" onchange="validation(this.value,'pid_4_2');" />
                                            </div>
                                            <div class="col-md-6">
                                                <label>Person 3 Fest Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="pid_4_3" class="form-control uppercase" placeholder="Enter Person 3 Fest Id"  onchange="validation(this.value,'pid_4_3');"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Person 4 Fest Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="pid_4_4" class="form-control uppercase" placeholder="Enter Person 4 Fest Id"  onchange="validation(this.value,'pid_4_4');"/>
                                            </div>
                                            <div class="col-md-12 mt-5" style="display:flex; align-items: center; justify-content:center;">
                                                <button type="button" class="btn btn-line" onclick="register('<?php echo $id; ?>','4');">Pay Now</button>
                                            </div>
                                    </div>
                                </div>
                	        </div>
                	    </div>
                	    <?php
                	 	   }
                	 	?>
                </div>
            </section>
            <!-- section close -->
<?php 
	include('footer.php');
?>
<script>

    function validation(festid,id)
    {
        $.ajax({
                url:'process/getuseremail.php',
                type:'POST',
                data:'festid='+festid+'&type=user',
                success: function(result){
                    console.log(result);
                    if(result == 'error')
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
                          toastr["error"]("User is not exist.", "Error");
                          $('#'+id+'').val('');
                    }                
                }
            });
    }
    
    function register(workid , type)
    {
        var ID = '<?php echo (isset($_SESSION['USER_ID']))?(safe($_SESSION['USER_ID'])):('false'); ?>';
        if(ID === "false")
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
                    toastr["warning"]("Login First !!!", "Warning");
        }
        else
        {
            $.ajax({
                url:'process/getuseremail.php',
                type:'POST',
                data:'festid='+ID+'&type=user',
                success: function(result){
                    //console.log(result);
                    if(result == 'already')
                    {
                        if(type == "1")
                        {
                            window.location.href="/payment/workshop.php?id="+workid+"&type=1";
                        }
                        else if(type == "2")
                        {
                            var person2 = $('#pid_2_2').val();
                            if(person2.trim().length === 0)
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
                                toastr["warning"]("Please fill the field", "Warning");
                            }
                            else
                            {
                                //console.log();
                                window.location.href="/payment/workshop.php?id="+workid+"&person2="+person2+"&type=2";
                            }
                        }
                        else 
                        {
                            var person2 = $('#pid_4_2').val();
                            var person3 = $('#pid_4_3').val();
                            var person4 = $('#pid_4_4').val();
                            if(person2.trim().length === 0)
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
                                toastr["warning"]("Please fill the field", "Warning");
                            }
                            else if(person3.trim().length === 0)
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
                                toastr["warning"]("Please fill the field", "Warning");
                            }
                            else if(person4.trim().length === 0)
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
                                toastr["warning"]("Please fill the field", "Warning");
                            }
                            else
                            {
                                window.location.href="/payment/workshop.php?id="+workid+"&person2="+person2+"&person3="+person3+"&person4="+person4+"&type=4";
                            }
                            
                        }
                        
                    }
                    else if(result == 'error')
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
                          toastr["error"]("User is not exist.", "Error");
                    }                
                }
            });   
        }
        
    }
</script>
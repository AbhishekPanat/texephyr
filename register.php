<?php 
	include('header.php');
?>
<style type="text/css">
	section {
    padding: 180px 0 90px 0;
}
input[type=password], #select,input[type=number] {
    padding: 10px;
    margin-bottom: 20px;
    color: #fff;
    border: solid 1px rgba(0,0,0,.3);
    background: rgba(0,0,0,.2) !important;
    border-radius: 0 !important;
    height: auto;
}
#contact_form input[placeholder] {
    color: #eee;
}

.form-control:focus {
    box-shadow: none;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
}
.form-control:focus {
    color: #495057 !important;
    background-color: #fff;
    border-color: var(--primary-color-1);
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgb(0 123 255 / 25%);
}
#select:focus {
    color: #495057 !important;
    background-color: #fff;
    border-color: var(--primary-color-1);
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgb(0 123 255 / 25%);
}
</style>
			<!-- section begin -->
            <section id="section-register">
                <div class="wm wm-border dark wow fadeInDown">register</div>
				<div class="container">
                    <div class="row">
						<div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                            <h1>Register Now</h1>
                            <div class="separator"><span><i class="fa fa-square"></i></span></div>
                            <div class="spacer-single"></div>
                        </div>

                        <div class="col-md-8 offset-md-2 wow fadeInUp">
                            <form name="contactForm" id='contact_form'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id='name_error' class='error'>Please enter your name.</div>
                                        <div>
                                            <input type='text' name='name' id='name' class="form-control" placeholder="Your Name" required autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-md-6">    
                                        <div id='phone_error' class='error'>Please enter your phone number.</div>
                                        <div>
                                            <input type='number' name='mobileno' id='phone' class="form-control" placeholder="Your Phone" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6">    
                                        <div id='email_error' class='error'>Please enter different E-mail ID.</div>
                                        <div>
                                            <input type='text' name='email' id='email' class="form-control" placeholder="Your Email" required onblur="getemail(this.value);" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-md-6">    
                                        <div id='password_error' class='error'>Please enter your phone number.</div>
                                        <div>
                                            <input type='password' name='password' id='password' class="form-control" placeholder="Your Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">    
                                        <div id='refferal_error' class='error'>Please enter your valid E-mail ID.</div>
                                        <div>
                                            <input type='text' name='referal' id='refferal' class="form-control" placeholder="Your Refferal ( Optional )">
                                        </div>
                                    </div>

                                    <div class="col-md-6">  
                                        <div>
                                            <input type='text' id='uploadbtn' class="form-control" placeholder="Upload college Id or any other document" readonly="">
                                            <input type="file" name="link" id="file" accept="image/*" style="display: none;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">    
                                        <div>
                                            <select class="form-control" name="college" id="select" required onchange="changetype(this.value);">
                                            	<option value="0">MITWPU</option>
                                            	<option value="1">OTHER</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">    
                                        <div>
                                            <select class="form-control" name="year" id="select" required>
                                                <option value="0">First/Second Year</option>
                                                <option value="1">Third/Fourth Year</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="divclg">    
                                        <div>
                                            <input type='text' name='clgname' id='clgname' class="form-control" placeholder="Your College Name">
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <p id='submit'>
                                            <input type='submit' id='send_message' value='Register Now' class="btn btn-line">
                                        </p>
                                        <div>Have an account? <a href="login" style="color:var(--primary-color-1);">Login Now</a></div>
                                        <div id='mail_fail' class='error'>Sorry, error occured this time sending your message.</div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>

            </section>
            <!-- section close -->
<?php 
	include('footer.php');
?>
<script type="text/javascript">
	        $(document).ready(function(e){
        // Submit form data via Ajax
            $("#contact_form").on('submit', function(e){
                
                console.log("SUBMIT FORM");
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'process/registeration_process.php',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        $('#send_message').attr("disabled","disabled");
                        $('#contact_form').css("opacity",".5");
                    },
                    success: function(response){
                        console.log(response);
                        if(response.status == 1){
                            $('#contact_form')[0].reset();
                            $("#divclg").hide();
                            $('#uploadbtn').attr('placeholder','Upload college Id or any other document');
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
                                toastr["success"](response.message, "Success");
                        }else{
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
                                toastr["error"](response.message, "Error");
                            //$('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                        }
                        $('#contact_form').css("opacity","");
                        $("#send_message").removeAttr("disabled");
                    }
                });
            });
        });
</script>
<script type="text/javascript">
	$("#divclg").hide();
	var uploadbtn = document.getElementById('uploadbtn');
        var file = document.getElementById('file');

        uploadbtn.onclick = function() {
            file.click();
        }

        file.addEventListener("change",function(){
            uploadbtn.placeholder=file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
        })
        
        

        function changetype(value)
        {
        	if(value == "0")
        	{
        		$("#divclg").hide();
               $('#clgname').val('');
        	}
        	else
        	{
        		$("#divclg").show();	
        	}
        }
        function getemail(val)
	       {
	         if(val == '')
	         {
	         	$("#email_error").css("display", "none");
	         }
	         else
	         {
	             $.ajax({
		            type: "POST",
		            url: 'process/getuseremail.php?email='+val+'&type=email',
		            success: function(data){
		                console.log(data);
		                if(data == 'already')
		                {
		                	$("#email_error").css("display", "block");
		                    $('#email').val('');
		                }
		                else if(data == 'new')
		                {
							$("#email_error").css("display", "none");
		                }

		            }
	            });
	         }

	       }

	    function phone_validate(phone)
         {
            var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;

                if (filter.test(phone)) {
                  if(phone.length==10){
                       console.log('success');
                       $("#phone_error").css("display", "none");
                  } else {
                      console.log('Please put 10  digit mobile number');
                    $("#phone_error").css("display", "block");  
                    $('#phone').val('');
                    
                  }
                }
                else {
                	$("#phone_error").css("display", "block");
                    $('#phone').val('');
                    console.log('Not a valid number');
                }
         }   


</script>
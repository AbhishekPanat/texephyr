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
                <div class="wm wm-border dark wow fadeInDown">Contact</div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                            <h1>Contact Us</h1>
                            <div class="separator"><span><i class="fa fa-square"></i></span></div>
                            <div class="spacer-single"></div>
                        </div>
                        <div class="col-md-8 offset-md-2 wow fadeInUp" style="font-size: 18px;">
                          <div class="row">
                            <div class="col-12">Address :  <a style="color: var(--primary-color-1);" class="ml-2">Survey No, 124, Paud Rd, Kothrud, Pune, Maharashtra 411038.</a></div>
                            
                          </div>                          
                          <div class="row">
                            <div class="col-12">Email : <a class="ml-4" href="mailto:kushikabahuguna99@gmail.com" style="color: var(--primary-color-1);">kushikabahuguna99@gmail.com</a> , <a href="mailto:bankaratharva@gmail.com" style="color: var(--primary-color-1);">bankaratharva@gmail.com</a> .</div>
                          </div>
                          <div class="row">
                            <div class="col-12">Mobile : <a class="ml-3" href="tel:+919665039441" style="color: var(--primary-color-1);">+91 96650 39441</a> , <a href="tel:+919767951494" style="color: var(--primary-color-1);">+91 97679 51494</a> .</div>
                          </div>
                        </div>
                        <div class="col-md-8 offset-md-2 mt-3 wow fadeInUp">
                            <form name="contactForm" id='contact_form' method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id='name_error' class='error'>Please enter your name.</div>
                                        <div>
                                            <input type='text' name='name' id='name' class="form-control" placeholder="Your Name" required>
                                        </div>

                                        <div id='email_error' class='error'>Please enter your valid E-mail ID.</div>
                                        <div>
                                            <input type='text' name='email' id='email' class="form-control" placeholder="Your Email" required>
                                        </div>

                                        <div id='phone_error' class='error'>Please enter your phone number.</div>
                                        <div>
                                            <input type='text' name='phone' id='phone' class="form-control" placeholder="Your Phone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id='message_error' class='error'>Please enter your message.</div>
                                        <div>
                                            <textarea name='message' id='message' class="form-control" placeholder="Additional Message" required></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <p id='submit'>
                                            <input type='submit' id='send_message' value='Contact Us' class="btn btn-line">
                                        </p>
                                        <div id='mail_success' class='success'>Your message has been sent successfully.</div>
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
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'process/contact_process.php',
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
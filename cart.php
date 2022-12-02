<?php
	include('header.php');
?>
          <!-- section begin -->
          <section id="section-schedule" aria-label="section-services-tab" data-bgimage="url(images-event/bg/2.png) fixed center no-repeat">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 wow fadeInUp">
                    	<div class="row">
                                        <div class="col" id="cartexit">
                                            <div class="pricing-s1 mb30 wow fadeInUp">
                                                <div class="top">
                                                    <h2>Shopping</h2>
                                                    <p class="price"><span class="currency id-color" id="tot">Cart</span></p>
                                                    
                                                </div>
                                                <div class="bottom">
                                                      <div class="col-md-12" id="showcart">
                                                      	
                                                      </div>
                                                </div>
                                				<div class="ps1-deco"></div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>

          </section>
          <!-- section close -->
<?php
	include('footer.php');
?>
<script type="text/javascript">
	getcart();
	function getcart()
    {
        $.ajax({
            url:'process/getuseremail.php',
            type:'POST',
            data:'type=getcart',
                success: function(result){
                    console.log(result);
                   $('#showcart').html(result); 
                }                   
            });
    }
    function remove(event)
    {
        $.ajax({
            url:'addevent.php',
            type:'POST',
            data:'event='+event+'&type=eventremove',
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
                    toastr["success"]("Event Remove Successfully !!!", "Success");
                    getcartdetail();
                    getcart();
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
</script>
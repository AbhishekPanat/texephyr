<?php 
	include('header.php');
?>
<style>
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
#form-submission input[placeholder] {
    color: #eee;
}

#form-submission .form-control:focus {
    box-shadow: none;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
}
#form-submission .form-control:focus {
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
#form-submission input[type=text], #form-submission textarea, #form-submission input[type=email], #form-submission input[type=number], #search {
    padding: 10px;
    margin-bottom: 20px;
    color: #fff;
    border: solid 1px rgba(0,0,0,.3);
    background: rgba(0,0,0,.2);
    border-radius: 0 !important;
    height: auto;
}
</style>
            <!-- section begin -->
            <section id="section-register">
                <div class="wm wm-border dark wow fadeInDown">Profile</div>
                <div class="row">
                	<div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                		<h1>Profile</h1>
                        <div class="separator"><span><i class="fa fa-square"></i></span></div>
                        <div class="spacer-single"></div>
                	</div>
                </div>
                <div class="row">
                	 <div class="col-md-8 offset-md-2 mt-3 wow fadeInUp">
                	 	<div class="row algin-item-center justify-content-center">
                	 	    <div class="col-md-2">
                	 	        <h5>FestID</h5>
                	 	    </div>
                	 	    <div class="col-md-6">
                	 	        <h6 style="color:var(--primary-color-1);"><?php echo (isset($_SESSION['USER_ID']))?(get_user_value($_SESSION['USER_ID'],'fest_id')):(''); ?></h6>
                	 	    </div>
                	 	</div>
                	 	<div class="row algin-item-center justify-content-center">
                	 	    <div class="col-md-2">
                	 	        <h5>Name</h5>
                	 	    </div>
                	 	    <div class="col-md-6">
                	 	        <h6 style="color:var(--primary-color-1);"><?php echo (isset($_SESSION['USER_ID']))?(get_user_value($_SESSION['USER_ID'],'name')):(''); ?></h6>
                	 	    </div>
                	 	</div>
                	 	
                	 	<div class="row algin-item-center justify-content-center">
                	 	    <div class="col-md-2">
                	 	        <h5>Email</h5>
                	 	    </div>
                	 	    <div class="col-md-6">
                	 	        <h6 style="color:var(--primary-color-1);"><?php echo (isset($_SESSION['USER_ID']))?(get_user_value($_SESSION['USER_ID'],'email')):(''); ?></h6>
                	 	    </div>
                	 	</div>
                	 	<div class="row algin-item-center justify-content-center">
                	 	    <div class="col-md-2">
                	 	        <h5>Phone</h5>
                	 	    </div>
                	 	    <div class="col-md-6">
                	 	        <h6 style="color:var(--primary-color-1);"><?php echo (isset($_SESSION['USER_ID']))?(get_user_value($_SESSION['USER_ID'],'phone_no')):(''); ?></h6>
                	 	    </div>
                	 	</div>
                	 	<div class="row algin-item-center justify-content-center">
                	 	    <div class="col-md-2">
                	 	        <h5>College</h5>
                	 	    </div>
                	 	    <div class="col-md-6">
                	 	        <h6 style="color:var(--primary-color-1);"><?php echo (isset($_SESSION['USER_ID']))?((get_user_value($_SESSION['USER_ID'],'college') == "0")?('MIT'):('Others')):(''); ?></h6>
                	 	    </div>
                	 	</div>
                	 	<div class="row algin-item-center justify-content-center">
                	 	    <div class="col-md-2">
                	 	        <h5>Refferal</h5>
                	 	    </div>
                	 	    <div class="col-md-6">
                	 	        <h6 style="color:var(--primary-color-1);"><?php echo (isset($_SESSION['USER_ID']))?(get_user_value($_SESSION['USER_ID'],'referal_code')):(''); ?></h6>
                	 	    </div>
                	 	</div>
                	 </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-8 offset-md-2 mt-3 wow fadeInUp">
                         <?php
                        $fest = $_SESSION['USER_ID'];
                        $res_datathon = mysqli_query($con,"SELECT * FROM datathon_qualifiers WHERE fest_id = '$fest'");
                        if(mysqli_num_rows($res_datathon) > 0)
                        {
                         ?>
                            <div class="profile">
                            <div class="headings">
                                <h1 style="color: white">DATATHON SUBMISSION</h1>
                            </div>
                            <br>
                            <div id="personal">
                                <form method="post" enctype="multipart/form-data" id="form-submission">
                                    <input type='text' id='uploadbtn' class="form-control" placeholder="UPLOAD YOUR DATATHON SUBMISSION" readonly="">
                                    <input type="file" name="file" id="file" accept="" style="display: none;">
                                    <button type="submit" name="submit" id="saves" class="btn btn-line p-2">Add Your CSV File</button>
                                </form>
                            </div>
                            <br>
                            <p style="color: var(--primary-color-1);">You have a total of 5 attempts.</p>
                            <div class="outer_table" style="margin-top: 2rem;">
                                <table class="table table-border" style="color: var(--primary-color-1);">
                                    <thead>
                                        <tr class="active-row">
                                            <th>Attempts</th>
                                            <th>F1 Score</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php
                                            $counter = 1;
                                            $user_id = $_SESSION['USER_ID'];
                                            $sql = "SELECT * FROM datathon_leaderboards WHERE fest_id='".$user_id."'";
                                            $res = mysqli_query($con,$sql);
                                            ?>
                                            <p>Sample score- <?php echo strval($sql); ?></p>
                                            <?php
                                            if(mysqli_num_rows($res)>0)
                                            
                                            {

                                                while($row=mysqli_fetch_assoc($res))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row['f1_score']; ?></td>
                                                    </tr>
                                                    <?php
                                                  $counter++;
                                                }
                                            }
                                            else
                                            {
                                               ?>
                                                    <tr>
                                                        <td>No Attempts</td>
                                                        <td>Yet</td>
                                                    </tr>
                                                <?php
                                            }
                
                                        ?>
                                   </tbody>
                                </table>
                            </div>
                            <br>
                        </div> 
                        <?php
                        }
                         ?>
                    </div>
                
                </div>
                <div class="row mt-5">
                	 <div class="col-md-8 offset-md-2 mt-3 wow fadeInUp table-responsive">
                	     <div class="de_tab tab_style_4 text-center">
                            <ul class="de_nav de_nav_dark">
                                <li class="active" data-link="#section-services-tab">
                                    <h3><span>WORKSHOPS</span></h3>
                                    <h4>Datatables</h4>
                                </li>
                                <li data-link="#section-services-tab">
                                    <h3><span>EVENTS</span></h3>
                                    <h4>Datatables</h4>
                                </li>
                            </ul>

                            <div class="de_tab_content text-left">

                                <div id="tab1" class="tab_single_content dark">
                                    <div class="row">
                                    	<div class="col-md-1"></div>
                                        <div class="col-md-11">
                                            <table class="table table-border">
                                    	         <thead style="color:white;">
                                    	             <tr>
                                    	                 <th>Receipt Id</th>
                                    	                 <th>Workshop</th>
                                    	                 <th>Amount</th>
                                    	                 <th>Date</th>
                                    	                 <th>Link</th>
                                    	             </tr>
                                    	         </thead>
                                    	         <tbody style="color:var(--primary-color-1);">
                                    	             <?php 
                                    	                foreach(get_receipt_list(safe($_SESSION['USER_ID']),'1') as $k => $v)
                                    	                {
                                    	                    ?>
                                    	                    <tr>
                                            	                 <td><?php echo $v['order_id'] ?></td>
                                            	                 <td><?php echo get_workshop_value($v['workshop_id'],'title'); ?></td>
                                            	                 <td><?php echo $v['receipt_amount'] ?></td>
                                            	                 <td><?php echo $v['receipt_created_by'] ?></td>
                                            	                 <td><a>Join</a></td>
                                            	             </tr>
                                    	                    
                                    	                    <?php
                                    	                }
                                    	             ?>
                                    	             
                                    	         </tbody>
                                    	     </table>
                                        </div>
                                    </div>
                                </div>

                                <div id="tab2" class="tab_single_content dark">
                                    <div class="row">
                                    	<div class="col-md-1"></div>
                                        <div class="col-md-11">
                                            <table class="table table-border">
                                    	         <thead style="color:white;">
                                    	             <tr>
                                    	                 <th>Receipt Id</th>
                                    	                 <th>Event</th>
                                    	                 <th>Amount</th>
                                    	                 <th>Date</th>
                                    	                 <th>Link</th>
                                    	             </tr>
                                    	         </thead>
                                    	         <tbody style="color:var(--primary-color-1);">
                                    	             <?php 
                                    	                foreach(get_receipt_list(safe($_SESSION['USER_ID']),'0') as $k => $v)
                                    	                {
                                    	                    ?>
                                    	                    <tr>
                                            	                 <td><?php echo $v['order_id'] ?></td>
                                            	                 <td>
                                            	                     <ol>
                                            	                     <?php 
                                            	                        foreach(get_receipt_event_list($v['receipt_id']) as $ke => $va)
                                            	                        {
                                            	                         ?>
                                            	                            <li>
                                            	                                <a href="events_participants_detail.php?eventid=<?php echo $va['event_id']; ?>&receiptid=<?php echo $v['receipt_id']; ?>"><?php echo get_event_value($va['event_id'],'title'); ?></a>
                                            	                            </li>
                                            	                         <?php   
                                            	                        }
                                            	                     ?>
                                            	                     </ol>
                                            	                 </td>
                                            	                 <td><?php echo $v['receipt_amount'] ?></td>
                                            	                 <td><?php echo $v['receipt_created_by'] ?></td>
                                            	                 <td><a href="#">Join</a></td>
                                            	             </tr>
                                    	                    
                                    	                    <?php
                                    	                }
                                    	             ?>
                                    	         </tbody>
                                    	     </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                	     
                	 </div>
                </div>
            </section>
            <!-- section close -->
            <script>
                var uploadbtn = document.getElementById('uploadbtn');
        var file = document.getElementById('file');

        uploadbtn.onclick = function() {
            file.click();
        }

        file.addEventListener("change",function(){
            uploadbtn.placeholder=file.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
        })
            </script>
<?php 
	include('footer.php');
?>
<script>
    $(document).ready(function(e){
        // Submit form data via Ajax
            $("#form-submission").on('submit', function(e){
                
                console.log("SUBMIT FORM");
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'upload_csv.php',
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
                                  "onclick": null,TEX41747
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
                                //window.reload();
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
<?php 
	include('header.php');
	
	if(isset($_GET['eventid']))
	{
		$event = get_event(safe($_GET['eventid']));	
	}
	
	$mem2="";
	$mem3="";
	$mem4="";
	if($event[0]['max_participants'] === "1")
	{
	   $mem2="d-none"; 
	   $mem3="d-none";     
	   $mem4="d-none"; 
	}
	else if($event[0]['max_participants'] === "2")
	{
	   $mem3="d-none";     
	   $mem4="d-none";     
	}
	else if($event[0]['max_participants'] === "3")
	{
	    $mem4="d-none";
	}
	$get_participants = get_participants(safe($_GET['eventid']),safe($_GET['receiptid']));
	
	
	$member2 = "";
	$member3 = "";
	$member4 = "";
	
	
	$filteredArray = array_filter($get_participants, "checkUSERS");
    $array = array_values($filteredArray);
	//pr($array);
	if(!empty($get_participants))
	{
	    $member2 = $array[0];
	    $member3 = $array[1];
	    $member4 = $array[2];    
	}
	
	
?>
            <!-- section begin -->
            <section id="section-register">
                <div class="wm wm-border dark wow fadeInDown">Events</div>
                <div class="row">
                	<div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                		<h1>Events</h1>
                        <div class="separator"><span><i class="fa fa-square"></i></span></div>
                        <div class="spacer-single"></div>
                	</div>
                </div>
                <div  class="row">
              <div class="col-12 col-lg-2">
              </div>
              <div class="col-12 col-lg-8">

                  <h2 class="compi-title text-center">Participants</h2><br>
                  <h6 id="errormsg"></h6>
                
                      
                  
                  <div class="row">
                      <div class="col-md-2">
                          <label for="leader">Team Leader</label>
                      </div>
                      <div class="col-md-6">
                          <input type="text" class="form-control" name="leader" id="leader" value="<?php echo safe($_SESSION['USER_ID']); ?>" disabled required/>
                      </div>
                  </div>
                  <div class="row mt-3 <?php echo $mem2; ?>">
                      <div class="col-md-2">
                          <label for="member2">Team Member</label>
                      </div>
                      <div class="col-md-6">
                          <input type="text" class="form-control" name="member2" id="member2" placeholder="Enter Members Fest ID" style="text-transform: uppercase;" onchange="checkuserID(this.value,'2');" required value="<?php echo $member2; ?>" <?php echo ($member2 == "")?(""):("disabled"); ?> />
                      </div>
                      <div class="col-md-4">
                          <?php if($member2 != ""){ ?>
                          <button type="button" class="btn btn-danger btn-sm" id="remove" onclick="removeUser('2');"><i class="fa fa-trash"></i></button>
                          <?php }else{ ?>
                          <button type="button" class="btn btn-success btn-sm" id="remove" onclick="addUser('2');"><i class="fa fa-plus"></i></button>
                          <?php } ?>
                      </div>
                  </div>
                  <div class="row mt-3 <?php echo $mem3; ?>">
                      <div class="col-md-2">
                          <label for="member3">Team Member</label>
                      </div>
                      <div class="col-md-6">
                          <input type="text" class="form-control" name="member3" id="member3" placeholder="Enter Members Fest ID" style="text-transform: uppercase;" onchange="checkuserID(this.value,'3');" required value="<?php echo $member3; ?>" <?php echo ($member3 == "")?(""):("disabled"); ?>/>
                      </div>
                      <div class="col-md-4">
                          <?php if($member3 != ""){ ?>
                          <button type="button" class="btn btn-danger btn-sm" id="remove" onclick="removeUser('3');"><i class="fa fa-trash"></i></button>
                          <?php }else{ ?>
                          <button type="button" class="btn btn-success btn-sm" id="remove" onclick="addUser('3');"><i class="fa fa-plus"></i></button>
                          <?php } ?>
                      </div>
                  </div>
                  <div class="row mt-3 <?php echo $mem4; ?>">
                      <div class="col-md-2">
                          <label for="member4">Team Member</label>
                      </div>
                      <div class="col-md-6">
                          <input type="text" class="form-control" name="member4" id="member4" placeholder="Enter Members Fest ID" style="text-transform: uppercase;" onchange="checkuserID(this.value,'4');" required value="<?php echo $member4; ?>" <?php echo ($member4 == "")?(""):("disabled"); ?>/>
                      </div>
                      <div class="col-md-4">
                          <?php if($member4 != ""){ ?>
                          <button type="button" class="btn btn-danger btn-sm" id="remove" onclick="removeUser('4');"><i class="fa fa-trash"></i></button>
                          <?php }else{ ?>
                          <button type="button" class="btn btn-success btn-sm" id="remove" onclick="addUser('4');"><i class="fa fa-plus"></i></button>
                          <?php } ?>
                      </div>
                  </div>
              </div>
          </div>
            </section>
            <!-- section close -->
<?php 
	include('footer.php');
?>
<script>
    function checkuserID(FESTID,row)
    {
        const member2 = $("#member2").val();
        const member3 = $("#member3").val();
        const member4 = $("#member4").val();
        const member1 = $("#leader").val();
        
        var check = "";
        
        if(row === "2")
        {
            if(FESTID === member1 || FESTID === member3 || FESTID === member4)
            {
                check = "true";
                $('#member2').val('');
                console.log("True");
            }
            else
            {
                check = "false";
                console.log("False");
            }    
        }
        else if(row === "3")
        {
            if(FESTID === member1 || FESTID === member2 || FESTID === member4)
            {
                $('#member2').val('');
                check = "true";
                console.log("True");
            }
            else
            {
                check = "false";
                console.log("False");
            }
        }
        else
        {
            if(FESTID === member1 || FESTID === member2 || FESTID === member3)
            {
                $('#member2').val('');
                check = "true";
                console.log("True");
            }
            else
            {
                check = "false";
                console.log("False");
            }
        }
        
        if(check === "true")
        {
            $('#errormsg').addClass('text-danger');
            $('#errormsg').html('User is already added.');
        }
        else
        {
            $('#errormsg').removeClass('text-danger');
            $('#errormsg').html(' ');    
           $.ajax({
                url:'process/getuseremail.php',
                type:'POST',
                data:'type=user&festid='+FESTID,
                success: function(result){
                    if(result === "error")
                    {
                       $('#member'+row+'').addClass("errors").removeClass("successful");
                       $('#member'+row+'').val('');
                       console.log("Test Success: member"+row); 
                    }
                    else
                    {
                        $('#member'+row+'').addClass("successful").removeClass("errors");
                    }
                }
           });
        }
    }
</script>
<script>
    function addUser(row)
    {
        var FESTID = $('#member'+row+'').val();
        var event = "<?php echo safe($_GET['eventid']); ?>";
        var receipt = "<?php echo safe($_GET['receiptid']); ?>";
        var type="addUser";
        var user = FESTID;
        
        var check = confirm("Are you sure you want to add ?");
        if(check === true)
        {
            $.ajax({
            url:'process/getuseremail.php',
            type:'POST',
            data:{event:event,receipt:receipt,user:user,type:type},
            //data:'event='+event+'&users='+members+'&type='+type,
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
                    toastr["success"]("Participant is added !!!", "Success");
                    getcartdetail();
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
                      toastr["error"]("Something Went Wrong,Please Try Again.", "Error");
                }                
            }
        });
        }
    }
</script>
<script>
    function removeUser(row)
    {
        var FESTID = $('#member'+row+'').val();
        var event = "<?php echo safe($_GET['eventid']); ?>";
        var receipt = "<?php echo safe($_GET['receiptid']); ?>";
        var type="removeUser";
        var user = FESTID;
        
        var check = confirm("Are you sure you want to remove ?");
        if(check === true)
        {
            $.ajax({
            url:'process/getuseremail.php',
            type:'POST',
            data:{event:event,receipt:receipt,user:user,type:type},
            //data:'event='+event+'&users='+members+'&type='+type,
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
                    toastr["success"]("Participant is removed !!!", "Success");
                    getcartdetail();
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
                      toastr["error"]("Something Went Wrong,Please Try Again.", "Error");
                }                
            }
        });
        }
    }
</script>
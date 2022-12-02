<?php
	include('header.php');
    
    if(!isset($_SESSION['USER_ID']))
    {
        alertredirect('Please login to access the page.','index');
    }

	if(isset($_GET['id']))
	{
		$event = get_event(safe($_GET['id']));	
	}
	
	$mem3="";
	$mem4="";
	
	if($event[0]['max_participants'] === "2")
	{
	   $mem3="d-none";     
	   $mem4="d-none";     
	}
	else if($event[0]['max_participants'] === "3")
	{
	    $mem4="d-none";
	}
	
	//pr($_SESSION);
	
	$member2 = "";
	$member3 = "";
	$member4 = "";
	
	foreach($_SESSION['event_list'] as $key => $value)
	{
	    if($value['event'] === safe($_GET['id']))
	    {
	        $member2 = $value['users'][1];
	        $member3 = $value['users'][2];
	        $member4 = $value['users'][3];
	    }
	}
	//pr($event);
	
	
?>
<style>

        .compi-title{
        font-family: euro;
        letter-spacing: 1px;
        font-size: 2.5vw;
        margin-top: 1vw;
        color:white;
        }
        .money{
            margin-top: -0.7vw;
            font-family: euro;
            letter-spacing: 1px;
            font-size: 2vw;
            color: white;
        }
        .amt{
            font-size: 2.5vw;
            color:white;
        }
        .compi-indi-img{
        width:300px;
        height:300px;
        }
        .com-btn{
        width:300px;
        font-family: euro !important;
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
     
    .errors{
        border: 3px solid #dc3545;
    }   
    .successful {
        border: 3px solid #28a745;
    }
     
    </style>
<section id="section-schedule" aria-label="section-services-tab" data-bgimage="url(images-event/bg/1.jpg) fixed center no-repeat">
      <div  style="margin-top: 5vw;" class="container">

          <div  class="row">
              <div class="col-12 col-lg-2">
              </div>
              <div class="col-12 col-lg-8">

                  <h2 class="compi-title text-center">Add Participants</h2><br>
                  <h6 id="errormsg"></h6>
                
                      
                  
                  <div class="row">
                      <div class="col-md-2">
                          <label for="leader">Team Leader</label>
                      </div>
                      <div class="col-md-6">
                          <input type="text" class="form-control" name="leader" id="leader" value="<?php echo safe($_SESSION['USER_ID']); ?>" disabled required/>
                      </div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-2">
                          <label for="member2">Team Member</label>
                      </div>
                      <div class="col-md-6">
                          <input type="text" class="form-control" name="member2" id="member2" placeholder="Enter Members Fest ID" style="text-transform: uppercase;" onchange="checkuserID(this.value,'2');" required value="<?php echo $member2; ?>" <?php echo ($member2 == "")?(""):("disabled"); ?> />
                      </div>
                      <div class="col-md-4">
                          <?php if($member2 != ""){ ?>
                          <button type="button" class="btn btn-danger btn-sm" id="remove" onclick="removeUser('2');"><i class="fa fa-trash"></i></button>
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
                          <?php } ?>
                      </div>
                  </div>
                  <div class="row mt-3">
                      <div class="col-md-2">
                      </div>
                      <div class="col-md-6">
                          <?php if($member2 != ""){ ?>
                            <input type="button" class="btn btn-line" name="submit" id="addusers" value="Update" />
                          <?php }else{ ?>
                          <input type="button" class="btn btn-line" name="submit" id="addtobasket" value="Submit" />
                          <?php } ?>
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
            var member2 = $('#member2').val();
            var member3 = $('#member3').val();
            var member4 = $('#member4').val();
            
            var members = [users,member2,member3,member4];
            
            
            var type = "add";
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
            data:{event:event,users:members,type:type},
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
	 $('#addusers').click(function() {
            var event = "<?php echo safe($_GET['id']); ?>";
            var users = "<?php echo (isset($_SESSION['USER_ID']))?(safe($_SESSION['USER_ID'])):('false'); ?>";
            var member2 = $('#member2').val();
            var member3 = $('#member3').val();
            var member4 = $('#member4').val();
            
            var members = [member3,member4];
            
            console.log(members);
            
            var type = "adduser";
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
            data:{event:event,users:members,type:type},
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
                    toastr["success"]("Participant Added Successfully !!!", "Success");
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
    function removeUser(row)
    {
        var FESTID = $('#member'+row+'').val();
        var event = "<?php echo safe($_GET['id']); ?>";
        var type="remove";
        var user = FESTID;
        
        $.ajax({
            url:'addevent.php',
            type:'POST',
            data:{event:event,user:user,type:type},
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

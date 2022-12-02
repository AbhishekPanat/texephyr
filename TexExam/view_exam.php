<?php

//view_exam.php

include('master/Examination.php');


$exam = new Examination;

$exam->user_session_private();

include('header.php');

if(isset($_SESSION['IS_EXAM']))
{
	//echo $_SESSION['IS_EXAM'];
	if($_SESSION['IS_EXAM'] == "END")
	{
		?>
		<script>
			window.location.href="error_page.php?user_id=<?php echo $_SESSION['user_id']; ?>&exam_id=<?php echo $exam_id; ?>";
		</script>
		<?php
		die();
	}
}

$exam_id = '';
$exam_status = '';
$remaining_minutes = '';

if(isset($_GET['code']))
{
	$exam_id = $exam->Get_exam_id($_GET["code"]);
	$exam->query = "
	SELECT online_exam_status, total_question,online_exam_datetime, online_exam_duration , error_limit FROM online_exam_table 
	WHERE online_exam_id = '$exam_id'
	";

	$result = $exam->query_result();

	foreach($result as $row)
	{
		$exam_status = $row['online_exam_status'];
		$exam_star_time = $row['online_exam_datetime'];
		$duration = $row['online_exam_duration'] . ' minutes';
		$exam_end_time = strtotime($exam_star_time . '+' . $duration);

		$exam_end_time = date('Y-m-d H:i:s', $exam_end_time);
		$remaining_minutes = strtotime($exam_end_time) - time();

		$duration_final = ($row['online_exam_duration'] * 60);

		$total_question = $row['total_question'];
	}

	$exam->query = "
	SELECT exam_status FROM user_exam_enroll_table 
	WHERE exam_id = '$exam_id' AND user_id = '".$_SESSION['user_id']."'
	";

	$result = $exam->query_result();

	$user_exam_status = $result[0]['exam_status'];

	if($user_exam_status == 1)
	{
		?>
		<script>
			window.location.href="error_page.php?user_id=<?php echo $_SESSION['user_id']; ?>&exam_id=<?php echo $exam_id; ?>";
		</script>
		<?php
		die();
	}
}
else
{
	header('location:enroll_exam.php');
}


?>
<?php
if($exam_status == 'Started')
{
	$exam->data = array(
		':user_id'		=>	$_SESSION['user_id'],
		':exam_id'		=>	$exam_id,
		':attendance_status'	=>	'Present'
	);

	$exam->query = "
	UPDATE user_exam_enroll_table 
	SET attendance_status = :attendance_status 
	WHERE user_id = :user_id 
	AND exam_id = :exam_id
	";

	$exam->execute_query();

	
?>
<script src="https://cdn.tailwindcss.com"></script>
<div class="row" id="instruction">
	<div class="col-md-12">
	<main class="bg-[#eee] py-[1rem] font-sans">
        <div class="mx-36 drop-shadow-lg  p-4 bg-white rounded-lg">
          <div class="mx-10 my-5">
            <h1 class="text-[1.75rem] font-semibold">Key Instructions</h1>
          </div>
          <div class="mt-[2rem] flex justify-around">
            <div>
              <p><span class="font-semibold">Total Time</span> : <span class="text-neutral-500"><?php echo $duration; ?></span></p>
            </div>
            <div>
              <p><span class="font-semibold">Total Question</span> : <span class="text-neutral-500"><?php echo $total_question; ?></span></p>
            </div>
            <div>
              <p><span class="font-semibold">Max Point</span> : <span class="text-neutral-500">50</span></p>
            </div>
          </div>
          <div class="main w-4/5 mx-auto py-8 text-neutral-500">
            <p>Please read the instruction carefully before you proceed</p>
            <ul class="list-disc ml-10 mt-3 text-sm">
              <li>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                sunt in culpa qui officia deserunt mollit anim id est laborum.
              </li>
              <li>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                sunt in culpa qui officia deserunt mollit anim id est laborum.
              </li>
              <li>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                sunt in culpa qui officia deserunt mollit anim id est laborum.
              </li>
            </ul>
          </div>

          <div class="w-4/5 mx-auto">
            <input
              type="checkbox"
              class="bg-red-100 border-red-300 text-red-500 focus:ring-red-200"
              id="checkedBox"
            />
            <label
              class="form-check-label inline-block text-gray-800 ml-3 font-semibold"
              for="checkedBox"
            >
              I hereby agree with all the above conditions.
            </label>
          </div>

          <div class="btn flex flex-row-reverse w-4/5 mx-auto mb-12">
            <Link href="/">
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 rounded" id="go-button">
                Continue
              </button>
            </Link>
          </div>
        </div>
      </main>
	</div>
</div>

<div class="row" id="error" style="display:none;">
	<div class="col-md-12">
	<main class="bg-[#eee] py-[1rem] font-sans">
        <div class="mx-36 drop-shadow-lg  p-4 bg-white rounded-lg grid justify-center">
          <div class="mx-10 my-5">
            <h1 class="text-[1.75rem] font-semibold">Are You Sure Want To Exit Exam ?</h1>
          </div>
          <div class="btn">
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 mr-10 rounded" id="go-again-button">
                OK
              </button>
          </div>
        </div>
      </main>
	</div>
</div>

<div class="row mx-36" id="demo-element" style="display:none;padding-top: 4rem;background: #eee;">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">Online Exam</div>
			<div class="card-body">
				<div id="single_question_area"></div>
			</div>
		</div>
		<br />
		
	</div>
	<div class="col-md-4">
		<br />
		<div>
			<div id="exam_timer" data-timer="<?php echo $duration_final; ?>" style="max-width:400px; width: 100%; height: 200px;"></div>
		</div>
		<br />
		<div id="question_navigation_area"></div>		
	</div>
</div>

<div id="datacount" data-count="0"></div>

<script>

$(document).ready(function(){
	var exam_id = "<?php echo $exam_id; ?>";

	load_question();
	question_navigation();

	function load_question(question_id = '')
	{
		$.ajax({
			url:"user_ajax_action.php",
			method:"POST",
			data:{exam_id:exam_id, question_id:question_id, page:'view_exam', action:'load_question'},
			success:function(data)
			{
				$('#single_question_area').html(data);
			}
		})
	}

	$(document).on('click', '.next', function(){
		var question_id = $(this).attr('id');
		load_question(question_id);
	});

	$(document).on('click', '.previous', function(){
		var question_id = $(this).attr('id');
		load_question(question_id);
	});

	function question_navigation()
	{
		$.ajax({
			url:"user_ajax_action.php",
			method:"POST",
			data:{exam_id:exam_id, page:'view_exam', action:'question_navigation'},
			success:function(data)
			{
				$('#question_navigation_area').html(data);
			}
		})
	}

	$(document).on('click', '.question_navigation', function(){
		var question_id = $(this).data('question_id');
		load_question(question_id);
	});

	function load_user_details()
	{
		$.ajax({
			url:"user_ajax_action.php",
			method:"POST",
			data:{page:'view_exam', action:'user_detail'},
			success:function(data)
			{
				$('#user_details_area').html(data);
			}
		})
	}

	load_user_details();

	$("#exam_timer").TimeCircles({ 
		time:{
			Days:{
				show: false
			},
			Hours:{
				show: false
			}
		},
		start: false
	});

	setInterval(function(){
		var remaining_second = $("#exam_timer").TimeCircles().getTime();
		if(remaining_second < 1)
		{
			location.href="success.php?user_id=<?php echo $_SESSION['user_id']; ?>&exam_id=<?php echo $exam_id; ?>";
		}
	}, 1000);

	$(document).on('click', '.answer_option', function(){
		var question_id = $(this).data('question_id');

		var answer_option = $(this).data('id');

		$.ajax({
			url:"user_ajax_action.php",
			method:"POST",
			data:{question_id:question_id, answer_option:answer_option, exam_id:exam_id, page:'view_exam', action:'answer'},
			success:function(data)
			{

			}
		})
	});

	$(document).on('click', '.submit', function(){
		location.href="success.php?user_id=<?php echo $_SESSION['user_id']; ?>&exam_id=<?php echo $exam_id; ?>";
	});

});
</script>
<?php
}
?>
    <script>
    function GoInFullscreen(element) {
        if(element.requestFullscreen)
            element.requestFullscreen();
        else if(element.mozRequestFullScreen)
            element.mozRequestFullScreen();
        else if(element.webkitRequestFullscreen)
            element.webkitRequestFullscreen();
        else if(element.msRequestFullscreen)
            element.msRequestFullscreen();
    }

    function GoOutFullscreen() {
        if(document.exitFullscreen)
            document.exitFullscreen();
        else if(document.mozCancelFullScreen)
            document.mozCancelFullScreen();
        else if(document.webkitExitFullscreen)
            document.webkitExitFullscreen();
        else if(document.msExitFullscreen)
            document.msExitFullscreen();
    }

    function IsFullScreenCurrently() {
        var full_screen_element = document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement || null;

        if(full_screen_element === null)
            return false;
        else
            return true;
    }
	
	function check_limit(exam_id)
		{
			return $.ajax({
				url:"user_ajax_action.php",
				method:"POST",
				data:{exam_id:exam_id, page:'view_exam', action:'check_limit'},
				success:function(result)
				{
					
				}
			});
		}

		function update(exam_id)
		{
			$.ajax({
				url:"user_ajax_action.php",
				method:"POST",
				data:{exam_id:exam_id, page:'view_exam', action:'update_limit'},
				success:function(data)
				{

				}
			});
		}


	

    $("#go-button").on('click', function() {
		 
		check_limit('<?php echo $exam_id; ?>').done(function(response){
			//console.log("DONE FUNCTION",response);
			if(response == 0 || response <= 0)
			{
				window.location.href="error_page.php?user_id=<?php echo $_SESSION['user_id']; ?>&exam_id=<?php echo $exam_id; ?>";
			}
			else
			{
				if(IsFullScreenCurrently())
				{
					GoOutFullscreen();
					$('#demo-element').css("display","");
					$("#exam_timer").TimeCircles().start();
				}            
				else{
					GoInFullscreen($("#demo-element").get(0));
					$('#demo-element').css("display","");
					$("#exam_timer").TimeCircles().start();
				}
			}
		});        
    });

	$("#go-again-button").on('click', function() {
		 
		 check_limit('<?php echo $exam_id; ?>').done(function(response){
			 //console.log("DONE FUNCTION",response);
			 if(response == 0 || response <= 0)
			 {
				 window.location.href="error_page.php?user_id=<?php echo $_SESSION['user_id']; ?>&exam_id=<?php echo $exam_id; ?>";
			 }
			 else
			 {
				 if(IsFullScreenCurrently())
				 {
					 GoOutFullscreen();
					 $('#demo-element').css("display","");
					 $("#exam_timer").TimeCircles().start();
				 }            
				 else{
					 GoInFullscreen($("#demo-element").get(0));
					 $('#demo-element').css("display","");
					 $("#exam_timer").TimeCircles().start();
				 }
			 }
		 });        
	 });

	 $(document).on('keydown',function(evt) {
			var arrayKey = [27,9,17,18];
			var checkKey = $.inArray(evt.keyCode,arrayKey);
			if(IsFullScreenCurrently())
			{
				if(checkKey != '-1')
				{
					$('#error').css("display","");
					GoOutFullscreen();
					update('<?php echo $exam_id; ?>');
				}
			}
		});	
	

    $(document).on('fullscreenchange webkitfullscreenchange mozfullscreenchange MSFullscreenChange', function() {
		
		if(!IsFullScreenCurrently())
		{
			$('#error').css("display","");
			$('#instruction').css("display","none");
			$('#demo-element').css("display","none");
			update('<?php echo $exam_id; ?>');
		}

    });
	</script>

	<script>
		let data=window.performance.getEntriesByType("navigation")[0].type;
		if(data === "reload")
		{
			$('#error').css("display","");
			$('#instruction').css("display","none");
			$('#demo-element').css("display","none");
			GoOutFullscreen();
			update('<?php echo $exam_id; ?>');
		}	
		//console.log(data);
		// window.addEventListener('contextmenu', function (e) {
		// 	$('#error').css("display","");
		// 	$('#instruction').css("display","none");
		// 	$('#demo-element').css("display","none");
		// 	GoOutFullscreen();
		// e.preventDefault();
		// }, false);
		// $('body').bind('copy paste',function(e) {
		// 	e.preventDefault(); return false; 
		// });
	</script>

</div>
</body>
</html>


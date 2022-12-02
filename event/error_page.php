<?php 
    include('master/Examination.php');
    include('header.php');
    $_SESSION["IS_EXAM"]="END";
    mysqli_query($con,"UPDATE user_exam_enroll_table SET exam_status = '1' WHERE user_id = '".$_GET['user_id']."' AND exam_id = '".$_GET['exam_id']."'");

?>

<script src="https://cdn.tailwindcss.com"></script>
<body style="background:#eee;">
<div class="row" style="margin-top:10rem;">
	<div class="col-md-12">
	<main class="bg-[#eee] py-[1rem] font-sans">
        <div class="mx-36 drop-shadow-lg  p-4 bg-white rounded-lg grid justify-center">
          <div class="mx-10 my-5 text-center">
            <h1 class="text-[1.75rem] font-semibold">Your Exam Is Finshed.</h1>
            <a href="enroll_exam.php">Go back to home.</a>
          </div>
        </div>
      </main>
	</div>
</div>
</body>
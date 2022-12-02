<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Events | TEXEPHYR-The Technical Fest Of MIT-WPU</title>
  	<meta charset="utf-8">
  	<link rel="icon" href="/3.png">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  	<link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/TimeCircles.css" />
    <link rel="stylesheet" href="style/jquery.countdown.css" />
    <script src="style/TimeCircles.js"></script>
    <script src="style/jquery.countdown.js"></script>
    <style>
        .bg-dark {
            background-color: mediumpurple;
        }
        body{
            background-color:#00000017;
        }
        @media screen and (max-width:600px){
            .resp{
                margin:0!important;
            }
            .resp1{
                font-size:1.25rem!important;
                text-align:center!important;
                
                
            }
            .resp2{
                margin:0!important;
            }
            .resp4{
                width: 100%!important;
                display: block!important;
                overflow:scroll!important;
                
            }
            .resp5{
                font-size:5vm!important;
                
            }
            .resp7{
                overflow:scroll!important;
            }
            .resp8{
                max-width:400px!important;
                height:100px!important;
                align-items:center!important;
               
            }
            
        }
        
        
    </style>
</head>
<body style="background:#00000017;">
 <?php 
//  echo "<pre>";
//  print_r($_SERVER);
    if(substr($_SERVER['SCRIPT_NAME'],1) != "view_exam.php")
    {
 ?> 
  <?php
  if(isset($_SESSION['user_id']))
  {
  ?>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
       <a class="navbar-brand" href="enroll_exam.php">
            View All Events
          </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="a2">
          
        </li>
        <li class="a1">
          <a class="nav-link" style="color:white;" href="logout.php" >Logout</a>
        </li> 
      </ul>
    </div>  
  </nav>

  <div class="container-fluid">
  <?php
  }
  }
  ?>
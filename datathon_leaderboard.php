<?php 
include('include/all.php');
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- <link rel="stylesheet" href="profile.css"> -->
<link rel="stylesheet" href="datatables/dataTables.bootstrap4.min.css">
<title>
    Texephyr | Datathon Leaderboard
    
</title>

<!-- <div class="container">
	<div class="row">
		<div class="col-12">
			<div class="profile" style="margin-top: 15rem;">
                <div class="headings">
                    <h1 style="color: white">LEADERBOARD DATATHON</h1>
                </div>
                <br>
                <div class="outer_table">
	                <table class="content-table">
	                    <thead>
	                        <tr class="active-row">
	                            <th></th>
	                            <th>Rank</th>
	                            <th>Name</th>
	                            <th>Fest Id</th>
	                            <th>Maximum F1 Score</th>
	                            <th>No. Of Attempts Left</th>
	                        </tr>
	                    </thead>

	                    <tbody>


	                    </tbody>
	                </table>
            	</div>
                
       		</div>
		</div>
	</div>
	
</div> -->
<div class="container-fluid" >

              <br><br><br><br><br>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="background-color: #111343 !important;">
                            <h6 class="m-0 font-weight-bold text-white">LEADERBOARD DATATHON</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
				                            <th>Rank</th>
				                            <th>Name</th>
				                            <th>Fest Id</th>
				                            <th>Maximum F1 Score</th>
				                            <th>No. Of Attempts Left</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $counter = 1;
                                        $sql = "SELECT DISTINCT dl2.name, dl2.fest_id, (SELECT MAX(f1_score) FROM datathon_leaderboards dl where dl.fest_id = dl2.fest_id) AS f1_score, (SELECT COUNT(*) FROM datathon_leaderboards dl where dl.fest_id = dl2.fest_id) AS no_of_attempts_left FROM datathon_leaderboards dl2 ORDER BY f1_score DESC;";
                                        $res = mysqli_query($con,$sql);
                                        while($row = mysqli_fetch_assoc($res))
                                        {   
                                            $attempt = $row['no_of_attempts_left'];
                                            ?>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['fest_id']; ?></td>
                                                <td><?php echo $row['f1_score']; ?></td>
                                                <td><?php echo (5-$attempt); ?></td>
                                            </tr>
                                            <?php
                                            $counter++;
                                        }
                                        ?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

<!-- <script type="text/javascript" src="datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="datatables/datatables-demo.js"></script>
<script type="text/javascript" src="datatables/jquery.dataTables.min.js"></script> -->
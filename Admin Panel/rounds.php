<?php
    include('sidebar.php');
?>

    <div class="home_content">    
        <div id="rounds_section">
            <div class="rounds_section_heading">
                <h2>ROUNDS SECTION</h2>
             </div>
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                        <div class="add_rounds_btn">
                            <a href="add_rounds.php">
                                <button>Add Rounds</button>
                            </a>
                        </div>
                        <div class="table-responsive">
                        <table id="table" class="table table-hover table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Department</th>
                        <th>Event Number</th>
                        <th>Round Number</th>
                        <th>Round Title</th>
                        <!-- <th>Salary</th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <!-- <td>$320,800</td> -->
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <!-- <td>$170,750</td> -->
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                        <!-- <td>$86,000</td> -->
                    </tr>
                    <tr>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2012/03/29</td>
                        <!-- <td>$433,060</td> -->
                    </tr>
                    <tr>
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2008/11/28</td>
                        <!-- <td>$162,700</td> -->
                    </tr>    
                        
                        </table>
                    </div>
                </div>
                </div>
            </div>
         </div>  
     </div>
   
<?php
    include('footer.php');
?>
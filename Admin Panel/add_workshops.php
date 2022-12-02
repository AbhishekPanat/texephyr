<?php
    include('sidebar.php');
    
 ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/add_workshops.css">
    <div class="home_content">
    <div class="container">
        <h1>Add Workshops</h1>
        <div class = "flat_line"></div>
        <div class="events_form_container">
            <form action="">
                <div class="row">
                    <div class="col-3">
                    <label for = "title">Title:</label>
                    </div>
                    <div class="col-6">                       
                        <input class = "form-control" type="text" id = "title" autocomplete="off" required/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label for="department">Department:</label>
                    </div>
                    <div class="col-6">
                    <select class = "form-control" id="department" required>
                        <option value="department" aria-placeholder = "Select Department">Select Department</option>
                        <option value="CS_department">CS</option>
                        <option value="ECE_department">ECE</option>
                        <option value="Mech_department">Mech</option>
                    </select>
                    </div>
                </div>
                <div class="row">
                <div class="col-3">
                    <label for = "details">Details: </label>
                    </div>
                    <div class="col-6">
                    
                        <textarea class = "form-control" id = "details" name="details"  autocomplete="off" required rows="5" cols="50" required></textarea>
                    </div>
                </div>

                <div class="row mt-4">
                <div class="col-3">
                    <label for = "details">Remarks: </label>
                    </div>
                    <div class="col-6">
                    
                        <textarea class = "form-control" id = "details" name="details"  autocomplete="off" required rows="5" cols="50" required></textarea>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-3">
                    <label for = "title">1 Person Price:</label>
                    </div>
                    <div class="col-6">                       
                        <input class = "form-control" type="text" id = "title" autocomplete="off" required/>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-3">
                    <label for = "title">2 Person Price:</label>
                    </div>
                    <div class="col-6">                       
                        <input class = "form-control" type="text" id = "title" autocomplete="off" required/>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-3">
                    <label for = "title">3 Person Price:</label>
                    </div>
                    <div class="col-6">                       
                        <input class = "form-control" type="text" id = "title" autocomplete="off" required/>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-3">
                    <label for = "title">Image:</label>
                    </div>
                    <div class="col-6">                       
                    <input  id='inputfile' type='file' name='inputfile' onChange='getoutput()'>
                    </div>
                </div>

                <div class="submit_btn_label mt-4">
                    <label for = "submit_btn"></label>
                    <!-- <a href="dashboard.html"> -->
                        <input  type="submit" id = "submit_btn" value="Submit"/>
                    <!-- </a> -->
                </div>
            </form>
        </div>   
    </div>
</div>

<?php
include('footer.php');  
?>
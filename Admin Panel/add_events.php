<?php
    include('sidebar.php');
    
 ?>
    <link rel="stylesheet" href="CSS/add_events.css">
    
    <div class="home_content">
    <div class="container">
        <h1>Add Events</h1>
        <div class = "flat_line"></div>
        <div class="events_form_container">
            <form action="">
                <div class="title_label">
                    <label for = "title">Title:</label>
                    <input type="text" id = "title" autocomplete="off" required/>
                </div>
                <div class="department_label">
                    <label for="department">Department:</label>
                    <select id="department" required>
                        <option value="department" aria-placeholder = "Select Department">Select Department</option>
                        <option value="CS_department">CS</option>
                        <option value="ECE_department">ECE</option>
                        <option value="Mech_department">Mech</option>
                    </select>
                </div>
                <div class="details_label">
                    <label for = "details">Details: </label>
                    <textarea id = "details" name="details"  autocomplete="off" required rows="10" cols="50" required></textarea>
                </div>
                <div class="rules_label">
                    <label for = "rules">Rules: </label>
                    <textarea id = "rules" name="rules"  autocomplete="off" required rows="10" cols="50" required></textarea>
                </div>
                <div class="max_participants_label">
                    <label for = "max_parts">Max Participants:</label>
                    <input type="number" id = "max_parts"  autocomplete="off" required/>
                </div>
                <div class="min_participants_label">
                    <label for = "min_parts">Min Participants:</label>
                    <input type="number" id = "min_parts"  autocomplete="off" required/>
                </div>
                <div class = "base_price_label">
                    <label for = "base_price">Base Price:</label>
                    <input type="text" id = "base_price" autocomplete="off"  required/>
                </div>
                <div class="others_price_label">
                    <label for = "others_price">Others Price:</label>
                    <input type="text" id = "others_price" required autocomplete="off" required/>
                </div>
                <div class="file_upload_label">
                    <span>Image:</span>
                    <input id='inputfile' type='file' name='inputfile' onChange='getoutput()'><br>
                    <!-- Output Filename <input id='outputfile' type='text' name='outputfile'><br>
                    Extension <input id='extension' type='text' name='extension'> -->
                </div>
                <div class="submit_btn_label">
                    <label for = "submit_btn"></label>
                    <!-- <a href="dashboard.html"> -->
                        <input type="submit" id = "submit_btn" value="Submit"/>
                    <!-- </a> -->
                </div>
            </form>
        </div>   
    </div>
</div>

<?php
include('footer.php');  
?>
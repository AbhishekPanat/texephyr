<?php
    include('sidebar.php');   
 ?>

<link rel="stylesheet" href="CSS/add_rounds.css">


<div class="home_content">
        <div class="_container">
            <h1>Add Rounds</h1>
        <div class = "flat_line"></div>
        <div class="rounds_form_container">
            <form action="dashboard.html#rounds_section">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Department:</label>
                    <select class="form-control" id="exampleFormControlSelect1" required>
                      <option value="CS_department">CS</option>
                      <option value="ECE_department">ECE</option>
                      <option value="Mech_department">Mech</option>
                    </select>
                  </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect2">Select Event:</label>
                  <select class="form-control" id="exampleFormControlSelect2" required>
                    <option value="event1">Event 1</option>
                    <option value="event2">Event 2</option>
                    <option value="event3">Event 3</option>
                    <option value="event4">Event 4</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Round Number:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" required >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">Round Title:</label>
                    <input type="text" class="form-control" id="exampleFormControlInput2" required></textarea>
                </div>
  
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Round Details:</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="9" required></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSubmit1"></label>
                    <input type="submit" class="form-control" id="exampleFormControlSubmit1" value = "Submit">
                </div>
              </form>
            </div>
        </div>
    </div>


 <?php
include('footer.php');
?>
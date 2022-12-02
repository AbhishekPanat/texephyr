<?php 
    session_start();
    if(isset($_GET['code']))
    {
        $_SESSION['IS_EXAM']="STARTED";
        ?>
            <script>
                window.location.href="view_exam.php?code=<?php echo $_GET['code']; ?>";
            </script>
        <?php
    }
?>
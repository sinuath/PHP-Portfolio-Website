<?php
    include ('header.php');
    // The shopping cart needs sessions, so start one

    echo "<div class=\"project\">";
    echo "<p><center><strong>Show Blood Pressure</strong></center></p>";

    // I was too lazy to change variable names, this was supposed to be a quick web app. 
    $DJID = addslashes(trim($_POST['BPID']));
    $Blog = addslashes(trim($_POST['Systolic']));
    $Time = addslashes(trim($_POST['Diastolic']));
    $Submission = date("Y-m-d H:i:s");

    if((!$Blog == 0) && !insert_BP_entry($DJID, $Blog, $Time, $Submission)) {
      echo "<p><font color='red'>Blood Pressure Entry: ".$Blog." was Not inserted</font></p>";
    }

    BP_form();

    echo "</div>";


    include ('footer.php');
?>
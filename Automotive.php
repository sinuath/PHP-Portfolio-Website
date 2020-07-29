<?php
    include ('header.php');
    // The shopping cart needs sessions, so start one

    echo "<div class=\"project\">";
    echo "<p><center><strong>Automotive Page</strong></center></p>";

    // I was too lazy to change variable names, this was supposed to be a quick web app. 
    $service = addslashes(trim($_POST['service']));
    $Submission = date("Y-m-d H:i:s");
    /*
    echo "Variables: ";
    echo "<p>Service: ", $service;
    echo "</p><p>Submission Date: ", $Submission;
    echo "</p>";
     * */
     
    if((!$service == 0) && !update_automotive_entry($service, $Submission)) {
      echo "<p><font color='red'>Blood Pressure Entry: ".$Blog." was Not inserted</font></p>";
    }

    Automotive_form();

    echo "</div>";


    include ('footer.php');
?>
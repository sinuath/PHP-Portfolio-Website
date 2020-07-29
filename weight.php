<?php
    include ('header.php');
    // The shopping cart needs sessions, so start one

    echo "<div class=\"project\">";
    echo "<p><center><strong>Show Blood Pressure</strong></center></p>";

    // I was too lazy to change variable names, this was supposed to be a quick web app. 
    $WEIGHTID = addslashes(trim($_POST['WEIGHTID']));
    $weight = addslashes(trim($_POST['weight']));
    $Submission = date("Y-m-d H:i:s");

    if((!$weight == 0) && !insert_weight_entry($WEIGHTID, $weight, $Submission)) {
      echo "<p><font color='red'>Blood Pressure Entry: ".$Blog." was Not inserted</font></p>";
    }

    weight_form();

    echo "</div>";


    include ('footer.php');
?>
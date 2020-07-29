<?php

// include function files for this application
require_once('header.php');
require 'portfolio_sidebar.php';
echo "<div class=\"project\">";
echo "<div align=\"center\">";
if (check_admin()) {
    $PortID = $_POST['PortID'];
    $Photo = trim($_POST['Photo']);
    
    if((!$PortID == null) && (!$Photo == null)){
        if(insert_project_photo($PortID, $Photo)){
            echo "<p><font color='green'>Photo Inserted</font></p>";
        }else{
            echo "<p><font color='red'>Photo Not Inserted</font></p>";
        }
        display_photo_form($PortID);
        display_project_photos($PortID);
    }else{
        for($i=0;$i<3;$i++){
            echo "<p><font color='red'>Danger Will Robinson! Danger!</font></p>";
        }
        echo "<p>No Project ID And Category ID</p>";
    }
    
    
    // Add Insertion form that has a preexisting category list. 
    // Insert Category if they've already submitted the form. 

} else {
  echo "<p>You are not authorised to view this page.</p>";
}
echo "</div>";
echo "</div>";
require_once('footer.php');

?>

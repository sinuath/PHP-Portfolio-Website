<?php

// include function files for this application
require_once('header.php');
require 'portfolio_sidebar.php';

echo "<div class=\"project\">";


echo "<div align=\"center\">";
if (check_admin()) {
    if($PortID = $_GET['PortID']){
        echo "<strong>Inserting Photo for Project: ".get_project_name($PortID)."</strong>";
        display_photo_form($PortID);
        display_project_photos($PortID);
    }else{
        echo "<strong>Wrong Page</strong>";
        echo "<p>Can't access form without viewing a project first.</p>";
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

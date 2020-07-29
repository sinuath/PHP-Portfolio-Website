<?php

// include function files for this application
require_once('header.php');
require 'portfolio_sidebar.php';
echo "<div class=\"project\">";
echo "<div align=\"center\">";
if (check_admin()) {
    $PortID = $_POST['PortID'];
    $LinkSource = trim($_POST['LinkSource']);
    $Link = trim($_POST['Link']);
    if((!$PortID == null) && (!$Link == null) && (!$LinkSource == null)){
        if(insert_project_link($PortID, $LinkSource, $Link)){
            echo "<p><font color='green'>Link Inserted</font></p>";
        }else{
            echo "<p><font color='red'>Link Not Inserted</font></p>";
        }
        display_link_form($PortID);
        display_project_links($PortID);
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

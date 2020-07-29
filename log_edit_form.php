<?php

// include function files for this application
require_once('header.php');
echo "<p>&nbsp;</p><div class=\"log\">";
echo "<div class=\"title\">Edit Log Details</div>";
if (check_admin()) {
  if ($video = get_log_details($_GET['LogID'])) {
    
    display_log_form($video);
    
  } else {
    echo "<p>Could not retrieve Log details.</p>";
  }

} else {
  echo "<p>You are not authorized to enter the administration area.</p>";
}
    echo "</div>";
require_once('footer.php');

?>

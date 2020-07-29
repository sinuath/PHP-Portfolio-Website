<?php

// include function files for this application
require_once('header.php');
require 'portfolio_sidebar.php';
echo "<p>&nbsp;</p><div class=\"log\">";
echo "<div class=\"title\">Edit Portfolio Details</div>";
if (check_admin()) {
  if ($video = get_portfolio_details($_GET['PortID'])) {
    
      display_portfolio_form($video);
    
  } else {
    echo "<p>Could not retrieve Log details.</p>";
  }

} else {
  echo "<p>You are not authorized to enter the administration area.</p>";
}
    echo "</div>";
require_once('footer.php');

?>

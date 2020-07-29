<?php

// include function files for this application
require_once('header.php');
require 'portfolio_sidebar.php';
echo "<div class=\"project\">";
echo "<strong>Deleting Project</strong>";
if (check_admin()) {
  if (isset($_GET['PortID'])) {
    $PortID = $_GET['PortID'];

    if(delete_portfolio_project($PortID)) {
      echo "<p>LogID ".$PortID." was deleted.</p>";
    } else {
      echo "<p>LogID ".$PortID." could not be deleted.</p>";
    }
  } else {
    echo "<p>There was an Error in your request.</p>";
  }
   portfolio_form();
} else {
  echo "<p>You are not authorised to view this page.</p>";
}
echo "</div>";

require_once('footer.php');

?>
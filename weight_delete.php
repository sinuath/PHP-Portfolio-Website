<?php

// include function files for this application
require_once('header.php');
echo "<div class=\"log_entry\">";

if (check_admin()) {
  if (isset($_GET['WEIGHTID'])) {
    $WEIGHTID = $_GET['WEIGHTID'];
    echo "<strong>Deleting Weight: </strong>"+$WEIGHTID;
    if(delete_weight_entry($WEIGHTID)) {
      echo "<p>Weight was deleted.</p>";
    } else {
      echo "<p>Weight could not be deleted.</p>";
    }
  } else {
    echo "<p>There was an Error in your request.</p>";
  }
  weight_form();

} else {
  echo "<p>You are not authorised to view this page.</p>";
}
echo "</div>";
require_once('footer.php');

?>
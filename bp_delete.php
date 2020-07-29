<?php

// include function files for this application
require_once('header.php');
echo "<div class=\"log_entry\">";

if (check_admin()) {
  if (isset($_GET['BPID'])) {
    $DJBlogID = $_GET['BPID'];
    echo "<strong>Deleting BP: </strong>"+$DJBLOGID;
    if(delete_bp_entry($DJBlogID)) {
      echo "<p>BP was deleted.</p>";
    } else {
      echo "<p>BP could not be deleted.</p>";
    }
  } else {
    echo "<p>There was an Error in your request.</p>";
  }
  BP_form();

} else {
  echo "<p>You are not authorised to view this page.</p>";
}
echo "</div>";
require_once('footer.php');

?>
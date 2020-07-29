<?php

// include function files for this application
require_once('header.php');
echo "<div class=\"project\">";
echo "<strong>Deleting Request</strong>";
if (check_admin()) {
  if (isset($_GET['RequestID'])) {
    $RequestID = $_GET['RequestID'];

    if(delete_request($RequestID)) {
      echo "<p>Request deleted.</p>";
    } else {
      echo "<p>Request could not be deleted.</p>";
    }
  } else {
    echo "<p>There was an Error in your request.</p>";
  }

    music_request_form();
} else {
  echo "<p>You are not authorised to view this page.</p>";
}
echo "</div>";


require_once('footer.php');

?>
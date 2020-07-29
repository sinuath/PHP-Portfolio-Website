<?php

// include function files for this application
require_once('header.php');
echo "<div class=\"project\">";
echo "<strong>Deleting Media</strong>";
if (check_admin()) {
  if (isset($_GET['RequestID'])) {
    $RequestID = $_GET['RequestID'];
    if(delete_media($RequestID)) {
      echo "<p>Request deleted.</p>";
    } else {
      echo "<p>Request could not be deleted.</p>";
    }
  } else {
    echo "<p>There was an Error in your request.</p>";
  }

    media_library_form();
} else {
  echo "<p>You are not authorised to view this page.</p>";
}
echo "</div>";


require_once('footer.php');

?>
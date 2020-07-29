<?php

// include function files for this application
require_once('header.php');

echo "<strong>Deleting Log</strong>";
if (check_admin()) {
  if (isset($_GET['LogID'])) {
    $LogID = $_GET['LogID'];

    if(delete_log($LogID)) {
      echo "<p>LogID ".$LogID." was deleted.</p>";
    } else {
      echo "<p>LogID ".$LogID." could not be deleted.</p>";
    }
  } else {
    echo "<p>There was an Error in your request.</p>";
  }
  $archive = get_log_entries();

  display_archive($archive);
} else {
  echo "<p>You are not authorised to view this page.</p>";
}

require_once('footer.php');

?>
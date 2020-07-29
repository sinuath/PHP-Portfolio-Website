<?php

// include function files for this application
require_once('header.php');

echo "<strong>Updating Log ".$_POST['Title']."</strong>";
if (check_admin()) {
  if (filled_out($_POST)) {
    $LogID = $_POST['LogID'];
    $Title = addslashes(trim($_POST['Title']));
    $Date = addslashes(trim($_POST['Date']));
    $Blog = addslashes(trim($_POST['Blog']));

    if(update_log($LogID, $Title, $Date, $Blog)) {
      echo "<p>Log was updated.</p>";
    } else {
      echo "<p>Log could not be updated.</p>";
    }
  } else {
    echo "<p>You have not filled out the form.  Please try again.</p>";
  }
} else {
  echo "<p>You are not authorised to view this page.</p>";
}

require_once('footer.php');

?>

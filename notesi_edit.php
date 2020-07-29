<?php

// include function files for this application
require_once('header.php');

echo "<strong>Updating Note ".$_POST['Title']."</strong>";
if (check_admin()) {
  if (filled_out($_POST)) {
    $LogID = $_POST['NoteID'];
    $Title = addslashes(trim($_POST['Title']));
    $Category = addslashes(trim($_POST['Category']));
    $Note = addslashes(trim($_POST['Note']));
    $Private = addslashes(trim($_POST['Private']));

    if(update_Notei($LogID, $Title, $Category, $Note, $Private)) {
      echo "<p>Note was updated.</p>";
    } else {
      echo "<p>Note could not be updated.</p>";
    }
  } else {
    echo "<p>You have not filled out the form.  Please try again.</p>";
  }
} else {
  echo "<p>You are not authorised to view this page.</p>";
}

require_once('footer.php');

?>

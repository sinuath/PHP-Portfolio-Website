<?php

// include function files for this application
require_once('header.php');
 echo "<div class=\"project\">";
echo "<strong>Deleting Note</strong>";
if (check_admin()) {
  if (isset($_GET['NoteID'])) {
    $NoteID = $_GET['NoteID'];

    if(delete_notei($NoteID)) {
      echo "<p>NoteID ".$NoteID." was deleted.</p>";
    } else {
      echo "<p>NoteID ".$NoteID." could not be deleted.</p>";
    }
  } else {
    echo "<p>There was an Error in your request.</p>";
  }
  display_notesi_options();
} else {
  echo "<p>You are not authorised to view this page.</p>";
}
echo "</div>";
require_once('footer.php');

?>
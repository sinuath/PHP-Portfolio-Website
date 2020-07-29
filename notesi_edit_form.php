<?php

// include function files for this application
require_once('header.php');
echo "<p>&nbsp;</p><div class=\"log\">";
echo "<div class=\"title\">Edit Note Details</div>";
if (check_admin()) {
  if ($note = get_notei_details($_GET['NoteID'])) {
    
    display_notei_form($note);
    
  } else {
    echo "<p>Could not retrieve Note details.</p>";
  }

} else {
  echo "<p>You are not authorized to enter the administration area.</p>";
}
    echo "</div>";
require_once('footer.php');

?>

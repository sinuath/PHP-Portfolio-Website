<?php

// include function files for this application
require_once('header.php');
?>
<div class="log">

<?php
echo "<div class=\"title\">New Note</div>";
if (check_admin()) {

    $Title = addslashes(trim($_POST['Title']));
    $Category = addslashes(trim($_POST['Category']));
    $Notes = addslashes(trim($_POST['Note']));
    $Private = addslashes(trim($_POST['Private']));
    
    $Error = insert_notei_entry($Title, $Category, $Notes, $Private);

    if($Error == "Success") {
      echo "<p><font color='green'>Note Entry: ".$Title." was inserted</font></p>";
      display_notesi_options();
      $notes = get_improved_note_entries(null);
      display_notes_improved($notes);
    } else {
        echo $Error;
      //echo "<p><font color='red'>Note Entry: ".$Title." was Not inserted</font></p>";
      display_note_form();
    }

} else {
  echo "<p>You are not authorised to view this page.</p>";
}
?>
</div>

<?php
require_once('footer.php');
?>
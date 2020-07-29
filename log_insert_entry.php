<?php

// include function files for this application
require_once('header.php');
?>
<div class="log">

<?php
echo "<div class=\"title\">New Log</div>";
if (check_admin()) {

    $Title = addslashes(trim($_POST['Title']));
    $Date = addslashes(trim($_POST['Date']));
    $Blog = addslashes(trim($_POST['Blog']));

    if(insert_log_entry($Title, $Date, $Blog)) {
      echo "<p><font color='green'>Log Entry: ".$Title." was inserted</font></p>";
    } else {
      echo "<p><font color='red'>Log Entry: ".$Title." was Not inserted</font></p>";
      display_log_form();
    }

} else {
  echo "<p>You are not authorised to view this page.</p>";
}
?>
</div>

<?php
require_once('footer.php');
?>
<?php
  include ('header.php');
  // The shopping cart needs sessions, so start one

  echo "<p><strong>Show Archive</strong></p>";
  // get the book info out from db
  $archive = get_log_entries();

  display_archive($archive);




  include ('footer.php');
?>
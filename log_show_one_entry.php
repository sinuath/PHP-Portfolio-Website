<?php
  include ('header.php');
  // The shopping cart needs sessions, so start one

  $VideoID = $_GET['LogID'];

  // get this book out of database
  $log = get_log_details($VideoID);
  echo "<center><strong>".$video['Title']."</strong></center>";
  display_log($log);




  include ('footer.php');
?>

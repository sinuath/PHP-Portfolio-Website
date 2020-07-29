<?php
  include ('header.php');
  // The shopping cart needs sessions, so start one

  $NoteID = $_GET['NoteID'];

  // get this book out of database
  $Note = get_notei_details($NoteID);
  //echo "<center><strong>".$Note['Title']."</strong></center>";
  display_note($Note);





  include ('footer.php');
?>

<?php
  include ('header.php');
  // The shopping cart needs sessions, so start one
    echo "<div class=\"project\">";
    echo "<p><center><strong>Show Notes</strong></center></p>";

  // get the book info out from db
  $Option = addslashes(trim($_POST['Category']));
  
  if((!$Option == null)){
      $notes = get_improved_note_entries($Option);
      display_notes_improved($notes);
  }else{
      display_notesi_options();
      $notes = get_improved_note_entries(null);
      display_notes_improved($notes);
  }

  if(check_admin()){
    echo "<a class=\"NewNote\" href=\"notesi_insert_form.php\"><i class=\"fa fa-pencil-square-o\"></i> New Note</a>";
  }
    echo "</div>";

  include ('footer.php');
?>
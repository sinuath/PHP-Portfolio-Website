<?php
  include ('header.php');

    echo "<div class=\"project\">";
    echo "<p><center><strong>Movie/Show Tracker</strong></center></p>";
    echo "<p>This page is to keep track of movies/tv shows that i'm looking forward to.</p>";

    $Media = addslashes(trim($_POST['Media']));
    $Month = trim($_POST['Month']);
    $Day = addslashes(trim($_POST['Day']));
    $Year = addslashes(trim($_POST['Year']));
    
    $Date = $Year . "-" . $Month . "-" . $Day;

    if((!$Media == null) && !insert_media_library_entry($Media, $Date)) {
      echo "<p><font color='red'>Request Entry: ".$Media." was Not inserted</font></p>";
    }  

    media_library_form();
    
    echo "</div>"; // Project Div closing tag

  include ('footer.php');
?>
<?php
  include ('header.php');

    echo "<div class=\"project\">";
    echo "<p><center><strong>Songs to look up later</strong></center></p>";

    $Song = addslashes(trim($_POST['Song']));
    $Artist = addslashes(trim($_POST['Artist']));
    
    
        
    if((!$Song == null) && !insert_request_entry($Song, $Artist)) {
      echo "<p><font color='red'>Request Entry: ".$Song." was Not inserted</font></p>";
    }  

    music_request_form();
    
    echo "</div>";

  include ('footer.php');
?>
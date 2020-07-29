<?php
  include ('header.php');

    echo "<div class=\"project\">";
    echo "<p><center><strong>Show Movies</strong></center></p>";
    echo "<p>Watching movies from A to Z, please suggest something :)</p>";

    $Letter = addslashes(trim($_POST['Letter']));
    $Movie = addslashes(trim($_POST['Movie']));
        
    if((!$Movie == null) && !insert_movie_entry($Letter, $Movie)) {
      echo "<p><font color='red'>Request Entry: ".$Movie." was Not inserted</font></p>";
    }  

    movie_night_form();
    
    echo "</div>";

  include ('footer.php');
?>
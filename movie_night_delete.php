<?php

// include function files for this application
require_once('header.php');
echo "<div class=\"project\">";
echo "<strong>Deleting Movie</strong>";
if (check_admin()) {
  if (isset($_GET['Movie'])) {
    $RequestID = $_GET['Movie'];

    if(delete_movie($RequestID)) {
      echo "<p>Request deleted.</p>";
    } else {
      echo "<p>Request could not be deleted.</p>";
    }
  } else {
    echo "<p>There was an Error in your request.</p>";
  }

    movie_night_form();
} else {
  echo "<p>You are not authorised to view this page.</p>";
}
echo "</div>";


require_once('footer.php');

?>
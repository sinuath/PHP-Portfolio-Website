<?php

// include function files for this application
require_once('header.php');
require 'portfolio_sidebar.php';

echo "<strong>Updating Project ".$_POST['Title']."</strong>";
if (check_admin()) {
  if (filled_out($_POST)) {
    $PortID = $_POST['PortID'];
    $Title = addslashes(trim($_POST['Title']));
    $ShortDescrip = trim($_POST['ShortDescription']);
    $Descrip = addslashes(trim($_POST['Description']));

    if(update_portfolio($PortID, $Title, $ShortDescrip, $Descrip)) {
      echo "<p>Portfolio was updated.</p>";
    } else {
      echo "<p>Portfolio could not be updated.</p>";
    }
  } else {
    echo "<p>You have not filled out the form.  Please try again.</p>";
  }
} else {
  echo "<p>You are not authorised to view this page.</p>";
}

require_once('footer.php');

?>

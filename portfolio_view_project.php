<?php
  include ('header.php');
  require 'portfolio_sidebar.php';
  // The shopping cart needs sessions, so start one

  $PortID = $_GET['PortID'];

  // get this book out of database
  if($project = get_portfolio_details($PortID)){
      display_project($PortID, $project);
  }else{
      echo "<p>Danger Will Robinson! Danger!</p>";
      echo "<p>".$video['Title'].": has broken!</p>";
  }
  
  




  include ('footer.php');
?>

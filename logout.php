<?php

// include function files for this application
include('header.php');
$old_user = NULL;
if(isset($_SESSION['admin']))
{
	$old_user = $_SESSION['admin'];  // store  to test if they *were* logged in
	unset($_SESSION['admin']);
}
if(isset($_SESSION['user']))
{
	$old_user = $_SESSION['user'];  // store  to test if they *were* logged in
	unset($_SESSION['user']);
}
session_destroy();
echo '<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">';
// start output html


include('footer.php');
?>

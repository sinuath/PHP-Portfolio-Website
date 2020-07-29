<?php
	session_start();
	include_once('user_auth_fns.php');
	$message = false;
	$date = date("Y-m-d");
	if ((@$_POST['username']) && ($_POST['passwd'])) {
		// they have just tried logging in

	    $username = $_POST['username'];
	    $passwd = $_POST['passwd'];
	    $display_login = false;
	    $welcome = "<p>Welcome ".$username."!</p>";

	    if (AdminLogin($username, $passwd, $date)) {
	      $_SESSION['admin'] = $username;
              $message = "Hello ".$_SESSION['admin'];

	   }else if (UserLogin($username, $passwd, $date)) {
	      $_SESSION['user'] = $username;
              $message = "Hello ".$_SESSION['user'];

	   }else
	   {
	      // unsuccessful login
	      $message = "<p><font color=\"#990000\">You could not be logged in.</font></p><br/>";
	      $display_login = true;
	    }
	}else
	{
	      $display_login = true;
	}
	include('header.php');
	if($display_login)
	{
		if($message) {echo $message;}
        	display_login_form();
	}else
	{
		echo $welcome;
	}
	include('footer.php');
?>

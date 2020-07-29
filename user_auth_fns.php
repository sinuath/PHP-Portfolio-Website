<?php

require_once('db_fns.php');

function UserLogin($username, $password, $date) {
// check username and password with db
// if yes, return true
// else return false

  // connect to db
  $conn = db_connect();
  if (!$conn) {
    return 0;
  }

  // check if username is unique
  $result = $conn->query("select * from USERTABLE
                         where UserName='".$username."'
                         and Password = sha1('".$password."')");
  if (!$result) {
     return 0;
  }

  if ($result->num_rows>0) { // User was sucessfully logged in
  	  $row = $result->fetch_assoc();
	  $_SESSION['Llogin']=$row['Llogin'];
	  $result = $conn->query("update USERTABLE
	  			  set Llogin= '".$date."'
				  where UserName='".$username."'");
  	 /* $row = $result->fetch_assoc();
	  $_SESSION['Llogin']=$row['Llogin'];*/
     return 1;
  } else {
     return 0;
  }
}

function AdminLogin($username, $password, $date) {
// check username and password with db
// if yes, return true
// else return false

  // connect to db
  $conn = db_connect();
  if (!$conn) {
    return 0;
  }

  // check if username is unique
  $result = $conn->query("select * from USERTABLE
                         where Username='".$username."'
                         and Password = sha1('".$password."') AND IsAdmin = TRUE");
  if (!$result) {
     return 0;
  }

  if ($result->num_rows>0) {
  	  $row = $result->fetch_assoc();
	  $_SESSION['Llogin']=$row['Llogin'];
	  $result = $conn->query("update USERTABLE
	  			  set Llogin= '".$date."'
				  where Username='".$username."'");
     return 1;
  } else {
     return 0;
  }
}

function check_user() {
// see if somebody is logged in and notify them if not

  if (isset($_SESSION['user'])) {
    return true;
  } else {
    return false;
  }
}

function check_admin() {
// see if somebody is logged in and notify them if not

  if (isset($_SESSION['admin'])) {
    return true;
  } else {
    return false;
  }
}

function change_password($username, $old_password, $new_password) {
// change password for username/old_password to new_password
// return true or false

  // if the old password is right
  // change their password to new_password and return true
  // else return false
  if (login($username, $old_password)) {

    if (!($conn = db_connect())) {
      return false;
    }

    $result = $conn->query("update USERTABLE
                            set password = sha1('".$new_password."')
                            where username = '".$username."'");
    if (!$result) {
      return false;  // not changed
    } else {
      return true;  // changed successfully
    }
  } else {
    return false; // old password was wrong
  }
}


?>

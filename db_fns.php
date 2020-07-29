<?php

function db_connect() {
   include('./../config/db.php');
   $result = new mysqli($host, $dbusername, $dbpassword, $database);
   if (!$result) {
      return false;
   }
   $result->autocommit(TRUE);
   return $result;
}

function db_result_to_array($result) {
   $res_array = array();

   for ($count=0; $row = $result->fetch_assoc(); $count++) {
     $res_array[$count] = $row;
   }

   return $res_array;
}


function db_result_to_table($result) {
   $res_array = array();

   for ($count=0; $row = $result->fetch_assoc(); $count++) {
     $res_array[$count] = $row;
   }

   return $res_array;
}

?>

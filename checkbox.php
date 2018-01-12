<?php

session_start();
 function isTokenValid($token){
  if(!empty($_SESSION['tokens'][$token])){
    unset($_SESSION['tokens'][$token]);
    return true;
  }
  return false;
}

// Check if a form has been sent
$postedToken = filter_input(INPUT_POST, 'token');
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
if(!empty($postedToken))
{
  if(isTokenValid($postedToken))
  {
    if($_SERVER['REQUEST_METHOD'] = "POST") //Added an if to keep the page secured
         {
             if($_SERVER['REQUEST_METHOD'] = "POST") //Added an if to keep the page secured
	             {
		             mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
		              mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database
		             $checkBox = implode(',', $_POST['public']);
                      if(isset($_POST['submit']))
                         {       
                             $query="INSERT INTO lists (selected) VALUES ('" . $checkBox . "')";     
                             mysql_query($query) or die (mysql_error() );
                          }
                 }
          }
   } 
  else
  {
      echo "denied";
  }
}
?>

<?php
//Set no caching
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
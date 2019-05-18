<?php session_start();
 
 // Database Variables (edit with your own server information)
 /*$  server = 'localhost';
 $   user = 'root';
 $   pass = '';
 $   db = 'home';*/
 if(!($_SESSION['server']) || !($_SESSION['user']))
 header('Location: '.$http.'admin_eps.php'); 
 $s=$_SESSION['server'];$u=$_SESSION['user'];$p=$_SESSION['pass'];
 $server = $s;   
 $user = $u;
 $pass = $p;
 $db = 'home';
 echo 'Hi  '.$u;
	 
 // Connect to Database
 $connection = mysql_connect($server, $user, $pass) 
 or die ("Could not connect to server ... \n" . mysql_error ());
 mysql_select_db($db) 
 or die ("Could not connect to database ... \n" . mysql_error ());

 
?>
  	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
        <title>View Records</title>
</head>
<body>

<?php
 include('connect-db2.php');
  
  if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
  
 $id = $_GET['id'];
 $result = mysql_query("DELETE FROM download WHERE id=$id")
 or die(mysql_error()); 
 
 header('Location: '.$http.'e_download.php');
 }
 else
 {
 header('Location: '.$http.'e_download.php');
 }
 
?>
 </body>
</html>
<?php
 include('connect-db2.php');
  if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
  
 $id = $_GET['id'];
 $result = mysql_query("DELETE FROM scroll WHERE id=$id")
 or die(mysql_error()); 
 
 header('Location: '.$http.'e_scroll.php');
 }
 else
 {
 header('Location: '.$http.'e_scroll.php');
 }
 
?>
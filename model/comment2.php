<?php 
include('connect-db.php');		
if (isset($_POST['submit']))
{$name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
 $email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
 $comment = mysql_real_escape_string(htmlspecialchars($_POST['comment'])); 
  
 
   
 mysql_query("INSERT comments SET name='$name', email='$email',comment='$comment',date= now() ")
 or die(mysql_error());
  
header('Location:'.$http.'question2.php');
 }
 ?>
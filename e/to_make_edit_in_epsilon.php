<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Record</title>
 </head>
 <body>
  <?php session_start(); 
  $s=$_POST['server'];$u=$_POST['user'];$p=$_POST['pass'];
  $_SESSION['server']=$s;$_SESSION['user']=$u;$_SESSION['pass']=$p;
  $http='';
  if($s == '' || $u == '' ){echo 'please fill the correct information';}
  else{
 echo '<a href="'.$http.'e_comment.php">To make delete of comments page</a><br/><br/>';
 echo '<a href="'.$http.'e_download.php">To make edit of downloads page</a><br/><br/>';
 echo '<a href="'.$http.'e_new.php">To make edit of new product page</a><br/><br/>';
 echo '<a href="'.$http.'e_newtitles.php">To make edit of scrolling title of new product page</a><br/><br/>';
 echo '<a href="'.$http.'e_picture.php">To make edit of pictures page</a><br/><br/>';
 echo '<a href="'.$http.'e_price.php">To make edit of prices page</a><br/><br/>';
 echo '<a href="'.$http.'e_scroll.php">To make edit of scroll news moving above page</a><br/><br/>';
 echo '<a href="'.$http.'e_sound.php">To make edit of sounds page</a><br/><br/>';
  }
 ?>
 </body>
</html>
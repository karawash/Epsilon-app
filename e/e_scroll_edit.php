<?php
  function renderForm($id, $english, $error)
 { ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Record</title>
 </head>
 <body>
 <?php 
  if ($error != '')
 {echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
 <div>
 <strong>english     : *<br/></strong> <textarea rows="5"cols="50"type="text" name="english" value="<?php echo $english; ?>"></textarea><br/>
 <strong>arabic      : *<br/></strong> <textarea rows="5"cols="50"type="text" name="arabic" value="<?php echo $arabic; ?>"></textarea><br/>
  
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 </body>
 </html> 
 <?php
 }
  include('connect-db2.php');
 if (isset($_POST['submit']))
{  if (is_numeric($_POST['id']))
 {
  $id = $_POST['id'];
 $english = mysql_real_escape_string(htmlspecialchars($_POST['english']));
 $arabic = mysql_real_escape_string(htmlspecialchars($_POST['arabic']));
 
 if ($english == '' || $arabic == '')
 { $error = 'ERROR: Please fill in all required fields!';
   renderForm($id, $english, $error);
 }
 else
 {  
 mysql_query("UPDATE scroll SET english='$english', arabic='$arabic' WHERE id='$id'")
 or die(mysql_error()); 
  header('Location: '.$http.'e_scroll.php'); 
 }
 }
 else
 {
  echo 'Error!';
 }
 }
 else
 {
 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 $id = $_GET['id'];
 $result = mysql_query("SELECT * FROM scroll WHERE id=$id")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
   
 if($row)
 {
 $english = $row['english'];
 $arabic = $row['arabic'];
 renderForm($id, $english, '');
 }
 else
 {
 echo "No results!";
 }
 }
 else
 {
 echo 'Error!';
 }
 }
?>
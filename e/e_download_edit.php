<?php
  function renderForm($id, $content, $link, $error)
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
 <strong>program name: *<br/></strong> <textarea rows="10"cols="50"type="text" name="content"><?php echo $content; ?></textarea><br/>
 <strong>Link        : *<p>* Required link start by <font color="red"> http://</font></p>
 <br/></strong> <textarea rows="10"cols="50"type="text" name="link" ><?php echo $link; ?></textarea><br/>
 
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
 $content = mysql_real_escape_string(htmlspecialchars($_POST['content']));
 $link = mysql_real_escape_string(htmlspecialchars($_POST['link']));
 
 if ($content == '' || $link == '')
 { $error = 'ERROR: Please fill in all required fields!';
   renderForm($id, $content, $link, $error);
 }
 else
 {  
 mysql_query("UPDATE download SET content='$content', link='$link' WHERE id='$id'")
 or die(mysql_error()); 
  header('Location: '.$http.'e_download.php'); 
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
 $result = mysql_query("SELECT * FROM download WHERE id=$id")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
   
 if($row)
 {
 $content = $row['content'];
 $link = $row['link'];
 renderForm($id, $content, $link, '');
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
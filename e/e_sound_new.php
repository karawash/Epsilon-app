<?php
  function renderForm($content, $link, $size, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>New Record</title>
 </head>
 <body>
 <?php 
 if ($error != '')
 {echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <div>
  
 <strong>sound name: *</strong> <input type="text" name="content" value="<?php echo $content; ?>" /><br/>
   link should start by http://
 <strong>link:</strong> <br/><textarea rows="10"cols="50"type="text" name="link" value="<?php echo $link; ?>">http://</textarea><br/>
 <strong>size: *</strong> <input type="text" name="size" value="<?php echo $size; ?>" /><br/>
 <p>* required</p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 </body>
 </html>
 <?php 
 }
 include('connect-db2.php');
 $error='';$table_name=$_POST['table_name'];
 if (isset($_POST['submit']))
{$content = mysql_real_escape_string(htmlspecialchars($_POST['content']));
 $link = mysql_real_escape_string(htmlspecialchars($_POST['link']));
 $size = mysql_real_escape_string(htmlspecialchars($_POST['size']));
 
 if ($content == '' || $link == ''|| $size== '')
{ $error = 'ERROR: Please fill in all required fields!';
  renderForm($content, $link, $size, $error);
 }
 else
{ mysql_query("INSERT music SET content='$content', link='$link',size='$size'")
 or die(mysql_error());
 header('Location: '.$http.'e_sound.php'); 
 }
 }
 else
 {
 renderForm('','','','');
 }
 ?> 
<?php
  function renderForm($content, $link, $error)
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
 <strong>program name: *</strong> <textarea name="content" value="<?php echo $content; ?>" ></textarea><br/>
 <strong>link: *</strong> <textarea name="link" value="<?php echo $link; ?>" >http://</textarea><br/>
 <p>* required</p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form>
<input type="hidden" name="server" value="<?php echo $s; ?>"/>	 
<input type="hidden" name="user" value="<?php echo $u; ?>"/>	 
<input type="hidden" name="pass" value="<?php echo $p; ?>"/>	 

 </body>
 </html>
 <?php 
 }
 include('connect-db2.php');   
 	 
 $error='';$table_name=$_POST['table_name'];
 if (isset($_POST['submit']))
{$content = mysql_real_escape_string(htmlspecialchars($_POST['content']));
 $link = mysql_real_escape_string(htmlspecialchars($_POST['link']));
 
 if ($content == '' || $link == '')
{ $error = 'ERROR: Please fill in all required fields!';
  renderForm($content, $link, $error);
 }
 else
{ mysql_query("INSERT download SET content='$content', link='$link'")
 or die(mysql_error());
 header('Location: '.$http.'e_download.php'); 
 }
 }
 else
 {
 renderForm('','','');
 }
 ?> 
<?php
  function renderForm($content, $content_arabic,$price ,$photo , $error)
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
  
<strong>content:         *<br/></strong> <textarea rows="5"cols="50"type="text" name="content" value="<?php echo $content; ?>" ></textarea><br/>
<strong>content_arabic:  *<br/></strong> <br/><textarea rows="5"cols="50"type="text" name="content_arabic" value="<?php echo $content_arabic; ?>"></textarea><br/>
<strong>price :          *<br/></strong><input type="text" name="price"value="<?php echo $price; ?>" /><br/>
<strong>photo link:      *<br/></strong> <textarea rows="5"cols="50"type="text" name="photo" value="<?php echo $photo; ?>" >http://</textarea><br/>
 
  
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 </body>
 </html>
 <?php 
 }
 include('connect-db2.php');
 $error='';
 if (isset($_POST['submit']))
{$content = mysql_real_escape_string(htmlspecialchars($_POST['content']));
 $content_arabic = mysql_real_escape_string(htmlspecialchars($_POST['content_arabic']));
 $price = mysql_real_escape_string(htmlspecialchars($_POST['price']));
 $photo = mysql_real_escape_string(htmlspecialchars($_POST['photo']));
 
 if ($content == '' || $content_arabic == '' || $price== '' || $photo== '')
{ $error = 'ERROR: Please fill in all required fields!';
  renderForm($content, $content_arabic,$price ,$photo , $error);
 }
 else
{ mysql_query("INSERT epsilonnew SET content='$content', content_arabic='$content_arabic',price='$price',photo='$photo'")
 or die(mysql_error());
 header('Location: '.$http.'e_price.php'); 
 }
 }
 else
 {
 renderForm('','','','','');
 }
 ?> 
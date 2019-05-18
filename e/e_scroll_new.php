<?php
  function renderForm($english, $arabic, $error)
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
  
 <strong>english: *<br/></strong> <textarea rows="5"cols="50"type="text" name="english" value="<?php echo $english; ?>" ></textarea><br/>
    
 <strong>arabic:  *</strong> <br/><textarea rows="5"cols="50"type="text" name="arabic" value="<?php echo $arabic; ?>"></textarea><br/>
  
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
{$english = mysql_real_escape_string(htmlspecialchars($_POST['english']));
 $arabic = mysql_real_escape_string(htmlspecialchars($_POST['arabic']));
  
 
 if ($english == '' || $arabic == '')
{ $error = 'ERROR: Please fill in all required fields!';
  renderForm($english, $arabic, $error);
 }
 else
{ mysql_query("INSERT scroll SET english='$english', arabic='$arabic'")
 or die(mysql_error());
 header('Location: '.$http.'e_scroll.php'); 
 }
 }
 else
 {
 renderForm('','','');
 }
 ?> 
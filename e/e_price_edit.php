<?php
  function renderForm($id, $content, $content_arabic,$price ,$photo, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Record</title>
 </head>
 <body>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
 <div>
 <p><strong>ID:</strong> <?php echo $id; ?></p>
 <strong>content:         *<br/></strong> <textarea rows="5"cols="50"type="text" name="content" value="<?php echo $content; ?>" ></textarea><br/>
<strong>content_arabic:  *<br/></strong> <br/><textarea rows="5"cols="50"type="text" name="content_arabic" value="<?php echo $content_arabic; ?>"></textarea><br/>
<strong>price :          *<br/></strong><input type="text" name="price"value="<?php echo $price; ?>" /><br/>
<strong>photo link:      *<br/></strong> <textarea rows="5"cols="50"type="text" name="photo" value="<?php echo $photo; ?>" >http://</textarea><br/>
  <br/>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 </body>
 </html> 
 <?php
 }



 // connect to the database
 include('connect-db2.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id']))
 {
 // get form data, making sure it is valid
 $id = $_POST['id'];
 $content = mysql_real_escape_string(htmlspecialchars($_POST['content']));
 $content_arabic = mysql_real_escape_string(htmlspecialchars($_POST['content_arabic']));
 $price = mysql_real_escape_string(htmlspecialchars($_POST['price']));
 $photo = mysql_real_escape_string(htmlspecialchars($_POST['photo'])); 
 // check that content/price fields are both filled in
 if ($content == '' || $content_arabic == '' || $price == ''|| $photo == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($id, $content, $content_arabic,$price ,$photo , $error);
 }
 else
 {
 // save the data to the database
 mysql_query("UPDATE epsilonnew SET content='$content',content_arabic='$content_arabic',price='$price',photo='$photo' WHERE id='$id'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header('Location: '.$http.'e_price.php'); 
 }
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
 $id = $_GET['id'];
 $result = mysql_query("SELECT * FROM epsilonnew WHERE id=$id")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $content = $row['content'];
 $content_arabic = $row['content_arabic'];
 $price = $row['price'];
 $photo = $row['photo'];
 // show form
 renderForm($id, $content, $content_arabic, $price, $photo, '');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error!';
 }
 }
?>
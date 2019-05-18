<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Record</title>
 </head>
 <body>
<h1>Please verify your account:</h1><br/><br/>
 <?php $http='';
 echo '<form method="post" action="'.$http.'to_make_edit_in_epsilon.php">';?>
 <br/>Site    :<br/> <input type="text" name="server"/>
 <br/>Username:<br/> <input type="text" name="user"/>
 <br/>Password:<br/> <input type="password" name="pass"/>
 <br/><br/><input type="submit" name="submit" value="Submit"/>
 </form>
 </body>
</html>
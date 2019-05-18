<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
        <title>View Records</title>
</head>
<body>
<?php
        
   include('connect-db2.php');
  
       $result = mysql_query("SELECT * FROM download") 
                or die(mysql_error());  
                
        echo "<table border='1' cellpadding='10'width='810'  style='table-layout:fixed'>";
        echo'<col width=300> <col width=300><col width=80><col width=80><col width=50> ';
		echo "<tr>  <th>program name</th> <th>link</th> <th></th> <th></th><th>ID</th></tr>";
        while($row = mysql_fetch_array( $result )) {
                $order   = array('\r\n', '\n', '\r');
                $replace = '<br />';
                $str = str_replace($order, $replace, mysql_real_escape_string(htmlspecialchars($row['content'])));
			       
                echo "<tr>";
                echo '<td><div style="overflow:auto;"><p>' . $str . '</p></div></td>';
				echo '<td>' . $row['link'] . '</td>';
				echo '<td><a href="'.$http.'e_download_edit.php?id=' . $row['id'] . '">Edit</a></td>';
                echo '<td><a href="'.$http.'e_download_delete.php?id=' . $row['id'] . '">Delete</a></td>';
                echo '<td>' . $row['id'] . '</td>';
				echo "</tr>";
			    
			 } 
       echo "</table>";

echo '<p><a href="'.$http.'e_download_new.php">Add a new record</a></p>';?>
  
</body>
</html> 
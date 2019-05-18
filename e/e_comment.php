<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
        <title>View Comment</title>
</head>
<body>
<?php
        include('connect-db2.php');
       $result = mysql_query("SELECT * FROM comments") 
                or die(mysql_error());  
                
        echo "<table border='1' cellpadding='10'width='1000'  style='table-layout:fixed'>";
        echo'<col width=300> <col width=100><col width=300><col width=80><col width=80> ';
		echo "<tr>  <th>comment</th> <th>name</th> <th>email</th><th></th> <th>ID</th></tr>";
        while($row = mysql_fetch_array( $result )) {
                $order   = array('\r\n', '\n', '\r');
                $replace = '<br />';
                $str = str_replace($order, $replace, mysql_real_escape_string(htmlspecialchars($row['comment'])));
			       
                echo "<tr>";
                echo '<td><div style="overflow:auto;"><p>' . $str . '</p></div></td>';
				echo '<td><div style="overflow:auto;"><p>' . $row['name'] . '</p></div></td>';
				echo '<td><div style="overflow:auto;">' . $row['email'] . '</div></td>';
				echo '<td><a href="'.$http.'e_comment_delete.php?id=' . $row['id'] . '">Delete</a></td>';
                echo '<td>' . $row['id'] . '</td>';
				echo "</tr>";
			    
			 } 
       echo "</table>";
?>
  
</body>
</html> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
        <title>View Records</title>
</head>
<body>
<?php
        include('connect-db2.php');
       $result = mysql_query("SELECT * FROM newtitles") 
                or die(mysql_error());  
                
        echo "<table border='1' cellpadding='10'width='810'  style='table-layout:fixed'>";
        echo'<col width=50><col width=50><col width=600> <col width=600><col width=50> ';
		echo "<tr> <th></th> <th></th> <th>english</th> <th>arabic</th> <th>ID</th></tr>";
        while($row = mysql_fetch_array( $result )) {
                      
                echo "<tr>";
                echo '<td><a href="'.$http.'e_newtitles_edit.php?id=' . $row['id'] . '">Edit</a></td>';
                echo '<td><a href="'.$http.'e_newtitles_delete.php?id=' . $row['id'] . '">Delete</a></td>';
				echo '<td><div style="overflow:auto;"><p>' . $row['english'] . '</p></div></td>';
				echo '<td><div style="overflow:auto;"><p>' . $row['arabic'] . '</p></div></td>';
				echo '<td>' . $row['id'] . '</td>';
				echo "</tr>";
			    
			 } 
       echo "</table>";

echo '<p><a href="'.$http.'e_newtitles_new.php">Add a new record</a></p>';?>
 
</body>
</html> 
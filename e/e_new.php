<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
        <title>View Records</title>
</head>
<body>
<?php
        // connect to the database
        include('connect-db2.php');

        // get results from database
        $result = mysql_query("SELECT * FROM newproduct") 
                or die(mysql_error());  
                
        echo "<div ><table border='1' width='950'  style='table-layout:fixed'class='mid'>";
        echo'<col width=50> <col width=400> <col width=400><col width=400><col width=40><col width=40>  ';
        echo "<tr> <th>Id</th> <th>Content</th><th>content in Arabic</th> <th>Image link (start by http://)</th> <th></th><th></th> </tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysql_fetch_array( $result )) {
                $order   = array('\r\n', '\n', '\r');
                $replace = '<br />';
                $str = str_replace($order, $replace, mysql_real_escape_string(htmlspecialchars($row['content'])));
                $str_ar = str_replace($order, $replace, mysql_real_escape_string(htmlspecialchars($row['content_arabic'])));
				// echo out the contents of each row into a table
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td><div style="overflow:auto;"><p>' . $str . '</p></div></td>';
				echo '<td><div style="overflow:auto;"><p>' . $str_ar . '</p></div></td>';
				echo '<td><div style="overflow:auto;"><p>' . $row['photo'] . '</p></div></td>';
                 
				echo '<td><a href="'.$http.'e_new_edit.php?id=' . $row['id'] . '">Edit</a></td>';
                echo '<td><a href="'.$http.'e_new_delete.php?id=' . $row['id'] .'">Delete</a></td>';
                echo "</tr>";
			    
        } 

        // close table>
        echo "</table>";

echo '<p><a href="'.$http.'e_new_new.php">Add a new record</a></p>';?>
</body>
</html>
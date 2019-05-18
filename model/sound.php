 <?php include('begin.php'); ?>
<body id="body" class="body" onLoad="javascript: sf.focus()" > 
<?php include('link.php'); ?>
<?php $english_arabic=$http.'sound2.php';?>

<?php include('first1.php'); ?>
<td>
<div id="C" align="top">
 <?php
         // connect to the database
        include('connect-db.php');
        
        // number of results to show per page
        $per_page = 10;
        
        // figure out the total pages in the database
        $result = mysql_query("SELECT * FROM music");
        $total_results = mysql_num_rows($result);
        $total_pages = ceil($total_results / $per_page);

         
        if (isset($_GET['page']) && is_numeric($_GET['page']))
        {
                $show_page = $_GET['page'];
                
                // make sure the $show_page value is valid
                if ($show_page > 0 && $show_page <= $total_pages)
                {
                        $start = ($show_page -1) * $per_page;
                        $end = $start + $per_page; 
                }
                else
                {
                        // error - show first set of results
                        $start = 0;
                        $end = $per_page; 
                }               
        }
        else
        {
                // if page isn't set, show first set of results
                $start = 0;
                $end = $per_page; 
        }
        
        // display pagination
        
        echo "<b>View Page:</b> ";
        for ($i = 1; $i <= $total_pages; $i++)
        {
                echo '<a class="downloadlink"href="'.$http.'sound.php?page='.$i.'">'.$i.'</a> ';
        }
        echo "</p>";
                
        // display data in table
        echo "<table border='5px' cellpadding='10'width='700'  style='border:blue solid;table-layout:fixed' class='download' >";
        echo'<col width="500"><col width="100"><col width="100">';
		echo '<tr>  <th>Download <font color="red"><strong>free</strong></font> sound</th> <th>size</th> <th>Download</th> </tr>';

        // loop through results of database query, displaying them in the table 
        for ($i = $start; $i < $end; $i++)
	     { 
		       $order   = array('\r\n', '\n', '\r');
               $replace = '<br />';
               
                //make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }
        
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td><div id="one"><p>' . str_replace($order, $replace, mysql_real_escape_string(mysql_result($result, $i, 'content'))) . '</p></div></td>';
			    echo '<td><div id="one"><p>' . mysql_result($result, $i, 'size') . '</p></div></td>';
				echo '<td><center><a target="_blank"class="downloadlink" href="'.mysql_result($result, $i, 'link').'"><img width="30" height="30"src="images/sound.png"/><br>press here</a></center></td>';
				echo "</tr>"; 
        }
        // close table>
        echo "</table>"; 
                         
?>
 </div>   
 </td>

 
</tr></table>

<?php include('epsilon_end.php'); ?>  			
 
</body>
</html>




<?php include('begin.php'); ?>

<body id="body" class="body" onLoad="javascript: sf.focus()" > 
<?php include('link.php'); ?>
<?php $english_arabic=$http.'download2.php';?>

<?php include('first.php'); ?>
<td>
<div id="C" align="top">
<?php
         // connect to the database
        include('connect-db.php');
        
        // number of results to show per page
        $per_page = 20;
        
        // figure out the total pages in the database
        $result = mysql_query("SELECT * FROM download");
        $total_results = mysql_num_rows($result);
        $total_pages = ceil($total_results / $per_page);

        // check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
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
        
        echo "<p> <b>View Page:</b> ";
        for ($i = 1; $i <= $total_pages; $i++)
        {
                echo '<a class="downloadlink"href="'.$http.'download.php?page='.$i.'">'.$i.'</a> ';
        }
        echo "</p>";
                
        // display data in table
        echo "<div ><table border='1' width='500'  style='table-layout:fixed'class='mid'>";
        echo'<col width=400> <col width=150> ';
		echo "<tr> <th>Program free download</th> <th>Download</th></tr>";

        // loop through results of database query, displaying them in the table 
        for ($i = $start; $i < $end; $i++)
        {
                // make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }
        
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td><div id="one"><p>' . mysql_result($result, $i, 'content') . '</p></div></td>';
                echo '<td><center><a class="downloadlink" target="_blank" href="'.mysql_result($result, $i, 'link').'"><img width="30" height="30"src="images/save.png"/><br>download</a></center></td>';
				                 echo "</tr>"; 
        }
        // close table>
        echo "</table></div>"; 
                         
?>
 </div>   
 </td>

<?php include('last.php'); ?>  			 
</tr></table>

<?php include('epsilon_end.php'); ?>  			
 
</body>
</html>


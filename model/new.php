﻿ <?php include('begin.php'); ?>
<body id="body" class="body" onLoad="javascript: sf.focus()" > 
<?php include('link.php'); ?>
<?php $english_arabic='new2.php';?>

<?php include('first1.php'); ?>
<td>
<div id="C" align="top">
<?php
         // connect to the database
        include('connect-db.php');
        
        // number of results to show per page
        $per_page = 6;
        
        // figure out the total pages in the database
        $result = mysql_query("SELECT * FROM newproduct");
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
                echo '<a class="downloadlink"href="'.$http.'price.php?page='.$i.'">'.$i.'</a> ';
        }
        echo "</p>";
                
        // display data in table
        echo "<table border='1' width='700'  style='border:blue solid;table-layout:fixed' class='download' >";
        echo'<col width="500"><col width="200">';
		echo '<tr> <th><font color="red">New</font></th>  <th><font color="red">See it</font></th> </tr>'; 
		
        $k=0;$j=1;
        // loop through results of database query, displaying them in the table 
        for ($i = $start; $i < $end; $i++)
        {
                // make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }
        
                // echo out the contents of each row into a table
                if($k%1==0)  echo "<tr>"; 
                echo '<td><div id="one"><p>' . str_replace($order, $replace, mysql_real_escape_string(mysql_result($result, $i, 'content'))) . '</p></div></td>';
				//echo'<td><center>'.mysql_result($result, $i, 'price').'</center></td>';
				echo '<td><center><img  alt="img for content"width="154" height="154" src="'.mysql_result($result, $i, 'photo').'"/></center></td>'; 
		       if(($j*1)-1==$i){ echo "</tr>";$j++;}
        $k++;	         
		}
        // close table>
        echo "</table></div>"; 
                         
?>
 
 </div>   
 </td>

 
</tr></table>

<?php include('epsilon_end.php'); ?>  			
 
</body>
</html>


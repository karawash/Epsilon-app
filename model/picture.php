﻿ <?php include('begin.php'); ?>
<body id="body" class="body" onLoad="javascript: sf.focus()" > 
<?php include('link.php'); ?>
<?php $english_arabic=$http.'picture2.php';?>

<?php include('first1.php'); ?>
<td>
<div id="C" align="top">
 <?php
         // connect to the database
        include('connect-db.php');
        
        // number of results to show per page
        $per_page = 16;
        
        // figure out the total pages in the database
        $result = mysql_query("SELECT * FROM picture");
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
                echo '<a class="downloadlink"href="'.$http.'picture.php?page='.$i.'">'.$i.'</a> ';
        }
        echo "</p>";
                
        // display data in table
        echo "<table border='0' cellpadding='2'cellspacing='20'width='750'  style='table-layout:fixed' class='download' >";
         
		 
        $k=0;$j=1;
        // loop through results of database query, displaying them in the table 
        for ($i = $start; $i < $end; $i++)
        {
                // make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }
        
                // echo out the contents of each row into a table
                if($k%4==0)  echo "<tr>"; 
                echo '<td><center><a class="imgpop" title="'.mysql_result($result, $i, 'content').'"href="'.mysql_result($result, $i, 'link').'"><img  alt="'.mysql_result($result, $i, 'content').'"width="154" height="154" src="'.mysql_result($result, $i, 'link').'"/></a><br/><font color="blue"><div style="overflow:auto;">'.mysql_result($result, $i, 'content').'</div><br/></center></td>'; 
		       if(($j*4)-1==$i){ echo "</tr>";$j++;}
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




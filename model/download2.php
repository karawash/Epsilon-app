<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Language" content="ar-lb"> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<LINK REL="StyleSheet" HREF="style.css" TYPE="text/css" >
</head>

<body id="body" class="body" onLoad="javascript: sf.focus()" DIR="RTL" > 
<?php include('link2.php'); ?>
<?php $english_arabic=$http.'download.php';?>

<table  height="180"   style="table-layout:fixed;margin-top:-20px;">
<tr height="50"><td>
<?php include('epsilon_head.php'); ?>
</td></tr> 
<tr height="50"><td> 
<?php include('epsilon_button_ar.php'); ?>
</td></tr>
<tr height="30"><td> 
<?php include('epsilon_scroll_ar.php'); ?>
</td></tr></table> 

<table border="0" width="1000"  style="table-layout:fixed;">
<col width="200"> <col width="568"> <col width="200">
<tr><td>
 
<div id="B">

<table class="tableleft" > 
<tr><td>
<?php include('epsilon_main_ar.php'); ?>
</td></tr>
		
<tr height="30"><td></td></tr>
<tr><td>
<?php include('epsilon_new_ar.php'); ?>
</td></tr>

<tr height="30"><td></td></tr>

<tr><td>	
 <?php include('epsilon_search_ar.php'); ?>
</td></tr>
 </table>

 </div> <!-- end of B-->
 
</td>

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
        
        echo "<p>  <b>صفحة:</b> ";
        for ($i = 1; $i <= $total_pages; $i++)
        {
                echo '<a class="downloadlink"href="'.$http.'download2.php?page='.$i.'">'.$i.'</a> ';
        }
        echo "</p>";
                
        // display data in table
        echo "<div ><table border='1' width='500'  style='table-layout:fixed'class='mid'>";
        echo'<col width=400> <col width=150> ';
		echo "<tr> <th>تحميل برامج مجانية</th> <th>تحميل</th></tr>";

        // loop through results of database query, displaying them in the table 
        for ($i = $start; $i < $end; $i++)
        {
                // make sure that PHP doesn't try to show results that don't exist
                if ($i == $total_results) { break; }
        
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td><div id="one"><p>' . mysql_result($result, $i, 'content') . '</p></div></td>';
                echo '<td><center><a target="_blank"class="downloadlink" href="'.mysql_result($result, $i, 'link').'"><img width="30" height="30"src="images/save.png"/><br>تحميل</a></center></td>';
				               echo "</tr>"; 
        }
        // close table>
        echo "</table></div>"; 
                         
?>
 </div>   
 </td>

 <td>
<div id="D" align="right">
<table >
<tr><td>
<?php include('epsilon_place_ar.php'); ?> 
 </td></tr>
 
 <tr height="30"><td></td></tr>
 
 <tr><td>
 <?php include('epsilon_question_ar.php'); ?>  
 </td></tr>
 
 <tr height="30"><td></td></tr>
 
 <tr><td>
 <?php include('epsilon_contact_ar.php'); ?>  			
</td></tr>
			</table>
</div> <!-- end of D-->
</td></tr></table>


<?php include('epsilon_end.php'); ?>  			
 
</body>
</html>


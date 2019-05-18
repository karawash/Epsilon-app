<div id="idiv3" class="cdiv3"> 
<div class="block">
<div class="container">
 <b class="rtop"><b class="r1"></b> <b class="r2"></b> <b class="r3"></b> <b class="r4"></b></b>
<center><b><i>جديد</i></b></center></div>
 
<img src="images/home.png"> 
<?php
include('connect-db.php');
  $result = mysql_query("SELECT * FROM newtitles") 
                or die(mysql_error());  ?>
<marquee behavior="scroll" direction="up" loop="10000" scrollAmount="2" onmouseover="this.scrollAmount=0;" onmouseout="this.scrollAmount=2;">
<?php	
echo '<table><h4>'; 
while($row = mysql_fetch_array( $result )){
 echo'<tr><td><a class="repair" href="'. $new2.'">-'.$row['arabic'].'</a></td></tr>';
}
 echo'</h4></table></marquee>';
 echo'<b class="rbottom"><b class="r4"></b> <b class="r3"></b> <b class="r2"></b> <b class="r1"></b></b>';  
   
  ?> 
 
 
  	 
</DIV>  
</div>
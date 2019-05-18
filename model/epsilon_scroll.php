<div id="scroll"> 
 
<?php  
include('connect-db.php');
  $result = mysql_query("SELECT * FROM scroll") 
                or die(mysql_error());  ?>
<marquee behavior="scroll" direction="left" loop="10000" scrollAmount="3"onmouseover="this.scrollAmount=0;" onmouseout="this.scrollAmount=3;">
<?php			
while($row = mysql_fetch_array( $result )){
 echo  $row['english'] ;
 echo '***';
}
                ?>
</marquee></div>					
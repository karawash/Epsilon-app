<div id="scroll"> 
<!--<marquee behavior="scroll" direction="left" loop="10000" scrollAmount="4"onmouseover="this.scrollAmount=0;" onmouseout="this.scrollAmount=4;">Epsilon wants to help you .  siba connection is the first.</marquee>
-->

<?php  
include('connect-db.php');
  $result = mysql_query("SELECT * FROM scroll") 
                or die(mysql_error());  ?>
<marquee behavior="scroll" direction="right" loop="10000" scrollAmount="3"onmouseover="this.scrollAmount=0;" onmouseout="this.scrollAmount=4;">
<?php			
while($row = mysql_fetch_array( $result )){
 echo  $row['arabic'] ;
 echo '***';
}
                ?>
</marquee></div>					

<?php include('begin.php'); ?>
 

<body id="body" class="body" onLoad="javascript: sf.focus()" > 
<?php include('link.php'); ?>
<?php $english_arabic=$http.'question2.php';?>
<table  height="180"   style="table-layout:fixed;margin-top:-20px;">
<tr height="50"><td>
<?php include('epsilon_head.php'); ?>
</td></tr>
<tr height="50"><td> 
<?php include('epsilon_button.php'); ?>
</td></tr>
</table> 
<?php
echo "
<style>
.postedby {
	padding: 0 0 0 18px;
	background: url(images/abullet.gif) no-repeat 0 4px;
	}
	
h3.formtitle {
	margin : 0px 0px 0px 0px;
	border-bottom: 1px dotted #ccc;
	padding-bottom: 8px;
	}

.commentbody {
	border-top: 1px dotted #ccc;
	}
	
/*gray box #F5F5F5 */
.submitcomment, #submitcomment, #currentcomments, #rating, .textad {
	background-color:#F5F5F5 ;
	border: 1px dotted #ccc;
	padding: 5px;
	padding: 5px;
	margin: 20px 0px 0px 0px;
	}


/*FORMS
*------------------------------------*/

.form {
	font-size: 70%;
	background-color: #FAFAFA;
	border: solid 1px #C6C6C6;
	padding: 2px;
	}

.formtext {
	background-color: #FAFAFA;
	border: solid 1px #C6C6C6;
	padding: 2px;
	border-bottom: 1px dotted #ccc
	}

.form:hover, .formtext:hover {
	background: white;
	}
	
.form:focus, .formtext:focus {
	background: white;
	border: solid 1px #000000;
	}
	
.submit {
	background-color: #D3D3D3;
	border: solid 1px #C6C6C6;
	border-right:  solid 1px #9A9A9A;
	border-bottom:  solid 1px #9A9A9A;
	}
	
.submit:hover, .submit:focus {
	background: #EDEDED;
	}
	</style>";?>
<script language="javascript">

function form_Validator(form)
{
 if (form.name.value == "") 
  {
    alert("Please enter your name.");
    form.name.focus();
	return (false);
     }
  
  if (form.email.value == "")   
  {  
    alert("Please enter your message.");
    form.email.focus(); 
    return (false);
  }//
  if (!(form.email.value == "")){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = form.email.value;
   if(reg.test(address) == false) {
      alert('Invalid Email Address');
	  form.email.focus(); 
      return (false);
   }
  }
  if (form.comment.value == "")  //name
  {
    alert("Please enter your comment.");
    form.comment.focus();
	return (false);
     }
   
  return (true);
  }
 
  </script>
	  
 

<td>
<div id="C" align="top">
<?php 
 
 include('connect-db.php');		
$id=$_POST['id'];     


$commentrow = mysql_query("SELECT * FROM comments order by date") or die(mysql_error());;
$total_results = mysql_num_rows($commentrow); 
 
echo "<div id=\"currentcomments\" class=\"submitcomment\"><h3 class=\"formtitle\"><font color=\"blue\"> Comments &amp; Questions</font></h3><br/>";
echo $total_results . " comments so far (<a href=\"#post\">post your own</a>)<br/>";
       
	   if($_GET['per_page']){$per_page=$_GET['per_page'];}
	   else{$per_page=20;}
         $j=0;
		for ($i = $total_results-1;$i>0 && $j< $per_page; $i--){ 
		   $order   = array('\r\n', '\n', '\r');
           $replace = '<br />';
           $comment=str_replace($order, $replace, mysql_real_escape_string(mysql_result($commentrow, $i, 'comment')));	
			echo '<div class="commentbody" id="'.mysql_result($commentrow, $i, 'id').'"><br/>';
		    echo '<div style="overflow:auto;">'.$comment.'</div><br/>';
		    echo '<p align="right"class=\"postedby\"> ';
		    echo mysql_result($commentrow, $i, 'name') ;
		
		echo ' |  '.mysql_result($commentrow, $i, 'date').' </p><br/>';
		echo '</div>';
		$j++;$full=mysql_result($commentrow, $i, 'id');
	}
		echo "</div>";
$per_page=$per_page+20;	
 
 echo '<a href="'.$http.'question.php?per_page=' . $per_page . '">Old comment</a>';
 ?>
 </div>   
 </td>
 
</tr></table>

 

<a name="post"></a>
<div id="submitcomment" class="submitcomment">
<?php echo '<form name="submitcomment" method="post" action="'.$http.'comment.php" onSubmit=" return form_Validator(this)">';?>
<table width="100%">
		<tr>
				<th colspan="2"><h3 class="formtitle"> <font color="blue">Your comment :</font></h3></th>
		</tr>
		<tr>

				<th scope="row"><font color="blue">Name:</font></th><!--<p class="req">-->
				<td><input class="form" tabindex="1" id="name" name="name" /></td>
		</tr>
		<tr>
				<th scope="row"><font color="blue">Email:</font></th><!--<p class="opt">-->
				<td><input class="form" tabindex="2" id="email" name="email" /></td>
		</tr>
		 
		<tr valign="top">
				<th scope="row"><p class="req"><font color="blue">Comments:</font></p><br /></th>
				<td><textarea class="formtext" tabindex="4" id="comment" name="comment" rows="10" cols="50"></textarea></td>
		</tr>

		<tr>	
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" class="submit" value="Submit Comment" /><br />
				 

 

</td>
		</tr>
</table>
 
 
</form>


</div>


<?php include('epsilon_end.php'); 

?>  				
</body>
</html>


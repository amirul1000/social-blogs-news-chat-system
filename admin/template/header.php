<?php
session_start();  
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF8 " />
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <!--Header--> 
<tr>
    <td bgcolor="#0099FF">
	     <table  width="100%" border="0" cellpadding="0" cellspacing="0">
			 <tr id="header" align="center"><td align="center" class="bdr">
				 <td>
					 <div>
						<b></b><br />
						<?php
					     if(!empty($_SESSION['users_id']))
						  {
						?>
					   Welcome <?=$_SESSION["first_name"]?>&nbsp;&nbsp;<?=$_SESSION["last_name"]?>
					   <?php
						  }
					   ?>
					   </div>
				  </td>
			 </tr>
		</table>
     </td>
 </tr>	 
 <!--End of Header-->
  <tr>
           <!--Left Menu-->
    <td valign="top">	      
	      <table align="center" cellspacing="3" cellpadding="3" width="100%">
		    <tr>
			   <td width="15%" class="bdr" valign="top" align="left">
			   <?php
				  if(!empty($_SESSION['users_id']))
	   		      {
					 include("../template/left_menu.php");
			      }
			   ?>
              </td>		
		   <!-- End of Left Menu-->
			<td valign="top">
			  <!--Start Contents Will be end at footer-->
	

		  
		  
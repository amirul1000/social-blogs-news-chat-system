<?php
 session_start();
 include("../templates/header.php");
?>
 <link rel="stylesheet" href="../css/admin_style.css" >
<table align="center" cellspacing="3" cellpadding="3" width="100%">
    <tr>
        <td width="30%" valign="top">
           <?php
		     include("../users/user_profile.php");
		   ?>
        </td>
        <td>
            <table align="center" cellspacing="3" cellpadding="3" border="0" width="100%">
                    <tr>
                        <td width="90%" align="center">
                             <h4>Welcome to School Social Network</h4>
                        </td>
                    </tr>
                    
            </table>
		 </td>
        <td width="30%">
        </td>
    </tr>
</table>     
<?php
 include("../templates/footer.php");
?>
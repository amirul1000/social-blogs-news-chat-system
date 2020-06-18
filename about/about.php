<?php
 session_start();
 include("../templates/header.php");
 session_start();
 include("../database/connection.php")
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
                        <?php
                         $query = "SELECT * FROM about";	
                        $result = mysql_query($query,$linkid);
                        $i=0;
                        while($data = mysql_fetch_assoc($result)) 
                        {
                            while(list($key,$value) = each($data))
                                $res[$i][$key] = $value;
                            $i++;
                        }		
                        ?>
                        <h3><?=$res[0]['subject']?></h3>
                        <p>
                          <?=$res[0]['contents']?>
                        </p> 
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
<?php
 include("../templates/header.php");
?>
 <table align="center" cellspacing="3" cellpadding="3" width="100%">
    <tr>
        <td width="30%">
           
        </td>
        <td>
            <b><?=ucwords(str_replace("_"," ","users"))?></b>
            <table cellspacing="1" cellpadding="3" border="0" width="70%" class="bodytext" align="center">			
             <?php
                    
                    $query = "SELECT * FROM users WHERE 
                                      id='".$_SESSION['users_id']."'";	
                    $result = mysql_query($query,$linkid);
                    $i=0;
                    while($data = mysql_fetch_assoc($result)) 
                    {
                        while(list($key,$value) = each($data))
                            $res[$i][$key] = $value;
                        $i++;
                    }		
                    $i=0;		
                    
             ?>
                  <tr><td>Email</td><td><?=$res[$i]['email']?></td></tr>
                  <tr><td>Title</td><td><?=$res[$i]['title']?></td></tr>
                  <tr><td>First name</td><td><?=$res[$i]['first_name']?></td></tr>
                  <tr><td>Last name</td><td><?=$res[$i]['last_name']?></td></tr>
                  <tr><td valign="top">Profile Picture</td><td>
                  <?php
				     if(is_file('../'.$res[$i]['profile_image'])&&file_exists('../'.$res[$i]['profile_image']))
					 {
					   $profile_picture = '../'.$res[$i]['profile_image']; 
					 }
					 else
					 {
					  $profile_picture = '../images/profile.jpg'; 
					 }
				  ?>
                  <img src="<?=$profile_picture?>" style="width:100px;height:100px;" /> 
                  
                  </td></tr>
                  <tr><td>Company</td><td><?=$res[$i]['company']?></td></tr>
                  <tr><td>Address</td><td><?=$res[$i]['address']?></td></tr>
                  <tr><td>City</td><td><?=$res[$i]['city']?></td></tr>
                  <tr><td>State</td><td><?=$res[$i]['state']?></td></tr>
                  <tr><td>Zip</td><td><?=$res[$i]['zip']?></td></tr>
                  <tr><td>Country</td><td><?=$res[$i]['country']?></td></tr>
                  <tr><td></td><td nowrap >
                      <a href="users.php?cmd=edit&id=<?=$res[$i]['id']?>" class="nav">Edit</a> 
                 </td></tr>
    
                 </table>
         </td>
        <td width="30%">
        </td>
    </tr>
</table>       
<?php
 include("../templates/footer.php");
?>  


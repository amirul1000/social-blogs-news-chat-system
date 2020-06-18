<?php
 include("../template/header.php");
?> <a href="users.php?cmd=edit" class="nav">Add</a><br />

          <b><?=ucwords(str_replace("_"," ","users"))?></b>
            <table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext" align="center">			
             <tr  bgcolor="#ABCAE0">
                 <td>Email</td>
                 <td>Title</td>
                 <td>First name</td>
                 <td>Last name</td>
                 <td valign="top">Profile Picture</td>
                 <td>Company</td>
                 <td>Address</td>
                 <td>City</td>
                  <td>State</td>
                 <td>Zip</td>
                 <td>Country</td>
                 <td>Action</td>
             </tr>
			 <?php
                    
                    $query = "SELECT * FROM users ";	
                    $result = mysql_query($query,$linkid);
                    $i=0;
                    while($data = mysql_fetch_assoc($result)) 
                    {
                        while(list($key,$value) = each($data))
                            $res[$i][$key] = $value;
                        $i++;
                    }		
                  for($i=0;$i<count($res);$i++)
				  {	
                    
              $rowColor;
		
					if($i % 2 == 0)
					{
						
						$row="#C8C8C8";
					}
					else
					{
						
						$row="#FFFFFF";
					}
				
		     ?>
			<tr bgcolor="<?=$row?>" onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; ">
                  <td><?=$res[$i]['email']?></td>
                  <td><?=$res[$i]['title']?></td>
                  <td><?=$res[$i]['first_name']?></td>
                  <td><?=$res[$i]['last_name']?></td>
                  <td>
                  <?php
				     if(is_file('../../'.$res[$i]['profile_image'])&&file_exists('../../'.$res[$i]['profile_image']))
					 {
					   $profile_picture = '../../'.$res[$i]['profile_image']; 
					 }
					 else
					 {
					  $profile_picture = '../../images/profile.jpg'; 
					 }
				  ?>
                  <img src="<?=$profile_picture?>" style="width:100px;height:100px;" /> 
                  
                  </td>
                  <td><?=$res[$i]['company']?></td>
                  <td><?=$res[$i]['address']?></td>
                  <td><?=$res[$i]['city']?></td>
                 <td><?=$res[$i]['state']?></td>
                  <td><?=$res[$i]['zip']?></td>
                  <td><?=$res[$i]['country']?></td>
                  <td nowrap >
                      <a href="users.php?cmd=edit&id=<?=$res[$i]['id']?>" class="nav">Edit</a> |
                      <a href="users.php?cmd=delete&id=<?=$res[$i]['id']?>" class="nav">Delete</a> 
                 </td></tr>
				<?php
				  }
				?> 
               </table>
        
<?php
 include("../template/footer.php");
?>  


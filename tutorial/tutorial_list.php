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
        
         <a href="tutorial.php?cmd=edit" class="nav">Add</a><br />

          <b><?=ucwords(str_replace("_"," ","Tutorial"))?></b>
            <table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext" align="center">			
             <?php
                    
                    $query = "SELECT * FROM tutorial";	
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
			<tr bgcolor="<?=$row?>"><!-- onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; "-->
            	  <td>
                     <?=$res[$i]['title']?><br />
                    <?php
						 $query2 = "SELECT * FROM users WHERE id='".$res[$i]['users_id']."'";	
						$result2 = mysql_query($query2,$linkid);
						$j=0;
						while($data = mysql_fetch_assoc($result2)) 
						{
							while(list($key,$value) = each($data))
								$res2[$j][$key] = $value;
							$j++;
						}	
					     $username = $res2[0]["email"]." [".$res2[0]["first_name"]." ".$res2[0]["last_name"]."]";
						 if(is_file('../'.$res2[0]['profile_image'])&&file_exists('../'.$res2[0]['profile_image']))
						 {
						   $profile_picture = '../'.$res2[0]['profile_image']; 
						 }
						 else
						 {
						  $profile_picture = '../images/profile.jpg'; 
						 }
					  ?>
					  <a href="../users/users.php?cmd=list">
						<div style="float:left;"><p><img src="<?=$profile_picture?>" style="width:25px;height:25px;" /></div><br><?=$username?></p></a> 
					  </a>
                  <?php
				    if(strlen($res[$i]['youtube_video_link'])>0)
					{
				  ?>
                   <iframe id="player" type="text/html" width="640" height="390"
                      src="<?=$res[$i]['youtube_video_link']?>"
                      frameborder="0"></iframe>         
                <?php
				   }
				  ?>
                  <br />
                  <?php
				    if(strlen($res[$i]['file_video'])>0)
					{
				  ?>
                 <video id="sampleMovie" src="../<?=$res[$i]['file_video']?>" width=”640” height=”360”></video>
                  <?php
				    }
				  ?>
                  <br />                  
                  <?=$res[$i]['description']?><br />  
                    <?php
					   if($res[$i]['users_id']==$_SESSION['users_id'])
					   {
					?>               
                      <a href="tutorial.php?cmd=edit&id=<?=$res[$i]['id']?>" class="nav">Edit</a> |
                      <a href="tutorial.php?cmd=delete&id=<?=$res[$i]['id']?>" class="nav">Delete</a> 
                      <?php
					  }
					  ?>
                      <br />
                      comment:
                         <?php
						     $query = "SELECT comments.*,users.* FROM comments 
							                LEFT JOIN users ON(comments.users_id=users.id)
							                  WHERE 
												  tutorial_id='".$res[$i]['id']."'";	
							$result = mysql_query($query,$linkid);
							$j=0;
							unset($res3);
							while($data = mysql_fetch_assoc($result)) 
							{
								while(list($key,$value) = each($data))
									$res3[$j][$key] = $value;
								$j++;
							}
						    for($j=0;$j<count($res3);$j++)
							{
							   $username = $res3[$j]["email"]." [".$res3[$j]["first_name"]." ".$res3[$j]["last_name"]."]";

							    echo $username."-".$res3[$j]['comments']."<br>";
							}
						 ?>
                      <br />
                      Enter your comment:<br />
                    <form action="" method="post">
                        <input type="hidden" name="cmd" value="add_comment" />
                        <input type="hidden" name="tutorial_id" value="<?=$res[$i]['id']?>" />
                        <textarea name="comments" id="comments" style="width:600px;height:100px;"></textarea>
                        <input type="submit" value="Submit" />
                    </form>  
                 </td>
                 </tr>
				<?php
				  }
				?> 
               </table>
        
           </td>
        <td width="30%">
        </td>
    </tr>
</table>     
<?php
 include("../templates/footer.php");
?>
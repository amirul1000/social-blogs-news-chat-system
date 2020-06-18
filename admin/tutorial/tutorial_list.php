<?php
 include("../template/header.php");
?> <a href="tutorial.php?cmd=edit" class="nav">Add</a><br />

          <b><?=ucwords(str_replace("_"," ","Tutorial"))?></b>
            <table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext" align="center">			
             <tr  bgcolor="#ABCAE0">
                 <td>User</td>
                 <td>Youtube video link</td>
                 <td>File video</td>
                 <td>Title</td>
                 <td>Description</td>
                 <td>Status</td>
                 <td>Action</td>
             </tr>
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
			<tr bgcolor="<?=$row?>" onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; ">
            	  <td>
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
					    echo $res2[0]['first_name']." ".$res2[0]['last_name'];
					?>
                  </td>	
                  <td><?=$res[$i]['youtube_video_link']?></td>
                  <td><?=$res[$i]['file_video']?></td>
                  <td><?=$res[$i]['title']?></td>
                  <td><?=$res[$i]['description']?></td>
                  <td><?=$res[$i]['status']?></td>
                  <td nowrap >
                      <a href="tutorial.php?cmd=edit&id=<?=$res[$i]['id']?>" class="nav">Edit</a> |
                      <a href="tutorial.php?cmd=delete&id=<?=$res[$i]['id']?>" class="nav">Delete</a> 
                 </td></tr>
				<?php
				  }
				?> 
               </table>
        
<?php
 include("../template/footer.php");
?>  


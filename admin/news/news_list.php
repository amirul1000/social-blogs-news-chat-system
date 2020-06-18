<?php
 include("../template/header.php");
?>
 <a href="news.php?cmd=edit" class="nav">Add</a><br />
          <b><?=ucwords(str_replace("_"," ","news"))?></b>
            <table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext" align="center">			
             <tr  bgcolor="#ABCAE0">
                 <td>subject</td>
                 <td>contents</td>
                 <td>Action</td>
             </tr>
			 <?php
                    
                    $query = "SELECT * FROM news";	
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
                  <td><?=$res[$i]['subject']?></td>
                  <td><?=$res[$i]['contents']?></td>
                  <td nowrap >
                      <a href="news.php?cmd=edit&id=<?=$res[$i]['id']?>" class="nav">Edit</a> |
                      <a href="news.php?cmd=delete&id=<?=$res[$i]['id']?>" class="nav">Delete</a> 
                 </td></tr>
				<?php
				  }
				?> 
               </table>
        
<?php
 include("../template/footer.php");
?>  


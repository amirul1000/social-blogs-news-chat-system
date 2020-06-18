<?php
 include("../template/header.php");
?>
             <a href="tutorial.php?cmd=list" class="nav">List</a><br />
            <b><?=ucwords(str_replace("_"," ","tutorial"))?></b><br />
            <table cellspacing="3" cellpadding="3" border="0" align="center" width="98%" class="bdr" >
             <tr>
              <td align="center">  
                 <form name="frm_users" method="post"  enctype="multipart/form-data" >			
                    <table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext"  width="100%">  
                         <tr>
                             <td>Youtube video link</td>
                             <td>
                                <input type="text" name="youtube_video_link" id="youtube_video_link"  value="<?=$youtube_video_link?>" class="textbox">
                             </td>
                         </tr>
                          <tr>
                             <td>File video</td>
                             <td>
                                <input type="file" name="file_video" id="file_video"  value="<?=$file_video?>" class="textbox">
                             </td>
                         </tr>
                        <tr>
                             <td>Title</td>
                             <td>
                                
                                <input type="text" name="title" id="title"  value="<?=$title?>" class="textbox">
                             </td>
                         </tr> 
                          <tr>
                             <td>Description</td>
                             <td>
                                
                                <textarea name="description" id="description" class="textbox"><?=$description?></textarea>
                             </td>
                         </tr> 
                         <tr>
                             <td>Status</td>
                             <td><input type="text" name="status" id="status"  value="<?=$status?>" class="textbox"></td>
                        </tr>
                         <tr> 
                             <td align="right"></td>
                             <td>
                                <input type="hidden" name="cmd" value="add">
                                <input type="hidden" name="id" value="<?=$Id?>">			
                                <input type="submit" name="btn_submit" id="btn_submit" value="submit" class="button_blue">
                             </td>     
                         </tr>
                        </table>
                </form>
              </td>
             </tr>
            </table>
<?php
 include("../template/footer.php");
?>  
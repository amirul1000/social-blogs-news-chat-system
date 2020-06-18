<?php
 include("../template/header.php");
?>
<link href="../../css/jquery.qtip.css" 				rel="stylesheet" type="text/css">
<link href="../../css/SpryValidationTextField.css" 	rel="stylesheet" type="text/css" />
<link href="../../css/SpryValidationSelect.css" 		rel="stylesheet" type="text/css" />
<link href="../../css/validation.css" 				rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../../js/jquery.js"></script>
<script type="text/javascript" src="../../js/jquery.qtip.js"></script>
<script type="text/javascript" src="../../js/SpryValidationTextField.js"></script>
<script type="text/javascript" src="../../js/SpryValidationSelect.js"></script>

            <b><?=ucwords(str_replace("_"," ","About"))?></b><br />
            <table cellspacing="3" cellpadding="3" border="0" align="center" width="98%" class="bdr" >
             <tr>
              <td align="center">  
                 <form name="frm_users" method="post"  enctype="multipart/form-data" >			
                    <table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext"  width="100%">  
                     <tr>
                         <td>subject</td>
                         <td>
                            <input type="text" name="subject" id="subject"  value="<?=$subject?>" class="textbox">
                         </td>
                     </tr>
                     <tr>
                         <td>contents</td>
                         <td>
                            
                            <textarea name="contents" id="contents"   class="textbox"><?=$contents?></textarea>
                         </td>
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
 	   
	<script type="text/javascript" charset="utf-8">
            
            var spry_email					= new Spry.Widget.ValidationTextField("spry_email", "email", {useCharacterMasking:true, validateOn:["blur", "change"]});	
            var spry_password			    = new Spry.Widget.ValidationTextField("spry_password", "none", {useCharacterMasking:true, validateOn:["blur", "change"], minChars:6, maxChars:128});	
    
    // tips
    $(document).ready(function()
    {
        $('span[title]').qtip();
    });
    </script> 
<?php
 include("../template/footer.php");
?>  
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

            <b><?=ucwords(str_replace("_"," ","users"))?></b><br />
            <table cellspacing="3" cellpadding="3" border="0" align="center" width="98%" class="bdr" >
             <tr>
              <td align="center">  
                 <form name="frm_users" method="post"  enctype="multipart/form-data" >			
                    <table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext"  width="100%">  
                     <tr>
                         <td>Email</td>
                         <td>
                            <div id="spry_email">
                                <input type="text" name="email" id="email"  value="<?=$email?>" class="textbox">
                            <span class="textfieldMinCharsMsg" title="2 characters minimum"><img src="../../images/invalid.png" border="0"/></span>
                            <span class="textfieldRequiredMsg" title="Required"><img src="../../images/invalid.png" border="0"/></span>
                            <span class="textfieldInvalidFormatMsg" title="Invalid email address"><img src="../../images/invalid.png" border="0"/></span>
                            <img src="../../images/valid.png" class="validMsg" border="0"/>
                            </div>			
            
                         </td>
                     </tr>
                     <tr>
                         <td>Password</td>
                         <td>
                             <div id="spry_password">
                                 <input type="password" name="password" id="password"  value="" class="textbox">
                            <span class="textfieldMinCharsMsg" title="6 characters minimum">
                            <img src="../../images/invalid.png" border="0"/></span>
                            <span class="textfieldRequiredMsg" title="Required">
                            <img src="../../images/invalid.png" border="0"/>Character length 6-8</span>
                            <img src="../../images/valid.png" class="validMsg" border="0"/>	
                         </td>
                     </tr>
                     <tr>
                         <td>Title</td>
                         <td>
                            <input type="text" name="title" id="title"  value="<?=$title?>" class="textbox">
                         </td>
                     </tr>
                     <tr>
                         <td>First Name</td>
                         <td>
                            
                            <input type="text" name="first_name" id="first_name"  value="<?=$first_name?>" class="textbox">
                         </td>
                     </tr>
                     <tr>
                         <td>Last Name</td>
                         <td>
                            <input type="text" name="last_name" id="last_name"  value="<?=$last_name?>" class="textbox">
                         </td>
                     </tr>
                      <tr>
                         <td>Profile image</td>
                         <td>
                            <input type="file" name="profile_image" id="profile_image"  value="<?=$profile_image?>" class="textbox">
                         </td>
                     </tr>
                     <tr>
                         <td>Company</td>
                         <td>
                            <input type="text" name="company" id="company"  value="<?=$company?>" class="textbox">
                         </td>
                     </tr>
                     <tr>
                         <td>Address</td>
                         <td>
                            <input type="text" name="address" id="address"  value="<?=$address?>" class="textbox">
                         </td>
                     </tr>
                     <tr>
                         <td>City</td>
                         <td>
                            <input type="text" name="city" id="city"  value="<?=$city?>" class="textbox">
                         </td>
                     </tr>
                     <tr>
                         <td>State</td>
                         <td>
                            <input type="text" name="state" id="state"  value="<?=$state?>" class="textbox">
                         </td>
                     </tr>
                     <tr>
                         <td>Zip</td>
                         <td>
                            <input type="text" name="zip" id="zip"  value="<?=$zip?>" class="textbox">
                         </td>
                     </tr>
                     <tr>
                             <td>Country</td>
                             <td><input type="text" name="country" id="country"  value="<?=$country?>" class="textbox"></td>
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
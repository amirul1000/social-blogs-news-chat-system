<?php
   session_start();
   include("../database/connection.php");
  if(!isset($_SESSION['users_id']))
  {
     Header("Location: ../login/login.php");
  }
 
 include("../templates/header.php");
 session_start();
 $_SESSION['username'] = $_SESSION["email"]." [".$_SESSION["first_name"]." ".$_SESSION["last_name"]."]"; // Must be already set
 $arr = explode("@",$_SESSION["email"]);
 $_SESSION['username']=$arr[0];
 //echo "I am ".$arr[0]."<br>";
?>
 <table align="center" cellspacing="3" cellpadding="3" width="100%">
    <tr>
        <td width="30%" valign="top">
            <?php
		     include("../users/user_profile.php");
		    ?>
        </td>
        <td valign="top">
            <b><?=ucwords(str_replace("_"," ","Chat Room"))?></b><br />
			<style>
            body {
                background-color: #eeeeee;
                padding:0;
                margin:0 auto;
                font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
                font-size:11px;
            }
            </style>
            
            <link type="text/css" rel="stylesheet" media="all" href="../chat/css/chat.css" />
            <link type="text/css" rel="stylesheet" media="all" href="../chat/css/screen.css" />
            
            
            <!--<a href="javascript:void(0)" onClick="javascript:chatWith('atiq')">Chat With Atiq</a>-->
            <?php
               /// Now let us collect the userids from table who are online ////////
                echo "Chat with:<br>";
				include("../chat/who_online.php");
            ?>

			<script type="text/javascript" src="../chat/js/jquery.js"></script>
            <script type="text/javascript" src="../chat/js/chat.js"></script>
            <script language="javascript">
              chatHeartbeat();
            </script>
            <meta http-equiv="refresh" content="60" >
 		 </td>
         <td width="30%">
         </td>
     </tr>
</table>    
<?php
 include("../templates/footer.php");
?>  


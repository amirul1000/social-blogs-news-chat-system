<?php
   $host     = "localhost"; 
   $database = "video_chatting";
   $user     = "root";
   $password = "secret";
   $linkid = mysql_connect($host,$user,$password);
   if (!$linkid) {
    die('Could not connect: ' . mysql_error());
}
   mysql_select_db($database,$linkid);
?>
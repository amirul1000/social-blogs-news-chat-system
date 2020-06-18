<?php
////// To update session status for plus_login table to get who is online ////////
if(isset($_SESSION['users_id']))
{
	$tm=date("Y-m-d H:i:s");
	$sql = "update plus_login set status='ON',tm='$tm' where users_id='".$_SESSION['users_id']."'";
	$q=mysql_query($sql,$linkid);
}

///// ////////////// End of updating login status for who is online ///////

// Find out who is online /////////
$gap=10; // change this to change the time in minutes, This is the time for which active users are collected. 
$tm=date ("Y-m-d H:i:s", mktime (date("H"),date("i")-$gap,date("s"),date("m"),date("d"),date("Y")));
//// Let us update the table and set the status to OFF 
////for the users who have not interacted with 
////pages in last 10 minutes ( set by $gap variable above ) ///
$sql = "update plus_login set status='OFF' where tm < '$tm'";
$ut=mysql_query($sql,$linkid);
echo mysql_error();
/// Now let us collect the userids from table who are online ////////
/*$sql = "select users_id from plus_login where tm > '$tm' and status='ON'";
$qt=mysql_query($sql,$linkid);
echo mysql_error();

while($nt=mysql_fetch_array($qt)){
echo "$nt[users_id],";
}*/

$sql = "select users.* from plus_login LEFT JOIN users ON (plus_login.users_id=users.id)
                  where plus_login.tm > '$tm' and plus_login.status='ON' AND plus_login.users_id NOT IN('".$_SESSION['users_id']."')";
		  
$qt=mysql_query($sql,$linkid);
echo mysql_error();

while($nt=mysql_fetch_array($qt))
{
    $username = $nt["email"]." [".$nt["first_name"]." ".$nt["last_name"]."]";
    $arr = explode("@",$nt["email"]);
	
	 if(is_file('../'.$nt['profile_image'])&&file_exists('../'.$nt['profile_image']))
		 {
		   $profile_picture = '../'.$nt['profile_image']; 
		 }
		 else
		 {
		  $profile_picture = '../images/profile.jpg'; 
		 }
?>
<a href="javascript:void(0)" onClick="javascript:chatWith('<?=$arr[0]?>')"><div style="float:left;"><p><img src="<?=$profile_picture?>" style="width:25px;height:25px;" /></div><br><?=$username?></p></a><br>
<?php
}
?>
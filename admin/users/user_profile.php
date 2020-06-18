My Profile
<?php
  if(isset($_SESSION['users_id']))
  {
	  $query = "SELECT * FROM users WHERE 
						  id='".$_SESSION['users_id']."'";	
		$result = mysql_query($query,$linkid);
		$i=0;
		while($data = mysql_fetch_assoc($result)) 
		{
			while(list($key,$value) = each($data))
				$res[$i][$key] = $value;
			$i++;
		}		
		$i=0;
?>

<table>
  <tr>
     <td>
       <?php
		 if(is_file('../'.$res[$i]['profile_image'])&&file_exists('../'.$res[$i]['profile_image']))
		 {
		   $profile_picture = '../'.$res[$i]['profile_image']; 
		 }
		 else
		 {
		  $profile_picture = '../images/profile.jpg'; 
		 }
	  ?>
      <a href="../users/users.php?cmd=list">
	  	<img src="<?=$profile_picture?>" style="width:100px;height:100px;" /> 
      </a>
     </td>
  </tr>
  <tr>
     <td>
        <?=$res[$i]['first_name']?>&nbsp;&nbsp;<?=$res[$i]['last_name']?><br />
        <?=$res[$i]['email']?>
     </td>
  </tr>
</table>

<?php
}
?>

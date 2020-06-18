<?php
       session_start();
      
	    include("../database/connection.php");
		
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
                $email = $_REQUEST['email'];
                $password = $_REQUEST['password'];
                $title = $_REQUEST['title'];
                $first_name = $_REQUEST['first_name'];
                $last_name = $_REQUEST['last_name'];
				if(strlen($_FILES['profile_image']['name'])>0 && $_FILES['profile_image']['size']>0)
				{
					if(!file_exists("../profile_image"))
					{ 
					   mkdir("../profile_image",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($linkid)."_".str_replace(" ","_",strtolower(trim($_FILES['profile_image']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['profile_image']['name'])));
					}
					$filePath="../profile_image/".$file;
					move_uploaded_file($_FILES['profile_image']['tmp_name'],$filePath);
					$profile_image ="profile_image/".trim($file);
				}
				
                $company = $_REQUEST['company'];
                $address = $_REQUEST['address'];
                $city = $_REQUEST['city'];
                $state = $_REQUEST['state'];
                $zip = $_REQUEST['zip'];
                $country = $_REQUEST['country'];
                $created_at = date("Y-m-d");
                $updated_at = date("Y-m-d");
				
				if(empty($_REQUEST['id']))
				{  
				   if(isset($profile_image))
				   {
					   $query = "INSERT INTO users (email,password,title,first_name,last_name,profile_image,company,address,city,state,zip,country,created_at,updated_at)
							  VALUES('$email','$password','$title','$first_name','$last_name','$profile_image','$company','$address','$city','$state','$zip','$country','$created_at','$updated_at')";   
				     
				   }
				   else
				   {
					   $query = "INSERT INTO users (email,password,title,first_name,last_name,company,address,city,state,zip,country,created_at,updated_at)
							  VALUES('$email','$password','$title','$first_name','$last_name','$company','$address','$city','$state','$zip','$country','$created_at','$updated_at')";   
				   } 
					$result = mysql_query($query,$linkid);
					$_SESSION['users_id'] = mysql_insert_id();
				}
				else
				{
				   $Id            = $_REQUEST['id'];
				   if(isset($profile_image))
				   {
					  $query = "UPDATE users SET
					                           email='$email',
											   password='$password',
											   title='$title',
											   first_name='$first_name',
											   last_name='$last_name',
											   profile_image='$profile_image',
											   company='$company',
											   address='$address',
											   city='$city',
											   state='$state',
											   zip='$zip',
											   country='$country',
											   updated_at='".date("Y-m-d")."'
											   WHERE id='".$Id."'"; 
											   
					}
					else
					{
					  $query = "UPDATE users SET
											   email='$email',
											   password='$password',
											   title='$title',
											   first_name='$first_name',
											   last_name='$last_name',
											   company='$company',
											   address='$address',
											   city='$city',
											   state='$state',
											   zip='$zip',
											   country='$country',
											   updated_at='".date("Y-m-d")."'
											   WHERE id='".$Id."'"; 
					
					}						     
					$result = mysql_query($query,$linkid);
				}
				
				include("../users/users_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$query = "SELECT * FROM users WHERE 
								  id='".$Id."'";	
					$result = mysql_query($query,$linkid);
					$i=0;
					while($data = mysql_fetch_assoc($result)) 
					{
						while(list($key,$value) = each($data))
							$res[$i][$key] = $value;
						$i++;
					}		
				   
					$Id        = $res[0]['id'];  
					$email    = $res[0]['email'];
					//$password    = $res[0]['password'];
					$title    = $res[0]['title'];
					$first_name    = $res[0]['first_name'];
					$last_name    = $res[0]['last_name'];
					$company    = $res[0]['company'];
					$address    = $res[0]['address'];
					$city    = $res[0]['city'];
					$state    = $res[0]['state'];
					$zip    = $res[0]['zip'];
					$country   = $res[0]['country'];
				 }
						   
				include("../users/users_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "users";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("../users/users_list.php");						   
				break; 
						   
         case "list" :    	 
			  if(!empty($_REQUEST['page'])&&$_SESSION["search"]=="yes")
				{
				  $_SESSION["search"]="yes";
				}
				else
				{
				   $_SESSION["search"]="no";
					unset($_SESSION["search"]);
					unset($_SESSION['field_name']);
					unset($_SESSION["field_value"]); 
				}
				include("../users/users_list.php");
				break; 
        case "search_users":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("../users/users_list.php");
				break;  								   
						
	     default :    
		       include("../users/users_editor.php");		         
	   }
/*
* get max id
*/	   
function getMaxId($linkid)
{
	$query = "SELECT max(id) as maxid FROM users";	
	$result = mysql_query($query,$linkid);
	$i=0;
	while($data = mysql_fetch_assoc($result)) 
	{
		while(list($key,$value) = each($data))
			$res[$i][$key] = $value;
		$i++;
	}			   
	return $res[0]['maxid'];     
}	   
?>

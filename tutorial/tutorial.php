<?php
       session_start();
       if(empty($_SESSION['users_id']))
	  {
		 Header("Location: ../login/login.php");
	  }
	    include("../database/connection.php");
		
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
                $users_id = $_SESSION["users_id"];
                $youtube_video_link = $_REQUEST['youtube_video_link'];
                $title = $_REQUEST['title'];
                $description = $_REQUEST['description'];
                $date_time = date("Y-m-d H:i:s");;
				if(strlen($_FILES['file_video']['name'])>0 && $_FILES['file_video']['size']>0)
				{
					if(!file_exists("../file_video"))
					{ 
					   mkdir("../file_video",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($linkid)."_".str_replace(" ","_",strtolower(trim($_FILES['file_video']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_video']['name'])));
					}
					$filePath="../file_video/".$file;
					move_uploaded_file($_FILES['file_video']['tmp_name'],$filePath);
					$file_video ="file_video/".trim($file);
				}
				
				if(empty($_REQUEST['id']))
				{  
				   if(!empty($file_video))
				   {
					   $query = "INSERT INTO tutorial (users_id,youtube_video_link,file_video,title,description,date_time)
							  VALUES('$users_id','$youtube_video_link','$file_video','$title','$description','$date_time')";   
				     
				   }
				   else
				   {
					    $query = "INSERT INTO tutorial (users_id,youtube_video_link,title,description,date_time)
							  VALUES('$users_id','$youtube_video_link','$title','$description','$date_time')";   
				   } 
					$result = mysql_query($query,$linkid);
				}
				else
				{
				   $Id            = $_REQUEST['id'];
				   if(!empty($file_video))
				   {
					  $query = "UPDATE tutorial SET
					                           users_id='$users_id',
											   youtube_video_link='$youtube_video_link',
											   file_video='$file_video',
											   title='$title',
											   description='$description',
											   date_time='$date_time'
											   WHERE id='".$Id."'"; 
											   
					}
					else
					{
					  $query = "UPDATE tutorial SET
											  users_id='$users_id',
											   youtube_video_link='$youtube_video_link',
											   title='$title',
											   description='$description',
											   date_time='$date_time'
											   WHERE id='".$Id."'"; 
					
					}
					$result = mysql_query($query,$linkid);
				}
				
				include("../tutorial/tutorial_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$query = "SELECT * FROM tutorial WHERE 
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
					$users_id    = $res[0]['users_id'];
					$youtube_video_link    = $res[0]['youtube_video_link'];
					$file_video    = $res[0]['file_video'];
					$title    = $res[0]['title'];
					$description    = $res[0]['description'];
					$date_time    = $res[0]['date_time'];
				 }
						   
				include("../tutorial/tutorial_editor.php");						  
				break;
		case "add_comment":
					$users_id  = $_SESSION['users_id'];
					$tutorial_id = $_REQUEST['tutorial_id'];
					$comments = $_REQUEST['comments'];
					$query = "INSERT INTO comments (users_id,tutorial_id,comments)
							  VALUES('$users_id','$tutorial_id','$comments')";   
					$result = mysql_query($query,$linkid);
					include("../tutorial/tutorial_list.php");	
					break;	   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$sql = "DELETE from tutorial where id='".$Id."'";
				mysql_query($sql,$linkid);
				include("../tutorial/tutorial_list.php");						   
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
				include("../tutorial/tutorial_list.php");
				break; 
        case "search_users":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("../tutorial/tutorial_list.php");
				break;  								   
						
	     default :    
		       include("../tutorial/tutorial_list.php");		         
	   }
/*
* get max id
*/	   
function getMaxId($linkid)
{
	$query = "SELECT max(id) as maxid FROM tutorial";	
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

<?php
       session_start();
	 if(empty($_SESSION['users_id']))
	  {
		 Header("Location: ../login/login.php");
	  }
	    include("../../database/connection.php");
		
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
                $subject = $_REQUEST['subject'];
                $contents = $_REQUEST['contents'];
				if(empty($_REQUEST['id']))
				{  
				  
					   $query = "INSERT INTO news (subject,contents)
							  VALUES('$subject','$contents')";   
				   
					$result = mysql_query($query,$linkid);
				}
				else
				{
				   $Id            = $_REQUEST['id'];
				  
					  $query = "UPDATE news SET
											   subject='$subject',
											   contents='$contents'
											   WHERE id='".$Id."'"; 
					
									     
					$result = mysql_query($query,$linkid);
				}
				
				include("../news/news_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$query = "SELECT * FROM news WHERE 
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
					$subject    = $res[0]['subject'];					
					$contents    = $res[0]['contents'];
				 }
						   
				include("../news/news_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$sql = "DELETE from news where id='".$Id."'";
				mysql_query($sql,$linkid);
				include("../news/news_list.php");					   
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
				include("../news/news_list.php");
				break; 
        case "search_users":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("../news/users_list.php");
				break;  								   
						
	     default :    
		       include("../news/users_editor.php");		         
	   }
/*
* get max id
*/	   
function getMaxId($linkid)
{
	$query = "SELECT max(id) as maxid FROM news";	
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

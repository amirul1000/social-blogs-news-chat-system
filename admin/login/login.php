<?php
       session_start();
	   include("../../database/connection.php");
	   $cmd = $_REQUEST['cmd'];
	   
	   switch($cmd)
		{
		  case "login":
				$query = "SELECT * FROM users WHERE 
								  email  LIKE BINARY '".$_REQUEST["email"]."' 
								  AND password  LIKE BINARY '".$_REQUEST["password"]."'";				
				
				$result = mysql_query($query,$linkid);
				$i=0;
				while($data = mysql_fetch_assoc($result)) 
				{
					while(list($key,$value) = each($data))
						$res[$i][$key] = $value;
					$i++;
				}				
				
				if(count($res)>0)
				{
					$_SESSION["users_id"]   = $res[0]["id"];
					$_SESSION["email"]      = $res[0]["email"];
					$_SESSION["first_name"] = $res[0]["first_name"];
					$_SESSION["last_name"]  = $res[0]["last_name"];
					$_SESSION["type"]       = $res[0]["type"];
					
					$sql = "select * from plus_login 
                  				where plus_login.users_id='".$_SESSION["users_id"]."'";
				     $qt=mysql_query($sql,$linkid);
					 
					if(mysql_num_rows($qt)>0)
					{
					    $tm=date("Y-m-d H:i:s");
						$sql = "update plus_login set status='ON',tm='$tm' where users_id='".$_SESSION['users_id']."'";
						$q=mysql_query($sql,$linkid);
					}
					else
					{
						$ip=@$REMOTE_ADDR; 
						$tm=date("Y-m-d H:i:s");
						$rt=mysql_query("insert into plus_login(users_id,email,ip,tm) values('".$res[0]["id"]."','".$res[0]["email"]."','$ip','$tm')");
				     }

				   include("login_enter.php");
				
				}							 
				else
				{
					$message="Login fail,Please verify your userid or password";
					include("login_editor.php");
				}	
				break;	
		case "logout":
		        $sql = "update plus_login set status='OFF' where users_id='".$_SESSION['users_id']."'";
	            $q=mysql_query($sql,$linkid);
				
				session_destroy();
				unset($_SESSION["users_id"]);
				unset($_SESSION["email"]);
				unset($_SESSION["first_name"]);
				unset($_SESSION["last_name"]);
				unset($_SESSION["type"]);
				
				include("login_editor.php");
				break;	 
		case "forget_editor":
				include("forget_editor.php");
				break;	   	 	
		case "forget_pass":
				$query = "SELECT * FROM users WHERE email  LIKE BINARY '".$_REQUEST["email"]."'";		
				
				$result = mysql_query($query,$linkid);
				$i=0;
				while($data = mysql_fetch_assoc($result)) 
				{
					while(list($key,$value) = each($data))
						$res[$i][$key] = $value;
					$i++;
				}		
				if(count($res)>0)
				{
					$email      = $res[0]["email"];	   	 
					$password      = $res[0]["password"];	   	 
					$body = "Email:".$email."  password:".$password;
					mail($email,"Recover password",$body);
					include("login_editor.php");
				}
				else
				{
					$message ="No Email is exists with this email";	
					include("forget_editor.php");
					break;	 
				}
				break;
		default :					 
				session_destroy();
				unset($_SESSION["users_id"]);
				unset($_SESSION["email"]);
				unset($_SESSION["first_name"]);
				unset($_SESSION["last_name"]);
				unset($_SESSION["type"]);
							
				include("login_editor.php");
		}	
?>
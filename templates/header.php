<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>School Social Network</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../images/EliteCircle.css" type="text/css" />
</head>
<body>
<div id="header">
  <div id="header-content">
    <h1 id="logo">School <span class="orange">Social Network</span></h1>
    <h2 id="slogan">Knowledge is power</h2>
    <div id="header-links">
      <p> 
      		<?php
		    if(isset($_SESSION["users_id"]))
			{
		 ?>
		 	<a href="../login/login.php?cmd=logout" class="nav"><font size="2" color="#FF0000">Logout</font></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <?php
		    }
			else
			{
		?>
		  <a href="../login/login.php?cmd=logout" class="nav"><font size="2" color="#FF0000">Login</font></a> |
		  <a href="../users/users.php?cmd=register" class="nav"><font size="2" color="#FF0000">Register</font></a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php	 
			}
		 ?>		 
      </p>
    </div>
      <ul>
      <!--<li><a href="" id="current">Home</a></li>-->
		<?php
            if(isset($_SESSION["users_id"]))
            {
        ?>
            <li><a href="../users/users.php?cmd=list" class="nav">My Profile</a></li> 
        <?php
            }
        ?>
      <li><a href="../chat/chat_room.php">Chat</a></li>
      <li><a href="../tutorial/tutorial.php">Tutorial</a></li>
      <li><a href="../news/news.php">News</a></li>
      <li><a href="../about/about.php">About</a></li>
    </ul>
  </div>
</div>
  <div id="content-wrap"><!-- id="content-wrap"-->
    <div id="content">
    <div> <!--id="main"-->
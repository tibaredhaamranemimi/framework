<?php 	
	if (Session::get('loggedIn') == false)
	{
	echo '<a href="'.URL.'">Accueil <img src="'.URL.'public/images/b_home.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	//echo '<a href="'.URL.'setup">Setup <img src="'.URL.'public/images/setup.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="'.URL.'login">Login <img src="'.URL.'public/images/Login.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="'.URL.'register">Register <img src="'.URL.'public/images/register.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	}
	else
	{
	require 'deces.php';	
	require 'naiss.php';
	require 'demo.php';
	echo '<a href="'.URL.'users/user/">Compte <img src="'.URL.'public/images/user.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="'.URL.'help">Help <img src="'.URL.'public/images/help.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="'.URL.'dashboard/logout">Logout <img src="'.URL.'public/images/s_loggoff.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';   
	}
?>	


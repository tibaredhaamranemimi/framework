<?php 
if (Session::get('demgraphie') == 3)
{
echo '<a href="'.URL.'bnm">Accueil <img src="'.URL.'public/images/b_home.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
echo '<a href="'.URL.'Agenda/Agenda/'.date('d').'/'.date('m').'/'.date('Y').'">Agenda <img src="'.URL.'public/images/agd.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';	
}		
?>	


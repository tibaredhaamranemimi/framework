<?php 
if (Session::get('demgraphie') == 2)
{
echo '<a href="'.URL.'naissance">Accueil <img src="'.URL.'public/images/b_home.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
echo '<a href="'.URL.'Agenda/Agenda/'.date('d').'/'.date('m').'/'.date('Y').'">Agenda <img src="'.URL.'public/images/agd.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';	
echo '<a href="'.URL.'sig/">sig <img src="'.URL.'public/images/sigh.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
echo '<a href="'.URL.'dashboard/cfg/">Cfg <img src="'.URL.'public/images/cfg.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
}		
?>	


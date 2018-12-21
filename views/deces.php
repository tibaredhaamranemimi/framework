<?php 
if (Session::get('demgraphie') == 1)
{
echo '<a href="'.URL.'dashboard">Accueil <img src="'.URL.'public/images/b_home.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
echo '<a href="'.URL.'dashboard/SIGA/">Sig <img src="'.URL.'public/images/sig.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
echo '<a href="'.URL.'Agenda/Agenda/'.date('d').'/'.date('m').'/'.date('Y').'">Agenda <img src="'.URL.'public/images/agd.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
echo '<a href="'.URL.'dashboard/cfg/">Cfg <img src="'.URL.'public/images/cfg.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
if (Session::get('role') == 'dsp')
	{
	echo '<a href="'.URL.'dspd/">DSP <img src="'.URL.'public/images/eva.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;'; 
	//echo '<a href="'.URL.'dashboard/DSP/">DSP <img src="'.URL.'public/images/eva.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	}		
}
?>	


<div class="sheader1l"><p id="dashboard"><?php echo "Gérer les femmes gestantes";?></p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">

<?php
$ctrl='naissance';
$mdl='search';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array("id"=>'id',"NOM3"=>'NOM3'),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'nouveau',        "tb1" => 'nouveau',"vb1" => '', "icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'Evaluation',     "tb2" => 'Print', "vb2" => '',  "icon2" => 'print.PNG',
"cb3" => $ctrl,"mb3" => 'CGR',            "tb3" => 'graphe',"vb3" => '',  "icon3" => 'graph.PNG',
"cb4" => $ctrl,"mb4" => '',               "tb4" => 'Search',"vb4" => '',  "icon4" => 'search.PNG');
html::form($data) ;

?>
</div>
<div class="sheader2r">
<?php
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>

<?php

		if (isset($this->userListview))
		{
		ob_start();
		echo '<div class="listl">';
		echo'<table>';$colspan=20;
			echo'<tr bgcolor="#00CED1">';
			echo'<th class="crtl">Val</th>';
			echo'<th class="crtl">View</th>';
			echo'<th >Nom_Prénom_(mére)</th>';
			echo'<th >Nom_Prénom_(Nouveau née)</th>';
			echo'<th class="crtl">Sexe</th>';
			echo'<th >Date naissance</th>';
			// echo'<th >Nom_Prénom_(pére)</th>';
			// echo'<th class="crtl">ADM</th>';
			// echo'<th class="crtl">BIL</th>';
			// echo'<th class="crtl">BIS</th>';
			// echo'<th class="crtl">PARTO</th>';
			// echo'<th class="crtl">Cert A</th>';
			// echo'<th class="crtl">Décl N</th>';
			// echo'<th class="crtl">APG</th>';
			// echo'<th class="crtl">SIL</th>';
			// echo'<th class="crtl">RSS/RCS</th>';
			// echo'<th class="crtl">ORD</th>';
			// echo'<th class="crtl">EVA</th>';
			echo'<th class="crtl">phar</th>';
			echo'<th class="crtl">Update</th>';
			echo'<th class="crtl">Delete</th>';
			echo'</tr>';
			foreach($this->userListview as $key => $value)
			{ 
			$bgcolor_donate ='#EDF7FF';
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			$url1 = explode('/',$_GET['url']);if ($value['aprouve']==1){echo '<td align="center"><a  title="Désaprouvé "  href="'.URL.$ctrl.'/Aprouve/'.$value['id'].'/0/'.$url1[2].'/'.$url1[3].'" ><img src="'.URL.'public/images/ok.jpg"   width="16" height="16" border="0" alt=""   /></a></td>'; } else{echo '<td align="center"><a  title="Aprouvé "     href="'.URL.$ctrl.'/Aprouve/'.$value['id'].'/1/'.$url1[2].'/'.$url1[3].'" ><img src="'.URL.'public/images/non.jpg"   width="16" height="16" border="0" alt=""   /></a></td>';  }
			echo '<td align="center"><a target="_blank"  title="View"  href="'.URL.$ctrl.'/view/'.$value['id'].'" ><img src="'.URL.'public/images/open.PNG"   width="16" height="16" border="0" alt=""   /></a></td>'; 
			echo '<td align="left"  >'.$value['NOM2'].'_'.$value['PRENOM2'].'</td>';
			
			
			echo '<td align="left" >'.$value['NOM3'].'_'.$value['PRENOM5']."(".$value['PRENOM3'].")".'</td>';
			echo '<td align="center"  >'.$value['SEXE5'].'</td>';
			echo '<td align="left" >'.HTML::dateUS2FR($value['DINS1']).'</td>';
			//echo '<td align="left"  >'.$value['NOM3'].'_'.$value['PRENOM3'].'</td>';
			//.' ('.$value[''].')'
			//echo '<td align="center" style="width:60px;" ><a target="_blank" title="admission"  href="'.URL.'tcpdf/naissance/adm.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			//echo '<td align="center" style="width:60px;" ><a target="_blank" title="bilan"  href="'.URL.'tcpdf/naissance/bilan.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			//echo '<td align="center" style="width:60px;" ><a target="_blank" title="score de bishop"  href="'.URL.$ctrl.'/bishop/'.$value['id'].'" ><img src="'.URL.'public/images/bishop.jpg"   width="16" height="16" border="0" alt=""   /></a></td>';
			//echo '<td align="center" style="width:60px;" ><a target="_blank" title="partogramme"  href="'.URL.'tcpdf/naissance/parto.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			//echo '<td align="center" style="width:60px;" ><a target="_blank" title="Certificat d\'accouchement"  href="'.URL.'tcpdf/naissance/caccouchemt.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			//echo '<td align="center" style="width:60px;" ><a target="_blank" title="Déclaration de naissance"  href="'.URL.'tcpdf/naissance/declarationn.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			//echo '<td align="center" style="width:60px;" ><a target="_blank" title="score d\'apgar"  href="'.URL.$ctrl.'/apgar/'.$value['id'].'" ><img src="'.URL.'public/images/apgar.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			//echo '<td align="center" style="width:60px;" ><a target="_blank" title="score de silverman"  href="'.URL.$ctrl.'/silverman/'.$value['id'].'" ><img src="'.URL.'public/images/silvermane.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			//echo '<td align="center" style="width:60px;" ><a target="_blank" title="RSS/RCS"  href="'.URL.'tcpdf/naissance/rss.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			//echo '<td align="center" style="width:60px;" ><a target="_blank" title="Ordonnance"  href="'.URL.'tcpdf/naissance/ord.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			//echo '<td align="center" style="width:60px;" ><a target="_blank" title="Evacuation"  href="'.URL.'tcpdf/naissance/evac.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			//echo '<td align="center" style="width:60px;" ><a target="_blank" title="transfusion"  href="'.URL.'tcpdf/naissance/trans.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:60px;" ><a target="_blank" title="Medicaments"  href="'.URL.$ctrl.'/phar/'.$value['id'].'" ><img src="'.URL.'public/images/edit.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:60px;" ><a target="_blank" title="editer"  href="'.URL.$ctrl.'/edit/'.$value['id'].'" ><img src="'.URL.'public/images/edit.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:60px;" ><a class="delete" title="supprimer"  href="'.URL.$ctrl.'/delete/'.$value['id'].'" ><img src="'.URL.'public/images/delete.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo'</tr>';
			}
			$total_count=count($this->userListview1);
			$total_count1=count($this->userListview);
			if ($total_count <= 0 )
			{
				echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for deces </span></td> </tr>';
				header('location: ' . URL .$ctrl.'/nouveau/'.$this->userListviewq);
				echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
			}
			else
			{		
				echo '<tr bgcolor="#00CED1"><td   id="bdn"  colspan="'.$colspan.'" >'. HTML::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,$ctrl,$mdl).'</td></tr>';	
				
				$limit=$this->userListviewl;		
				$page=$this->userListviewp;
				if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
				$total_page = ceil($total_count/$limit); echo "<br>" ;  
				$prev_url = URL.$ctrl.'/'.$mdl.'/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
				$next_url = URL.$ctrl.'/'.$mdl.'/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
				echo '<tr bgcolor="#00CED1"  ><td id="btdn" colspan="'.$colspan.'" >';	
				?> 
				<?php echo '<button id="buttoni"'; echo ($page<=0)?'disabled':'';?>                  onclick="document.location='<?php echo $prev_url; ?>'"> <?php echo ""; echo 'Previews</button>&nbsp;<span>[' .$total_count1.'/'.$total_count.' Record(s) found.]</span>'; ?>                              
				<?php echo '<button id="buttons"'; echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'"> <?php echo "Next</button>";?> 
				<?php 
			}	
		echo "</table>";
		echo "</div>";
		ob_end_flush();
		}
		else 
		{
		echo '<div class="contentl">';
		HTML::graphemois(30,340,'Naissance Par mois et sexe  Arret Au  : ','','naissance','DINS1','',date("Y"),'','='.Session::get('structure'));
		echo "</div>";
		echo'<div class="content"><img id="image" src="'.URL.'public/images/dashbord.jpg" ></div>';
		echo'<div class="contentr"><img id="image" src="'.URL.'public/images/'.logon.'"></div>';
		}
?>






	
<div class="scontentl2">
<?php 
	// if (Session::get('loggedIn') == false)
	// {
	// echo '<a href="'.URL.'">x</a>';echo '&nbsp;';
	// echo '<a href="'.URL.'x">x</a>';echo '&nbsp;';
	// echo '<a href="'.URL.'x">x</a>';echo '&nbsp;';
	// }
	// else
	// {
	// echo '<a href="'.URL.'x">x</a>';echo '&nbsp;';
	// if (Session::get('login') == admin)
	// {
		// echo '<a href="'.URL.'x/x/0">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
	// }
	// if (Session::get('login') == sadmin)
	// {
	    // echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/0">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/x">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/0">x</a>';echo '&nbsp;';
	// }
	echo '<a class="naissance"  id="annee"  href="'.URL.'naissance/graphe/0">Année</a>';echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
	echo '<a class="naissance"  id="ln"  href="'.URL.'naissance/graphe/2">ln</a>';echo '&nbsp;'; 
	// echo '<a href="'.URL.'dashboard/graphe/1">Mois</a>';echo '&nbsp;';
	  
	
	// }
?>			
</div>		
<div class="scontentl3">
<?php 
	// if (Session::get('loggedIn') == false)
	// {
	// echo '<a href="'.URL.'">x</a>';echo '&nbsp;';
	// echo '<a href="'.URL.'x">x</a>';echo '&nbsp;';
	// echo '<a href="'.URL.'x">x</a>';echo '&nbsp;';
	// }
	// else
	// {
	// echo '<a href="'.URL.'x">x</a>';echo '&nbsp;';
	// if (Session::get('login') == admin)
	// {
		// echo '<a href="'.URL.'x/x/0">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
	// }
	// if (Session::get('login') == sadmin)
	// {
	    // echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/0">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/x">x</a>';echo '&nbsp;';
		// echo '<a href="'.URL.'x/x/0">x</a>';echo '&nbsp;';
	// }
	// echo '<a href="'.URL.'x/user/">x</a>';echo '&nbsp;';
	// echo '<a href="'.URL.'x/x">x</a>';echo '&nbsp;';   
	
	// }
	
	echo '<a class="naissance"  id="mois" href="'.URL.'naissance/graphe/1">Mois</a>';echo '&nbsp;';
?>
</div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		
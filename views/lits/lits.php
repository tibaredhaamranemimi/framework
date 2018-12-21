<div class="sheader1l"><p id="dashboard"><?php echo "Gérer les lits de Naissance";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">
<?php 
$ctrl='lits';
$mdl='searchlits';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array( 
                    "id"     => 'id'
					
				  ),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'createnumlit',   "tb1" => 'nouveau',"vb1" => '',    "icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'imp',            "tb2" => 'Print', "vb2" => '',  "icon2" => 'print.PNG',
"cb3" => $ctrl,"mb3" => 'CGR',            "tb3" => 'graphe',"vb3" => '',  "icon3" => 'graph.PNG',
"cb4" => $ctrl,"mb4" => '',               "tb4" => 'Search',"vb4" => '', "icon4" => 'search.PNG'
);
html::form($data) ;
						
?>
</div>
<div class="sheader2r">
<?php
echo "<button id=\"Cleari\" onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<?php
echo '<div class="contentl">';
if (isset($this->userListview))
{
$colspan=6;
echo'<table width="100%" border="1" cellpadding="5" cellspacing="1" align="center">';
	echo'<tr bgcolor="#00CED1"   >';
	echo'<th colspan="'.$colspan.'" >';
	echo 'Relevé des lits '; echo '&nbsp;';		
	echo'</th>';
	echo'</tr>';
	echo'<tr bgcolor="#00CED1">';
	echo'<th >Service</th>';
	echo'<th >N°lit</th>';
	echo'<th >Nom_Prenom</th>';
	echo'<th >Update</th>';
	echo'<th >Delete</th>';
	echo'</tr>';
		
		foreach($this->userListview as $key => $value)
		{ 
            $bgcolor_donate ='#EDF7FF';
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			echo '<td align="left" ><b>'.HTML::nbrtostring('servicedeces','id',$value['idservice'],'service').'('.$value['nlit'].')'.'<b></td>';
			echo '<td align="center" >'.$value['nlit'].'</td>'; 
			echo '<td align="center" >'.$value['idpt'].'</td>'; 
			echo '<td align="center"  ><a target="_blank" title="editer"    href="'.URL.$ctrl.'/editlits/'.$value['id'].'" ><img src="'.URL.'public/images/edit.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center"  ><a class="delete" title="supprimer"  href="'.URL.$ctrl.'/deletelits/'.$value['id'].'" ><img src="'.URL.'public/images/delete.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo'</tr>';	
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
			echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for deces </span></td> </tr>';
			header('location: ' . URL .$ctrl.'/createnumlit/'.$this->userListviewq);
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
}
else 
{
HTML::multigraphe(30,340,'Naissance Par annee et sexe  Arret Au : ','naissance','DINS1','SEXE5','M','F','='.Session::get('structure')) ;
}
echo "</div>";	
?>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/lit.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
		
<div class="scontentl2"><?php echo '<a class="naissance"  id="annee"  href="'.URL.'naissance/graphe/0">Année</a>';echo '&nbsp;'; ?></div>		
<div class="scontentl3"><?php echo '<a class="naissance"  id="mois" href="'.URL.'naissance/graphe/1">Mois</a>';echo '&nbsp;';?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		
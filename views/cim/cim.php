<div class="sheader1l"><p id="lregister"><?php echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">
<?php 
$ctrl='cim';
$mdl='searchcim';
$data = array(
"c"   => $ctrl,
"m"   => $mdl,
"combo"   => array("id"=>'row_id',"diag_nom" =>'diag_nom',"diag_cod" =>'diag_cod'),
"submitvalue" => 'Search',
"cb1" => $ctrl,"mb1" => 'nouveau',           "tb1" => 'nouveau',"vb1" => '',"icon1" => 'add.PNG',
"cb2" => $ctrl,"mb2" => 'imp',               "tb2" => 'Print', "vb2" => '',"icon2" => 'print.PNG',
"cb3" => $ctrl,"mb3" => 'CGR',               "tb3" => 'graphe',"vb3" => '',"icon3" => 'graph.PNG',
"cb4" => $ctrl,"mb4" => '',                  "tb4" => 'Search',"vb4" => '',"icon4" => 'search.PNG'
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
echo '<div class="listl">';
if (isset($this->userListview))
{
$colspan=12;
echo'<table width="100%" border="1" cellpadding="5" cellspacing="1" align="center">';
	echo'<tr bgcolor="#00CED1"   >';
	echo'<th colspan="'.$colspan.'" >';
	echo 'La classification internationale des maladies 10e révision (CIM-10) '; echo '&nbsp;';		
	echo'</th>';
	echo'</tr>';
	echo'<tr bgcolor="#00CED1">';
	echo'<th style="width:700px">categorie diagnostic</th>';
	echo'<th style="width:25px">code</th>';
	echo'<th style="width:25px">Nbr</th>';
	echo'<th style="width:25px">Pdf</th>';
	echo'<th style="width:50px">Update</th>';
	echo'<th style="width:50px">Delete</th>';
	echo'</tr>';
		
		foreach($this->userListview as $key => $value)
		{ 
            $bgcolor_donate ='#EDF7FF';
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			echo '<td  align="left"><b>'.$value['diag_nom'].'<b></td>';
			echo '<td  align="center"><b>'.$value['diag_cod'].'<b></td>';
			echo '<td align="center"   >';echo  HTML::cimnbr1(Session::get('structure'),$value['row_id']);echo '</td>';
			echo '<td align="center" style="width:10px;" bgcolor="#32CD32" ><a target="_blank" title="pdf"  href="'.URL.'fpdf/deces/catdeces.php?uc='.$value['row_id'].'&str='.Session::get('structure').'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td  align="center"><a target="_blank" title="editer"    href="'.URL.$ctrl.'/editcategorie/'.$value['row_id'].'" ><img src="'.URL.'public/images/edit.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td  align="center"><a class="delete" title="supprimer"  href="'.URL.$ctrl.'/deletecategorie/'.$value['row_id'].'" ><img src="'.URL.'public/images/delete.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo'</tr>';	
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
			echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for deces </span></td> </tr>';
			header('location: ' . URL .$ctrl.'/nouveaucim/'.$this->userListviewq);
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
HTML::multigraphe(30,340,'Décés Par annee et sexe  Arret Au : ','deceshosp','DINS','SEX','M','F','='.Session::get('structure')) ;
}
echo "</div>";	
?>

		
<div class="scontentl2"><?php echo "";echo $this->msg; echo "*";?></div>		
<div class="scontentl3"><?php echo "";echo $this->msg; echo "*";?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		
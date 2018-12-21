<div class="sheader1l"><p id="dashboard">Gérer un  RDV </p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">Agenda<?php $ctrl='Agenda';?></div>
<div class="sheader2r">MSPRH</div>

<?php
echo '<div class="listl">';//<br/><br/>
echo "</br>";echo "</br>";echo "</br>";echo "</br>";echo "</br>";echo "</br>";echo "</br>";echo "</br>";
echo'<form  action="'.URL.$ctrl.'/createrdv/" method="post">';
echo '<input  id="daterdv" type="text" name="TIRDV"  placeholder="Titre" value=""/>';
echo '<select id="typerdv" name="TYRDV">';
echo '<option value="0">Type</option>';
echo '<option value="1">1 Reunion EPH</option>';
echo '<option value="2">2 Reunion EPSP</option>';
echo '<option value="3">3 Reunion EHS</option>';
echo '<option value="4">4 Reunion DSP</option>';
echo "</select>";
echo '<textarea id="txtrdv"  STYLE="Text-ALIGN:left" rows=4 cols=24 name="TXRDV" value="">Texte</textarea>';
$url = explode('/',$_GET['url']);
echo " <input type=\"hidden\" name=\"url2\"  value=\"".$url[2]."\" />";
echo " <input type=\"hidden\" name=\"url3\"  value=\"".$url[3]."\" />";
echo " <input type=\"hidden\" name=\"url4\"  value=\"".$url[4]."\" />";
echo ' <input  type="hidden"  name="STR" value="'.Session::get('structure').'"/>';
echo ' <input id="submitrdv"  type="submit" />';
echo'</form>';
html::agenda($ctrl,Session::get('structure'));
$nbr=$this->userListviewt;
echo'<table class="tableaux_centrer2" >';
	echo( "<tr class=\"calendar1\"><td  colspan=\"4\"><div align=\"center\"><font  color=\"green\">Liste  RDV : ".$nbr."</td></tr>" ); 
    echo'</tr>';
	echo'<tr bgcolor="#00CED1">';
	echo'<th style="width:10px;">Titre</th>';
	echo'<th style="width:10px;">Type</th>';
	echo'<th style="width:10px;">Texte</th>';
	echo'<th style="width:10px;">Delete</th>';
	echo'</tr>';
	if ($nbr <=0 ) 
	{
	echo'<tr bgcolor="#EDF7FF">';
	echo'<td style="width:10px;">*</td>';
	echo'<td style="width:10px;">*</td>';
	echo'<td style="width:10px;">*</td>';
	echo'<td style="width:10px;">*</td>';
	echo'</tr>';
	}
	else
	{
	foreach($this->userListview as $key => $value)
	{
	$bgcolor_donate ='#EDF7FF';
	echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
	//echo'<td align="left" >'.$value['id'].'</td>';
	echo'<td align="left" >'.$value['TIRDV'].'</td>';
	echo'<td align="left" >'.$value['TYRDV'].'</td>';
	echo'<td align="left" >'.$value['TXRDV'].'</td>';
	echo "<td> <a   href=\"".URL.$ctrl."/deleterdv/".$value['id'].""."/".$this->userListviewd.""."/".$this->userListviewm.""."/".$this->userListviewa."\"><img  src=\"".URL."public/images/icons/delete.PNG \"  width='16' height='16' border='0' alt=''/></a></td>\n" ; 
	echo '</tr>';
	}
				
	}
	echo'</tr>';
	echo'<tr bgcolor="#00CED1">';
	//echo'<th style="width:10px;">id</th>';
	echo'<th style="width:10px;">Titre</th>';
	echo'<th style="width:10px;">Type</th>';
	echo'<th style="width:10px;">Texte</th>';
	echo'<th style="width:10px;">Delete</th>';
	echo'</tr>';				
echo "</table>";

echo "</div>";
?>
	
<div class="scontentl2">Agenda</div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		
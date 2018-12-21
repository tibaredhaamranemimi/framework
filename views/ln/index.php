<div class="sheader1l"><p id="dashboard">LOIS NORMALES</p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">
<?php
// $ctrl='dashboard';
// $mdl='search';
// $data = array(
// "c"   => $ctrl,
// "m"   => $mdl,
// "combo"   => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
// "submitvalue" => 'Search',
// "cb1" => $ctrl,"mb1" => 'nouveau',        "tb1" => 'Nouveau certificat ',"vb1" => '', "icon1" => 'add.PNG',
// "cb2" => $ctrl,"mb2" => 'Evaluation',     "tb2" => 'Imprimer rapport', "vb2" => '',  "icon2" => 'print.PNG',
// "cb3" => $ctrl,"mb3" => 'CGR',            "tb3" => 'graphe',"vb3" => '',  "icon3" => 'graph.PNG',
// "cb4" => $ctrl,"mb4" => '',               "tb4" => 'Search',"vb4" => '',  "icon4" => 'search.PNG');
// html::form($data) ;
?>
On considère une variable aléatoire X normale d'espérance 
<input class="ln"  id="entmu" value="0" onchange="maj();"> et d'écart-type <input class="ln" id="entsigma" value="1" onchange="maj();">
</div>
<div class="sheader2r">MSPRH
<?php
// echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
// echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<?php
echo '<div class="listl">';
?>
<p  id="ent" >   <input class="ln" id="enta" value="-1.96" onchange="maj();"> P entre <input class="ln" id="entb" value="1.96" onchange="maj();"> = <span id="sorPab">0.95</span> </p>
<canvas id="can1" width="400" height="240"></canvas>
<p  id="pinf"   >P < <span id="sorb">1.96</span> = <span id="sorPb">0.975</span> :</p>
<canvas id="can2" width="400" height="240"></canvas>
<p  id="psup"  >P >  <span id="sora">-1.96</span> = <span id="sorPa">0.975</span> :</p>
<canvas id="can3" width="400" height="240"></canvas>	
<?php		
echo "</div>";
// echo '<div class="contentl">';
// echo "</div>";
// echo'<div class="content"><img id="image" src="'.URL.'public/images/dashbord.jpg" ></div>';
// echo'<div class="contentr"><img id="image" src="'.URL.'public/images/'.logo.'"></div>';
?>	
<div class="scontentl2">LOIS NORMALES</div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		
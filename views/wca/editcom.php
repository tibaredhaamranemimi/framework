<div class="sheader1l"><p id="lregister"><?php echo "Modifier commune";//echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">Modifier commune
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
// html::form($data) ;						
?>
</div>
<div class="sheader2r">
<?php
echo "<button id=\"Cleari\" onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<?php
echo '<div class="contentl">';?>
<div class="form-style-10">
	<form class="tabaut" method="post" action="<?php echo URL."wca/editSave/".$this->user[0]['IDCOM'];?>">
	   
	    <div class="section"><span>1</span> Wilaya </div>
		<div class="inner-wrap"><?php HTML::WILAYA('WILAYA2','WILAYA2','WILAYA2','wil',$this->user[0]['IDWIL'],View::nbrtostring('wil','IDWIL',$this->user[0]['IDWIL'],'WILAYAS')) ; //HTML::chapitre('CODECIM0','chapitre',$this->user[0]['c_chapi'],View::nbrtostring('chapitre','IDCHAP',$this->user[0]['c_chapi'],'CHAP'));?></div>	
		<div class="section"><span>2</span>Commune fr</div>
		<div class="inner-wrap"><input  type="text" name="COMMUNE" value="<?php echo $this->user[0]['COMMUNE'];?>"/></div>
		<div class="section"><span>3</span>Commune ar</div>
		<div class="inner-wrap"><input  type="text" name="communear" value="<?php echo $this->user[0]['communear'];?>"/></div>
	    </br>
		<div class="inner-wrap"><input  type="submit" /></div>
	
	</form>
	</div>
<?php
echo "</div>";	
?>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/com.png" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
		
<div class="scontentl2"><?php echo "Modifier commune";//echo $this->msg; echo "2";?></div>		
<div class="scontentl3"><?php html::rsc();?><?php //echo "";echo $this->msg; echo "3";?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		
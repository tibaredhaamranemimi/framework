<div class="sheader1l"><p id="lregister">Gérer les professions <?php //echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l"> Modifier une profession</div>
<div class="sheader2r">MSPRH</div>
<?php
echo '<div class="contentl">';?>
<div class="form-style-10">
	<form class="tabaut" method="post" action="<?php echo URL."prf/editSave/".$this->user[0]['id'];?>">
		<div class="section"><span>2</span>Profession fr</div>
		<div class="inner-wrap"><input  type="text" name="Profession" value="<?php echo $this->user[0]['Profession'];?>"/></div>
		<div class="section"><span>3</span>Profession ar</div>
		<div class="inner-wrap"><input  type="text" name="Professionar" value="<?php echo $this->user[0]['Professionar'];?>"/></div>
	    </br>
		<div class="inner-wrap"><input  type="submit" /></div>
	
	</form>
	</div>
<?php
echo "</div>";	
?>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/prf.png" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>			
<div class="scontentl2">Modifier une profession</div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		
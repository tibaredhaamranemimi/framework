<div class="sheader1l"><p id="lregister">Gérer les services</p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">Modifier un service</div>
<div class="sheader2r">MSPRH</div>
<?php
echo '<div class="contentl">';?>
<div class="form-style-10">
	
	<form class="tabaut" method="post" action="<?php echo URL."ser/editSave/".$this->user[0]['id'];?>">
		<div class="section"><span>2</span>Service fr</div>
		<div class="inner-wrap"><input  type="text" name="service" value="<?php echo $this->user[0]['service'];?>" /></div>
		<div class="section"><span>3</span>Service ar</div>
		<div class="inner-wrap"><input  type="text" name="servicear" value="<?php echo $this->user[0]['servicear'];?>" /></div>
	    </br>
		<div class="inner-wrap"><input  type="submit" /></div>
	
	</form>
	</div>



<?php
echo "</div>";	
?>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/eph.png" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
		
<div class="scontentl2">Modifier un service<?php //echo "";echo $this->msg; echo "2";?></div>		
<div class="scontentl3"><?php html::rsc();?><?php //echo "";echo $this->msg; echo "3";?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>	
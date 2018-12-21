<div class="sheader1l"><p id="lregister"> <?php echo "Modifier wilaya ";//echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">Modifier wilaya</div>
<div class="sheader2r">MSPRH</div>
<?php
echo '<div class="contentl">';?>
<div class="form-style-10">
	<form class="tabaut" method="post" action="<?php echo URL."wca/editSavewil/".$this->user[0]['IDWIL'];?>">
	   
	    <div class="section"><span>1</span>Wilaya fr </div>
		
		<div class="inner-wrap"><input  type="text" name="WILAYAS" value="<?php echo $this->user[0]['WILAYAS'];?>"/></div>
		<div class="section"><span>2</span>Wilaya ar</div>
		<div class="inner-wrap"><input  type="text" name="WILAYASAR" value="<?php echo $this->user[0]['WILAYASAR'];?>"/></div>
	    </br>
		<div class="inner-wrap"><input  type="submit" /></div>
	
	</form>
	</div>
<?php
echo "</div>";	
?>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/com.png" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>			
<div class="scontentl2"><?php echo "Modifier wilaya";//echo $this->msg; echo "2";?></div>		
<div class="scontentl3"><?php html::rsc();?><?php //echo "";echo $this->msg; echo "3";?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		
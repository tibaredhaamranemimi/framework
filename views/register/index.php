<div class="sheader1l">
<?php
Session::init();
if (isset($_SESSION['errorregister'])) {
$sError = '<p id="errorregister">' . $_SESSION['errorregister'] . '</p>';		
echo $sError;			
}
else
{
$sError='<p id="lregister">Gérer un compte </p>';
echo $sError;
}

echo "<img   src=\"./captcha.php\"  />";


?>
</div>
<div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">Créer un compte 
<?php //echo EDRSFR;?>
</div>
<div class="sheader2r">MSPRH</div>
<div class="contentl formaut">
    <div class="form-style-10">
    <form class="tabaut"action="register/Registerrun" method="post">	
	    
	   
		<div class="inner-wrap"><?php HTML::WILAYA('wilaya','wilayarg','wilaya','wil','17000','wilaya') ;?></div>
		</br>
		<div class="inner-wrap"><?php HTML::structure('structure','structurerg','structure','01','structure') ?></div>
		</br>
		<div class="inner-wrap"><input  type="text" name="login" onkeyup="javascript:this.value=this.value.toUpperCase();" required=""  /></div>
	
		<div class="inner-wrap"><input type="password" name="password" required="" /></div>
		
		<div class="inner-wrap"><p> captcha <img src="./views/register/captcha.php" /><input type="text" name="captcha"  value=""/></p></div>
		<!---->
		<div class="inner-wrap"><input  type="submit" /></div>
	
	</form>
	</div>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/register.jpg"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	

	
<div class="scontentl2">
<?php echo EDRSUS;?>
<?php 
//echo "<a href='javascript:self.history.back();'>Go Back</a>";//link to the previous page
//echo "";
//echo $this->msg; echo "";
?>
</div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		

<!DOCTYPE html>
<html>
<head>
<title><?php if (isset ($this->title)){echo $this->title; }else {echo title ;}?></title>
<link rel="icon" type="image/png" href="<?PHP echo URL; ?>public/images/<?php echo logo ?>?t=<?php echo time();?>" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/bootstrap.min.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/cssgrid.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/tabs.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/mystyle.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/nss.css?t=<?php echo time();?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/bnm.css?t=<?php echo time();?>">
<script src="<?php echo URL;?>public/js/jquery.js?t=<?php echo time();?>"></script>
<script src="<?php echo URL;?>public/js/jquery.maskedinput.js?t=<?php echo time();?>"></script>
<script src="<?php echo URL;?>public/js/mystyle.js?t=<?php echo time();?>"></script>
<script src="<?php echo URL;?>public/js/popper.min.js?t=<?php echo time();?>"></script>
<script src="<?php echo URL;?>public/js/bootstrap.min.js?t=<?php echo time();?>"></script>
<script src="<?php echo URL;?>public/js/bootstrap.bundle.min.js?t=<?php echo time();?>"></script>
<script src="<?php echo URL;?>public/js/tiba.js?t=<?php echo time();?>"></script>
<?php if (isset($this->js)){foreach ($this->js as $js){echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';}}?>
<?php if (isset($this->css)){foreach ($this->css as $css){echo '<link rel="stylesheet" type="text/css" href="'.URL.'views/'.$css.'"></script>';}}?>
</head>
<body onload="remplir1(); remplir2(); remplir3();"   >
<?php 
Session::init();
function getmicrotime(){list($usec, $sec) = explode(" ",microtime());return ((float)$usec + (float)$sec);}   
$temps = getmicrotime();
?>
<div class="tiba" >
    <div class="headerl"></div>
	<div class="headerc"><?php echo msp;?></div>
	<div class="headerr"></div>
	<div class="sheaderl">
	<?php require 'menu.php';	?>				
    </div>	
	<div class="sheaderr"><?php if (Session::get('loggedIn') == true){echo '<p id="wdj" >'; echo HTML::nbrtostring('structure','id',Session::get('structure'),'structure').' : '.'<a title="compte"   href="'.URL.'users/user/">'.Session::get('login').'</a>' ;echo '</p>';}else {echo '<p id="wdj" >DSP : '.wilaya.'</p>';}	?>	</div>	
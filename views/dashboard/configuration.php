<div class="sheader1l"><p id="lcfg"><?php echo "Configuration des parametres";?></p></div><div class="sheader1r"><p id="lcfg"><?php html::NAV();?></p></div>
<div class="sheader2l"><?php echo $this->msg; ?></div><div class="sheader2r">MSPRH</div>
<div class="contentl">

<?php 
echo "<button class=\"naissance\"  id=\"btna\"   onclick=\"document.location='".URL."wca/searchwil/0/10?o=IDWIL&q=';\"title=\"Wilaya\">&nbsp;<img src=\"".URL."public/images/com.png\" width='15' height='15' border='0' alt=''/>&nbsp;Wilaya&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btna1\"   onclick=\"document.location='".URL."wca/searchcom/0/10?o=IDCOM&q=';\"title=\"Commune\">&nbsp;<img src=\"".URL."public/images/com.png\" width='15' height='15' border='0' alt=''/>&nbsp;Commune&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btna2\"   onclick=\"document.location='".URL."str/searchstr/0/10?o=id&q=';\"title=\"Structure\">&nbsp;<img src=\"".URL."public/images/eph.png\" width='15' height='15' border='0' alt=''/>&nbsp;Structure&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btna3\"   onclick=\"document.location='".URL."ser/searchser/0/10?o=id&q=';\"title=\"Service\">&nbsp;<img src=\"".URL."public/images/eph.png\" width='15' height='15' border='0' alt=''/>&nbsp;Service&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btna4\"   onclick=\"document.location='".URL."lits/searchlits/0/10?o=id&q=';\"title=\"Service\">&nbsp;<img src=\"".URL."public/images/eph.png\" width='15' height='15' border='0' alt=''/>&nbsp;Lits&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btna5\"   onclick=\"document.location='".URL."dashboard/reset/';\"title=\"Remise de la structure a zéro \">&nbsp;<img src=\"".URL."public/images/ok.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Remise a zéro &nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btna6\"   onclick=\"document.location='".URL."dashboard/reset/';\"title=\"Remise de la structure a zéro \">&nbsp;<img src=\"".URL."public/images/ok.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Remise a zéro &nbsp;</button> " ;

echo "<button class=\"naissance\"  id=\"btnb\"  onclick=\"document.location='".URL."users/searchusers/0/10?o=id&q=';\" title=\"Users\">&nbsp;<img src=\"".URL."public/images/user.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Users&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btnb1\"  onclick=\"document.location='".URL."med/searchmed/0/10?o=id&q=';\" title=\"Medecin\">&nbsp;<img src=\"".URL."public/images/med.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Medecin&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btnb2\"  onclick=\"document.location='".URL."sf/searchsf/0/10?o=id&q=';\" title=\"Medecin\">&nbsp;<img src=\"".URL."public/images/med.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Sage-femme&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btnb3\"  onclick=\"document.location='".URL."prf/searchprf/0/10?o=id&q=';\" title=\"Medecin\">&nbsp;<img src=\"".URL."public/images/med.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Profession&nbsp;</button> " ;

echo "<button class=\"naissance\"  id=\"btnc\"  onclick=\"document.location='".URL."cha/searchcha/0/10?o=IDCHAP&q=';\"title=\"Cim\">&nbsp;<img src=\"".URL."public/images/cim.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Chapitre-Cim10&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btnc1\"  onclick=\"document.location='".URL."cim/searchcim/0/10?o=row_id&q=';\"title=\"Cim\">&nbsp;<img src=\"".URL."public/images/cim.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Categorie-Cim10&nbsp;</button> " ;

echo "<button class=\"naissance\"  id=\"btnd\"   onclick=\"document.location='".URL."dashboard/flv6/videoplayback.mp4';\"title=\"video\">&nbsp;<img src=\"".URL."public/images/video.png\" width='15' height='15' border='0' alt=''/>&nbsp;Video&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btnd1\"  onclick=\"document.location='".URL."pha/searchpha/0/10?o=id&q=';\"title=\"Pharmacie \">&nbsp;<img src=\"".URL."public/images/pha.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Pharmacie &nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btnd2\"  onclick=\"document.location='".URL."dspd/nouveau/';\"title=\"Importer une table deces sql \">&nbsp;<img src=\"".URL."public/images/IMPSQL.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Importer DB &nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btnd3\"  onclick=\"document.location='".URL."xls/Exporter/';\"title=\"Exporter une table deces xls\">&nbsp;<img src=\"".URL."public/images/IMPSQL.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Exporter DB&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btnd4\"  onclick=\"document.location='".URL."sql/Exporter/';\"title=\"Exporter une table deces sql\">&nbsp;<img src=\"".URL."public/images/dump.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;Exporter *.sql&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btnd5\"  onclick=\"document.location='".URL."ln/';\"title=\"Exporter une table deces sql\">&nbsp;<img src=\"".URL."public/images/ln.png\" width='15' height='15' border='0' alt=''/>&nbsp;Lois normales&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btnd6\"  onclick=\"document.location='".URL."dashboard/Email/';\"title=\"Email\">&nbsp;<img src=\"".URL."public/images/ln.png\" width='15' height='15' border='0' alt=''/>&nbsp;Email&nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btnd7\"  onclick=\"document.location='".URL."lab/searchlab/0/10?o=id&q=';\"title=\"Laboratoires pharmaceutiques\">&nbsp;<img src=\"".URL."public/images/lab_l.png\" width='15' height='15' border='0' alt=''/>&nbsp;Laboratoires pharma &nbsp;</button> " ;
echo "<button class=\"naissance\"  id=\"btnd8\"  onclick=\"document.location='".URL."naissance/map/';\"title=\"Map\">&nbsp;<img src=\"".URL."public/images/lab_l.png\" width='15' height='15' border='0' alt=''/>&nbsp;Map &nbsp;</button> " ;

//echo "<button class=\"naissance\"  id=\"btnd1\"  onclick=\"document.location='".URL."dashboard/imp/';\"title=\"import\">&nbsp;<img src=\"".URL."public/images/sante.jpg\" width='15' height='15' border='0' alt=''/>&nbsp;import&nbsp;</button> " ;
?>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/cfg.jpg"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>

	
<div class="scontentl2"><?php echo "";echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php html::rsc();?><?php //echo "";echo $this->msg; echo "";?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>	
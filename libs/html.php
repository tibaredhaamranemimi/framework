<?php


class HTML  {
	
	public $db_host=DB_HOST;
	public $db_name=DB_NAME;   
	public $db_user=DB_USER;
	public $db_pass=DB_PASS;
	
	function __construct() {
	   parent::__construct();
    
	}
	
	function exportsql($table_name) 
	{
	$structure= Session::get("structure");
	$this->mysqlconnect();
	$backup_file  = "D:/framework/sql/$table_name.sql";
	$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";
	$requete = @mysql_query($sql);
	if(! $requete ) {
	  echo "Backedup  data error\n";
	 }
	 else
	 {
	 echo "Backedup  data successfully\n";
	 }
	}
	
	
	
	
	
	
	
	// HTML::normaldist(30,340,'normal distribution : ','','avi','date','',date('Y'),'','='.Session::get('structure'));
	function norm ($x, $mean, $sd)
    {
        $y = (1 / $sd*sqrt(2 * pi())) * exp(-0.5 * pow(($x-$mean)/$sd, 2));
        return $y;
    }
	function serdeces($SERVICEHOSPIT) 
	{
	$structure= Session::get("structure");
	$this->mysqlconnect();
	$sql = " select * from deceshosp where SERVICEHOSPIT=$SERVICEHOSPIT and  STRUCTURED=$structure  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function commnaissance($COMMUNER) 
	{
	$structure= Session::get("structure");
	$this->mysqlconnect();
	$sql = " select * from naissance where COMMUNE3=$COMMUNER and  STRUCTURED=$structure  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function commdeces($COMMUNER) 
	{
	$structure= Session::get("structure");
	$this->mysqlconnect();
	$sql = " select * from deceshosp where COMMUNER=$COMMUNER and  STRUCTURED=$structure  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function cimnbr($STR,$CODECIM0) 
	{
	$this->mysqlconnect();
	$sql = " select * from deceshosp where STRUCTURED=$STR and CODECIM0=$CODECIM0   ";//CODECIM0
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function cimnbr1($STR,$CODECIM) 
	{
	$this->mysqlconnect();	 
	$sql = " select * from deceshosp where STRUCTURED=$STR and CODECIM=$CODECIM ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function normaldist($x,$y,$TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$STR) 
	{
	include "./chart/libchart/classes/libchart.php";
	$chart = new LineChart();
	$fichier='./chart/demo/generated/demo1.png';
	$dataSet = new XYDataSet();
	for ($i = -3; $i <= 3; $i+= 0.01) {
	$dataSet->addPoint(new Point("", $this->norm ($i,0,1)));
	}
	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->render($fichier);	
	echo '<img id ="image"  src="'.URL.$fichier.'" style="border: 2px solid green;"/>';
	}
	function merge($tbl_name,$Datedebut,$Datefin) 
	{
	$this->mysqlconnect();	 
	$sql=mysql_query("SELECT * FROM $tbl_name  where  DINS  BETWEEN '$Datedebut' AND '$Datefin'  order by DINS ");//limit 0,10
	//echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;
	while($value=mysql_fetch_array($sql))
	{
	//echo '<tr>';
	//for ($i=0;$i<=63;$i++) {echo '<td>';echo $value[$i];echo '</td>';}
	$sql1 = "INSERT INTO deceshosp (WILAYAD,COMMUNED,STRUCTURED,NOM,PRENOM,FILSDE,ETDE,SEX,DATENAISSANCE,Days,Weeks,Months,Years,WILAYA,WILAYAR,COMMUNE,COMMUNER,ADRESSE,CD,LD,AUTRES,OMLI,MIEC,EPFP,CIM1,CIM2,CIM3,CIM4,CIM5,NDLM,NDLMAAP,GM,MN,AGEGEST,POIDNSC,AGEMERE,DPNAT,EMDPNAT,DECEMAT,GRS,POSTOPP,DATEHOSPI,HEURESHOSPI,SERVICEHOSPIT,DUREEHOSPIT,MEDECINHOSPIT,CODECIM0,CODECIM,CRS,WRS,SRS,USER,DINS,HINS,NOMAR,PRENOMAR,FILSDEAR,ETDEAR,NOMPRENOMAR,PROAR,ADAR,Profession,aprouve) 
	VALUES ('".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."','".$value[6]."','".$value[7]."','".$value[8]."','".$value[9]."','".$value[10]."','".$value[11]."','".$value[12]."','".$value[13]."','".$value[14]."','".$value[15]."','".$value[16]."','".$value[17]."','".$value[18]."','".$value[19]."','".$value[20]."','".$value[21]."','".$value[22]."','".$value[23]."','".$value[24]."','".$value[25]."','".$value[26]."','".$value[27]."','".$value[28]."','".$value[29]."','".$value[30]."','".$value[31]."','".$value[32]."','".$value[33]."','".$value[34]."','".$value[35]."','".$value[36]."','".$value[37]."','".$value[38]."','".$value[39]."','".$value[40]."','".$value[41]."','".$value[42]."','".$value[43]."','".$value[44]."','".$value[45]."','".$value[46]."','".$value[47]."','".$value[48]."','".$value[49]."','".$value[50]."','".$value[51]."','".$value[52]."','".$value[53]."','".$value[54]."','".$value[55]."','".$value[56]."','".$value[57]."','".$value[58]."','".$value[59]."','".$value[60]."','".$value[61]."','".$value[62]."','".$value[63]."');";	
	$query1 = mysql_query($sql1);
	//echo '</tr>';
	}	
    //echo "</table>";
	}
	
    
	
	function medicament($class,$id,$name,$selected,$value) 
	{
	$this->mysqlconnect();	 
	echo "<select size=1 class=\"".$class."\" id=\"".$id."\"  name=\"".$name."\">"."\n";
	echo"<option value=\"1883\" selected=\"".$class."\">".$value."</option>"."\n";
	$result = mysql_query("SELECT * FROM pharmacie order by dci " );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['dci'].$data['pre'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	
	
	
	function rsc()
	{
	echo '<a href="https://www.facebook.com/"><img src="'.URL.'public/images/fb.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="https://twitter.com/"><img src="'.URL.'public/images/tw.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="https://www.youtube.com/"><img src="'.URL.'public/images/yt.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="http://www.sante.gov.dz/"><img src="'.URL.'public/images/lb.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="http://www.dsp-djelfa.dz/index.php/ar/"><img src="'.URL.'public/images/sante.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="http://www.ans.dz/index.php/fr/"><img src="'.URL.'public/images/gs.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="https://www.pharmnet-dz.com/"><img src="'.URL.'public/images/logolab/logov2.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	
	}
	//*******************************************************************************************************//
	// $var  ="amranemimi"; 
	// $var1 = HTML::encrypt($var);
	// echo  $var1;
	// echo '</br>';
	// echo  HTML::decrypt($var1);
	
	function encrypt($data) {
    $key = "tiba";  // Clé de 8 caractères max
    $data = serialize($data);
    $td = mcrypt_module_open(MCRYPT_DES,"",MCRYPT_MODE_ECB,"");
    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    mcrypt_generic_init($td,$key,$iv);
    $data = base64_encode(mcrypt_generic($td, '!'.$data));
    mcrypt_generic_deinit($td);
    return $data;
	}
	 
	function decrypt($data) {
		$key = "tiba";
		$td = mcrypt_module_open(MCRYPT_DES,"",MCRYPT_MODE_ECB,"");
		$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		mcrypt_generic_init($td,$key,$iv);
		$data = mdecrypt_generic($td, base64_decode($data));
		mcrypt_generic_deinit($td);
		if (substr($data,0,1) != '!')
			return false;
		$data = substr($data,1,strlen($data)-1);
		return unserialize($data);
	}
	//*******************************************************************************************************//
	
	function mysqliconnect()
	{
	$link = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
	if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
    }
	else{
	echo "</br>";
	echo "Success: A proper connection to MySQL was made! The ".$this->db_name." database is great." . PHP_EOL."</br>";
    echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL."</br>";
    //mysqli_close($link);
	mysqli_query($link,"SET NAMES 'UTF8' ");
	return $link;
	}
	}
	function mysqlconnect()
	{
	$cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($this->db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	return $db;
	}
	
	function dump_MySQL($serveur, $login, $password, $base, $mode,$d1,$d2)
    {
    $connexion = mysql_connect($serveur, $login, $password);
    mysql_select_db($base, $connexion);
    
    $entete  = "-- ----------------------\n";
    $entete .= "-- dump de la base ".$base." au ".date("d-M-Y")."\n";
    $entete .= "-- ----------------------\n\n\n";
    $creations = "";
    $insertions = "\n\n";
    
    $listeTables = mysql_query("show tables", $connexion);
    while($table = mysql_fetch_array($listeTables))
    {
        // structure ou la totalite la BDD
        if($mode == 1 || $mode == 2)
        {
            $creations .= "-- -----------------------------\n";
            $creations .= "-- Structure de la table ".$table[0]."\n";
            $creations .= "-- -----------------------------\n";
            $listeCreationsTables = mysql_query("show create table ".$table[0],$connexion); 

            while($creationTable = mysql_fetch_array($listeCreationsTables))
            {
              $creations .= $creationTable[1].";\n\n";
            }
        }
        // donn ou la totalit        
		// if($mode > 1)
        // {
		    // mysql_query("SET NAMES 'UTF8' ");
            // $donnees = mysql_query("SELECT * FROM ".$table[0]);
            // $insertions .= "-- -----------------------------\n";
            // $insertions .= "-- Contenu de la table ".$table[0]."\n";
            // $insertions .= "-- -----------------------------\n";
            // while($nuplet = mysql_fetch_array($donnees))
            // {
			// mysql_query("SET NAMES 'UTF8' ");
                // $insertions .= "INSERT INTO ".$table[0]." VALUES(";
                // for($i=0; $i < mysql_num_fields($donnees); $i++)
                // {
                  // if($i != 0)
                     // $insertions .=  ", ";
                  // if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
                     // $insertions .=  "'";
                  // $insertions .= addslashes($nuplet[$i]);
                  // if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
                    // $insertions .=  "'";
                // }
                // $insertions .=  ");\n";
            // }
            // $insertions .= "\n";
        // }
    }
    mysql_close($connexion);
	$time=date('d-m-Y'); 
	$fichierDump = fopen("D:/framework/sql/Deces_".$time.".sql", "wb");
    fwrite($fichierDump, $entete);
    fwrite($fichierDump, $creations);
    fwrite($fichierDump, $insertions);
    fclose($fichierDump);
    echo "Sauvegarde terminée au niveau D:/framework/sql/Deces_".$time.".sql";
    }
	
	function datePlus($dateDo,$nbrJours)
	{
	$timeStamp = strtotime($dateDo); 
	$timeStamp += 24 * 60 * 60 * $nbrJours;
	$newDate = date("Y-m-d", $timeStamp);
	return  $newDate;
	}
	
	function dateUS2FR($date)//2013-01-01
    {
	$J      = substr($date,8,2);
    $M      = substr($date,5,2);
    $A      = substr($date,0,4);
	$dateUS2FR =  $J."-".$M."-".$A ;
    return $dateUS2FR;//01-01-2013
    }
	
	function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	
	function heuresPlus($heuresDo,$nbrheures)
	{
	$timeStamp = strtotime($heuresDo); 
	$timeStamp += 60 * 60 * $nbrheures;
	$newDate = date("H:m", $timeStamp);
	return  substr($newDate,0,2);
	}
	
	function heuresPlus0($IDF)
	{
	$this->mysqlconnect();
	$sql = " select * from trav where IDF=$IDF order by DHE2 desc limit 0,1 ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$result1 = mysql_fetch_array( $requete ) ;
	$valhb=$result1["DHE2"];
	return $valhb;
	}
	
	function datePlus0($IDF)
	{
	$this->mysqlconnect();
	$sql = " select * from obser where IDF=$IDF order by DHE1 desc limit 0,1 ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$result1 = mysql_fetch_array( $requete ) ;
	$valhb=$result1["DHE1"];
	return $valhb;
	}
	
	function backforward($backforward,$value)
	{
	echo "<button id=\"bnav\"   onclick=\"javascript:".$backforward."();\">";
	echo '<img src="'.URL.'public/images/'.$value.'"   width="16" height="16" border="0" alt=""   />';
	echo "</button>";
	}
	function NAV()
	{
	echo '<div  id="sn" >';
	$this->backforward('history.back','b_prevpage.png');echo '&nbsp;';
	$this->backforward('location.reload','b_sbrowse.png');echo '&nbsp;';  
	$this->backforward('history.forward','b_nextpage.png');echo '&nbsp;';
	$this->backforward('toggleFullScreen','fs.png');echo '&nbsp;';//la fonctin se trouve au niveau du fichier fonction js
	echo '</div>';
	}
	
	function valsig($tbl,$col,$val,$strc,$strv) 
	{
	$this->mysqlconnect();
	mysql_query("SET NAMES 'UTF8' ");
	$sql = " select * from $tbl where $col=$val and  $strc=$strv  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function valsig1($tbl,$col0,$val0,$col1,$val1,$strc,$strv) 
	{
	$this->mysqlconnect();
	$sql = " select * from $tbl where $col0=$val0 and $col1=$val1 and  $strc=$strv ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function equincommune($WILAYAR) 
	{
	$structure= Session::get("structure");
	$this->mysqlconnect();
	mysql_query("SET NAMES 'UTF8' ");// le nom et prenom doit etre lier 
	$sql = " select * from deceshosp where WILAYAR=$WILAYAR and  STRUCTURED=$structure  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function equincommune1($WILAYAR,$COMMUNER) 
	{
	$structure= Session::get("structure");
	$this->mysqlconnect();
	$sql = " select * from deceshosp where WILAYAR=$WILAYAR  and  COMMUNER=$COMMUNER and  STRUCTURED=$structure  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}

	function color($x) 
	{	
		if($x>=0 and $x<1){$valeur= "#b9b9b9";}
		if($x>=1 and $x<=10){$valeur= "#ffa6a9";}
		if($x>10 and $x<=100){$valeur= "#cc6674";}
		if($x>100 and $x<=1000){$valeur= "#992038";}
		if($x>1000 and $x<=1000000){$valeur= "#60000e";}
		return $valeur;
	}
	
	function form($data) 
	{	 
	echo "<form   onsubmit=\"return validateForm11(this);\" name=\"form1\" action=\"".URL.$data['c']."/".$data['m']."/0/10\" method=\"GET\">" ;
	echo "<select  id=\"csearch\"    name=\"o\" style=\"width: 100px;\">" ;				
	foreach ($data['combo'] as $cle => $value){echo"<OPTION VALUE=\"".$value."\">".$cle."</OPTION>";}	
	echo "</select>&nbsp;" ;
	echo "&nbsp;<input id=\"search\"  type=\"search\"  placeholder=\"Search...\"    name=\"q\"  value=\"\"  autofocus /> " ;//<!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
	echo "&nbsp;<img src=\"".URL."public/images/search.PNG\" width='25' height='30' border='0' alt=''/>" ;
	echo "&nbsp;<input id=\"submitsrh\" type=\"submit\" name=\"\" value=\"".$data['submitvalue']."\"/> " ;
	echo "</form>" ;	
	}
	function tabsbnm($data) 
	{
	echo '<label  id="l0bn1">Date</label>';  
	echo '<input  id="d1"  type="txt"  name="mois"  value="'.$data['mois'].'" autofocus/>';
	echo '<input  id="d2"  type="txt"  name="annee" value="'.$data['annee'].'"/>';
	
	echo '<label  id="l0bn2">Wilaya</label>';HTML::WILAYA('WILAYAD','b0n2c','WILAYAD','wil',$data['WILAYA1'],$data['WILAYA2']) ;  
	echo '<label  id="l0bn3">Commune</label>';HTML::COMMUNE('COMMUNED','b0n3c','COMMUNED',$data['COMMUNE1'],$data['COMMUNE2']);
	
	echo '<label  id="l0bn4">1-Naisances Par Sexe Enregistrées Dans La Commune</label>';
	echo '<label  id="l0bn5">Masculin</label>';echo '<input  id="b0n5c" type="txt"   name="nm1" value="'.$data['nm1'].'" placeholder="00"/>';echo '<input  id="b0n5" type="txt"  name="nf1" value="'.$data['nf1'].'" placeholder="00"/>';
	echo '<label  id="l0bn6">Feminin</label>'; echo '<input  id="b0n6c" type="txt"   name="nm2" value="'.$data['nm2'].'" placeholder="00"/>';echo '<input  id="b0n6" type="txt"  name="nf2" value="'.$data['nf2'].'" placeholder="00"/>';
	echo '<label  id="l0bn7">Survenues Au cours Du Mois</label>';
	echo '<label  id="l0bn8">Enregistrées Par Jugement</label>';
	
	echo '<label  id="l0bn9">2-Mort Nées Enregistrés Dans La Commune Selon Le Sexe</label>';
	echo '<label  id="l0bn10">Total Des Mort Nées Enregistrés</label>';echo '<input  id="b0n10c" type="txt"    name="mnm1" value="'.$data['mnm1'].'" placeholder="00"/>';echo '<input  id="b0n10" type="txt"  name="mnf1" value="'.$data['mnf1'].'" placeholder="00"/>';
	
	echo '<label  id="l0bn11">3-Mariages Enregistrées Dans La Commune</label>';
	echo '<label  id="l0bn12">Mariages Enregistrés Au Cours Du Moi</label>';              echo '<input  id="b0n12" type="txt"  name="m1" value="'.$data['m1'].'" placeholder="00"/>';
	echo '<label  id="l0bn13">Mariages Enregistrés Par Jugement Au Cours Du Mois</label>';echo '<input  id="b0n13" type="txt"  name="m2" value="'.$data['m2'].'" placeholder="00"/>';
	
	echo '<label  id="l0bn14">4-Deces Enregistrés Par Jugement Dans La Commune</label>';
	echo '<label  id="l0bn15">Masculin</label>';
	echo '<label  id="l0bn16">Feminin</label>';
	echo '<label  id="l0bn17">Survenues Au cours Du Mois</label>';
	echo '<input  id="b0n15c" type="txt"    name="djm1" value="'.$data['djm1'].'" placeholder="00"/>';echo '<input  id="b0n15" type="txt"  name="djf1" value="'.$data['djf1'].'" placeholder="00"/>';
	echo '<label  id="lbn0">Décès</label>';      echo '<label  id="bn0c">Masculin</label>';                                                        echo '<label  id="bn0">Feminin</label>'; 
	echo '<label  id="lbn1">moins 1 ans</label>';echo '<input  id="bn1c" type="txt"   name="dm1"  value="'.$data['dm1'].'"  placeholder="00"/>';echo '<input  id="bn1"  type="txt"  name="df1"  value="'.$data['df1'].'"  placeholder="00"/>';
	echo '<label  id="lbn2">01-04 ans</label>';  echo '<input  id="bn2c" type="txt"   name="dm2"  value="'.$data['dm2'].'"  placeholder="00"/>';echo '<input  id="bn2"  type="txt"  name="df2"  value="'.$data['df2'].'"  placeholder="00"/>';
	echo '<label  id="lbn3">05-09 ans</label>';  echo '<input  id="bn3c" type="txt"   name="dm3"  value="'.$data['dm3'].'"  placeholder="00"/>';echo '<input  id="bn3"  type="txt"  name="df3"  value="'.$data['df3'].'"  placeholder="00"/>';
	echo '<label  id="lbn4">10-14 ans</label>';  echo '<input  id="bn4c" type="txt"   name="dm4"  value="'.$data['dm4'].'"  placeholder="00"/>';echo '<input  id="bn4"  type="txt"  name="df4"  value="'.$data['df4'].'"  placeholder="00"/>';
	echo '<label  id="lbn5">15-19 ans</label>';  echo '<input  id="bn5c" type="txt"   name="dm5"  value="'.$data['dm5'].'"  placeholder="00"/>';echo '<input  id="bn5"  type="txt"  name="df5"  value="'.$data['df5'].'"  placeholder="00"/>';
	echo '<label  id="lbn6">20-24 ans</label>';  echo '<input  id="bn6c" type="txt"   name="dm6"  value="'.$data['dm6'].'"  placeholder="00"/>';echo '<input  id="bn6"  type="txt"  name="df6"  value="'.$data['df6'].'"  placeholder="00"/>';
	echo '<label  id="lbn7">25-29 ans</label>';  echo '<input  id="bn7c" type="txt"   name="dm7"  value="'.$data['dm7'].'"  placeholder="00"/>';echo '<input  id="bn7"  type="txt"  name="df7"  value="'.$data['df7'].'"  placeholder="00"/>';
	echo '<label  id="lbn8">30-34 ans</label>';  echo '<input  id="bn8c" type="txt"   name="dm8"  value="'.$data['dm8'].'"  placeholder="00"/>';echo '<input  id="bn8"  type="txt"  name="df8"  value="'.$data['df8'].'"  placeholder="00"/>';
	echo '<label  id="lbn9">35-39 ans</label>';  echo '<input  id="bn9c" type="txt"   name="dm9"  value="'.$data['dm9'].'"  placeholder="00"/>';echo '<input  id="bn9"  type="txt"  name="df9"  value="'.$data['df9'].'"  placeholder="00"/>';
	echo '<label  id="lbn10">40-44 ans</label>'; echo '<input  id="bn10c" type="txt"  name="dm10" value="'.$data['dm10'].'" placeholder="00"/>';echo '<input  id="bn10" type="txt"  name="df10" value="'.$data['df10'].'" placeholder="00"/>';
	echo '<label  id="lbn11">45-49 ans</label>'; echo '<input  id="bn11c" type="txt"  name="dm11" value="'.$data['dm11'].'" placeholder="00"/>';echo '<input  id="bn11" type="txt"  name="df11" value="'.$data['df11'].'" placeholder="00"/>';
	echo '<label  id="lbn12">50-54 ans</label>'; echo '<input  id="bn12c" type="txt"  name="dm12" value="'.$data['dm12'].'" placeholder="00"/>';echo '<input  id="bn12" type="txt"  name="df12" value="'.$data['df12'].'" placeholder="00"/>';
	echo '<label  id="lbn13">55-59 ans</label>'; echo '<input  id="bn13c" type="txt"  name="dm13" value="'.$data['dm13'].'" placeholder="00"/>';echo '<input  id="bn13" type="txt"  name="df13" value="'.$data['df13'].'" placeholder="00"/>';
	echo '<label  id="lbn14">60-64 ans</label>'; echo '<input  id="bn14c" type="txt"  name="dm14" value="'.$data['dm14'].'" placeholder="00"/>';echo '<input  id="bn14" type="txt"  name="df14" value="'.$data['df14'].'" placeholder="00"/>';
	echo '<label  id="lbn15">65-69 ans</label>'; echo '<input  id="bn15c" type="txt"  name="dm15" value="'.$data['dm15'].'" placeholder="00"/>';echo '<input  id="bn15" type="txt"  name="df15" value="'.$data['df15'].'" placeholder="00"/>';
	echo '<label  id="lbn16">70-74 ans</label>'; echo '<input  id="bn16c" type="txt"  name="dm16" value="'.$data['dm16'].'" placeholder="00"/>';echo '<input  id="bn16" type="txt"  name="df16" value="'.$data['df16'].'" placeholder="00"/>';
	echo '<label  id="lbn17">75-79 ans</label>'; echo '<input  id="bn17c" type="txt"  name="dm17" value="'.$data['dm17'].'" placeholder="00"/>';echo '<input  id="bn17" type="txt"  name="df17" value="'.$data['df17'].'" placeholder="00"/>';
	echo '<label  id="lbn18">80-84 ans</label>'; echo '<input  id="bn18c" type="txt"  name="dm18" value="'.$data['dm18'].'" placeholder="00"/>';echo '<input  id="bn18" type="txt"  name="df18" value="'.$data['df18'].'" placeholder="00"/>';
	echo '<label  id="lbn19">85 et plus</label>';echo '<input  id="bn19c" type="txt"  name="dm19" value="'.$data['dm19'].'" placeholder="00"/>';echo '<input  id="bn19" type="txt"  name="df19" value="'.$data['df19'].'" placeholder="00"/>';
	
	echo '<input type="hidden" name="WILAYA"     value="'.Session::get('wilaya').'"/>';
	echo '<input type="hidden" name="STRUCTURE"  value="'.Session::get('structure').'"/>';
	echo '<input type="hidden" name="STRUCTURED" value="'.Session::get('structure').'"/>';
	echo '<input type="hidden" name="login"      value="'.Session::get('login').'"/>';
	echo '<input id="submitdemo" type="submit" />	'; 
	}
	
	function combov($id,$name,$valeur)  
	{
	
	echo "<select  id=\"".$id."\"   name=\"".$name."\" >";
	foreach ($valeur as $cle => $value) 
	{
	echo"<OPTION VALUE=\"".$value."\">".$cle."</OPTION>";
	}
	echo "</select> ";
	} 
	
	function SERNSC($class,$id,$name,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1  class=\"".$class."\"  id=\"".$id."\"  name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name  " );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['service'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	
	
	function NLIT($class,$id,$name,$value,$selected) 
	{
	echo "<select size=1 class=\"".$class."\" id=\"".$id."\"  name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
    echo '</select>'."\n"; 
	}
	
	function MODEES($class,$id,$name,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1 class=\"".$class."\"    id=\"".$id."\" name=\"".$name."\"   >"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name " );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['mods'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	
	
	
	function tabsns($data) 
	{
	echo '<div    id="content_1" class="contenttabs1">  ';
	echo '<label  id="lG">l\'état civil </label>';
	
	echo '<label  id="lNOM2">Nom mère :</label>';                  echo '<input id="NOM2"    type="txt"  name="NOM2"    value="'.$data['NOM2'].'" placeholder="xxxxxxx" autofocus onkeyup="javascript:this.value=this.value.toUpperCase();" />';
	echo '<label  id="lPRENOM2">Prénom mère:</label> ';            echo '<input id="PRENOM2" type="txt"  name="PRENOM2" value="'.$data['PRENOM2'].'" placeholder="xxxxxxx" onkeyup="javascript:this.value=this.value.toLowerCase();"/>';
	echo '<label  id="lDATENS2">Date naissance mère : </label>';   echo '<input id="DATENS2" type="txt"  name="DATENS2" value="'.$data['DATENS2'].'" placeholder="00-00-0000" onblur="genererCodeP()" />';
	echo '<label  id="lWILAYA2">Wilaya Nais :</label>';            HTML::WILAYA('WILAYA2','WILAYA2','WILAYA2','wil',$data['WILAYA21'],$data['WILAYA22']) ;
	echo '<label  id="lCOMMUNE2">Commune Nais :</label>';          HTML::COMMUNE('COMMUNE2','COMMUNE2','COMMUNE2',$data['COMMUNE21'],$data['COMMUNE22']);
	echo '<label  id="lProfession2">Profession :</label>';         HTML::Profession(44,44,'PROFESSION2','Profession2','Profession',Session::get('structure'),$data['PROFESSION21'],$data['PROFESSION22']) ;
	echo '<label  id="lGROUPAGEM">Groupage :</label>';             $this->combov('GROUPAGE','GROUPAGE',$data['GROUPAGE']);$this->combov('RH','RH',$data['RH']);
	echo '<label  id="lNSSMERE">NSS :</label>';                    echo '<input id="NSSMERE"    type="txt"  name="NSSMERE"    value="'.$data['NSSMERE'].'" />';
	echo '<label  id="lTELMERE">TEL :</label>';                    echo '<input id="TELMERE"    type="txt"  name="TELMERE"    value="'.$data['TELMERE'].'" />';
	
	echo '<label  id="lNOM3">Nom père :</label>';                 echo '<input id="NOM3"    type="txt"  name="NOM3"    value="'.$data['NOM3'].'" placeholder="xxxxxxx"  onkeyup="javascript:this.value=this.value.toUpperCase();" />';
	echo '<label  id="lPRENOM3">Prénom père:</label> ';           echo '<input id="PRENOM3" type="txt"  name="PRENOM3" value="'.$data['PRENOM3'].'" placeholder="xxxxxxx" onkeyup="javascript:this.value=this.value.toLowerCase();"/>';
	echo '<label  id="lDATENS3">Date naissance père : </label>';  echo '<input id="DATENS3" type="txt"  name="DATENS3" value="'.$data['DATENS3'].'" placeholder="00-00-0000" onblur="genererCodeP()" />';
	echo '<label  id="lWILAYA3">Wilaya Nais :</label>';           HTML::WILAYA('WILAYA3','WILAYA3','WILAYA3','wil',$data['WILAYA31'],$data['WILAYA32']) ;
	echo '<label  id="lCOMMUNE3">Commune Nais :</label>';         HTML::COMMUNE('COMMUNE3','COMMUNE3','COMMUNE3',$data['COMMUNE31'],$data['COMMUNE32']);
	echo '<label  id="lPROFESSION3">Profession :</label>';        HTML::Profession(44,44,'PROFESSION3','PROFESSION3','Profession',Session::get('structure'),$data['PROFESSION31'],$data['PROFESSION32']) ;
	echo '<label  id="lGROUPAGEP">Groupage :</label>';            $this->combov('GROUPAGEP','GROUPAGEP',$data['GROUPAGEP']);$this->combov('RHP','RHP',$data['RHP']);
	echo '<label  id="lNSSPERE">NSS :</label>';                   echo '<input id="NSSPERE"    type="txt"  name="NSSPERE"    value="'.$data['NSSPERE'].'" />';
	echo '<label  id="lTELPERE">TEL :</label>';                   echo '<input id="TELPERE"    type="txt"  name="TELPERE"    value="'.$data['TELPERE'].'" />';
	echo '<label  id="lWILAYA4">Wilaya RES :</label>';            HTML::WILAYA('WILAYA4','WILAYA4','WILAYA4','wil',$data['WILAYA41'],$data['WILAYA42']) ;
	echo '<label  id="lCOMMUNE4">Commune RES :</label>';          HTML::COMMUNE('COMMUNE4','COMMUNE4','COMMUNE4',$data['COMMUNE41'],$data['COMMUNE42']);
	echo '<label  id="lADRESSE4">Adresse de res :</label>';       echo '<input id="ADRESSE4" type="txt" name="ADRESSE4" value="'.$data['ADRESSE4'].'" placeholder="xxxxxxx"  onkeyup="javascript:this.value=this.value.toUpperCase();" />';
	
	echo '<label  id="lDECARA">الحالة المدنية</label>';
	echo '<label id="lNOM6">: لقب الام  </label>                   <input id="NOMAR6"    onkeydown="myFunction()"   type="txt" name="NOMARM"       value="'.$data['NOMARM'].'" placeholder="xxxxxxx"/>';
	echo '<label id="lPRENOM6">: إسم الام </label>                 <input id="PRENOMAR6" onkeydown="myFunction()"   type="txt" name="PRENOMARM"    value="'.$data['PRENOMARM'].'" placeholder="xxxxxxx"/>';
	echo '<label id="lNOM7">: لقب الاب </label>                    <input id="NOMAR7"    onkeydown="myFunction()"   type="txt" name="NOMARP"       value="'.$data['NOMARP'].'" placeholder="xxxxxxx"/>';
	echo '<label id="lPRENOM7">: إسم الاب</label>                  <input id="PRENOMAR7" onkeydown="myFunction()"   type="txt" name="PRENOMARP"    value="'.$data['PRENOMARP'].'" placeholder="xxxxxxx"/>';
	echo '<label id="lADAR8">: عنوان الإقامة</label>               <input id="ADAR8"     onkeydown="myFunction()"   type="txt" name="ADARPM"        value="'.$data['ADARPM'].'" placeholder="xxxxxxx"/>';
	
	echo '<label  id="lNUMLF">: رقم الدفتر </label>';             echo '<input id="NUMLF"  type="txt"  name="NUMLF"  value="'.$data['NUMLF'].'"/>'; echo '<input id="DNUMLF" type="txt"  name="DNUMLF" value="'.$data['DNUMLF'].'"  />';  
	                                                              HTML::WILAYA('WILAYALF','WILAYALF','WILAYALF','wil',$data['WILAYALF1'],$data['WILAYALF2']) ; HTML::COMMUNE('COMMUNELF','COMMUNELF','COMMUNELF',$data['COMMUNELF1'],$data['COMMUNELF2']);															 
	                                                             															 
	echo '</div>';
	
	echo '<div    id="content_2" class="contenttabs2">';
	echo '<label  id="lATCD">ATCD Obstétricaux :</label>';
	echo '<label  id="lGESTE">Geste :</label>';                   $this->combov('GESTE','GESTE',$data['GESTE']);
	echo '<label  id="lPARITE">Parité :</label>';                 $this->combov('PARITE','PARITE',$data['PARITE']);
	echo '<label  id="lABRT">Avortement :</label>';               $this->combov('ABRT','ABRT',$data['ABRT']);
	echo '<label  id="lCESA">Césarienne :</label>';               $this->combov('CESA','CESA',$data['CESA']);
	echo '<label  id="lEVBP">EVBP :</label>';                     $this->combov('EVBP','EVBP',$data['EVBP']);

	echo '<label  id="lATCDM">ATCD Médicaux :</label>';
	echo '<label  id="lDT12">Diabète</label>';                    echo '<input id="DT12" type="checkbox"  name="DT12" value="" '.$data['DT12'].' />';                    
	echo '<label  id="lHTA">HTA :</label>';                       echo '<input id="HTA"  type="checkbox"  name="HTA"  value="" '.$data['HTA'].' />';                    
	echo '<label  id="lCRD">Cardiopathie :</label>';              echo '<input id="CRD"  type="checkbox"  name="CRD"  value="" '.$data['CRD'].' />';                
	echo '<label  id="lEPL">Epilepsie:</label>';                  echo '<input id="EPL"  type="checkbox"  name="EPL"  value="" '.$data['EPL'].' />';                
	echo '<label  id="lAUT">Autres :</label>';                    echo '<input id="AUT"  type="checkbox"  name="AUT"  value="" '.$data['AUT'].' />';                      
	
	echo '</div>';
	
	echo '<div id="content_3" class="contenttabs3">';
	echo '</div>';
	
	echo '<div id="content_4" class="contenttabs4"> ';
	
	echo '<input type="hidden" name="WILAYA1"    value="'.$data['WILAYA1'].'"/>';
	echo '<input type="hidden" name="COMMUNE1"   value="'.$data['COMMUNE1'].'"/>';
	echo '<input type="hidden" name="STRUCTURED" value="'.$data['STRUCTURED'].'"/>';
	echo '<input type="hidden" name="DINS1"      value="'.$data['DINS1'].'"/>';
	echo '<input type="hidden" name="HINS1"      value="'.$data['HINS1'].'"/>';
	echo '<input type="hidden" name="LOGIN"      value="'.$data['LOGIN'].'"/>';

	echo '<input id="submitnew" type="submit" />	'; 
	echo '</div>';
	}
	
	function tabsdecesmat($data) 
	{
	    echo '<div id="content_1" class="contenttabs1">';  
		
		echo '<h4>Caractéristiques de la femme</h4>'; 
		
		echo '<label id="lM1">Q1: Numéro d\'identification </label>   <input id="M1"    type="txt"  name="M1"     value="" placeholder="xxxxxxx"/>'; 
		echo '<label id="lM2">Q2: Date de naissance</label>          <input id="M2"     type="txt" name="M2"    value="" placeholder="xxxxxxx" />'; 
		echo '<label id="lM3">Q3: Age</label>                        <input id="M3"     type="txt" name="M3"    value="" placeholder="xxxxxxx" />'; 
		echo '<label id="lM4">Q4: Date du décès</label>              <input id="M4"     type="txt" name="M4"    value="" placeholder="xxxxxxx" />'; 
		echo '<label id="lM5">Q5: Heure du Décè</label>              <input id="M5"     type="txt" name="M5"    value="" placeholder="xxxxxxx" />'; 
		echo '<label id="lM6">Q6: Wilaya de résidence</label>        <input id="M6"     type="txt" name="M6"    value="" placeholder="xxxxxxx" />'; 
		echo '<label id="lM7">Q7: Profession de la patiente</label>  <input id="M7"     type="txt" name="M7"    value="" placeholder="xxxxxxx" />'; 
		echo '<label id="lM8">Q8: instruction de la patiente</label>';   
		
		echo '<select id="M8"  name="M8"  > ';  
					echo '<option value="1">Analphabète</option>'; 
				   echo ' <option value="2">Ecole coranique</option>'; 
				   echo ' <option value="3">Primaire</option>'; 
					echo '<option value="4">Moyen</option>'; 
					echo '<option value="5">Secondaire </option>'; 
					echo '<option value="6">Universitaire</option>'; 
					echo '<option value="7">Non précis</option>'; 
				echo '</select>'; 
		echo '<label id="lM9">Q9: Profession du conjoint</label>  <input id="M9"     type="txt" name="M9"    value="" placeholder="xxxxxxx"   />'; 
		echo '<label id="lM10">Q10:instruction du conjoint</label> ';  
		echo '<select id="M10"  name="M10"  >';   
					echo '<option value="1">Analphabète</option>'; 
				   echo ' <option value="2">Ecole coranique</option>'; 
				   echo ' <option value="3">Primaire</option>'; 
					echo '<option value="4">Moyen</option>'; 
					echo '<option value="5">Secondaire </option>'; 
					echo '<option value="6">Universitaire</option>'; 
					echo '<option value="7">Non précis</option>'; 
				echo '</select>'; 
		
		echo '<label id="lM11">Q11: Couverture sociale</label>';   
		echo '<select id="M11"  name="M11"  > ';  
					echo '<option value="1">Oui</option>'; 
				   echo ' <option value="2">Non</option>'; 
				    echo '<option value="3">Non précisé</option>'; 
				echo '</select>'; 
		
		echo '<label id="lM12">Q12:Lieu du décès</label> ';  
		echo '<select id="M12"  name="M12"  > ';  
					echo '<option value="1">Domicile</option>'; 
				   echo ' <option value="2">Maternité publique extrahospitaiière</option>'; 
				   echo ' <option value="3">EHS mère/enfant</option>'; 
					echo '<option value="4">EPH</option>'; 
					echo '<option value="5">CHU</option>'; 
					echo '<option value="6">EHU</option>'; 
					echo '<option value="7">Structure de santé privée</option>'; 
				   echo ' <option value="8">Autre</option>'; 
				   echo ' <option value="9">Si autre, Préciser</option>'; 
				   echo ' </select>'; 
		echo '<label id="lM13">Q13:Moment du décès</label> ';  
		echo '<select id="M13"  name="M13"  >';   
					echo '<option value="1">Pendant la grossesse</option>'; 
				   echo ' <option value="2">Pendant l\'avortement </option>'; 
				   echo ' <option value="3">Pendant le travail ou l\'accouchement </option>'; 
					echo '<option value="4">Dans les 24 heures suivant l\'issue de la grossesse</option>'; 
					echo '<option value="5">Dans les 42 jours suivant un avortement </option>'; 
					echo '<option value="6">Dans les 42 jours suivant un accouchement </option>'; 
					echo '<option value="7">Dans les 42 jours suivant l\'issue d\'une grossesse molaire</option>'; 
				   echo ' <option value="7">Dans les 42 jours suivant l\'issue d\'une grossesse extra-utérine</option>'; 
				   echo ' </select>'; 
		
		echo '<label id="lM14">Q14: NBR de jours  l\'acc ou de l\'avo, et le décès </label>  <input id="M14"     type="txt" name="M14"    value="" placeholder="xxxxxxx"   />'; 
		echo '<label id="lM15">Q15: Nom de l\'assesseur </label>                            <input id="M15"     type="txt" name="M15"    value="" placeholder="xxxxxxx"   />'; 
		echo '<label id="lM16">Q16: Qualité de l\'assesseur </label>                        <input id="M16"     type="txt" name="M16"    value="" placeholder="xxxxxxx"   />'; 
		echo '<label id="lM17">Q17: Lieu de travail </label>                               <input id="M17"     type="txt" name="M17"    value="" placeholder="xxxxxxx"   />'; 
		echo '<label id="lM18">Numéro de téléphone</label>                                 <input id="M18"     type="txt" name="M18"    value="" placeholder="xxxxxxx"   />'; 
		echo '<label id="lM19">Adresse email </label>                                      <input id="M19"     type="txt" name="M19"    value="" placeholder="xxxxxxx"   />'; 
		echo '<label id="lM20">Q18:Date de l\'enquête</label>                               <input id="M20"     type="txt" name="M20"    value="" placeholder="xxxxxxx"   />'; 
        echo ' </div>'; 

         echo '<div id="content_2" class="contenttabs2"> '; 
		 echo '<h4>Antécédents personnels de la femme</h4>'; 
		 echo '</div>'; 
		
		 echo '<div id="content_3" class="contenttabs3">';   
		 echo '<h4>Histoire de la grossesse ayant entraîné le décès</h4> ';    		  
		 echo '</div>'; 

		 echo '<div id="content_4" class="contenttabs4">';   
		 echo '<h4>Issue de la grossesse</h4> ';    		  
		 echo '</div>'; 
        
		 echo '<div id="content_5" class="contenttabs5"> ';  
		 echo '<h4>Enchaînement des événements ayant mené au décès</h4> ';    		  
		 echo '</div>'; 
        
		 echo '<div id="content_6" class="contenttabs6">';   
		 echo '<h4>Caractéristiques de l\'établissement où a eu lieu i\'issue de la grossesse</h4> ';    		  
			 echo '<input  id="submitnew" type="submit" />'; 
		 echo '<input type="hidden" name="WILAYA"      value="'.Session::get('wilaya').'"/>'; 
		 echo '<input type="hidden" name="STRUCTURE"   value="'.Session::get('structure').' "/>'; 
		 echo '<input type="hidden" name="STRUCTURED"  value="'.Session::get('structure').' "/>'; 
		 echo '<input type="hidden" name="login"       value="'.Session::get('login').'"/>'; 	
		 echo '</div>'; 
	}
	
	
	function tabs($data) 
	{
	echo '<div id="content_1" class="contenttabs1">  ';
	echo '<label class="deces" id="lWILAYAD">Wilaya Décès :</label>';         HTML::WILAYA('WILAYAD','WILAYAD','WILAYAD','wil',$data['WILAYAD1'],$data['WILAYAD2']) ;
	echo '<label class="deces" id="lCOMMUNED">Commune Décès :</label>';       HTML::COMMUNE('COMMUNED','COMMUNED','COMMUNED',$data['COMMUNED1'],$data['COMMUNED2']);
	echo '<label class="deces" id="lDINS">Date Décès:</label>';               echo '<input id="DINS"   type="txt"  name="DINS"   value="'.$data['DINS'].'" placeholder="00-00-0000" onblur="genererCodeP()"/>';
													                          echo '<input id="HINS"   type="txt"  name="HINS"   value="'.$data['HINS'].'" placeholder="00:00"/>';
	echo '<label class="deces" id="lNOM">Nom:</label>';                       echo '<input id="NOM"    type="txt"  name="NOM"    value="'.$data['NOM'].'" placeholder="xxxxxxx" autofocus onkeyup="javascript:this.value=this.value.toUpperCase();" />';
	echo '<label class="deces" id="lPRENOM">Prénom:</label> ';                echo '<input id="PRENOM" type="txt"  name="PRENOM" value="'.$data['PRENOM'].'" placeholder="xxxxxxx" onkeyup="javascript:this.value=this.value.toUpperCase();"/>';
	echo '<label class="deces" id="lFILSDE">Père:</label>';                   echo '<input id="FILSDE" type="txt"  name="FILSDE" value="'.$data['FILSDE'].'" placeholder="xxxxxxx" onkeyup="javascript:this.value=this.value.toUpperCase();"/>';
	echo '<label class="deces" id="lETDE">Mère:</label>';                     echo '<input id="ETDE"   type="txt"  name="ETDE"   value="'.$data['ETDE'].'" placeholder="xxxxxxx" onkeyup="javascript:this.value=this.value.toUpperCase();"/>';
	echo '<label class="deces" id="lSEXE">Sexe:</label>';                     $this->combov('SEXE','SEXE',$data['SEXE']);
	echo '<label class="deces" id="lDATENS">Né(e)le : </label>';              echo '<input id="DATENS" type="txt"  name="DATENS" value="'.$data['DATENS'].'" placeholder="00-00-0000" onblur="genererCodeP()" />';
	echo '<label class="deces" id="lWILAYAN">Wilaya Nais :</label>';          HTML::WILAYA('WILAYAN','WILAYAN','WILAYAN','wil',$data['WILAYAN1'],$data['WILAYAN2']) ;
	echo '<label class="deces" id="lCOMMUNEN">Commune Nais :</label>';        HTML::COMMUNE('COMMUNEN','COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
	echo '<label class="deces" id="lWILAYAR">Wilaya Res :</label>';           HTML::WILAYA('WILAYAR','WILAYAR','WILAYAR','wil',$data['WILAYAR1'],$data['WILAYAR2']) ;
	echo '<label class="deces" id="lCOMMUNER">Commune Res :</label> ';        HTML::COMMUNE('COMMUNER','COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);
	echo '<label class="deces" id="lADRESSE">Adresse Res :</label>';          echo '<input id="ADRESSE" type="text" name="ADRESSE" value="'.$data['ADRESSE'].'" placeholder="xxxxxxxxxxxxxxx" onkeyup="javascript:this.value=this.value.toUpperCase();"/>';
	echo '<label class="deces" id="lLD7">Signalement médico-légal  </label>';
	echo '<label class="deces" id="lLD8">Obstacle médico-légal à l\'inhumation  : </label> ';                               echo '<input id="LD8"  type="checkbox"  name="OMLI" value="" '.$data['OMLI'].' />';
	echo '<label class="deces" id="lLD9">Mise immédiate en cercueil hermétique en raison du risque de contagion :</label>'; echo '<input id="LD9"  type="checkbox"  name="MIEC" value="" '.$data['MIEC'].' />';
	echo '<label class="deces" id="lLD10">Existence d\'une prothèse fonctionnant au moyen d\'une pile :</label> ';          echo '<input id="LD10" type="checkbox"  name="EPFP" value="" '.$data['EPFP'].' />';
	echo '<label class="deces" id="lLD0">Lieu du Décès :</label>';
	echo '<label class="deces" id="lLD1">Domicile :</label>';                  echo '<input id="LD1" type="radio"  name="LD" value="DOM"  '.$data['DOM'].'/>';
	echo '<label class="deces" id="lLD2">Voie publique :</label>';             echo '<input id="LD2" type="radio"  name="LD" value="VP"   '.$data['VP'].'/>';
	
	echo '<label class="deces" id="lLD3">Autres (à préciser) :</label>';                     echo '<input id="LD3" type="radio"  name="LD" value="AAP"  '.$data['AAPLD'].'/><input id="LD6" type="txt" name="AUTRES" value="'.$data['AUTRES'].'" placeholder="xxxxxxx" onkeyup="javascript:this.value=this.value.toUpperCase();" /> ';
	echo '<label class="deces" id="lLD4">Structure publique :</label>';                      echo '<input id="LD4" type="radio"  name="LD" value="SSP"  '.$data['SSP'].'/>';
	echo '<label class="deces" id="lLD5">Structure privée :</label>';                        echo '<input id="LD5" type="radio"  name="LD" value="SSPV" '.$data['SSPV'].'/>';
	echo '<label class="deces" id="lProfession">';         
	      echo '<a title="Ajouter Profession si manque dans la liste "  href="'.URL.'prf/createprf/'.Session::get('structure').'"> Profession : </a>';
		  echo'<img src="'.URL.'public/images/add.PNG" width="12" height="12" border="0" alt=""   />';
	echo '</label>';HTML::Profession(44,44,'Profession','Profession','Profession',Session::get('structure'),$data['PROFESSION1'],$data['PROFESSION2']) ;
	echo '<label class="deces" id="lDATEHOSPI">Date d\'hospitalisation : </label> ';         echo '<input id="DATEHOSPI" type="txt" name="DATEHOSPI" value="'.$data['DATEHOSPI'].'" placeholder=" 00-00-0000"/>';echo '<input id="HEURESHOSPI" type="txt"  name="HEURESHOSPI" value="'.$data['HEURESHOSPI'].'" placeholder=" 00:00"/>';
	echo '<label class="deces" id="lSERVICEHOSPIT"  >';  
	echo '<a title="Ajouter Service si manque dans la liste : "  href="'.URL.'ser/nouveau/'.Session::get('structure').'"> Service de déces : </a>';
		  echo'<img src="'.URL.'public/images/add.PNG" width="12" height="12" border="0" alt=""   />';
	echo '</label>';HTML::SER(44,44,'SERVICEHOSPIT','servicedeces',$data['SERVICEHOSPIT1'],$data['SERVICEHOSPIT2']) ;
	echo '<label class="deces" id="lMEDECINHOSPIT"  >';
		  echo '<a title="Ajouter Médecin si manque dans la liste "  href="'.URL.'med/createmedecin/'.Session::get('structure').'"> Médecin déclarant : </a>';
		  echo'<img src="'.URL.'public/images/add.PNG" width="12" height="12" border="0" alt=""   />';
	echo '</label>';HTML::MED(44,44,'MEDECINHOSPIT','medecindeces',Session::get('structure'),$data['MEDECINHOSPIT1'],$data['MEDECINHOSPIT2']) ;
	echo '</div>';
	echo '<div id="content_2" class="contenttabs2">';
	echo '<label class="deces" id="lCIM0">Partie I : Maladie(s) ou affection(s) morbide (s) ayant directement provoqué le décés :</label>';
	echo '<label class="deces" id="lCIM1">&nbsp;Cause directe :&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;a )</label><input title="La définition n\'inclut pas les symptômes ni les modes de décès (arrét cardiorespiratoire) "id="CIM1" type="txt" name="CIM1" value="'.$data['CIM1'].'" placeholder="x" onkeyup="javascript:this.value=this.value.toUpperCase();"/>';
	echo '<label class="deces" id="lCIM2">&nbsp;Due à ou consécutive à : &nbsp;b )</label><input title="La définition n\'inclut pas les symptômes ni les modes de décès (arrét cardiorespiratoire)  "   id="CIM2" type="txt" name="CIM2" value="'.$data['CIM2'].'" placeholder="x" onkeyup="javascript:this.value=this.value.toUpperCase();"/>';
	echo '<label class="deces" id="lCIM3">&nbsp;Due à ou consécutive à : &nbsp;c )</label><input title="La définition n\'inclut pas les symptômes ni les modes de décès (arrét cardiorespiratoire)  "   id="CIM3" type="txt" name="CIM3" value="'.$data['CIM3'].'" placeholder="x" onkeyup="javascript:this.value=this.value.toUpperCase();"/>';
	echo '<label class="deces" id="lCIM4">&nbsp;Due à ou consécutive à : &nbsp;d )</label><input title="La définition n\'inclut pas les symptômes ni les modes de décès (arrét cardiorespiratoire)  "   id="CIM4" type="txt" name="CIM4" value="'.$data['CIM4'].'" placeholder="x" onkeyup="javascript:this.value=this.value.toUpperCase();"/>';
	echo '<label class="deces" id="lCIM00">Partie II : Autres états morbides ayant pu contribuer au décés, non mentionnés en partie I :</label>';
	echo '<label class="deces" id="lCIM5"> Autres états :</label>              <input id="CIM5" type="txt" name="CIM5" value="'.$data['CIM5'].'" placeholder="x" onkeyup="javascript:this.value=this.value.toUpperCase();" />';
																				HTML::cim1('CODECIM0','chapitre',$data['CODECIM01'],$data['CODECIM02']);
																				HTML::cim2('CODECIM',$data['CODECIM1'],$data['CODECIM2']) ;
	echo '<label class="deces" id="lCIM7">  * la dernière cause ligne (d) doit correspondre à la cause initiale  </label>';
	echo '<label class="deces" id="lCIM01">Cause de décés :</label>';
	echo '<label class="deces" id="lCIM02">Cause naturelle :</label><input title="Cause endogene(maladie,senescence)"id="CIM02" type="radio"  name="CD" value="CN" '.$data['CN'].'/>';
	echo '<label class="deces" id="lCIM03">Cause viollente :</label><input  title="Cause exogene(accident,scuicide,homicide)"id="CIM03" type="radio"  name="CD" value="CV" '.$data['CV'].'/>';
	echo '<label class="deces" id="lCIM04">Cause indéterminée :</label><input title="Indeterminée(homicide,scuicide,accident)"id="CIM04" type="radio"  name="CD" value="CI" '.$data['CI'].'/>';
	echo '<label class="deces" id="lNDM1">Nature de la mort :</label>';
	echo '<label class="deces" id="lNDM2">Naturelle :</label>          <input id="NDM2" type="radio"  name="NDLM" value="NAT" '.$data['NAT'].' />';
	echo '<label class="deces" id="lNDM3">Accident :</label>           <input id="NDM3" type="radio"  name="NDLM" value="ACC" '.$data['ACC'].'/>';
	echo '<label class="deces" id="lNDM4">Auto induite :</label>       <input id="NDM4" type="radio"  name="NDLM" value="AID" '.$data['AID'].'/>';
	echo '<label class="deces" id="lNDM5">Agression :</label>          <input id="NDM5" type="radio"  name="NDLM" value="AGR" '.$data['AGR'].'/>';
	echo '<label class="deces" id="lNDM6">Indéterminée :</label>       <input id="NDM6" type="radio"  name="NDLM" value="IND" '.$data['IND'].'/>';
	echo '<label class="deces" id="lNDM7">Autres (à préciser) :</label><input id="NDM7" type="radio"  name="NDLM" value="AAP" '.$data['AAP'].'/><input id="NDLMAAP" type="txt" name="NDLMAAP" value="'.$data['NDLMAAP'].'"  onblur="myFunction1()" onkeyup="javascript:this.value=this.value.toUpperCase();" />';
	echo '</div>';
	echo '<div id="content_3" class="contenttabs3">';
	echo '<label class="deces" id="lDECEMAT0">Décés maternel :</label>';
	echo '<label class="deces" id="lDECEMAT">Décés maternel :</label>                        <input id="DECEMAT"    type="checkbox"  name="DECEMAT" value="" '.$data['DECEMAT'].'     /> ';
	echo '<label class="deces" id="lDGRO">Durant la grossesse :</label>                      <input id="DGRO"       type="radio"     name="GRS"     value="DGRO"        '.$data['DGRO'].'/>';
	echo '<label class="deces" id="lDACC">Durant l\'accouchement :</label>                   <input id="DACC"       type="radio"     name="GRS"     value="DACC"        '.$data['DACC'].'/>';
	echo '<label class="deces" id="lDAVO">Durant l\'avortement :</label>                     <input id="DAVO"       type="radio"     name="GRS"     value="DAVO"        '.$data['DAVO'].'/>';
	echo '<label class="deces" id="lAGESTATION">Aprés la gestation "post partum" :</label>   <input id="AGESTATION" type="radio"     name="GRS"     value="AGESTATION"  '.$data['AGESTATION'].'/>';
	echo '<label class="deces" id="lIDETER">Indéterminé :</label>                            <input id="IDETER"     type="radio"     name="GRS"     value="IDETER"      '.$data['IDETER'].'/>';
	echo '<label class="deces" id="MNP0">Mortinatalité, périnatalité :</label> ';
	echo '<label class="deces" id="MNP1">Grossesse multiple :</label>                        <input id="GM"         type="checkbox"  name="GM"        value=""  '.$data['GM'].'    /> ';
	echo '<label class="deces" id="MNP2">Mort-né :</label>                                   <input id="MN"         type="checkbox"  name="MN"        value=""  '.$data['MN'].'    /> ';
	echo '<label class="deces" id="MNP3">Age gestationnel (en semaines) :</label>            <input id="AGEGEST"    type="txt"       name="AGEGEST"   value="'.$data['AGEGEST'].'" />';
	echo '<label class="deces" id="MNP4">Poids à la naissance (en grammes) :</label>         <input id="POIDNSC"    type="txt"       name="POIDNSC"   value="'.$data['POIDNSC'].'" />';
	echo '<label class="deces" id="MNP5">Age de la mére (en années) :</label>                <input id="AGEMERE"    type="txt"       name="AGEMERE"   value="'.$data['AGEMERE'].'" />';
	echo '<label class="deces" id="MNP6">Si décés périnatal préciser :</label>               <input id="DPNAT"      type="checkbox"  name="DPNAT"     value=""   '.$data['DPNAT'].'     /> ';
	                                                                                    echo '<input class="deces" id="EMDPNAT" type="txt"  name="EMDPNAT" value="'.$data['EMDPNAT'].'" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="xxxxxxx"  />';
	echo '<label class="deces" id="POSTOPP0">Intervention chirurgicale :</label> ';
	echo '<label class="deces" id="POSTOPP1">4 semaines avant le décés :</label><input id="POSTOPP2"  type="checkbox"  name="POSTOPP"    value="" '.$data['POSTOPP'].' /> ';
	echo '</div>';
	echo '<div id="content_4" class="contenttabs4"> ';
	echo '<label class="deces" id="lDECEMATA">: إعلان بوفاة </label>';
	echo '<label class="deces" id="lNOMAR">: اللقب </label>                <input id="NOMAR"       type="txt" name="NOMAR"       value="'.$data['NOMAR'].'" placeholder="xxxxxxx"/>';
	echo '<label class="deces" id="lPRENOMAR">: الإسم</label>               <input id="PRENOMAR"    type="txt" name="PRENOMAR"    value="'.$data['PRENOMAR'].'" placeholder="xxxxxxx"/>';
	echo '<label class="deces" id="lFILSDEAR">: الأب</label>                <input id="FILSDEAR"    type="txt" name="FILSDEAR"    value="'.$data['FILSDEAR'].'" placeholder="xxxxxxx"/>';
	echo '<label class="deces" id="lETDEAR">: الأم</label>                  <input id="ETDEAR"      type="txt" name="ETDEAR"      value="'.$data['ETDEAR'].'" placeholder="xxxxxxx"/>';
	echo '<label class="deces" id="lNOMPRENOMAR">: إسم و لقب الزوج</label> <input id="NOMPRENOMAR" type="txt" name="NOMPRENOMAR" value="'.$data['NOMPRENOMAR'].'" placeholder="xxxxxxx"/>';
	echo '<label class="deces" id="lPROAR">: المهنة </label>               <input id="PROAR"       type="txt" name="PROAR"       value="'.$data['PROAR'].'" placeholder="xxxxxxx"/>';
	echo '<label class="deces" id="lADAR">: عنوان الإقامة</label>           <input id="ADAR"        type="txt" name="ADAR"        value="'.$data['ADAR'].'" placeholder="xxxxxxx"/>';
	echo '<input type="hidden" name="WILAYA"     value="'.Session::get('wilaya').'"/>';
	echo '<input type="hidden" name="STRUCTURE"  value="'.Session::get('structure').'"/>';
	echo '<input type="hidden" name="STRUCTURED" value="'.Session::get('structure').'"/>';
	echo '<input type="hidden" name="login"      value="'.Session::get('login').'"/>';
	echo '<input id="submitnew" type="submit" />	'; 
	echo '</div>';
	}
	
	
    function WILAYA($name,$id,$class,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select  id=\"".$id."\" size=1 class=\"".$class."\" name=\"".$name."\" onblur=\"genererCodeP()\"   >"."\n";
	echo"<option  value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
	$result = mysql_query("SELECT * FROM $tb_name order by WILAYAS" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data[0].'">'.$data[1].'</option>';
	}
	echo '</select>'."\n"; 
	}
	
	function COMMUNE($name,$id,$class,$value,$selected) 
	{	 
	echo "<select id=\"".$id."\" size=1 class=\"".$class."\" name=\"".$name."\" onblur=\"genererCodeP()\"  >"."\n";
	echo"<option  value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
	echo '</select>'."\n";
	}
	
	function structure($name,$id,$class,$value,$selected) 
	{	 
	echo "<select id=\"".$id."\" size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
	echo '</select>'."\n";
	}
    function Profession($x,$y,$name,$idprofession,$tb_name,$structure,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1 id=\"".$idprofession."\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name order by Profession" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['Profession'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	
	
	
    function SER($x,$y,$name,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1 class=\"SERVICEHOSPIT\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name  " );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['service'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	function MED($x,$y,$name,$tb_name,$structure,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1 id=\"MEDECINHOSPIT\" name=\"".$name."\"  onblur=\"myFunction()\" >"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name  where structure=$structure  order by Nom" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['Nom'].'_'.$data['Prenom'].'">'.$data['Nom'].'_'.$data['Prenom'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	function SEF($x,$y,$id,$name,$tb_name,$structure,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1 id=\"".$id."\" name=\"".$name."\"  onblur=\"myFunction()\" >"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name  where structure=$structure  order by Nom" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['Nom'].'_'.$data['Prenom'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	function chapitre($name,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1 class=\"chapitre\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM chapitre " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.'['.$data[0].'] '.$data[1].'</option>';
    }
	echo '</select>'."\n"; 
	}
	function cim1($name,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1 class=\"cim1\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM chapitre " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.'['.$data[0].'] '.$data[1].'</option>';
    }
	echo '</select>'."\n"; 
	}
	function cim2($name,$value,$selected) 
	{
	echo "<select size=1 class=\"cim2\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
    echo '</select>'."\n"; 
	}
	
	function LABOPHA($name,$id,$class,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select  id=\"".$id."\" size=1 class=\"".$class."\" name=\"".$name."\" onblur=\"genererCodeP()\"   >"."\n";
	echo"<option  value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
	$result = mysql_query("SELECT * FROM $tb_name order by laboratoire" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data[0].'">'.strtolower($data[1]).'</option>';
	}
	echo '</select>'."\n"; 
	}
	
	function nbrtostring($tb_name,$colonename,$colonevalue,$resultatstring) 
	{
		if (is_numeric($colonevalue) and $colonevalue!=='0') 
		{ 
		$this->mysqlconnect();
		$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
		$row=mysql_fetch_object($result);
		$resultat=$row->$resultatstring;
		return $resultat;
		}
        else
        {
		return $resultat2='??????';
		}		
	} 
	
	function valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$DATEJOUR1,$DATEJOUR2,$VALEUR2,$STR) 
	{
	$this->mysqlconnect();
	$sql = " select * from $TBL  where $COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2' and  STRUCTURED $STR ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
    function graphemois($x,$y,$TITRE,$SRS,$TBL,$COLONE1,$COLONE2,$ANNEE,$IND,$STR) 
	{
	include "./chart/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$fichier='./chart/demo/generated/demo1.png';
	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("JAN", $this->valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-01-01",$ANNEE."-01-31",$IND,$STR) ));
	$dataSet->addPoint(new Point("FEV", $this->valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-02-01",$ANNEE."-02-29",$IND,$STR)));
	$dataSet->addPoint(new Point("MAR", $this->valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-03-01",$ANNEE."-03-31",$IND,$STR)));
	$dataSet->addPoint(new Point("AVR", $this->valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-04-01",$ANNEE."-04-30",$IND,$STR)));
	$dataSet->addPoint(new Point("MAI", $this->valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-05-01",$ANNEE."-05-31",$IND,$STR)));
	$dataSet->addPoint(new Point("JUIN",$this->valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-06-01",$ANNEE."-06-30",$IND,$STR)));
	$dataSet->addPoint(new Point("JUIL",$this->valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-07-01",$ANNEE."-07-31",$IND,$STR)));
	$dataSet->addPoint(new Point("AOUT",$this->valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-08-01",$ANNEE."-08-31",$IND,$STR)));
	$dataSet->addPoint(new Point("SEP", $this->valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-09-01",$ANNEE."-09-30",$IND,$STR)));
	$dataSet->addPoint(new Point("OCT", $this->valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-10-01",$ANNEE."-10-31",$IND,$STR)));
	$dataSet->addPoint(new Point("NOV", $this->valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-11-01",$ANNEE."-11-30",$IND,$STR)));
	$dataSet->addPoint(new Point("DEC", $this->valeurmois($SRS,$TBL,$COLONE1,$COLONE2,$ANNEE."-12-01",$ANNEE."-12-31",$IND,$STR)));
	$chart->setDataSet($dataSet);
	$DATE=date("d-m-Y");
	$chart->setTitle($TITRE.$DATE);
	$chart->render($fichier);	
	echo '<img id ="image"  src="'.URL.$fichier.'" style="border: 2px solid green;"/>';
	}
	
	function valeurmultigraphe($TBL,$COLONE1,$DATEJOUR1,$DATEJOUR2,$COLONE2,$VALEUR2,$structure) 
	{
	$this->mysqlconnect();
	$sql = " select $COLONE1,$COLONE2 from $TBL where STRUCTURED $structure	and	$COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2'  AND $COLONE2='$VALEUR2' ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}

	function multigraphe($x,$y,$TITRE,$TBL,$COL,$COLONE,$VALEUR1,$VALEUR2,$structure) //,$data$data[$DATE-4]
	{
	include "./CHART/libchart/classes/libchart.php";
	$chart = new VerticalBarChart();
	$dataSet = new XYSeriesDataSet();
	$fichier='./CHART/demo/generated/demo7.png';
	$DATE=date("Y");
	$serie1 = new XYDataSet();
	
	$serie1->addPoint(new Point($DATE-9,$this->valeurmultigraphe($TBL,$COL,($DATE-9)."-01-01",($DATE-9)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-8,$this->valeurmultigraphe($TBL,$COL,($DATE-8)."-01-01",($DATE-8)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-7,$this->valeurmultigraphe($TBL,$COL,($DATE-7)."-01-01",($DATE-7)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-6,$this->valeurmultigraphe($TBL,$COL,($DATE-6)."-01-01",($DATE-6)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-5,$this->valeurmultigraphe($TBL,$COL,($DATE-5)."-01-01",($DATE-5)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-4,$this->valeurmultigraphe($TBL,$COL,($DATE-4)."-01-01",($DATE-4)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-3,$this->valeurmultigraphe($TBL,$COL,($DATE-3)."-01-01",($DATE-3)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-2,$this->valeurmultigraphe($TBL,$COL,($DATE-2)."-01-01",($DATE-2)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-1,$this->valeurmultigraphe($TBL,$COL,($DATE-1)."-01-01",($DATE-1)."-12-31",$COLONE,$VALEUR1,$structure)));
	$serie1->addPoint(new Point($DATE-0,$this->valeurmultigraphe($TBL,$COL,($DATE-0)."-01-01",($DATE-0)."-12-31",$COLONE,$VALEUR1,$structure)));
	$dataSet->addSerie($VALEUR1, $serie1);
	
	$serie2 = new XYDataSet();
	$serie2->addPoint(new Point($DATE-9, $this->valeurmultigraphe($TBL,$COL,($DATE-9)."-01-01",($DATE-9)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-8, $this->valeurmultigraphe($TBL,$COL,($DATE-8)."-01-01",($DATE-8)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-7, $this->valeurmultigraphe($TBL,$COL,($DATE-7)."-01-01",($DATE-7)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-6, $this->valeurmultigraphe($TBL,$COL,($DATE-6)."-01-01",($DATE-6)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-5, $this->valeurmultigraphe($TBL,$COL,($DATE-5)."-01-01",($DATE-5)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-4, $this->valeurmultigraphe($TBL,$COL,($DATE-4)."-01-01",($DATE-4)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-3, $this->valeurmultigraphe($TBL,$COL,($DATE-3)."-01-01",($DATE-3)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-2, $this->valeurmultigraphe($TBL,$COL,($DATE-2)."-01-01",($DATE-2)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-1, $this->valeurmultigraphe($TBL,$COL,($DATE-1)."-01-01",($DATE-1)."-12-31",$COLONE,$VALEUR2,$structure)));
	$serie2->addPoint(new Point($DATE-0, $this->valeurmultigraphe($TBL,$COL,($DATE-0)."-01-01",($DATE-0)."-12-31",$COLONE,$VALEUR2,$structure)));
	$dataSet->addSerie($VALEUR2, $serie2);
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphCaptionRatio(0.65);
	$chart->setTitle($TITRE.date("d-m-Y"));
	$chart->render($fichier);	
	echo '<img id ="image"  alt="****"  src="'.URL.$fichier.'" style="border: 2px solid green;"/>';
	}
	
	function multiPie($x,$y,$TITRE,$TBL,$COL,$COLONE,$VALEUR1,$VALEUR2,$structure) //,$data$data[$DATE-4]
	{
	include "./CHART/libchart/classes/libchart.php";

	$chart = new PieChart();
	
	$chart->getPlot()->getPalette()->setPieColor(array(
		new Color(255, 0, 0),
		new Color(0, 0, 255)
	));

	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("masculin", 10));
	$dataSet->addPoint(new Point("feminin", 550));
	$chart->setDataSet($dataSet);
    $fichier='./CHART/demo/generated/pie_chart_color.png';
	$DATE=date("Y");
	// $serie1->addPoint(new Point($DATE-9,$this->valeurmultigraphe($TBL,$COL,($DATE-9)."-01-01",($DATE-9)."-12-31",$COLONE,$VALEUR1,$structure)));
	$chart->setTitle($TITRE.date("d-m-Y"));
	$chart->render($fichier);	
	echo '<img id ="image"  alt="****"  src="'.URL.$fichier.'" style="border: 2px solid green;"/>';
	}
	
	
	
	function barre_navigation ($nb_total,$nb_affichage_par_page,$o,$q,$p,$nb_liens_dans_la_barre,$c,$m)//$c= controleure ,$m=methode
	{
	$barre = '';
	$query = URL.$c.'/'.$m.'/'.$p.'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.'';	 
	$page_active = floor(($p/$nb_affichage_par_page)+1);
	$nb_pages_total = ceil($nb_total/$nb_affichage_par_page);
		if ($nb_liens_dans_la_barre%2==0) 
		{
			$cpt_deb1 = $page_active - ($nb_liens_dans_la_barre/2)+1;
			$cpt_fin1 = $page_active + ($nb_liens_dans_la_barre/2);
		}
		else 
		{
			$cpt_deb1 = $page_active - floor(($nb_liens_dans_la_barre/2));
			$cpt_fin1 = $page_active + floor(($nb_liens_dans_la_barre/2));
		}
		
		if ($cpt_deb1 <= 1) 
		{
			$cpt_deb = 1;
			$cpt_fin = $nb_liens_dans_la_barre;
		}
		elseif ($cpt_deb1>1 && $cpt_fin1<$nb_pages_total) 
		{
			$cpt_deb = $cpt_deb1;
			$cpt_fin = $cpt_fin1;
		}
		else 
		{
			$cpt_deb = ($nb_pages_total-$nb_liens_dans_la_barre)+1;
			$cpt_fin = $nb_pages_total;
		}
		
		if ($nb_pages_total <= $nb_liens_dans_la_barre) {
		$cpt_deb=1;
		$cpt_fin=$nb_pages_total;
		}
		if ($cpt_deb != 1) 
		{
			$cible = URL.$c.'/'.$m.'/'.(0).'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.''; 
			$lien = '<A HREF="'.$cible.'">&lt;&lt;</A>&nbsp;&nbsp;';
		}
		else 
		{
		$lien='';
		}
		$barre .= $lien;
		for ($cpt = $cpt_deb; $cpt <= $cpt_fin; $cpt++) 
		{
			if ($cpt == $page_active) 
			{
				if ($cpt == $nb_pages_total) {
				$barre .= $cpt;
				}
				else {
				$barre .= $cpt.'&nbsp;-&nbsp;';
				}
			}
			else 
			{
				if ($cpt == $cpt_fin) {
				$barre .= "<A HREF='".URL.$c.'/'.$m.'/'.(($cpt-1)*$nb_affichage_par_page).'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.'';  
				$barre .= "'>".'['.$cpt.']'."</A>";
				}
				else {
				$barre .= "<A HREF='".URL.$c.'/'.$m.'/'.(($cpt-1)*$nb_affichage_par_page).'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.'';  
				$barre .= "'>".'['.$cpt.']'."</A>&nbsp;-&nbsp;";
				}
			}
		}

		$fin = ($nb_total - ($nb_total % $nb_affichage_par_page));
		if (($nb_total % $nb_affichage_par_page) == 0) 
		{
		$fin = $fin - $nb_affichage_par_page;
		}
		if ($cpt_fin != $nb_pages_total) 
		{
		$cible = URL.$c.'/'.$m.'/'.$fin.'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.''; 
		$lien = '&nbsp;&nbsp;<A HREF="'.$cible.'">&gt;&gt;</A>';
		}
		else {
		$lien='';
		}
		$barre .= $lien;
		return $barre;
	}

	function XLS($serveur,$STRUCTURED,$d1,$d2)
    {
	$d11=$this->dateFR2US($d1);
	$d22=$this->dateFR2US($d2);
	$fichier ='D:\framework\xls\D_'.$STRUCTURED.'_'.$d1.'_au_'.$d2.'.php';	
    error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);
	date_default_timezone_set('Europe/London');

	define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
	require_once dirname(__FILE__) . './PHPExcel/PHPExcel.php';
	// echo date('H:i:s') , "Create new PHPExcel object" , EOL;
	$objPHPExcel = new PHPExcel();
	// echo date('H:i:s') , " Set document properties" , EOL;

		// $objPHPExcel->setActiveSheetIndex(0)
					// ->setCellValue('A1','WILAYAD' )
					// ->setCellValue('B1','COMMUNED' )
					// ->setCellValue('C1','STRUCTURED')
					// ->setCellValue('D1', 'NOM')
					// ->setCellValue('E1', 'PRENOM')
					// ->setCellValue('F1', 'FILSDE')
					// ->setCellValue('G1', 'ETDE')
					// ->setCellValue('H1', 'SEX')
					// ->setCellValue('I1', 'DATENAISSANCE')
					// ->setCellValue('J1', 'Days')
					// ->setCellValue('K1', 'Weeks')
					// ->setCellValue('L1', 'Months')
					// ->setCellValue('M1', 'Years')
					// ->setCellValue('N1', 'WILAYA')
					// ->setCellValue('O1', 'WILAYAR')
					// ->setCellValue('P1', 'COMMUNE')
					// ->setCellValue('Q1', 'COMMUNER')
					// ->setCellValue('R1', 'ADRESSE')
					// ->setCellValue('S1', 'CIM1')
					// ->setCellValue('T1', 'CIM2')
					// ->setCellValue('U1', 'CIM3')
					// ->setCellValue('V1', 'CIM4')
					// ->setCellValue('W1', 'CIM5')
					// ->setCellValue('X1', 'NDLMAAP')
					// ->setCellValue('Y1', 'CD')
					// ->setCellValue('Z1', 'LD')
					// ->setCellValue('AA1', 'AUTRES')
					// ->setCellValue('AB1', 'NDLM')
					// ->setCellValue('AC1', 'DECEMAT')
					// ->setCellValue('AD1', 'GRS')
					// ->setCellValue('AE1', 'DATEHOSPI')
					// ->setCellValue('AF1', 'SERVICEHOSPIT')
					// ->setCellValue('AG1', 'DUREEHOSPIT')
					// ->setCellValue('AH1', 'MEDECINHOSPIT')
					// ->setCellValue('AI1', 'DINS')
					// ->setCellValue('AJ1', 'HINS')
					// ;
		
		// Rename worksheet
	    // echo date('H:i:s') , " call database" , EOL;
		$sqlPes = "SELECT * FROM deceshosp where  DINS BETWEEN '$d11' AND '$d22'  and STRUCTURED ='$STRUCTURED' order by DINS ";  
		$exePes = mysql_query($sqlPes);
		$resPes = mysql_fetch_assoc($exePes);
		$numPes = mysql_num_rows($exePes);
		
		for ($i = 1; $i <= $numPes + 1; $i++) {
		  
			$objPHPExcel->setActiveSheetIndex(0)// $i-1
				 ->setCellValue('A'.$i,$resPes['WILAYAD'])
				 ->setCellValue('B'.$i,$resPes['COMMUNED'] )
				 ->setCellValue('C'.$i,$resPes['STRUCTURED'])
				 ->setCellValue('D'.$i,$resPes['NOM'])
				 ->setCellValue('E'.$i,$resPes['PRENOM'])
				 ->setCellValue('F'.$i,$resPes['FILSDE'])
				 ->setCellValue('G'.$i,$resPes['ETDE'])
				 ->setCellValue('H'.$i,$resPes['SEX'])
				 ->setCellValue('I'.$i,$resPes['DATENAISSANCE'])
				 ->setCellValue('J'.$i,$resPes['Days'])
				 ->setCellValue('K'.$i,$resPes['Weeks'])
				 ->setCellValue('L'.$i,$resPes['Months'])
				 ->setCellValue('M'.$i,$resPes['Years'])
				 ->setCellValue('N'.$i,$resPes['WILAYA'])
				 ->setCellValue('O'.$i,$resPes['WILAYAR'])
				 ->setCellValue('P'.$i,$resPes['COMMUNE'])
				 ->setCellValue('Q'.$i,$resPes['COMMUNER'])
				 ->setCellValue('R'.$i,$resPes['ADRESSE'])
				 ->setCellValue('S'.$i,$resPes['CIM1'])
				 ->setCellValue('T'.$i,$resPes['CIM2'])
				 ->setCellValue('U'.$i,$resPes['CIM3'])
				 ->setCellValue('V'.$i,$resPes['CIM4'])
				 ->setCellValue('W'.$i,$resPes['CIM5'])
				 ->setCellValue('X'.$i,$resPes['NDLMAAP'])
				 ->setCellValue('Y'.$i,$resPes['CD'])
				 ->setCellValue('Z'.$i,$resPes['LD'])
				 ->setCellValue('AA'.$i,$resPes['AUTRES'])
				 ->setCellValue('AB'.$i,$resPes['NDLM'])
				 ->setCellValue('AC'.$i,$resPes['DECEMAT'])
				 ->setCellValue('AD'.$i,$resPes['GRS'])
				 ->setCellValue('AE'.$i,$resPes['DATEHOSPI'])
				 ->setCellValue('AF'.$i,$resPes['SERVICEHOSPIT'])
				 ->setCellValue('AG'.$i,$resPes['DUREEHOSPIT'] )
				 ->setCellValue('AH'.$i,$resPes['MEDECINHOSPIT'])
				 ->setCellValue('AI'.$i,$resPes['DINS'])
				 ->setCellValue('AJ'.$i,$resPes['HINS'])
				 
				 ->setCellValue('AK'.$i,$resPes['NOMAR'])
				 ->setCellValue('AL'.$i,$resPes['PRENOMAR'])
				 ->setCellValue('AM'.$i,$resPes['FILSDEAR'])
				 ->setCellValue('AN'.$i,$resPes['ETDEAR'])
				 ->setCellValue('AO'.$i,$resPes['NOMPRENOMAR'])
				 ->setCellValue('AP'.$i,$resPes['PROAR'])
				 ->setCellValue('AQ'.$i,$resPes['ADAR'])
				 ->setCellValue('AR'.$i,$resPes['Profession'])
				 ->setCellValue('AS'.$i,$resPes['aprouve'])
				 ;
	                         
			$resPes = mysql_fetch_assoc($exePes);
		   
		}
	// Rename worksheet
	// echo date('H:i:s') , " Rename worksheet" , EOL;
	$objPHPExcel->getActiveSheet()->setTitle('deces');
    $objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(5);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(5);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
	$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(25);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(25);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(25);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(25);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(25);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(25);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(5);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(5);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(5);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(5);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(5);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(25);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AP')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('AR')->setWidth(15);	
    $objPHPExcel->getActiveSheet()->getColumnDimension('AS')->setWidth(15);	
	$objPHPExcel->getActiveSheet()->getStyle('A1:AS1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FF69B4');
	
	// Save Excel 2007 file
	//echo date('H:i:s') , " Write to Excel2007 format" , EOL;
	$callStartTime = microtime(true);
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	//echo $fichier  ;echo'<br />';
	$objWriter->save(str_replace('.php', '.xlsx', $fichier));
	$callEndTime = microtime(true);
	$callTime = $callEndTime - $callStartTime;
	
	//echo $fichier  ;echo'<br />';
	//echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo($fichier, PATHINFO_BASENAME)) , EOL;
	//echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
	// Echo memory usage
	//echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;
	// Save Excel 95 file
	//echo date('H:i:s') , " Write to Excel5 format" , EOL;
	$callStartTime = microtime(true);
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save(str_replace('.php', '.xls', $fichier));
	$callEndTime = microtime(true);
	$callTime = $callEndTime - $callStartTime;

	//echo date('H:i:s') , " File written to " , str_replace('.php', '.xls', pathinfo($fichier, PATHINFO_BASENAME)) , EOL;
	//echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
	// Echo memory usage
	//echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;


	// Echo memory peak usage
	//echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

	// Echo done
	// echo date('H:i:s') , " Done writing files" , EOL;
	// echo 'Files have been created in ' , getcwd() , EOL;
	// echo '<a href="'.URL.'libs/deces.xls">Enregistrer Sous xls</a></br>';
	echo '<a href="'.URL.'xls/D_'.$STRUCTURED.'_'.$d1.'_au_'.$d2.'.xls">1-Enregistrer Sous (*.xls)</a></br>';
	echo '<a href="'.URL.'xls/D_'.$STRUCTURED.'_'.$d1.'_au_'.$d2.'.xlsx">2-Enregistrer Sous (*.xlsx)</a></br>';	
	}



    function tabsavi($data) 
	{
	echo '<label  id="avil0bn1">Date</label>';    echo '<input  id="avid1"  type="txt"  name="Date"  value="'.$data['Date'].'" autofocus/>'; 
	echo '<label  id="avil0bn2">Wilaya</label>';  HTML::WILAYA('WILAYAD','avib0n2c','WILAYAD','wil',$data['WILAYA1'],$data['WILAYA2']) ;  
	echo '<label  id="avil0bn3">Commune</label>'; HTML::COMMUNE('COMMUNED','avib0n3c','COMMUNED',$data['COMMUNE1'],$data['COMMUNE2']);
	echo '<label  id="avil0bn4">Client</label>';  echo '<input  id="avicli"  type="txt"  name="avicli"  value="'.$data['avicli'].'"/>';
	echo '<label  id="avil0bn5">Cycle</label>';   echo '<input  id="avicycl" type="txt"  name="avicycl" value="'.$data['avicycl'].'"/>';
	echo '<label  id="avil0bn6">Batiment</label>';echo '<input  id="avibtm"  type="txt"  name="avibtm"  value="'.$data['avibtm'].'"/>';
	echo '<label  id="avil0bn7">Semaine</label>'; echo '<input  id="avisem"  type="txt"  name="avisem"  value="'.$data['avisem'].'"/>';
	
	// echo '<label style="display: none;" id="show_codeP">';
    // echo '<input type="text" name="code_patient"  id="code_patient"    style="border: none; background-color: #FFC0CB; color: black; font-family:courier; text-align:center;  "   size="15" readonly="">';
    // echo '<input type="text" name="code_patient1" id="code_patient1"  style="border: none; background-color: #FFC0CB; color: black; font-family:courier; text-align:center;  "   size="15" readonly="">';
	// echo '</label>';
	
	
	// echo '<label  id="l0bn4">1-Naisances Par Sexe Enregistrées Dans La Commune</label>';
	// echo '<label  id="l0bn5">Masculin</label>';echo '<input  id="b0n5c" type="txt"   name="nm1" value="'.$data['nm1'].'" placeholder="00"/>';echo '<input  id="b0n5" type="txt"  name="nf1" value="'.$data['nf1'].'" placeholder="00"/>';
	// echo '<label  id="l0bn6">Feminin</label>'; echo '<input  id="b0n6c" type="txt"   name="nm2" value="'.$data['nm2'].'" placeholder="00"/>';echo '<input  id="b0n6" type="txt"  name="nf2" value="'.$data['nf2'].'" placeholder="00"/>';
	// echo '<label  id="l0bn7">Survenues Au cours Du Mois</label>';
	// echo '<label  id="l0bn8">Enregistrées Par Jugement</label>';
	
	// echo '<label  id="l0bn9">2-Mort Nées Enregistrés Dans La Commune Selon Le Sexe</label>';
	// echo '<label  id="l0bn10">Total Des Mort Nées Enregistrés</label>';echo '<input  id="b0n10c" type="txt"    name="mnm1" value="'.$data['mnm1'].'" placeholder="00"/>';echo '<input  id="b0n10" type="txt"  name="mnf1" value="'.$data['mnf1'].'" placeholder="00"/>';
	
	// echo '<label  id="l0bn11">3-Mariages Enregistrées Dans La Commune</label>';
	// echo '<label  id="l0bn12">Mariages Enregistrés Au Cours Du Moi</label>';              echo '<input  id="b0n12" type="txt"  name="m1" value="'.$data['m1'].'" placeholder="00"/>';
	// echo '<label  id="l0bn13">Mariages Enregistrés Par Jugement Au Cours Du Mois</label>';echo '<input  id="b0n13" type="txt"  name="m2" value="'.$data['m2'].'" placeholder="00"/>';
	
	// echo '<label  id="l0bn14">4-Deces Enregistrés Par Jugement Dans La Commune</label>';
	// echo '<label  id="l0bn15">Masculin</label>';
	// echo '<label  id="l0bn16">Feminin</label>';
	// echo '<label  id="l0bn17">Survenues Au cours Du Mois</label>';
	// echo '<input  id="b0n15c" type="txt"    name="djm1" value="'.$data['djm1'].'" placeholder="00"/>';echo '<input  id="b0n15" type="txt"  name="djf1" value="'.$data['djf1'].'" placeholder="00"/>';
	// echo '<label  id="lbn0">Décès</label>'; echo '<label  id="bn0c">Masculin</label>';                                                        echo '<label  id="bn0">Feminin</label>'; 
	echo '<input  id="avibn0" type="txt"   name="avi0"  value="'.$data['avi0'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn1" type="txt"   name="avi1"  value="'.$data['avi1'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn2" type="txt"   name="avi2"  value="'.$data['avi2'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn3" type="txt"   name="avi3"  value="'.$data['avi3'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn4" type="txt"   name="avi4"  value="'.$data['avi4'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn5" type="txt"   name="avi5"  value="'.$data['avi5'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn6" type="txt"   name="avi6"  value="'.$data['avi6'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn7" type="txt"   name="avi7"  value="'.$data['avi7'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn8" type="txt"   name="avi8"  value="'.$data['avi8'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn9" type="txt"   name="avi9"  value="'.$data['avi9'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn10" type="txt"   name="avi10"  value="'.$data['avi10'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn11" type="txt"   name="avi11"  value="'.$data['avi11'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn12" type="txt"   name="avi12"  value="'.$data['avi12'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn13" type="txt"   name="avi13"  value="'.$data['avi13'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn14" type="txt"   name="avi14"  value="'.$data['avi14'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn15" type="txt"   name="avi15"  value="'.$data['avi15'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn16" type="txt"   name="avi16"  value="'.$data['avi16'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn17" type="txt"   name="avi17"  value="'.$data['avi17'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn18" type="txt"   name="avi18"  value="'.$data['avi18'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn19" type="txt"   name="avi19"  value="'.$data['avi19'].'"  placeholder=""  onblur="genererCodeP1()"/>';
    echo '<input  id="avibn20" type="txt"   name="avi20"  value="'.$data['avi20'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn21" type="txt"   name="avi21"  value="'.$data['avi21'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn22" type="txt"   name="avi22"  value="'.$data['avi22'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn23" type="txt"   name="avi23"  value="'.$data['avi23'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn24" type="txt"   name="avi24"  value="'.$data['avi24'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn25" type="txt"   name="avi25"  value="'.$data['avi25'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn26" type="txt"   name="avi26"  value="'.$data['avi26'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn27" type="txt"   name="avi27"  value="'.$data['avi27'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn28" type="txt"   name="avi28"  value="'.$data['avi28'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn29" type="txt"   name="avi29"  value="'.$data['avi29'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn30" type="txt"   name="avi30"  value="'.$data['avi30'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn31" type="txt"   name="avi31"  value="'.$data['avi31'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn32" type="txt"   name="avi32"  value="'.$data['avi32'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn33" type="txt"   name="avi33"  value="'.$data['avi33'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn34" type="txt"   name="avi34"  value="'.$data['avi34'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn35" type="txt"   name="avi35"  value="'.$data['avi35'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn36" type="txt"   name="avi36"  value="'.$data['avi36'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn37" type="txt"   name="avi37"  value="'.$data['avi37'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn38" type="txt"   name="avi38"  value="'.$data['avi38'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn39" type="txt"   name="avi39"  value="'.$data['avi39'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn40" type="txt"   name="avi40"  value="'.$data['avi40'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn41" type="txt"   name="avi41"  value="'.$data['avi41'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn42" type="txt"   name="avi42"  value="'.$data['avi42'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn43" type="txt"   name="avi43"  value="'.$data['avi43'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn44" type="txt"   name="avi44"  value="'.$data['avi44'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn45" type="txt"   name="avi45"  value="'.$data['avi45'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn46" type="txt"   name="avi46"  value="'.$data['avi46'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn47" type="txt"   name="avi47"  value="'.$data['avi47'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn48" type="txt"   name="avi48"  value="'.$data['avi48'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn49" type="txt"   name="avi49"  value="'.$data['avi49'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn50" type="txt"   name="avi50"  value="'.$data['avi50'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn51" type="txt"   name="avi51"  value="'.$data['avi51'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn52" type="txt"   name="avi52"  value="'.$data['avi52'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn53" type="txt"   name="avi53"  value="'.$data['avi53'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn54" type="txt"   name="avi54"  value="'.$data['avi54'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn55" type="txt"   name="avi55"  value="'.$data['avi55'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn56" type="txt"   name="avi56"  value="'.$data['avi56'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn57" type="txt"   name="avi57"  value="'.$data['avi57'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn58" type="txt"   name="avi58"  value="'.$data['avi58'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn59" type="txt"   name="avi59"  value="'.$data['avi59'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn60" type="txt"   name="avi60"  value="'.$data['avi60'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn61" type="txt"   name="avi61"  value="'.$data['avi61'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn62" type="txt"   name="avi62"  value="'.$data['avi62'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn63" type="txt"   name="avi63"  value="'.$data['avi63'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn64" type="txt"   name="avi64"  value="'.$data['avi64'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn65" type="txt"   name="avi65"  value="'.$data['avi65'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn66" type="txt"   name="avi66"  value="'.$data['avi66'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn67" type="txt"   name="avi67"  value="'.$data['avi67'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn68" type="txt"   name="avi68"  value="'.$data['avi68'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn69" type="txt"   name="avi69"  value="'.$data['avi69'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn70" type="txt"   name="avi70"  value="'.$data['avi70'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn71" type="txt"   name="avi71"  value="'.$data['avi71'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn72" type="txt"   name="avi72"  value="'.$data['avi72'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn73" type="txt"   name="avi73"  value="'.$data['avi73'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn74" type="txt"   name="avi74"  value="'.$data['avi74'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn75" type="txt"   name="avi75"  value="'.$data['avi75'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn76" type="txt"   name="avi76"  value="'.$data['avi76'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn77" type="txt"   name="avi77"  value="'.$data['avi77'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn78" type="txt"   name="avi78"  value="'.$data['avi78'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn79" type="txt"   name="avi79"  value="'.$data['avi79'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn80" type="txt"   name="avi80"  value="'.$data['avi80'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn81" type="txt"   name="avi81"  value="'.$data['avi81'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn82" type="txt"   name="avi82"  value="'.$data['avi82'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn83" type="txt"   name="avi83"  value="'.$data['avi83'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn84" type="txt"   name="avi84"  value="'.$data['avi84'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn85" type="txt"   name="avi85"  value="'.$data['avi85'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn86" type="txt"   name="avi86"  value="'.$data['avi86'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn87" type="txt"   name="avi87"  value="'.$data['avi87'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn88" type="txt"   name="avi88"  value="'.$data['avi88'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn89" type="txt"   name="avi89"  value="'.$data['avi89'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn90" type="txt"   name="avi90"  value="'.$data['avi90'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn91" type="txt"   name="avi91"  value="'.$data['avi91'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn92" type="txt"   name="avi92"  value="'.$data['avi92'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn93" type="txt"   name="avi93"  value="'.$data['avi93'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn94" type="txt"   name="avi94"  value="'.$data['avi94'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn95" type="txt"   name="avi95"  value="'.$data['avi95'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn96" type="txt"   name="avi96"  value="'.$data['avi96'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn97" type="txt"   name="avi97"  value="'.$data['avi97'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn98" type="txt"   name="avi98"  value="'.$data['avi98'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn99" type="txt"   name="avi99"  value="'.$data['avi99'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input type="hidden" name="WILAYA"     value="'.Session::get('wilaya').'"/>';
	echo '<input type="hidden" name="STRUCTURE"  value="'.Session::get('structure').'"/>';
	echo '<input type="hidden" name="STRUCTURED" value="'.Session::get('structure').'"/>';
	echo '<input type="hidden" name="login"      value="'.Session::get('login').'"/>';
	echo '<input id="submitavi" type="submit" />	'; 
	}
	
	//********************************************************************agenda*****************************************************************//

function nbre ($month,$d,$year,$str)
{
	$this->mysqlconnect();
	$dateLa = $year.'/'.$month.'/'.$d;
	$extraire = mysql_query("select * from rdv WHERE DATERDV='$dateLa' and   str='".$str."' ");
	$nbrEvents = mysql_numrows($extraire);
	if ($nbrEvents > 0) {$nbrEvents1='['.$nbrEvents.']';return $nbrEvents1;}else{$nbrEvents1='';return $nbrEvents1;}
}

function nbrtomois ($def_mois)
{
	switch($def_mois)  
	{
		case '01':{return "Janvier";}
		case '02':{return "Fevrier";}	
		case '03':{return "Mars";}	
		case '04':{return "Avril";}	
		case '05':{return "Mai";}	
		case '06':{return "Juin";}	
		case '07':{return "Juillet";}	
		case '08':{return "Aout";}	
		case '09':{return "Septembre";}	
		case '10':{return "Octobre";}	
		case '11':{return "Novombre";}	
		case '12':{return "Decembre";}			
	}
}

function agenda ($controleur,$str)
{
if (isset($this->userListviewa))   { $an   = $this->userListviewa; }  else {$an   = date("Y");}
if (isset($this->userListviewm))   { $mois = $this->userListviewm; }  else {$mois = date("n");}
// if (isset($this->userListviewd))   { $jour = $this->userListviewd; }  else {$jour = date("d");}  ne pas utiliser  car il fait disparaitre la case verte du jour 
$jour = date("d");
$debut = mktime(0,0,0,$mois,1,$an);    
$premJour = date("w" , $debut );    //1er jour dans la grille 
$nbJours = date("t" , $debut);      //nb de jours dans le mois
$numero_semaine=date("W");         //nbr de semaine 
$jour_semaine=date("w",mktime(0,0,0,$mois,1,$an)); // Jour de la semaine au format numê³©que 0 (pour dimanche) à ¶ (pour samedi)
$nbEmptyCells = ($premJour + 6)%7;

//partie agendat 
echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"9\" class=\"tableaux_centrer1\" ";
    if ($mois == 1)  {$prec = URL.$controleur.'/Agenda/1/12/'.($this->userListviewa-1);} else {$prec = URL.$controleur.'/Agenda/1/'.($this->userListviewm-1).'/'.$an;}
	if ($mois == 12) {$suiv = URL.$controleur.'/Agenda/1/1/'.($this->userListviewa+1);}  else {$suiv = URL.$controleur.'/Agenda/1/'.($this->userListviewm+1).'/'.$an;}
	echo "<tr class=\"calendar\"><td><a  title=\"Mois précedent\"  href=".$prec."><img src='".URL.'public/images/icons/b_firstpage.png'."' width='16' height='16' border='0' alt=''/></a></td><td colspan=\"5\">".$this->nbrtomois ($mois)." ".$an."</td><td><a title=\"Mois suivant\"   href=".$suiv."><img src='".URL.'public/images/icons/b_lastpage.png'."' width='16' height='16' border='0' alt=''/></td></tr>\n";
	echo "<tr class=\"calendar1\"><td>Lundi</td><td>Mardi</td><td>Mercredi</td><td>Jeudi</td><td>Vendredi</td><td>Samedi</td><td>Dimanche</td></tr>\n";
	echo "<tr>" ;
		for ($i=1;$i<=$nbEmptyCells;$i++) 
		{
			echo "<td class=\"cell_vide\">&nbsp;</td>\n";
		}
		for ($i=1;$i<=$nbJours;$i++) 
		{
			$dimanche=($i+$jour_semaine-1)%7;
			if ( $i==$jour && $mois == date("m") && $an == date("Y") ) {
			
			   $day_link = "<a class=\"todaya\" title=\"today\"   href=\"".URL.$controleur.'/Agenda/'.$i.'/'.$mois.'/'.$an."\" >$i  </a> <font size=\"1\"><sup>".$this->nbre ($mois,$i,$an,$str)." </sup></font>  ";
			   echo "<td class=\"today\">".$day_link."</td>\n";
			}
			else if ($dimanche==5) 
			{
			    $day_link = "<a href=\"".URL.$controleur.'/Agenda/'.$i.'/'.$mois.'/'.$an."\"  title=\"Jour weekend\" >$i   </a> <sup>".$this->nbre ($mois,$i,$an,$str)."</sup> ";
			    echo "<td class=\"dimanche\">".$day_link."</td>\n";    
			}
			else if ($dimanche==6) 
			{
			    $day_link = "<a href=\"".URL.$controleur.'/Agenda/'.$i.'/'.$mois.'/'.$an."\"  title=\"Jour weekend\" >$i   </a> <sup>".$this->nbre ($mois,$i,$an,$str)."</sup> ";
			    echo "<td class=\"dimanche\">".$day_link."</td>\n";    
			}
			else 
			{
			     $day_link = "<a href=\"".URL.$controleur.'/Agenda/'.$i.'/'.$mois.'/'.$an."\" title=\"Jour ouvrable\"  >$i  </a> <font size=\"1\"><sup>".$this->nbre ($mois,$i,$an,$str)." </sup></font>   ";
			     echo "<td class=\"calendar\">".$day_link."</td>\n";
			}
			if ( ($i+$nbEmptyCells)%7 == 0 ) 
			{
	echo "</tr>";
	
	echo "\n<tr>";
		    }
	    }
	$nbEmptyCells = 7 - ($nbEmptyCells + $nbJours)%7;
	if ($nbEmptyCells < 7) 
	{
		for ($i=1;$i<=$nbEmptyCells;$i++) 
		{
			echo "<td class=\"cell_vide\">&nbsp;</td>\n";
		}
	echo "</tr>\n";
	}
echo "</table>\n";

}		
//*************************************************************************************************************************************//	
}



?>

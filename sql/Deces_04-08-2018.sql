-- ----------------------
-- dump de la base framework au 04-Aug-2018
-- ----------------------


-- -----------------------------
-- Structure de la table bordereau
-- -----------------------------
CREATE TABLE `bordereau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mois` int(50) NOT NULL,
  `annee` int(10) NOT NULL,
  `WILAYAD` int(10) NOT NULL,
  `COMMUNED` int(10) NOT NULL,
  `nm1` int(50) NOT NULL,
  `nf1` int(50) NOT NULL,
  `nm2` int(50) NOT NULL,
  `nf2` int(50) NOT NULL,
  `mnm1` int(50) NOT NULL,
  `mnf1` int(50) NOT NULL,
  `m1` int(50) NOT NULL,
  `m2` int(50) NOT NULL,
  `djm1` int(50) NOT NULL,
  `djf1` int(50) NOT NULL,
  `dm1` int(50) NOT NULL,
  `df1` int(50) NOT NULL,
  `dm2` int(50) NOT NULL,
  `df2` int(50) NOT NULL,
  `dm3` int(50) NOT NULL,
  `df3` int(50) NOT NULL,
  `dm4` int(50) NOT NULL,
  `df4` int(50) NOT NULL,
  `dm5` int(50) NOT NULL,
  `df5` int(50) NOT NULL,
  `dm6` int(50) NOT NULL,
  `df6` int(50) NOT NULL,
  `dm7` int(50) NOT NULL,
  `df7` int(50) NOT NULL,
  `dm8` int(50) NOT NULL,
  `df8` int(50) NOT NULL,
  `dm9` int(50) NOT NULL,
  `df9` int(50) NOT NULL,
  `dm10` int(50) NOT NULL,
  `df10` int(50) NOT NULL,
  `dm11` int(50) NOT NULL,
  `df11` int(50) NOT NULL,
  `dm12` int(50) NOT NULL,
  `df12` int(50) NOT NULL,
  `dm13` int(50) NOT NULL,
  `df13` int(50) NOT NULL,
  `dm14` int(50) NOT NULL,
  `df14` int(50) NOT NULL,
  `dm15` int(50) NOT NULL,
  `df15` int(50) NOT NULL,
  `dm16` int(50) NOT NULL,
  `df16` int(50) NOT NULL,
  `dm17` int(50) NOT NULL,
  `df17` int(50) NOT NULL,
  `dm18` int(50) NOT NULL,
  `df18` int(50) NOT NULL,
  `dm19` int(50) NOT NULL,
  `df19` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=222 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Structure de la table categories
-- -----------------------------
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- -----------------------------
-- Structure de la table chapitre
-- -----------------------------
CREATE TABLE `chapitre` (
  `IDCHAP` int(11) NOT NULL AUTO_INCREMENT,
  `CHAP` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDCHAP`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Structure de la table cim
-- -----------------------------
CREATE TABLE `cim` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_mal` char(9) DEFAULT NULL,
  `diag_cod` char(10) DEFAULT NULL,
  `diag_nom` varchar(100) DEFAULT NULL,
  `c_s_cha` char(4) DEFAULT NULL,
  `c_chapi` int(2) DEFAULT NULL,
  `c_titre` char(6) DEFAULT NULL,
  `cod_prog` char(15) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2022 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Structure de la table com
-- -----------------------------
CREATE TABLE `com` (
  `IDCOM` int(11) NOT NULL AUTO_INCREMENT,
  `COMMUNE` varchar(255) DEFAULT NULL,
  `IDWIL` int(11) DEFAULT '0',
  `yes` int(5) NOT NULL,
  `SUPER` float NOT NULL,
  `POPULATION` int(50) NOT NULL,
  `communear` varchar(50) NOT NULL,
  PRIMARY KEY (`IDCOM`)
) ENGINE=MyISAM AUTO_INCREMENT=2337 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Structure de la table deceshosp
-- -----------------------------
CREATE TABLE `deceshosp` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `WILAYAD` int(20) NOT NULL,
  `COMMUNED` int(20) NOT NULL,
  `STRUCTURED` int(50) NOT NULL,
  `NOM` varchar(40) NOT NULL,
  `PRENOM` varchar(40) NOT NULL,
  `FILSDE` varchar(50) NOT NULL,
  `ETDE` varchar(20) NOT NULL,
  `SEX` varchar(10) NOT NULL,
  `DATENAISSANCE` varchar(30) NOT NULL,
  `Days` int(50) NOT NULL,
  `Weeks` int(50) NOT NULL,
  `Months` int(50) NOT NULL,
  `Years` int(50) NOT NULL,
  `WILAYA` int(40) NOT NULL,
  `WILAYAR` int(20) NOT NULL,
  `COMMUNE` int(40) NOT NULL,
  `COMMUNER` int(40) NOT NULL,
  `ADRESSE` varchar(50) NOT NULL,
  `CD` varchar(20) NOT NULL,
  `LD` varchar(20) NOT NULL,
  `AUTRES` varchar(20) NOT NULL,
  `OMLI` varchar(20) NOT NULL,
  `MIEC` varchar(20) NOT NULL,
  `EPFP` varchar(20) NOT NULL,
  `CIM1` varchar(150) NOT NULL,
  `CIM2` varchar(150) NOT NULL,
  `CIM3` varchar(150) NOT NULL,
  `CIM4` varchar(150) NOT NULL,
  `CIM5` varchar(150) NOT NULL,
  `NDLM` varchar(20) NOT NULL,
  `NDLMAAP` varchar(50) NOT NULL,
  `GM` varchar(10) NOT NULL,
  `MN` varchar(10) NOT NULL,
  `AGEGEST` int(10) NOT NULL,
  `POIDNSC` float NOT NULL,
  `AGEMERE` int(20) NOT NULL,
  `DPNAT` varchar(10) NOT NULL,
  `EMDPNAT` varchar(20) NOT NULL,
  `DECEMAT` int(10) NOT NULL,
  `GRS` varchar(20) NOT NULL,
  `POSTOPP` varchar(20) NOT NULL,
  `DATEHOSPI` varchar(50) NOT NULL,
  `HEURESHOSPI` varchar(50) NOT NULL,
  `SERVICEHOSPIT` int(10) NOT NULL,
  `DUREEHOSPIT` int(10) NOT NULL,
  `MEDECINHOSPIT` varchar(50) NOT NULL,
  `CODECIM0` int(11) NOT NULL,
  `CODECIM` int(20) NOT NULL,
  `CRS` int(50) NOT NULL COMMENT 'CENTRE REGIONALE DUSANG',
  `WRS` int(50) NOT NULL COMMENT 'WILAYA REGIONAL DU SANG',
  `SRS` int(50) NOT NULL COMMENT 'STRUCTURE DU SANG',
  `USER` varchar(50) NOT NULL COMMENT 'UTILISATEUR STRUCTURE',
  `DINS` varchar(50) NOT NULL COMMENT 'date inscription',
  `HINS` varchar(50) NOT NULL COMMENT 'heure inscription',
  `NOMAR` varchar(50) NOT NULL,
  `PRENOMAR` varchar(50) NOT NULL,
  `FILSDEAR` varchar(50) NOT NULL,
  `ETDEAR` varchar(50) NOT NULL,
  `NOMPRENOMAR` varchar(50) NOT NULL,
  `PROAR` varchar(50) NOT NULL,
  `ADAR` varchar(50) NOT NULL,
  `Profession` int(10) NOT NULL,
  `aprouve` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cust_name_idx` (`NOM`)
) ENGINE=MyISAM AUTO_INCREMENT=14863 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Structure de la table medecindeces
-- -----------------------------
CREATE TABLE `medecindeces` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `wilaya` int(50) NOT NULL,
  `structure` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Structure de la table naissance
-- -----------------------------
CREATE TABLE `naissance` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `WILAYAD` int(20) NOT NULL,
  `COMMUNED` int(20) NOT NULL,
  `STRUCTURED` int(50) NOT NULL,
  `NOM` varchar(40) NOT NULL,
  `PRENOM` varchar(40) NOT NULL,
  `FILSDE` varchar(50) NOT NULL,
  `ETDE` varchar(20) NOT NULL,
  `SEX` varchar(10) NOT NULL,
  `DATENAISSANCE` varchar(30) NOT NULL,
  `Days` int(50) NOT NULL,
  `Weeks` int(50) NOT NULL,
  `Months` int(50) NOT NULL,
  `Years` int(50) NOT NULL,
  `WILAYA` int(40) NOT NULL,
  `WILAYAR` int(20) NOT NULL,
  `COMMUNE` int(40) NOT NULL,
  `COMMUNER` int(40) NOT NULL,
  `ADRESSE` varchar(50) NOT NULL,
  `CD` varchar(20) NOT NULL,
  `LD` varchar(20) NOT NULL,
  `AUTRES` varchar(20) NOT NULL,
  `OMLI` varchar(20) NOT NULL,
  `MIEC` varchar(20) NOT NULL,
  `EPFP` varchar(20) NOT NULL,
  `CIM1` varchar(150) NOT NULL,
  `CIM2` varchar(150) NOT NULL,
  `CIM3` varchar(150) NOT NULL,
  `CIM4` varchar(150) NOT NULL,
  `CIM5` varchar(150) NOT NULL,
  `NDLM` varchar(20) NOT NULL,
  `NDLMAAP` varchar(50) NOT NULL,
  `GM` varchar(10) NOT NULL,
  `MN` varchar(10) NOT NULL,
  `AGEGEST` int(10) NOT NULL,
  `POIDNSC` float NOT NULL,
  `AGEMERE` int(20) NOT NULL,
  `DPNAT` varchar(10) NOT NULL,
  `EMDPNAT` varchar(20) NOT NULL,
  `DECEMAT` int(10) NOT NULL,
  `GRS` varchar(20) NOT NULL,
  `POSTOPP` varchar(20) NOT NULL,
  `DATEHOSPI` varchar(50) NOT NULL,
  `HEURESHOSPI` varchar(50) NOT NULL,
  `SERVICEHOSPIT` int(10) NOT NULL,
  `DUREEHOSPIT` int(10) NOT NULL,
  `MEDECINHOSPIT` varchar(50) NOT NULL,
  `CODECIM0` int(11) NOT NULL,
  `CODECIM` int(20) NOT NULL,
  `CRS` int(50) NOT NULL COMMENT 'CENTRE REGIONALE DUSANG',
  `WRS` int(50) NOT NULL COMMENT 'WILAYA REGIONAL DU SANG',
  `SRS` int(50) NOT NULL COMMENT 'STRUCTURE DU SANG',
  `USER` varchar(50) NOT NULL COMMENT 'UTILISATEUR STRUCTURE',
  `DINS` varchar(50) NOT NULL COMMENT 'date inscription',
  `HINS` varchar(50) NOT NULL COMMENT 'heure inscription',
  `NOMAR` varchar(50) NOT NULL,
  `PRENOMAR` varchar(50) NOT NULL,
  `FILSDEAR` varchar(50) NOT NULL,
  `ETDEAR` varchar(50) NOT NULL,
  `NOMPRENOMAR` varchar(50) NOT NULL,
  `PROAR` varchar(50) NOT NULL,
  `ADAR` varchar(50) NOT NULL,
  `Profession` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- -----------------------------
-- Structure de la table profession
-- -----------------------------
CREATE TABLE `profession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Profession` varchar(100) NOT NULL,
  `Professionar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Structure de la table servicedeces
-- -----------------------------
CREATE TABLE `servicedeces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Structure de la table structure
-- -----------------------------
CREATE TABLE `structure` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `structure` varchar(50) NOT NULL,
  `idwil` int(50) NOT NULL,
  `commune` int(50) NOT NULL,
  `structurear` varchar(50) NOT NULL,
  `daira` varchar(50) NOT NULL,
  `numcom` int(50) NOT NULL,
  `com` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- -----------------------------
-- Structure de la table users
-- -----------------------------
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('default','admin','owner') NOT NULL DEFAULT 'default',
  `Email` varchar(50) NOT NULL,
  `wilaya` int(50) NOT NULL,
  `structure` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- -----------------------------
-- Structure de la table wil
-- -----------------------------
CREATE TABLE `wil` (
  `IDWIL` int(11) NOT NULL DEFAULT '0',
  `WILAYAS` varchar(32) DEFAULT NULL,
  `WILAYASAR` varchar(50) DEFAULT NULL,
  `SUPER` int(100) NOT NULL,
  `POPULATION` int(100) NOT NULL,
  PRIMARY KEY (`IDWIL`),
  KEY `IDWIL` (`IDWIL`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




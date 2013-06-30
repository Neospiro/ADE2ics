<?php



/*** Fonctions utiles ***/



// get et post request magiques

function postRequest($page, $data) {

	$c = curl_init();

	curl_setopt($c, CURLOPT_URL, $page);

	curl_setopt($c, CURLOPT_HEADER, false);

	curl_setopt($c, CURLOPT_POST, true);

	curl_setopt($c, CURLOPT_POSTFIELDS, $data);

	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);

	curl_setopt($c, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; U; Linux i686; fr; rv:1.9.1.5) Gecko/20091109 Ubuntu/9.10 (karmic) Firefox/3.5.5");

	curl_setopt($c, CURLOPT_COOKIEJAR, realpath("cookie.txt"));

	curl_setopt($c, CURLOPT_COOKIEFILE, realpath("cookie.txt"));

	$r = curl_exec ($c);

	curl_close ($c);

	return $r;

}



function getRequest($page) {

	$c = curl_init();

	curl_setopt($c, CURLOPT_URL, $page);

	curl_setopt($c, CURLOPT_HEADER, false);

	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);

	curl_setopt($c, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; U; Linux i686; fr; rv:1.9.1.5) Gecko/20091109 Ubuntu/9.10 (karmic) Firefox/3.5.5");

	curl_setopt($c, CURLOPT_COOKIEJAR, realpath("cookie.txt"));

	curl_setopt($c, CURLOPT_COOKIEFILE, realpath("cookie.txt"));

	$r = curl_exec ($c);

	curl_close ($c);

	return $r;

}



// rajoute un 0 devant un nombre si n<10 (9 -> 09 et 12 -> 12)

function int2str($int) {

	if($int < 10) $r = "0".$int;

	else $r = "".$int;

	return $r;

}





/*** Détection de divers paramètres ***/



// le groupe, par défaut 1230 (s2d1)

if(preg_match("#^[0-9]+$#", $_GET["c"])) $c = $_GET["c"];

else{ 

		header('Content-type: text/html; charset=utf-8');

		die("<html><head><title>Nombre non trouvée</title></head><body>Nombre '{$_GET["c"]}' non trouvée, contactez l'administrateur. Moi.</body></html>");

	};







include "list.php";

/*** Le super code de la mOOrt ***/

/*if($_GET["loc"]=="grenoble"){

 

 $loc = array("url" => "http://www-ade.iut2.upmf-grenoble.fr",

			"login"=>"WebINFO",

			"pass"=>"MPINFO",

			"conf"=>"Vue_Web_INFO_Etudiant",

			"projectId"=>"3");

*/

			if($_GET["loc"]=="uds"){

//http://ade52-savoie.grenet.fr/ade/custom/modules/plannings/direct_planning.jsp?projectId=1&login=ETUDIANT&password=etsa&displayConfName=Consultation%20Portail

 $loc = array("url"=>"http://ade52-savoie.grenet.fr",

 "login"=>"ETUDIANT",

 "pass"=>"etsa",

 "conf"=>"Consultation%20Portail",

 "projectId"=>"1");



}elseif($_GET["loc"]=="inpg"){



 $loc = array("url"=>"http://ade52-inpg.grenet.fr",

 "login"=>"voirPHELMA",

 "pass"=>"phelma",

 "conf"=>"",

 "projectId"=>"24");



 }else{
include "sql_config.php";
mysql_connect($sql_config["server"],$sql_config["user"] ,$sql_config["pass"] ) or die('{"erreur":1, "message":"Impossible de se connecter a la Base de Données"}');
mysql_select_db($sql_config["db"]);

$r=mysql_query("SELECT * FROM ade2ics WHERE title='".mysql_escape_string($_GET["loc"])."';");

if(mysql_num_rows($r)!=0){

	$d=mysql_fetch_array($r);

	$loc = array("url"=>$d["url"],

 "login"=>$d["login"],

 "pass"=>$d["pass"],

 "conf"=>$d["conf"],

  "confid"=>$d["confid"],

 "projectId"=>$d["projectId"]);

mysql_close();

}

	 else{ 

		header('Content-type: text/html; charset=utf-8');

		die("<html><head><title>Localisation non trouvée</title></head><body>Localisation '{$_GET["loc"]}' non trouvée, contactez l'administrateur. Moi.</body></html>");

	}

}





///ade/custom/modules/plannings/direct_planning.jsp?projectId=24&login=voirPHELMA&password=phelma



/*

projectId=6&login=ETUDIANT&password=etsa&displayConfName=Consultation%20Portail



*/



// On demande une fois l'emploi du temps avec en paramètre toutes les semaines (de 1 à 47), et avec le numéro du groupe

getRequest("{$loc["url"]}/ade/custom/modules/plannings/direct_planning.jsp?resources={$c}&weeks=1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47&showTree=false&showPianoDays=true&login={$loc["login"]}&password={$loc["pass"]}&projectId={$loc["projectId"]}&displayConfName={$loc["conf"]}&displayConfld={$loc["confid"]}&showOptions=false&showPianoWeeks=true&days=0,1,2,3,4,5");



/*

// On règle les options pour que le tableau qui affiche les cours n'affiche que ce qui nous intéresse, date, heure, durée, prof, matière etc..

postRequest("{$loc["url"]}/ade/custom/modules/plannings/direct_planning.jsp?keepSelection&showTree=false", "c5A1=false&c5A2=false&c5C=false&c5Ci=false&c5Ct=false&c5Cx=false&c5Cy=false&c5Cz=false&c5E=false&c5F=false&c5J=false&c5M=false&c5St=false&c5T=false&c5Ty=false&c5Tz=false&c5Url=false&c5Zp=false&c6A1=false&c6A2=false&c6C=false&c6Ci=false&c6Ct=false&c6Cx=false&c6Cy=false&c6Cz=false&c6E=false&c6F=false&c6J=false&c6M=false&c6St=false&c6T=false&c6Ty=false&c6Tz=false&c6Url=false&c6Zp=false&c7A1=false&c7A2=false&c7C=false&c7Ci=false&c7Ct=false&c7Cx=false&c7Cy=false&c7Cz=false&c7E=false&c7F=false&c7J=false&c7M=false&c7St=false&c7T=false&c7Ty=false&c7Tz=false&c7Url=false&c7Zp=false&c8A1=false&c8A2=false&c8C=false&c8Ci=false&c8Ct=false&c8Cx=false&c8Cy=false&c8Cz=false&c8E=false&c8F=false&c8J=false&c8M=false&c8St=false&c8T=false&c8Ty=false&c8Tz=false&c8Url=false&c8Zp=false&changeOptions=true&display=true&displayConfId=48&displayType=0&iA1=false&iA2=false&iC=false&iCi=false&iCt=false&iCx=false&iCy=false&iCz=false&iE=false&iF=false&iJ=false&iM=false&iSt=false&iT=false&iTy=false&iTz=false&iUrl=false&iZp=false&isClickable=true&reA1=false&reA2=false&reC=false&reCi=false&reCt=false&reCx=false&reCy=false&reCz=false&reE=false&reF=false&reJ=false&reM=false&reSt=false&reT=false&reTy=false&reTz=false&reUrl=false&reZp=false&roA1=false&roA2=false&roC=false&roCi=false&roCt=false&roCx=false&roCy=false&roCz=false&roE=false&roF=false&roJ=false&roM=false&roSt=false&roT=false&roTy=false&roTz=false&roUrl=false&roZp=false&sA1=false&sA2=false&sC=false&sCi=false&sCt=false&sCx=false&sCy=false&sCz=false&sE=false&sF=false&sJ=false&sM=false&sSt=false&sT=false&sTy=false&sTz=false&sUrl=false&sZp=false&showImage=true&showLoad=false&showPianoDays=true&showPianoWeeks=true&showTab=true&showTabActivity=true&showTabCategory5=false&showTabCategory6=false&showTabCategory7=false&showTabCategory8=false&showTabDate=true&showTabDuration=true&showTabHour=true&showTabInstructors=true&showTabResources=false&showTabRooms=true&showTabTrainees=false&x=&y");

// On récupère le tableau avec tous les cours de l'année dessus

$pagecours = getRequest("{$loc["url"]}/ade/custom/modules/plannings/info.jsp?light=true&order=slot");



// Entête du fichier ICS

$ics ="BEGIN:VCALENDAR

VERSION:2.0

PRODID:-//Jeb//edt.pl//EN

BEGIN:VTIMEZONE

X-WR-CALNAME:ADE2ics

TZID:\"GMT +0100 (Standard) / GMT +0200 (Daylight)\"

END:VTIMEZONE

METHOD:PUBLISH";



// Date du jour au format ICS

$today = date("Ymd")."T".date("His")."Z";



// PARSING POWWWWWWWWWAAAAAAAAAAA

preg_match_all("#<tr><td><SPAN CLASS=\"value\">.+</tr>#U", $pagecours, $matches);



foreach ($matches[0] as $i => $value) {

	preg_match("#javascript:ev\(([0-9]+)\)\">#U", $value, $match);

	$id = time().'000'.$match[1];

	preg_match("#<SPAN CLASS=\"value\">(.+)</span>#U", $value, $match);

	$date = explode("/", $match[1]);

	$date = array_reverse($date);

//############################### REVEIL

	if((isset($_GET["reveil"]) && !isset($last_date) || ($date[0]!=$last_date[0] || $date[1]!=$last_date[1] || $date[2]!=$last_date[2]))

	OR (isset($_GET["noreveil"]) && isset($last_date) && ($date[0]==$last_date[0] && $date[1]==$last_date[1] && $date[2]==$last_date[2])) or (!isset($_GET["noreveil"]) && !isset($_GET["reveil"])))

	{

	

	

	preg_match("#:ev\([0-9]+\)\">(.+)</a>#U", $value, $match);

	$matiere = $match[1];

	if(isset($code["".$_GET["loc"]]["".$match[1]])){

		$matiere = utf8_decode( $code["".$_GET["loc"]]["".$match[1]] );

	}

	$le_link="[unknown]";//isset($link["".$_GET["loc"]]["BASEURL"]) && 

	if(isset($link["".$_GET["loc"]]["".$match[1]])){

		$le_link=str_replace("%NUM%", $link["".$_GET["loc"]]["".$match[1]], $link["".$_GET["loc"]]["BASEURL"]);

	}

	preg_match_all("#<td>(.*)</td>#U", $value, $match);

	$heure = trim($match[1][2]);

	$duree = trim($match[1][3]);

	$hd = explode(":", str_replace("h", ":", $heure));

	if(substr_count($duree, "h") > 0) $hf = explode("h", $duree);

	else $hf = array(0, $duree);

	if($hf[1]) $hf[1] = str_replace("min", "", $hf[1]);

	else $hf[1] = 0;

	$hf[0] += $hd[0];

	$hf[1] += $hd[1];

	if($hf[1] >= 60) {

		$hf[1] -= 60;

		$hf[0] += 1;

	}

	$salle = trim($match[1][5]);

	$prof = trim($match[1][4]);

	$addit = true;

	if($ismaarx && preg_match("#^PT gr 2[^5]$#", $matiere)) {

		$addit = false;

	}

	if($addit) $ics .= "

BEGIN:VEVENT

DTSTART;TZID=Europe/Paris:".implode("", $date)."T".$hd[0].$hd[1]."00

DTEND;TZID=Europe/Paris:".implode("", $date)."T".int2str($hf[0]).int2str($hf[1])."00

SUMMARY:$matiere

DTSTAMP:$today

UID:cours-$id

DESCRIPTION:Salle : $salle\\nEnseignants : $prof\\nCours : $matiere\\nLien : $le_link\\n

LOCATION:$salle

END:VEVENT";

	}

	$last_date=$date;

}



// Fin ICS

$ics .= "

END:VCALENDAR";



// Entête de la page pour dire que la page envoyé est à la sauce ICS

header('Content-type: text/calendar; charset=utf-8');

header('Content-Disposition: inline;');



// Nom du fichier de log (pour si l'ADE est dead)

$filename = "log/cours/$c-{$_GET["loc"]}";



if($ismaarx) $filename .= "-mrx";

$filename .= ".ics";

if($i > 30) { // Si il y a eu plus de 30 evenements, on peut dire que ça a marché, donc on sauvegarde dans le log

	file_put_contents($filename, $ics);

}

elseif(file_exists($filename)) { // Sinon on recharge l'ancien log

	

	$ics = file_get_contents($filename);



}

// On envoi la sauce !

echo utf8_encode($ics);

// */

header('Content-type: text/calendar; charset=utf-8');

header('Content-Disposition: inline;');

// Nom du fichier de log (pour si l'ADE est dead)

$filename = "log/cours/$c-{$_GET["loc"]}.ics";







$m=intval(date("m"));

$y=intval(date("Y"));

if($m<9) $y--;

$loc["année"]=$y;

$loc["mois"]=$m;

$pagecours = postRequest("{$loc["url"]}/ade/custom/modules/plannings/ical.jsp","startDay=1&startMonth=9&startYear=".$y."&endDay=1&endMonth=9&endYear=".($y+1)."&ClientCal=outlook");

$pagecours=trim($pagecours);

if(strncasecmp($pagecours, "BEGIN:", 6)!=0){

	header("location:cours2-".$_GET["loc"]."-".$_GET["c"]."-".time().".ics");

	$pagecours.=json_encode($loc);

	echo $pagecours;

	die;

}



if(strlen($pagecours) > 300) { // Si il y a eu plus de 30 evenements, on peut dire que ça a marché, donc on sauvegarde dans le log

	file_put_contents($filename, $pagecours);

}

elseif(file_exists($filename)) { // Sinon on recharge l'ancien log

	

	//$pagecours = file_get_contents($filename);

	header("location:cours2-".$_GET["loc"]."-".$_GET["c"]."-".time().".ics");



}





echo $pagecours;

//echo utf8_decode($pagecours);

?>
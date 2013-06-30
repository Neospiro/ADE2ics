<?php
header('Content-type: text/json;charset=utf-8');
/*** Fonctions utiles ***/
//$_POST=$_GET;
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
if(preg_match("#^[0-9]+$#", $_POST["c"])) $c = $_POST["c"];
else exit('{"erreur":"1","message":"Veuillez spécifier un numero"}');

include "list.php";
/*** Le super code de la mOOrt ***/
if($_POST["loc"]=="grenoble"){
 
 $loc = array("url" => "http://www-ade.iut2.upmf-grenoble.fr",
			"login"=>"WebINFO",
			"pass"=>"MPINFO",
			"conf"=>"Vue_Web_INFO_Etudiant",
			"projectId"=>"3");
 
}elseif($_POST["loc"]=="uds"){
//http://ade52-savoie.grenet.fr/ade/custom/modules/plannings/direct_planning.jsp?projectId=1&login=ETUDIANT&password=etsa&displayConfName=Consultation%20Portail
 $loc = array("url"=>"http://ade52-savoie.grenet.fr",
 "login"=>"ETUDIANT",
 "pass"=>"etsa",
 "conf"=>"Consultation%20Portail",
 "projectId"=>"1");

}elseif($_POST["loc"]=="inpg"){

 $loc = array("url"=>"http://ade52-inpg.grenet.fr",
 "login"=>"voirPHELMA",
 "pass"=>"phelma",
 "conf"=>"",
 "projectId"=>"24");

 }else{
include "sql_config.php";
mysql_connect($sql_config["server"],$sql_config["user"] ,$sql_config["pass"] ) or die('{"erreur":1, "message":"Impossible de se connecter a la Base de Données"}');
mysql_select_db($sql_config["db"]);
$r=mysql_query("SELECT * FROM ade2ics WHERE title='".mysql_real_escape_string($_POST["loc"])."';");
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
		header('Content-type: text/json;');
		die('{"erreur":"1","message":"Emploi du temps non connu"}');
	}
}


///ade/custom/modules/plannings/direct_planning.jsp?projectId=24&login=voirPHELMA&password=phelma

/*
projectId=6&login=ETUDIANT&password=etsa&displayConfName=Consultation%20Portail

*/

// On demande une fois l'emploi du temps avec en paramètre toutes les semaines (de 1 à 47), et avec le numéro du groupe
getRequest("{$loc["url"]}/ade/custom/modules/plannings/direct_planning.jsp?resources=$c&weeks=1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47&showTree=false&showPianoDays=true&login={$loc["login"]}&password={$loc["pass"]}&projectId={$loc["projectId"]}&displayConfName={$loc["conf"]}&displayConfld={$loc["confid"]}&showOptions=false&showPianoWeeks=true&days=0,1,2,3,4,5");


// On règle les options pour que le tableau qui affiche les cours n'affiche que ce qui nous intéresse, date, heure, durée, prof, matière etc..
postRequest("{$loc["url"]}/ade/custom/modules/plannings/direct_planning.jsp?keepSelection&showTree=false", "c5A1=false&c5A2=false&c5C=false&c5Ci=false&c5Ct=false&c5Cx=false&c5Cy=false&c5Cz=false&c5E=false&c5F=false&c5J=false&c5M=false&c5St=false&c5T=false&c5Ty=false&c5Tz=false&c5Url=false&c5Zp=false&c6A1=false&c6A2=false&c6C=false&c6Ci=false&c6Ct=false&c6Cx=false&c6Cy=false&c6Cz=false&c6E=false&c6F=false&c6J=false&c6M=false&c6St=false&c6T=false&c6Ty=false&c6Tz=false&c6Url=false&c6Zp=false&c7A1=false&c7A2=false&c7C=false&c7Ci=false&c7Ct=false&c7Cx=false&c7Cy=false&c7Cz=false&c7E=false&c7F=false&c7J=false&c7M=false&c7St=false&c7T=false&c7Ty=false&c7Tz=false&c7Url=false&c7Zp=false&c8A1=false&c8A2=false&c8C=false&c8Ci=false&c8Ct=false&c8Cx=false&c8Cy=false&c8Cz=false&c8E=false&c8F=false&c8J=false&c8M=false&c8St=false&c8T=false&c8Ty=false&c8Tz=false&c8Url=false&c8Zp=false&changeOptions=fasle&display=fasle&displayConfId=48&displayType=0&iA1=false&iA2=false&iC=false&iCi=false&iCt=false&iCx=false&iCy=false&iCz=false&iE=false&iF=false&iJ=false&iM=false&iSt=false&iT=false&iTy=false&iTz=false&iUrl=false&iZp=false&isClickable=fasle&reA1=false&reA2=false&reC=false&reCi=false&reCt=false&reCx=false&reCy=false&reCz=false&reE=false&reF=false&reJ=false&reM=false&reSt=false&reT=false&reTy=false&reTz=false&reUrl=false&reZp=false&roA1=false&roA2=false&roC=false&roCi=false&roCt=false&roCx=false&roCy=false&roCz=false&roE=false&roF=false&roJ=false&roM=false&roSt=false&roT=false&roTy=false&roTz=false&roUrl=false&roZp=false&sA1=false&sA2=false&sC=false&sCi=false&sCt=false&sCx=false&sCy=false&sCz=false&sE=false&sF=false&sJ=false&sM=false&sSt=false&sT=false&sTy=false&sTz=false&sUrl=false&sZp=false&showImage=fasle&showLoad=false&showPianoDays=fasle&showPianoWeeks=fasle&showTab=fasle&showTabActivity=fasle&showTabCategory5=false&showTabCategory6=false&showTabCategory7=false&showTabCategory8=false&showTabDate=fasle&showTabDuration=fasle&showTabHour=fasle&showTabInstructors=fasle&showTabResources=false&showTabRooms=fasle&showTabTrainees=true&x=&y");
// On récupère le tableau avec tous les cours de l'année dessus
$pagecours = getRequest("{$loc["url"]}/ade/custom/modules/plannings/info.jsp?light=true&order=slot");


// PARSING POWWWWWWWWWAAAAAAAAAAA
preg_match_all("#<td>.+</td>#U", $pagecours, $matches);
$names=array();
$number=0;
foreach ($matches[0] as $i => $value) {
	if(preg_match("#<td>([a-zA-Z0-9\-\_ ]+)<\/td>#U", $value, $match)){
		$find=explode(" ", $match[1]); 
		foreach($find as $f){
			if(!in_array($f, $names)){
					$names[sizeof($names)]=$f;
			}
		}
		$number++;
	}
}

$retour=array();
$retour["noms"]=implode(", ",$names);
$retour["erreur"]=0;
$retour["number"]=$number;
$retour["debug"]["page"]=$pagecours;
$retour["debug"]["post"]=$_POST;
$retour["debug"]["url"]="{$loc["url"]}/ade/custom/modules/plannings/direct_planning.jsp?resources=$c&weeks=1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47&showTree=false&showPianoDays=true&login={$loc["login"]}&password={$loc["pass"]}&projectId={$loc["projectId"]}&displayConfName={$loc["conf"]}&displayConfld={$loc["confid"]}&showOptions=false&showPianoWeeks=true&days=0,1,2,3,4,5";

echo json_encode($retour);
//echo utf8_encode($ics);
// */
?>

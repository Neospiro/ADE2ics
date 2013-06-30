<?php
/*
	UrlParser pour Ade2Ics
	Visitez Neospiro.fr !
*/
function s_bd($str) { //Fonction recursive de sécurité
    if (is_array($str)) {
        foreach ($str as $i => $s) {
            $str[$i] = s_bd($s);
        }
        return $str;
    } else {
        return trim(mysql_real_escape_string($str));
    }
}

$retour = array(); // Variable de stockage des données
$retour["erreur"] = 0; // "Erreur", 0 si tout va bien, 1 sinon.
if (!isset($_POST["url"]) OR $_POST["url"] == "") { // test de l'URL
    $retour["erreur"] = 1;
    $retour["message"] = "Erreur dans l'url";
    $retour["codeerror"] = "fakeurl";
    echo json_encode($retour);
    exit;
}

// Connection sql

$base_url = $_POST["url"];
$parsed_url = parse_url($base_url); //voir doc
$query = explode("&", $parsed_url["query"]); //récupération des query dans un tableau

foreach ($query as $i => $one) {
    $two = explode("=", $one);
    $query[$two[0]] = $two[1];
    unset($query[$i]);
}
 //Fin recupération. Début du stockage des données récupérées
$retour["url"] = $parsed_url["host"];
$retour["login"] = $query["login"];
$retour["pass"] = $query["password"];
$retour["conf"] = $query["displayConfName"];
$retour["confid"] = $query["displayConfld"];
$retour["projectId"] = $query["projectId"];
$retour["resources"] = $query["resources"];
//Verification des données
if($retour["url"]=="" ||
	$retour["login"]=="" ||
	$retour["pass"]=="" ||
	($retour["conf"]=="" && $retour["confid"]=="") ||
	$retour["projectId"]==""){
		
		$retour["erreur"]=3;
		echo json_encode($retour);
		exit;
		
}


/*foreach ($resources as $one) { //servais pour le débug
    $retour["resources"][sizeof($retour["resources"])] = $one;
}
//*/


include "sql_config.php";
mysql_connect($sql_config["server"],$sql_config["user"] ,$sql_config["pass"] ) or die('{"erreur":1, "message":"Impossible de se connecter a la Base de Données"}');
mysql_select_db($sql_config["db"]);

$retour = s_bd($retour);
//On vérifie que cet ADE est déjà enregistré
$r = mysql_query("SELECT * FROM ade2ics WHERE url='" . $retour["url"] . "' AND projectId='" . $retour["projectId"] . "' AND login='".$retour["login"]."';") or die(mysql_error());
if (mysql_num_rows($r) != 0) {
    $d = mysql_fetch_array($r);
if($retour["resources"]==""){
$retour["title"]=$d["title"];
$retour["erreur"]=3;
echo json_encode($retour);
exit;
}
$resources = explode(",", $query["resources"]);

    foreach ($resources as $i=>$one) {
        $agenda["url"][$i]["url"] = "http://ade2ics.neospiro.fr/cours-" . $d["title"] . "-" . $one . ".ics";
		$agenda["url"][$i]["c"] = $one ;
    }
	$agenda["title"]=$d["title"];
    $agenda["erreur"] = 0;
    echo json_encode($agenda);
    mysql_close();
    exit;
} else { //Sinon on s'occupe de la variable title
	$_POST["title"] = trim($_POST["title"]);
    if (!isset($_POST["title"]) OR $_POST["title"] == "" OR !preg_match("#^[a-z]+$#", $_POST["title"])) {
        $retour["erreur"] = 2;
        $retour["message"] = "Erreur dans le titre";
        $retour["codeerror"] = "faketitle";
        echo json_encode($retour);
        mysql_close();
        exit;
    }
//On vérifie que le titre est pas utilisé
    $title = mysql_escape_string($_POST["title"]);
    $r = mysql_query("SELECT * FROM ade2ics WHERE title='" . $title . "';");
    if (mysql_num_rows($r) != 0) {
        $retour["erreur"] = 2;
        $retour["message"] = "Titre déjà utilisé";
        $retour["codeerror"] = "_title";
        echo json_encode($retour);
        mysql_close();
        exit;
    }
//On enregistre toutes les données parsées
    $r = mysql_query("INSERT INTO ade2ics VALUES(0 , '" . $retour["url"] . "', '" . $retour["login"] . "', '" . $retour["pass"] . "', '" . $retour["conf"] . "', '" . $retour["confid"] . "', '" . $retour["projectId"] . "', '" . $title . "');") or die('{"erreur":1, "Contactez l\'administrateur"}');
    if($retour["resources"]==""){
		$retour["title"]=$title;
		$retour["erreur"]=3;
		echo json_encode($retour);
		exit;
	}
	$resources = explode(",", $query["resources"]);
	foreach ($resources as $i => $one) {
        $agenda["url"][$i]["url"] = "http://ade2ics.neospiro.fr/cours-" . $title . "-" . $one . ".ics";
		$agenda["url"][$i]["c"] = $one ;
    }
}
$agenda["title"]=$title;
$agenda["erreur"] = 0;
echo json_encode($agenda);
mysql_close();

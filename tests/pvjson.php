<?php
//*
error_reporting(E_ALL);
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
//*/
require_once "../src/GPMLConverter.php";
use WikiPathways\GPMLConverter;
header("Access-Control-Allow-Origin: *");

function alphanumeric($s) {
	return preg_replace("/[^a-zA-Z0-9]+/", "", $s);
}


$identifier = isset($_GET["identifier"]) ? alphanumeric($_GET["identifier"]) : "WP4";
$version = isset($_GET["version"]) ? alphanumeric($_GET["version"]) : "0";

$gpml = base64_decode(json_decode(file_get_contents("https://webservice.wikipathways.org/getPathwayAs?fileType=gpml&pwId=$identifier&format=json"))->data);
$gpml_parsed = new SimpleXMLElement($gpml);
$organism = $gpml_parsed['Organism'];

echo GPMLConverter::gpml2pvjson($gpml, array("identifier"=>$identifier, "version"=>$version, "organism"=>$organism));
?>

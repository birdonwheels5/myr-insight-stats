<?php
  
function getDifficulties($fileName)
{
	
	$fullString = stream_get_contents(fopen("scrapes/" . $fileName, "r"));
	
  	// Create the array for storing the data
  	$explodedString = array();
  	
  	$sha = "";
  	$scrypt = "";
  	$skein = "";
  	$groestl = "";
  	$qubit = "";
  	
  	// Break the data up into an array
  	$explodedString = explode("</td>", $fullString);
  	
  	//var_dump($explodedString);
  	
  	//print $explodedString[45] . "\n" . $explodedString[47] . "\n" . $explodedString[49] . "\n" . $explodedString[51] . "\n" . $explodedString[53];
  	
  	// Clean it up (it will always be the 47th position in the array)
  	$sha = trim(str_ireplace("<td class=\"text-right ng-binding\">", "", $explodedString[45]));
  	$scrypt = trim(str_ireplace("<td class=\"text-right ng-binding\">", "", $explodedString[47]));
  	$skein = trim(str_ireplace("<td class=\"text-right ng-binding\">", "", $explodedString[49]));
  	$groestl = trim(str_ireplace("<td class=\"text-right ng-binding\">", "", $explodedString[51]));
  	$qubit = trim(str_ireplace("<td class=\"text-right ng-binding\">", "", $explodedString[53]));
 
 	$difficulties = array();
 	
 	$difficulties[0] = (double)$sha;
  	$difficulties[1] = (double)$scrypt;
 	$difficulties[2] = (double)$skein;
 	$difficulties[3] = (double)$groestl;
 	$difficulties[4] = (double)$qubit;

 	
 	//var_dump($difficulties);
  	return $difficulties;
}

// Generate rendered Javascript for scraping difficulty values
function scrape($url, $fileName)
{
	exec("phantomjs scrape.js " . $url . " " .  $fileName);
}
  
?>

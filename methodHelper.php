<?php
  
  getDifficulty();
  
function getDifficulty()
{
	
	$url = ("http://birdonwheels5.no-ip.org:3000/status");
	
	// Generate rendered Javascript for scraping difficulty values
	exec("phantomjs scrape.js " . $url);
	
	$fullString = stream_get_contents(fopen("scrape.html", "r"));
	
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

  	$sha = (double)$sha;
  	$scrypt = (double)$scrypt;
  	$skein = (double)$skein;
  	$groestl = (double)$groestl;
  	$qubit = (double)$qubit;
 
 	$difficulties = array(4);
 	
 	$difficulties[0] = $sha;
  	$difficulties[1] = $scrypt;
 	$difficulties[2] = $skein;
 	$difficulties[3] = $groestl;
 	$difficulties[4] = $qubit;

 	
 	var_dump($difficulties);
  	return $difficulties;
}
  
?>

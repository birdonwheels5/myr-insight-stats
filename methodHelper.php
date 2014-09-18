<?php
  
  getDifficulty("scrypt");
  
function getDifficulty($algorithm)
{
    $port = 0;
    
    // Determine the proper p2pool node based on which algorithm is supplied
    
    if(strcmp(stristr($algorithm, "sha256d"), $algorithm) == 0)
    {
      $port = 5578;
    }
    
    if(strcmp(stristr($algorithm, "scrypt"), $algorithm) == 0)
    {
      $port = 5556;
    }
    
    if(strcmp(stristr($algorithm, "groestl"), $algorithm) == 0)
    {
      $port = 3333;
    }
    
    if(strcmp(stristr($algorithm, "skein"), $algorithm) == 0)
    {
      $port = 5589;
    }
    
    if(strcmp(stristr($algorithm, "qubit"), $algorithm) == 0)
    {
      $port = 5567;
    }

    // Get stream from the p2pool  node
	//$url = ("http://birdonwheels5.no-ip.org:" . $port . "/static/stats");
	
	$url = ("http://birdonwheels5.no-ip.org:3000/status");
	
	//$cmd = "/home/birdonwheels5/phantomjs/bin/phantomjs /var/www/myr-insight-stats/scrape.js 2>&1";
	exec("phantomjs scrape.js " . $url);
	
	$fullString = stream_get_contents(fopen("scrape.html", "r"));
	
  	// Create the array for storing the data
  	$explodedString = array();
  	
  	$difficulty = "";
  	
  	// Break the data up into an array
  	$explodedString = explode("ng-binding\">", $fullString);
  	
  	//var_dump($explodedString);
  	
  	print $explodedString[26] . "\n" . $explodedString[27] . "\n" . $explodedString[28] . "\n" . $explodedString[29] . "\n" . $explodedString[30] . "\n" . $explodedString[31];
  	
  	// Clean it up (it will always be the 47th position in the array)
  	//$difficulty = str_ireplace(" id=\"block_difficulty\">", "", $explodedString[47]);
  	//$difficulty = str_ireplace("</", "", $difficulty);

  	//$difficulty = (double)$difficulty;
	//print $difficulty;
  	//return $difficulty;
}
  
?>

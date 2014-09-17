<?php

require_once "myr-insight-stats/Diggin/Phantomjs.php";

phantomjs = new Diggin\Phantomjs("/home/birdonwheels5/phantomjs/bin/phantomjs");

getDifficulty(qubit);
  
function getDifficulty($algorithm)
{
    $port = -1;
    
    // Determine the proper p2pool node based on which algorithm is supplied
    if(strcmp($algorithm, "sha256d"))
    {
      $port = 5578;
    }
    
    if(strcmp($algorithm, "scrypt"))
    {
      $port = 5556;
    }
    
    if(strcmp($algorithm, "groestl"))
    {
      $port = 3333;
    }
    
    if(strcmp($algorithm, "skein"))
    {
      $port = 5589;
    }
    
    if(strcmp($algorithm, "qubit"))
    {
      $port = 5567;
    }
    
    $ch = curl_init("http://birdonwheels5.no-ip.org:" . $port . "/static/stats");
print $html;



    
    // Get stream from the p2pool  node
	  $url = $phantomjs->getHtml("http://birdonwheels5.no-ip.org:" . $port . "/static/stats");
	  
	  print $url . "\n";
  
  	// Create the array for storing the data
  	$explodedString = array();
  	
  	// Get the data from stream
  	$fullString = stream_get_contents($url);
  	
  	print $fullString . "\n";
  	
  	$difficulty = "";
  	
  	// Break the data up into an array
  	$explodedString = explode(">", $fullString);
  	
  	var_dump($explodedString);
  	
  	// Clean it up (it wil always be the 21st position in the array)
  	$difficulty = str_ireplace("Received: ", "", $explodedString[21]);
  	$difficulty = str_ireplace("<br /", "", $difficulty);
  	$difficulty = str_ireplace("MYR", "", $difficulty);
  	
  	$difficulty = (double)$difficulty;
  	$difficulty = number_format($difficulty, 2, '.', ',') . " MYR";
	  
  	return $difficulty;
}
  
?>

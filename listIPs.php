<?php

include "userManager.php";

$filename = "ip_data.dat";

$users = array();
$users = read_users($filename);

print "There are " . count_users($filename) . " unique users who visited the block explorer. \n <br/>";

print "They are: \n <br/>";

display_ip_addresses($filename, $users);

print " \n \n <br/><br/>";

print "And here are the details of each: \n \n <br/> <br/>";

display_ip_info($filename, $users);

?>

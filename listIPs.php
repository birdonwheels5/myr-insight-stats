<?php

include "userManager.php";

$filename = "ip_data.dat";

$users = array();
$users = read_users($filename);

print "There are " . count_users($filename) . " unique users who clicked submit. \n <br/>";

print "They are: \n <br/>";

display_ip_addresses($filename, $users);

?>

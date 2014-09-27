
<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Wat?</title>
		<link rel="stylesheet" href="http://birdonwheels5.no-ip.org/css/main.min.css">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans" title="Font Styles"/>
		<?php include "methodHelper.php";
			  include "userManager.php"; ?>
	</head>
	
	<body style="background-color:#f4f4f4;float:left;background-color:white">
	
	<?php
		
		// These values are used to compute coins/day for all algos. 
		// Measured in MH/s and are estimates of 1 Scrypt MH/s
		//$sha_hashrate = 1; // This one gets multiplied by 1000 later so we can use GH/s instead of MH/s
		//$scrypt_hashrate = 1;
		//$skein_hashrate = 280;
		//$groestl_hashrate = 15;
		//$qubit_hashrate = 7;
		
		
		// Determine if the user loading the page has been here before.
		$ip = $_SERVER['REMOTE_ADDR'];
		$filename = "ip_data.dat";
		$separator = "qpwoeiruty";
		$user_position_in_array = search_ip_address($filename, $ip);
		$is_ip_unique;
		
		$users = array();
		$users = read_users("ip_data.dat");
		
		
		if($user_position_in_array >= 0)
		{
			$is_ip_unique = false;
			$sha_hashrate = $sha_input = $users[$user_position_in_array]->get_sha_hashrate();
			$scrypt_hashrate = $scrypt_input = $users[$user_position_in_array]->get_scrypt_hashrate();
			$skein_hashrate = $skein_input = $users[$user_position_in_array]->get_skein_hashrate();
			$groestl_hashrate = $groestl_input = $users[$user_position_in_array]->get_groestl_hashrate();
			$qubit_hashrate = $qubit_input = $users[$user_position_in_array]->get_qubit_hashrate();
		}
		else
		{
			$is_ip_unique = true;
			$sha_hashrate = 1; // This one gets multiplied by 1000 later so we can use GH/s instead of MH/s
			$sha_input = "";
			$scrypt_hashrate = 1; // Scrypt MH/s
			$scrypt_input = "";
			$skein_hashrate = 1; // Skein MH/s
			$skein_input = "";
			$groestl_hashrate = 1; // Groestl MH/s
			$groestl_input = "";
			$qubit_hashrate = 1; // Qubit MH/s
			$qubit_input = "";
		}
		
		
		$hash_multiplier = 1000000; // Gives you hashrate in hashes/sec for calculations
		$coins_per_block = 1000; // Current block reward.
		
		scrape("http://birdonwheels5.no-ip.org:3000/status", "scrape.html");
		
		$diff = array();
		$diff = getDifficulties("scrape.html");
		
		$sha_diff = number_format($diff[0], 2, '.', ',');
		$sha_net_hashrate = number_format(($diff[0]/34.92331797)/1000, 2, '.', ',');
		
		$sha_profit = number_format((86400 / (($diff[0] * pow(2, 32)) / (($sha_hashrate * 1000) * $hash_multiplier))) * $coins_per_block, 1, '.', ',');

		
		$scrypt_diff = number_format($diff[1], 2, '.', ',');
		$scrypt_net_hashrate = number_format($diff[1]/34.92331797, 2, '.', ',');
		
		$scrypt_profit = number_format((86400 / (($diff[1] * pow(2, 32)) / ($scrypt_hashrate * $hash_multiplier))) * $coins_per_block, 1, '.', ',');

		
		$skein_diff = number_format($diff[2], 2, '.', ',');
		$skein_net_hashrate = number_format($diff[2]/34.92331797, 2, '.', ',');
		
		$skein_profit = number_format((86400 / (($diff[2] * pow(2, 32)) / ($skein_hashrate * $hash_multiplier))) * $coins_per_block, 1, '.', ',');

		
		$groestl_diff = number_format($diff[3], 2, '.', ',');
		$groestl_net_hashrate = number_format($diff[3]/34.92331797, 2, '.', ',');
		
		$groestl_profit = number_format((86400 / (($diff[3] * pow(2, 32)) / ($groestl_hashrate * $hash_multiplier))) * $coins_per_block, 1, '.', ',');

		
		$qubit_diff = number_format($diff[4], 2, '.', ',');
		$qubit_net_hashrate = number_format($diff[4]/34.92331797, 2, '.', ',');
		
		$qubit_profit = number_format((86400 / (($diff[4] * pow(2, 32)) / ($qubit_hashrate * $hash_multiplier))) * $coins_per_block, 1, '.', ',');
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			
			
			if (empty($_POST["sha"])) 
			{
				//$sha_hashrate = 0;
			}
			else
			{
				if(!is_string($_POST["sha"]))
				{
					$sha_hashrate = 1;
					$sha_input = $sha_hashrate;
				}
				else
				{
					$sha_hashrate = $_POST["sha"]; // Multiplied later to be in GH/s
					$sha_input = $sha_hashrate;
				}
			}
			
			if (empty($_POST["scrypt"])) 
			{
				//$scrypt_hashrate = 0;
			}
			else
			{
				if(!is_string($_POST["scrypt"]))
				{
					$scrypt_hashrate = 1;
					$skein_input = "";
				}
				else
				{
					$scrypt_hashrate = $_POST["scrypt"];
					$scrypt_input = $scrypt_hashrate;
				}
			}
			
			if (empty($_POST["skein"])) 
			{
				//$skein_hashrate = 0;
			}
			else
			{
				if(!is_string($_POST["skein"]))
				{
					$skein_hashrate = 1;
					$skein_input = "";
				}
				else
				{
					$skein_hashrate = $_POST["skein"];
					$skein_input = $skein_hashrate;
				}
			}
			
			if (empty($_POST["groestl"])) 
			{
				//$groestl_hashrate = 0;
			}
			else
			{
				if(!is_string($_POST["groestl"]))
				{
					$groestl_hashrate = 1;
					$groestl_input = "";
				}
				else
				{
					$groestl_hashrate = $_POST["groestl"];
					$groestl_input = $groestl_hashrate;
				}
			}
			
			if (empty($_POST["qubit"])) 
			{
				//$qubit_hashrate = 0;
			}
			else
			{
				if(!is_string($_POST["qubit"]))
				{
					$qubit_hashrate = 1;
					$qubit_input = "";
				}
				else
				{
					$qubit_hashrate = $_POST["qubit"];
					$qubit_input = $qubit_hashrate;
				}
			}
			
			// 		  Units:     Sec	Diff	   ???	   hashrate MH/s
		$sha_profit = number_format((86400 / (($diff[0] * pow(2, 32)) / (($sha_hashrate * 1000) * $hash_multiplier))) * $coins_per_block, 1, '.', ',');
		$scrypt_profit = number_format((86400 / (($diff[1] * pow(2, 32)) / ($scrypt_hashrate * $hash_multiplier))) * $coins_per_block, 1, '.', ',');
		$skein_profit = number_format((86400 / (($diff[2] * pow(2, 32)) / ($skein_hashrate * $hash_multiplier))) * $coins_per_block, 1, '.', ',');
		$groestl_profit = number_format((86400 / (($diff[3] * pow(2, 32)) / ($groestl_hashrate * $hash_multiplier))) * $coins_per_block, 1, '.', ',');
		$qubit_profit = number_format((86400 / (($diff[4] * pow(2, 32)) / ($qubit_hashrate * $hash_multiplier))) * $coins_per_block, 1, '.', ',');
		
		
		if($is_ip_unique == false)
		{
			if($sha_hashrate != $users[$user_position_in_array]->get_sha_hashrate() or $scrypt_hashrate != $users[$user_position_in_array]->get_scrypt_hashrate() or $skein_hashrate != $users[$user_position_in_array]->get_skein_hashrate() or $groestl_hashrate != $users[$user_position_in_array]->get_groestl_hashrate() or $qubit_hashrate != $users[$user_position_in_array]->get_qubit_hashrate())
			{
				remove_user($filename, $user_position_in_array);
				file_put_contents($filename, "ip: " . $ip . "\n" . "sha: " . $sha_input  . "\n" . "scrypt: " . $scrypt_input . "\n" . "skein: " . $skein_input . "\n" . "groestl: " . $groestl_input . "\n" . "qubit: " . $qubit_input . "\n" . $separator . "\n", FILE_APPEND);
			}
		}
		else
		{
			file_put_contents($filename, "ip: " . $ip . "\n" . "sha: " . $sha_input  . "\n" . "scrypt: " . $scrypt_input . "\n" . "skein: " . $skein_input . "\n" . "groestl: " . $groestl_input . "\n" . "qubit: " . $qubit_input . "\n" . $separator . "\n", FILE_APPEND);
		}
		
		if($_POST["refresh_values"])
		{
		scrape("http://birdonwheels5.no-ip.org:3000/status", "scrape.html");
		
		$diff = getDifficulties("scrape.html");
		
		$sha_diff = number_format($diff[0], 2, '.', ',');
		$sha_net_hashrate = number_format(($diff[0]/34.92331797)/1000, 2, '.', ',');
		
		$sha_profit = number_format((86400 / (($diff[0] * pow(2, 32)) / (($sha_hashrate * 1000) * $hash_multiplier))) * $coins_per_block, 1, '.', ',');

		
		$scrypt_diff = number_format($diff[1], 2, '.', ',');
		$scrypt_net_hashrate = number_format($diff[1]/34.92331797, 2, '.', ',');
		
		$scrypt_profit = number_format((86400 / (($diff[1] * pow(2, 32)) / ($scrypt_hashrate * $hash_multiplier))) * $coins_per_block, 1, '.', ',');

		
		$skein_diff = number_format($diff[2], 2, '.', ',');
		$skein_net_hashrate = number_format($diff[2]/34.92331797, 2, '.', ',');
		
		$skein_profit = number_format((86400 / (($diff[2] * pow(2, 32)) / ($skein_hashrate * $hash_multiplier))) * $coins_per_block, 1, '.', ',');

		
		$groestl_diff = number_format($diff[3], 2, '.', ',');
		$groestl_net_hashrate = number_format($diff[3]/34.92331797, 2, '.', ',');
		
		$groestl_profit = number_format((86400 / (($diff[3] * pow(2, 32)) / ($groestl_hashrate * $hash_multiplier))) * $coins_per_block, 1, '.', ',');

		
		$qubit_diff = number_format($diff[4], 2, '.', ',');
		$qubit_net_hashrate = number_format($diff[4]/34.92331797, 2, '.', ',');
		
		$qubit_profit = number_format((86400 / (($diff[4] * pow(2, 32)) / ($qubit_hashrate * $hash_multiplier))) * $coins_per_block, 1, '.', ',');
		
		}
}
	?>
	
		<div class="container" style="width:100%;float:left;">
			
			<article>
				<p>
					<!-- <center><img src="logo_big.png"></center> Insert Main Logo here -->
						
		<h2> <a href="http://myriadplatform.org" target="_blank"><img src="http://birdspool.no-ip.org:5567/static/img/logo.png" style="width:8%;"</img>  Myriadcoin </a></h2>
        <p>
	<strong>Myriadcoin</strong> is the first multi-PoW cryptocurrency that uses 5 concurrent hashing algorithms, each of which have an equal chance of solving the next block. 
Each algorithm has an independent difficulty, and a block time of 2.5 minutes, which averages out to 30 seconds per block across all the algorithms. 
The 5 algorithms that comprise Myriadcoin are Sha256, Scrypt, Groestl, Skein, and Qubit. 
For more information, visit <a href="http://myriadplatform.org" target="_blank">MyriadPlatform.org</a></p>

	<p><h4>Links of interest:</h4> 
	<ul>
		<li><a href="http://birdonwheels5.no-ip.org/richlist/"target="_parent">Top 1000 Richest Myriadcoin Addresses</a>
		<li><a href="http://birdonwheels5.no-ip.org/myriad-bounty/" target="_parent">Myriadcoin Bounty Board</a>
		<li><a href="http://birdonwheels5.no-ip.org/myr-hub/" target="_parent">Bird's Myriadcoin P2pool Hub</a>
		<li><a href="http://birdonwheels5.no-ip.org/home/" target="_parent">Bird's Website Home Page</a>
	</ul></p>
	
	<p><h4>Did you know?</h4> You can change the currency that values are displayed in to USD! 
	Click on MYR in the top right corner of the page, and select USD. (This feature is still in development)
	<br/>
	<b>Update!</b> Profitability calculation logic and form is complete, and will not be changing anymore.</p>

        <p><h3>Algorithm Statistics:</h3> 
        	    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		    <input type="submit" name="refresh_values" value="Refresh Values">
		    
	  <table class="table">	
	    <tr>
		<td>Algorithm: </td>
		<td><b>Sha256</b></td>
		<td><b>Scrypt</b></td>
		<td><b>Skein</b></td>
		<td><b>Groestl</b></td>
		<td><b>Qubit</b></td>
	    </tr>
	    <tr>
		<th>Current Difficulty:</th>
		<td ><?php print $sha_diff; ?></td>
		<td><?php print $scrypt_diff; ?></td>
		<td><?php print $skein_diff; ?></td>
		<td><?php print $groestl_diff; ?></td>
		<td><?php print $qubit_diff; ?></td>
	    </tr>
	    <tr>
		<th>Network Hashrate:</th>
		<td><?php print $sha_net_hashrate; ?><br/>TH/S</td>
		<td><?php print $scrypt_net_hashrate; ?><br/>GH/s</td>
		<td><?php print $skein_net_hashrate; ?><br/>GH/s</td>
		<td><?php print $groestl_net_hashrate; ?><br/>GH/s</td>
		<td><?php print $qubit_net_hashrate; ?><br/>GH/s</td>
	    </tr>
	   <tr>
		<th>Profitability/Day:<br/>
		    (Defaults to MYR per MH/s of the algo.)</th>
		<td><?php print $sha_profit; ?> MYR/GH/s</td>
		<td><?php print $scrypt_profit; ?> MYR/Scrypt MH/s</td>
		<td><?php print $skein_profit; ?> MYR/Skein MH/s</td>
		<td><?php print $groestl_profit; ?> MYR/Groestl MH/s</td>
		<td><?php print $qubit_profit; ?> MYR/Qubit MH/s</td>
	    </tr>
	    
	    <tr>
		<th>
		    Profitability/Day:<br/>Enter your Hashrate<br/>
		    <input type="submit" name="submit" value="Submit"></th>
		<td>
		    <input type="text" name="sha" value="<?php echo $sha_input;?>" size="4"><br/>
		    MYR <br/> (GH/s)
		    </td>
		<td>
		    <input type="text" name="scrypt" value="<?php echo $scrypt_input;?>" size="4"><br/>
		    MYR <br/> (MH/s)
		    </td>
		<td>
		    <input type="text" name="skein" value="<?php echo $skein_input;?>" size="4"><br/>
		    MYR <br/> (MH/s)
		    </td>
		<td>
		    <input type="text" name="groestl" value="<?php echo $groestl_input;?>" size="4"><br/>
		    MYR <br/> (MH/s)
		    </td>
		<td>
		    <input type="text" name="qubit" value="<?php echo $qubit_input;?>" size="4"><br/>
		    MYR <br/> (MH/s)
		    </form></td>
	    </tr>
<!--	    <tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	    </tr> -->
	</table>

</p>

				</p>
			
			
			</article>
			
			<div class="paddingBottom">
			</div>
		</div>
	</body>
	
</html>

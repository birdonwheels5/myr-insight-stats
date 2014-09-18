
<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Wat?</title>
		<link rel="stylesheet" href="http://birdonwheels5.no-ip.org/css/main.min.css">
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans" title="Font Styles"/>
		<?php include "methodHelper.php"; ?>
	</head>
	
	<body style="background-color:#f4f4f4;float:left;">
	
	<?php
		
		scrape("http://birdonwheels5.no-ip.org:3000/status");
		
		$diff = array();
		$diff = getDifficulties();
		
		$sha_diff = number_format($diff[0], 2, '.', ',');
		$sha_hashrate = number_format(($diff[0]/34.92331797)/1000, 2, '.', ',');
		
		$scrypt_diff = number_format($diff[1], 2, '.', ',');
		$scrypt_hashrate = number_format($diff[1]/34.92331797, 2, '.', ',');
		
		$skein_diff = number_format($diff[2], 2, '.', ',');
		$skein_hashrate = number_format($diff[2]/34.92331797, 2, '.', ',');
		
		$groestl_diff = number_format($diff[3], 2, '.', ',');
		$groestl_hashrate = number_format($diff[3]/34.92331797, 2, '.', ',');
		
		$qubit_diff = number_format($diff[4], 2, '.', ',');
		$qubit_hashrate = number_format($diff[4]/34.92331797, 2, '.', ',');
	?>
	
		<div class="container" style="width:100%;float:left;">
			
			<article>
				<p>
					<!-- <center><img src="logo_big.png"></center> Insert Main Logo here -->
						
		<h2> <a href="http://myriadplatform.org" target="_blank"><img src="http://birdspool.no-ip.org:5567/static/img/logo.png" style="width:12%;"</img>  Myriadcoin </a></h2>
        <p>
	<strong>Myriadcoin</strong> is the first multi-PoW cryptocurrency that uses 5 concurrent algorithms, each of which have an equal chance of solving the next block. 
Each algorithm has an independent difficulty, and a block time of 2.5 minutes, which averages out to 30 seconds per block across all the algorithms. 
The 5 algorithms that comprise Myriadcoin are SHA256, Scrypt, Groestl, Skein, and Qubit. 
For more information, visit <a href="http://myriadplatform.org" target="_blank">MyriadPlatform.org</a></p>
<br/>
	<p>Links of interest: 
	<ul>
		<li><a href="http://birdonwheels5.no-ip.org/richlist/"target="_parent">Top 1000 Richest Myriadcoin Addresses</a>
		<li><a href="http://birdonwheels5.no-ip.org/myriad-bounty/" target="_parent">Myriadcoin Bounty Board</a>
		<li><a href="http://birdonwheels5.no-ip.org/myr-hub/" target="_parent">Bird's Myriadcoin P2pool Hub</a>
		<li><a href="http://birdonwheels5.no-ip.org/home/" target="_parent">Bird's Website Home Page</a>
	</ul></p>

        <p><h3>Algorithm Statistics:</h3> (Refresh page to refresh values)<br/>
	  <table class="table">	
	    <tr>
		<td>Algorithm: </td>
		<td>SHA256</td>
		<td>Scrypt</td>
		<td>Skein</td>
		<td>Groestl</td>
		<td>Qubit</td>
	    </tr>
	    <tr>
		<td>Current Difficulty:</td>
		<td ><?php print $sha_diff; ?></td>
		<td><?php print $scrypt_diff; ?></td>
		<td><?php print $skein_diff; ?></td>
		<td><?php print $groestl_diff; ?></td>
		<td><?php print $qubit_diff; ?></td>
	    </tr>
	    <tr>
		<td>Network Hashrate:</td>
		<td><?php print $sha_hashrate; ?><br/> TH/S</td>
		<td><?php print $scrypt_hashrate; ?><br/> GH/s</td>
		<td><?php print $skein_hashrate; ?><br/> GH/s</td>
		<td><?php print $groestl_hashrate; ?><br/> GH/s</td>
		<td><?php print $qubit_hashrate; ?><br/> &nbsp GH/s</td>
	    </tr>
	    <tr>
		<td>Profitability per Scrypt MH/s:</td>
		<td>N/A</td>
		<td>N/A</td>
		<td>N/A</td>
		<td>N/A</td>
		<td>N/A</td>
	    </tr>
	    <tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	    </tr>
	</table>

</p>

				</p>
			
			
			</article>
			
			<div class="paddingBottom">
			</div>
		</div>
	</body>
	
</html>

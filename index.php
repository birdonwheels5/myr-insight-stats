<!DOCTYPE html>
<html>

	<head>
	<?php include ("classBounty.php");
	      include ("bountyReader.php");
	      error_reporting(E_ALL);
	?>
	</head>

	<body>
	
	<?php
	
	
	$fileName = "bounties.dat";
	
	$reader = new bountyReader();
	
	$reader->readBounties($fileName);
	
	?>
	
	
	<center><div class="container">
		<center><div class="centerPadding">
		</div>
		
		<article>
		
		<h1>Myriadcoin Community Bounty Board</h1>
		<hr/>
		<br/><br/>
		
		<table>
			<tr>
				<td>hi</td>
				<td>MYR</td>
			</tr>
		<table>
		</article>
	</div
	
	
	</body>

</html>

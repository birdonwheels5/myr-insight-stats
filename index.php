<!DOCTYPE html>
<html>

	<head>
	<?php include "bountyHandler.php";?>
	</head>

	<body>
	
	<?php
	
	$fileName = "bounties.dat";
	
	// With this, you can pull any aspect of a bounty's data and display it.
	$bounties = array();
	$bounties = readBounties($fileName);
	
	var_dump($bounties);
	
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

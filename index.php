<?php
require_once 'core/init.php';
?>
<html>
<head>
	<title>Phonebook</title>
	<link rel='stylesheet' type="text/css" href="css/style.css">
	<script type="text/javascript" src ="main.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
</head>
<body>
	<div class="wrap">
		<div class="search">
			<?php 
			if(isset($_SESSION['korisnik_br'])){?>
			 <a href="insert.php?"><img class="img-search" src="img/add.jpg" height="50px" title="Ponudite predmet"></a>
			 <a href="tvojaTrgovina.php"><img class="img-search" src="img/users.jpg" height="50px" title="Vasa trgovina"></a>
			 <a href="tvojeZavrseneProdaje.php"><img class="img-search" src="img/users.jpg" height="50px" title="Vase zavrsene prodaje"></a>
			 <?php
			}
			?>
			<a href="sviPredmeti.php"><img class="img-search" src="img/remove.jpg" height="50px" title="Svi predmeti"></a>
			
			<form action="getResults.php" method="GET">
				<input type="text" id="criteria" style="width:68%;" name="criteria" placeholder="Criteria...">
				<input type="submit" name="submit" value="Search"<br/>
			</form>
		</div>
		<?php
			if(isset($_SESSION['korisnik_br'])){
				include 'infoUserW.php';
			}else {
				include 'login.php';
			}
		?>
		<?php
			include 'getResults.php';
		?>
	</div>
	<script type="text/javascript" src ="main.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
</body>
</html>
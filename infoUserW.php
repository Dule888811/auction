<?php
require 'core/init.php'; 
?>
<h1>Dobrodosli</h1>
<div class="p2">
	<p>Ime: <?php echo $_SESSION['ime'] ?></p>
	<p>Prezime: <?php echo $_SESSION['prezime'] ?></p>
	<p>Email: <?php echo $_SESSION['email'] ?></p>
	<a href="logout.php">Logout</a>
	<a href="azuriraj.php">Azuriraj podatke</a>
</div>
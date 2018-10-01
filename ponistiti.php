<?php
require 'core/init.php';
	$predmet = $_GET['predmet'];
	//$predmet = quote($predmet);
	$email = $_SESSION['email'];
	$ponudu_daje_korisnik = $_SESSION['korisnik_br'];
	//$email = quote($email);
	$update->execute();
	$query =$pdo->prepare("UPDATE aukcija.ponude JOIN aukcija.predmeti ON ponude.ponuda_za_predmet=predmeti.predmet_br SET ponuda_vazi=0 WHERE ponude.ponudu_daje_korisnik={$ponudu_daje_korisnik}  AND ponude.ponuda_za_predmet={$predmet} AND predmeti.aktivan_predmet=1");
	$query->execute();
    header("Location:index.php");
?>
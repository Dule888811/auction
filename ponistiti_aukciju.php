<?php
require 'core/init.php';
	var_dump($_GET['predmet']);
	$predmet = $_GET['predmet'];
	//$predmet = quote($predmet);
	$email = $_SESSION['email'];
	$korisnik_id = $_SESSION['korisnik_br'];
	//$email = quote($email);
	$q = $pdo->query("SELECT * FROM aukcija.predmeti WHERE predmet_br={$predmet}");
	var_dump($q);
	$post = $q->fetchObject('Predmeti');
	var_dump($post);
        $update->execute();
        if($post->aktivan_predmet == 1){
        	$query = $pdo->query("DELETE FROM aukcija.predmeti WHERE  predmet_br={$predmet}");
            header("Location:index.php");
		}
?>	
<?php
require_once 'core/init.php';
$finishedSels = User::getUserFinishedSels($_SESSION['korisnik_br']);
//var_dump($finishedSels);
foreach($finishedSels as $finishedSel ){
	echo "Vas predmet " . $finishedSel['naziv_predmeta'] . " je kupio korisnik " .$finishedSel['email'] . " za cenu: " . $finishedSel['iznos_ponude'] . " din.";
}
echo "</br></br><a href='index.php'>Nazad</a>";
?>
<?php
require 'core/init.php';
$pdo = Connect::getInstance();
//$q = $pdo->query("SELECT * FROM aukcija.predmeti WHERE aktivan_predmet=1");
//var_dump($q);
$update->execute();
$results = Predmeti::getAll();

foreach($results as $result){
	$post = Predmeti::get($result['predmet_br']);
	//var_dump($post);
	echo  $post->render();
}
echo "</br></br><a href='index.php'>Nazad</a>";
?>
<?php
require_once 'core/init.php';
$predmet = $_GET['predmet'];
$update->execute();
$query = $pdo->query("SELECT * FROM aukcija.ponude WHERE ponuda_za_predmet={$predmet} AND ponuda_vazi=1");
$results = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($results as $result){
    echo "Iznos ponude je: " . $result['iznos_ponude'] . " din.</br>";
}
echo "</br></br><a href='index.php'>Nazad</a>";
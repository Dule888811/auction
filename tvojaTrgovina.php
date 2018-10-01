<?php
require 'core/init.php';
$yoursBuys = User::getWinnerBuys($_SESSION['korisnik_br']);
$yoursSels = User::getUserFinishedSels($_SESSION['korisnik_br']);
foreach($yoursBuys as $yoursBuy ){
    echo "Kupili ste " . $yoursBuy['naziv_predmeta'] . " za cenu od " . $yoursBuy['iznos_ponude'] . " din.</br>";
   // var_dump($yoursBuy);

}
foreach($yoursSels as $yoursSel ){
    echo "Vas predmet " . $yoursSel['naziv_predmeta'] . " je kupio korisnik " .$yoursSel['email'] . " za cenu: " . $yoursSel['iznos_ponude'] . " din.</br>";
}
echo "</br></br><a href='index.php'>Nazad</a>";
?>
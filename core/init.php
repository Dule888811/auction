<?php
if(!isset($_SESSION)){
    session_start();
}
$GLOBALS['config'] = array(
		'DB' => array(
			'host' => '127.0.0.1' ,
			'user' => 'root' ,
			'password' => '' ,
			'db_name' => 'aukcija'
		),
		'status' => true,
		'app_dir' => 'C:/wamp64/www/Auction/' ,
		'session' => array()
);
spl_autoload_register(function($className){
	require_once "classes/{$className}.class.php";
});
ob_start();
$pdo = Connect::getInstance();
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
$update = $pdo->prepare("UPDATE aukcija.predmeti SET aktivan_predmet=0 WHERE vreme_isteka_ponuda_za_predmet < NOW()");
?>
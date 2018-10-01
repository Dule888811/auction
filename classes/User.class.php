<?php
	require_once 'core/init.php';
	class User {
		private static $_pdo;
        public static function getWinnerBuys($id){
            global $update;
            $update->execute();
            $q = self::$_pdo->query("SELECT * FROM aukcija.predmeti JOIN aukcija.ponude ON predmeti.predmet_br=ponude.ponuda_za_predmet JOIN aukcija.korisnik ON korisnik.korisnik_br=ponude.ponudu_daje_korisnik WHERE predmeti.aktivan_predmet=0 AND ponude.ponudu_daje_korisnik={$id} ORDER BY  iznos_ponude DESC LIMIT 1");
            $winnerBuys = $q->fetchAll(PDO::FETCH_ASSOC);
            return $winnerBuys;
        }
		public static function getUserFinishedSels($id){
		    global $update;
			$update->execute();
			$q = self::$_pdo->query("SELECT * FROM aukcija.predmeti JOIN aukcija.ponude ON predmeti.predmet_br=ponude.ponuda_za_predmet JOIN aukcija.korisnik ON korisnik.korisnik_br=ponude.ponudu_daje_korisnik WHERE predmeti.aktivan_predmet=0 AND ponuda_vazi=1 AND predmeti.postavio_korisnik={$id} ORDER BY  ponude.iznos_ponude DESC LIMIT 1");
			//var_dump($q);
			$finishedSels = $q->fetchAll(PDO::FETCH_ASSOC);	
			return $finishedSels;
		}
		public static function init(){
			self::$_pdo = Connect::getInstance();
		}
		public static function emial_exists($email){
			$query = self::$_pdo->prepare('SELECT korisnik_br FROM aukcija.korisnik WHERE email = :email');
			$query->bindParam(':email', $email);
			$query->execute();
			if($query->rowCount() > 0){
				return true;
			}else{
				return false;
				}
		}
		public static function getAllUsers(){
			$query =self::$_pdo->query("SELECT * FROM aukcija.korisnik");
			return	$results = $query->fetchAll(PDO::FETCH_ASSOC);	
		}
		public static function register_new_user($password, $first_name, $last_name, $email){
			$query = self::$_pdo->prepare('INSERT INTO aukcija.korisnik(lozinka, ime, prezime, email) VALUES (?, ?, ?, ?)');
			$query->bindParam(1, $password);
			$query->bindParam(2, $first_name);
			$query->bindParam(3, $last_name);
			$query->bindParam(4, $email);
			$query->execute();
			var_dump($query);
		}
	}
	User::init();
	
?>
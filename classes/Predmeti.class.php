<?php
	require_once 'core/init.php';
	class Predmeti {
		private static $_pdo;
		public static function get($id){
			$q = self::$_pdo->prepare("SELECT * FROM aukcija.predmeti  WHERE predmet_br =?");
			$q->bindValue(1,$id);
			$q->execute();
			$post = $q->fetchObject('Predmeti');
			return $post;
		}

		public static function getAll(){
			$q = self::$_pdo->query("SELECT * FROM aukcija.predmeti WHERE aktivan_predmet=1");
			$postArr = $q->fetchAll(PDO::FETCH_ASSOC);
			return $postArr;
		}
		public static function init(){
			self::$_pdo = Connect::getInstance();
		}
		public static function remove($id){
			$q = self::$_pdo->query("DELETE * FROM articles  WHERE id = {$id}");
		}
		
		public function render(){
		//	$render = "<div class='result'><p><b>Postavio: </b>" . $this->postavio_korisnik . "</p>";
			$render = "<p><b>Naziv:" . $this->naziv_predmeta . "</p>";
			$render .= "<p><b>Opis:" . $this->opis_predmeta . "</p>";
			$render .= "<p><b>Pocetna cena: </b>" . $this->pocetna_cena_predmeta . "</p>";
			//$render = "<p><b>Nacin placanja:" . $this->nacin_placanja . "</p>";
			$render.= "<p><b>Nacin isporuke:" . $this->nacin_isporuke_predmeta . "</p>";
            $render.= "<p><b>Datum isteka aukcije:" . $this->vreme_isteka_ponuda_za_predmet . "</p>";
			if(isset($this->slika_predmeta)){
			    $render .="<img src ='data:image/jpg;base64," . $this->slika_predmeta . "'>";
            }
			 if(isset($_SESSION['email'])){
				$render .= "<a href='ponuda.php?predmet=" . $this->predmet_br . "'>Ponudite cenu</a></div></br>";
			    $render .= "<a href='ponistiti.php?predmet=" . $this->predmet_br . "'>Ponistite svoju ponudu</a></div></br>";
			}else{
				$render .= "<a href='loginW.php'>Ulogujte se ako zelite da date ili ponistite ponudu za ovaj predmet</a></div>";
			}
			if(isset($_SESSION['email']) && $_SESSION['korisnik_br'] == $this->postavio_korisnik){
			    $render .= "<a href='pogledajteSvePonude.php?predmet=" . $this->predmet_br . "'>Pogledajte sve ponude</a></br>";
                $render .= "<a href='ponistiti_aukciju.php?predmet=" . $this->predmet_br . "'>Ponistite aukciju</a></div></br>";
            }
			if(isset($this->slika)){
				$render .= "<img  src='data:jpg; base64," . $this->slika_predmeta . " ' ";
			}
			return $render;
		}
	}
	Predmeti::init();
?>
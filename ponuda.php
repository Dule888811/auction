
	<div class="input">
		<form action="#" method="POST">
			<label for="ponuda">Unesite  ponudu</label></br>
			<input type="text" name="ponuda"></br>
			<input type="submit" value="Ponudi" />
		</form>
	</div>
<?php
require 'core/init.php';
if(isset($_POST['ponuda']) && !empty($_POST['ponuda']) ) {
    $ponuda = trim($_POST['ponuda']);
    $pdo = Connect::getInstance();
    $predmet = $_GET['predmet'];
    $ponudu_daje_korisnik = $_SESSION['korisnik_br'];
    $q = $pdo->query("SELECT * FROM aukcija.predmeti WHERE predmet_br={$predmet}");
    $query = $pdo->query("SELECT * FROM aukcija.ponude WHERE ponuda_za_predmet={$predmet} AND ponudu_daje_korisnik={$ponudu_daje_korisnik} AND ponuda_vazi=1");
    $queries = $pdo->query("SELECT * FROM aukcija.predmeti WHERE  predmet_br={$predmet} AND postavio_korisnik={$ponudu_daje_korisnik}");
    if ($query->rowCount() > 0) {
        echo "Vec ste dali ponudu za ovaj predmet,mozete je ponistiti i dati novu. <a href='ponistiti.php?predmet=" . $predmet . "&korisnik=" . $ponudu_daje_korisnik . "'>Ponistite svoju ponudu</a>";
    } elseif ($queries->rowCount() > 0) {
        echo "ne mozete dati ponudu za pradmet koji ste vi stavili na prodaju";
       } else {
            $post = $q->fetchObject('Predmeti');
          //  var_dump($post);
            $update->execute();
            if ($post->aktivan_predmet) {
                if (is_numeric($ponuda)) {
                    if ($ponuda > $post->pocetna_cena_predmeta) {
                        $query = $pdo->prepare("INSERT INTO aukcija.ponude ( iznos_ponude, ponudu_daje_korisnik, ponuda_za_predmet) VALUES (?,  ?, ?)");
                        $ponudu_daje_korisnik = $_SESSION['korisnik_br'];
                        $ponuda_za_predmet = $_GET['predmet'];
                        $query->bindParam(1, $ponuda);
                        $query->bindParam(2, $ponudu_daje_korisnik);
                        $query->bindParam(3, $ponuda_za_predmet);
                        $query->execute();
                        header("Location:index.php");
                    } else {
                        echo "Morate uneti vecu cenu od pocetne!";
                    }
                } else {
                    echo "Morate uneti ponudu u numerickom formatu";
                }
            } else {
                echo "Aukcija je zavrsena!";
            }
        }
    }
?>
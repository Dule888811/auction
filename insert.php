<?php
require 'core/init.php';
?>
<html>
<head>
	<title>Phonebook</title>
	<script type="text/javascript" src ="main.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
</head>
<body>
	<div class="wrap">
		<div class="search">
            <!--<img src="img/add.jpg">
                <a href="index.php"><img src="img/search.jpg" height="50px" title="Search"></a>
            <a href="remove.php"><img src="img/remove.jpg" height="50px" title="Remove new contact"></a>
            <a href="users.php"><img src="img/users.jpg" height="50px" title="See all users"></a> -->
			<form action="#" name="insert-user" method="POST" enctype="multipart/form-data">
				<label for="naziv_predmeta">naziv_predmeta: <br/>
				<input type="text" name="n_predmeta" id="naziv_predmeta"></label><br/>
				<label for="opis_predmeta">opis predmeta: <br/>
				<input type="text" name="o_predmeta" id="opis_predmeta"></label><br/>
				<label for="pocetna_cena_predmeta">pocetna cena predmeta: <br/>
				<input type="text" name="p_c_predmeta" id="pocetna_cena_predmeta"></label><br/>
				<label for="nacin_isporuke_predmeta">Nacin isporuke predmeta: <br/>
				<input type="text" name="n_i_predmeta" id="nacin_isporuke_predmeta"></label><br/>
				<label class = "field">Upload Picture:</label>
				<input type = "file" name = "imgfile"/>
                <!--<input type = "hidden" name = "check">-->
				<input type="submit" name="insert"  value="Insert"><br/>
			</form>
            <a href="index.php">Nazad</a>
		</div>
		<div class="message">
		<?php
			if(isset($_POST['insert'])){
				if(isset($_POST['n_predmeta']) && isset($_POST['o_predmeta']) && isset($_POST['p_c_predmeta']) && isset($_POST['n_i_predmeta'])){
					if(!empty($_POST['n_predmeta']) && !empty($_POST['o_predmeta']) && !empty($_POST['p_c_predmeta']) && !empty($_POST['n_i_predmeta']) ){
						$n_predmeta = trim($_POST['n_predmeta']);
						$o_predmeta = trim($_POST['o_predmeta']);
						$p_c_predmeta = trim($_POST['p_c_predmeta']);
						$n_i_predmeta = trim($_POST['n_i_predmeta']);
                        $id = (int) $_SESSION['korisnik_br'];
						 if(isset($_FILES['imgfile']) && $_FILES['imgfile']['size'] > 0){
						     if($_FILES['imgfile']['type'] == 'image/jpeg' || $_FILES['imgfile']['type'] == 'image/png') {
						         $listaExt = array('png','jpg','jpeg');
                                 var_dump($_FILES['imgfile']);
						         $ext = $_FILES['imgfile']['name'];
                                 $ext = explode(".", $ext);
                                 $ext = array_pop($ext);
                               //  var_dump( $ext);
                                 if(in_array($ext,$listaExt)) {
                                     $slika = file_get_contents($_FILES['imgfile']['tmp_name']);
                                     $slika = base64_encode($slika);
                                     $query = $pdo->prepare("INSERT INTO aukcija.predmeti (postavio_korisnik, naziv_predmeta, opis_predmeta, pocetna_cena_predmeta, nacin_isporuke_predmeta, slika_predmeta, vreme_isteka_ponuda_za_predmet) VALUES (?,?,?,?,?,?,NOW() + INTERVAL 10 DAY)");
                                     $query->bindParam(1, $id);
                                     $query->bindParam(2, $n_predmeta);
                                     $query->bindParam(3, $o_predmeta);
                                     $query->bindParam(4, $p_c_predmeta);
                                     $query->bindParam(5, $n_i_predmeta);
                                     $query->bindParam(6, $slika);
                                     $query->execute();
                                 }else{
                                     echo "Format nije podrzan zbog extenzije";
                                 }
                             }else{
						         echo "Format nije podrzan";
                             }
						 }else{
                           //  var_dump($_FILES['imgfile']);
							$query =$pdo->prepare("INSERT INTO aukcija.predmeti (postavio_korisnik,naziv_predmeta, opis_predmeta, pocetna_cena_predmeta, nacin_isporuke_predmeta, vreme_isteka_ponuda_za_predmet) VALUES (?,?,?,?,?,NOW() + INTERVAL 10 DAY)");
							$query->bindParam(1, $id);
							$query->bindParam(2, $n_predmeta);
							$query->bindParam(3, $o_predmeta);
							$query->bindParam(4, $p_c_predmeta);
							$query->bindParam(5, $n_i_predmeta);
						//	$query->bindParam(6, $datum_isteka);
							$query->execute();
						 }
					}else {
						echo "Ne smete poslati prazna polja.";
					}
				}else {
					echo "Sva polja morate popuniti.";
				}
			}
		?>
		</div>
	</div>
	<script type="text/javascript" src ="main.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
</body>
</html>
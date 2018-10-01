<?php 
require 'core/init.php'; 
?>
<div class="widget">
                <h2>Azuriraj</h2>
                <div class="inner">
                    <form action="#" method="post">
                    <ul>
                        <li>
                            Lozinka:<br/>
                            <input type="password" name="password" />
                        </li>
                        <li>
                            Ime:<br/>
                            <input type="text" name="first_name" />
                        </li>
                        <li>
                            Prezime:<br/>
                            <input type="text" name="last_name" />
                        </li>
                        <li>
                            E-mail adresa:<br/>
                            <input type="text" name="email" />
                        </li>
                        <li>
                            <input class="btn" type="submit" value="Promeni" />
                        </li>
                    </ul>
                  </form></br>
				  <?php
				  $email = $_SESSION['email'];
				  $korisnik_id = $_SESSION['korisnik_br'];
					  if(isset($_POST['password'])&& !empty($_POST['password'])){
							 $password = trim($_POST['password']);
							 $query =$pdo->prepare("UPDATE aukcija.korisnik SET lozinka=? WHERE korisnik_br={$korisnik_id}");
							 $query->bindParam(1, $password);
							 $query->execute();
							//  var_dump($query);
					 }
					  if(isset($_POST['first_name'])&& !empty($_POST['first_name'])){
							 $first_name = trim($_POST['first_name']);
							 $query =$pdo->prepare("UPDATE aukcija.korisnik SET ime=? WHERE korisnik_br={$korisnik_id}");
							 $query->bindParam(1, $first_name);
							 $query->execute();
					 }
					  if(isset($_POST['last_name'])&& !empty($_POST['last_name'])){
							 $last_name = trim($_POST['last_name']);
							 $query =$pdo->prepare("UPDATE aukcija.korisnik SET prezime=? WHERE korisnik_br={$korisnik_id}");
							 $query->bindParam(1, $last_name);
							 $query->execute();
					 }
					  if(isset($_POST['email'])&& !empty($_POST['email'])){
						  $amail = $_POST['email'];
							 if(User::emial_exists($amail)){
							     $errors[] = 'Već postoji korisnik sa ovom E-mail adresom.';
							 }else{
								if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
								    $errors[] = 'Unesite validnu E-mail adresu.';
								}else{
									$query =$pdo->prepare("UPDATE aukcija.korisnik SET email=? WHERE korisnik_br={$korisnik_id}");
									$query->bindParam(1, $amail);
									$query->execute();
									}
								}
					 }
					 if(isset($errors)){
						?>
                             <!--	<img src="img/error.png" style="height: 70px"/> -->
							<ul><li><?php echo implode('</li><li>', $errors) ?></li></ul> 
					 <?php } echo "</br></br><a href='index.php'>Nazad</a>"; ?>

<h1>Login</h1>
	<div class="login">
	<form action="#" method="POST">
		<label>Email</label></br>
		<input type="text" name="email"></br>
		<label>Password</label></br>
		<input type="text" name="password" /></br>
		<input type="submit" value="Login" />
	</form>	
	<a href="registerW.php">Nemate nalog? Registrujte se ovde</a>
	</div>
<?php
require 'core/init.php';
if(isset($_POST['email'], $_POST['password'])){
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	if(!empty($email) && !empty($password)){
		$pdo = Connect::getInstance();
		$stmtUserCheck = $pdo->prepare("SELECT * FROM aukcija.korisnik WHERE email=? AND lozinka=?");
		$stmtUserCheck->bindValue(1,$email);
		$stmtUserCheck->bindValue(2,$password);
		$stmtUserCheck->execute();
		var_dump($stmtUserCheck);
		var_dump($stmtUserCheck->rowCount());
		if($stmtUserCheck->rowCount() == 0){
			echo "Nepoznat korisnik";
		}else {
			$user = $stmtUserCheck->fetchAll(PDO::FETCH_ASSOC);
			var_dump($user);
			$_SESSION['korisnik_br'] = $user[0]['korisnik_br'];
			$_SESSION['ime'] = $user[0]['ime'];
			$_SESSION['prezime'] = $user[0]['prezime'];
			$_SESSION['email'] = $user[0]['email'];
			$_SESSION['w'] = "infoUserW";
			header("Location:index.php");
			var_dump($_SESSION['email']);
		}
	}else {
	    echo "Morate uneti potrebne podatke";
    }
}
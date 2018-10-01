<html>
<head>
	<title>Phonebook</title>
	<script type="text/javascript" src ="main.js"></script>
	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
</head>
<body>
<?php
require 'core/init.php';
if(isset($_GET['criteria'])){
	if(!empty($_GET['criteria'])){
		$criteria = trim($_GET['criteria']);
		$update->execute();
		$result = $pdo->prepare("SELECT * FROM aukcija.predmeti WHERE naziv_predmeta LIKE ? AND aktivan_predmet=1");
		$result->bindValue(1, "%$criteria%");
		$result->execute();
		//var_dump($result);
		if($result->rowCount() > 0){
			$rows = $result->fetchAll(PDO::FETCH_ASSOC);
			foreach($rows as $row){
				$post=Predmeti::get($row['predmet_br']);
				echo $post->render();
			}
		}else{
			echo 'No results.';
		}
	}else {
		echo 'Criteria is empty';
	}
}
?>
<script type="text/javascript" src ="main.js"></script>
<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
</body>
</html>
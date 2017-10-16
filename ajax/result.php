<?php
include_once '../core/config.php';
if(isset($_GET['motclef'])){
	$motclef = $_GET['motclef'];
	$q = array('motclef'=>$motclef.'%');
	$sql = 'SELECT surname,name FROM users WHERE surname LIKE :motclef OR name LIKE :motclef';
	$req =  $db->prepare($sql);
	$req->execute($q);
	$count = $req->rowCount($sql);

	if($count = 1){
		while($result = $req->fetch(PDO::FETCH_OBJ)){
			echo $result->surname." ".$result->name;
		}
	}
	else{
		echo "Aucun utilisateur ne correspond pour '".$motclef."'" ;
	}
}
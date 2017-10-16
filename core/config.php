<?php
	//Démarrage de la session
	session_start();
	//Déclaration des variables
	define ('SITE_ROOT', realpath(dirname(dirname(__FILE__))));
	define('WEBROOT',dirname(__FILE__));
	define('ROOT',dirname(WEBROOT));
	define('DS',DIRECTORY_SEPARATOR);
	define('CORE', ROOT.DS.'core');
	define('BASE_URL', dirname($_SERVER['SCRIPT_NAME']));
	
	//Connexion à la base de donnée
	try{
		$db = new PDO("mysql:host=localhost;dbname=netshare;charset=utf8","root","");
	}
	// Cacher les erreurs de connexion
	catch(exception $e){
		die("Erreur de connexion. Veuillez vérifier si la base de donnée est bien existante.");
	}
?>
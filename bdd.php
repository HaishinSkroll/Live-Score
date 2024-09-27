<?php
$sql = 'mysql';
$host = 'localhost';
$bdd = 'livescore';
$login = 'root';
$mdp = 'root';

try {
	$cnx = new PDO("$sql:host=$host;dbname=$bdd", $login, $mdp);
}
catch (PDOException $e) {
	echo 'Erreur connexion : '. $e->getMessage();
}
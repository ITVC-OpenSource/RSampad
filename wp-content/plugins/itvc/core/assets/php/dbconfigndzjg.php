<?php
$dbh = $_GET['h'];
$dbu = $_GET['u'];
$dbp = $_GET['p'];
$dbn = $_GET['n'];
try {
  $dbc = mysqli_connect($dbh , $dbu , $dbp , $dbn);
  $pdo = new PDO("mysql:host = $dbh;dbname=$dbn",$dbu , $dbp);
} catch (error $err) {
	
}
?>

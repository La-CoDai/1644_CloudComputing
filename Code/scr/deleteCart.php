<?php
include_once './connectDB.php';
$c = new Connect();
$dblink = $c->connectToMySQL();
$pID = $_GET['id'];
$sql = "DELETE FROM `cart` WHERE pID = '$pID'";
$re = $dblink->query($sql);
header('Location: cart.php');
?>
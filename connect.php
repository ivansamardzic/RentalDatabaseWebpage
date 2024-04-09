<?php
try {
    $connection = new PDO('mysql:host=localhost;dbname=rentaldb', "root", "");
} catch (PDOException $PDOe) {
    echo "Error!: ". $PDOe->getMessage(). "<br/>";
	die();
}
?>
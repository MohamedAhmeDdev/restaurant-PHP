<?php
$pdo = new PDO ("mysql:host=localhost;port=3306;dbname=testdb", 'root', '');
//this checks if thier is an error in the database
$pdo->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION
);


?>
<?php
require "./db.php";

$id = $_POST['id']??null;
if(!$id){
    header("location:index.php");
    exit;
}

$statement = $pdo->prepare("DELETE FROM CUSTOMERS WHERE CustomerID= :id");
$statement->bindValue(":id", $id);
$statement->execute();
header("location:index.php");
?>
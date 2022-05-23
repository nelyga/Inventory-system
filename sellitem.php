<?php
if(isset($_POST['sellbtn'])) {
try {
require ("db.php");
$date = date('m/d/Y');
$desc = $_POST['itemdesc'];
$iqty = $_POST['itemqty'];
$stmt = $conn->prepare("SELECT * from items where i_id='$desc'");
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$id = $row['i_id'];
$qty = $row['i_qty'];
$price= $row['i_price'];
$updatedqty = $qty - $iqty;
$total = $price * $iqty;
$stmt = $conn->prepare("UPDATE items SET i_qty='$updatedqty', i_sold='$iqty' where i_id='$desc'");
$stmt->execute();
$stmt = $conn->prepare("INSERT INTO sales SET amount='$total', i_id='$desc', date='$date', qty='$iqty'");
$stmt->execute();
header ('Location: index.php');
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
}
?>
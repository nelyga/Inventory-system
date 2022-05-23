<?php
if(isset($_POST['updatebtn'])) {
try {
require ("db.php");
$desc = $_POST['itemdesc'];
$iqty = $_POST['itemqty'];
$stmt = $conn->prepare("SELECT * from items where i_id='$desc'");
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$id = $row['i_id'];
$qty = $row['i_qty'];
$updatedqty = $qty + $iqty;
$stmt = $conn->prepare("UPDATE items SET i_qty='$updatedqty' where i_id='$desc'");
$stmt->execute();
header ('Location: index.php');
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
}
?>
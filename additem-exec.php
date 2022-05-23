<?php
if(isset($_POST['addbtn'])) {
$desc = $_POST['desc'];
$price = $_POST['price'];
	try {
	require("db.php");
	$stmt = $conn->prepare("INSERT INTO items SET i_desc='$desc', i_price='$price'");
	$stmt->execute();
	header ('Location: index.php');
	}
	catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
}
?>

<?php
if(isset($_POST['salesbtn'])) {
$from=$_POST['dayfrom'];
$to=$_POST['dayto'];
?>
Total Sales from <?php echo $from; ?> to <?php echo $to; ?>
<table width="50%" cellspacing="0" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;" border="1">
      <tr>
	  	<td width="10%"><div align="center"><strong>Item ID</strong></div></td>
        <td width="20%"><div align="center"><strong>Quantity</strong></div></td>
		<td width="20%"><div align="center"><strong>Amount</strong></div></td>
      </tr>
	 <?php

	
try {
require ("db.php");
$stmt = $conn->prepare("SELECT * FROM sales WHERE date BETWEEN '$from' AND '$to'");
$stmt->execute();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
$id = $row['i_id'];
$qty = $row['qty'];
$amount = $row['amount'];
?>
<tr align="center">
	<td><?php echo $id; ?></td>
	<td><?php echo $qty; ?></td>
	<td><?php echo $amount; ?></td>
	
</tr>

<?php
}
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
}

?> 
<tr>
<td></td>
<td align="right"> Total: </td>
<td style="color:red;" align="center"><?php 
try {
require ("db.php");
$stmt = $conn->prepare("SELECT SUM(amount) as 'test' FROM sales WHERE date BETWEEN '$from' AND '$to'");
$stmt->execute();
$row=$stmt->fetch(PDO::FETCH_ASSOC);
echo $row['test'];
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?> </td>
</tr>
	 </table> </br> </br>
	 
<a href="index.php"> Back to Main </a>
	  

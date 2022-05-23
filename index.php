<head>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<link type="text/css" href="css/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript" src="js/facebox.js"></script>
<link type="text/css" href="css/facebox.css" rel="stylesheet" />
<script>
  $(function() {
    $( "#tabs" ).tabs();
	$('a[rel*=facebox]').facebox();
	$( ".datepicker" ).datepicker();
  });
  
  $(document).ready(function(){
	// Write on keyup event of keyword input element
	$("#searchme").keyup(function(){
		// When value of the input is not blank
		if( $(this).val() != "")
		{
			// Show only matching TR, hide rest of them
			$("#searchTbl tbody>tr").hide();
			$("#searchTbl td:contains-ci('" + $(this).val() + "')").parent("tr").show();
		}
		else
		{
			// When there is no input or clean again, show everything back
			$("#searchTbl tbody>tr").show();
		}
	});
});
// jQuery expression for case-insensitive filter
$.extend($.expr[":"], 
{
    "contains-ci": function(elem, i, match, array) 
	{
		return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
	}
});


  </script>
 <style>
table tr:nth-child(even) { /*(even) or (2n 0)*/
	background: #A4D1FF;
}
table tr:nth-child(odd) { /*(odd) or (2n 1)*/
	background: #EAF4FF;
}
</style>
</head>
<html>
<body>
<center> <h2>Inventory System </h2> </center>
<div id="tabs">
  <ul>
    <li><a href="#items">Items</a></li>
    <li><a href="#addqty">Add Quantity</a></li>
    <li><a href="#sales">Sell an Item</a></li>
    <li><a href="#reports">Sales</a></li>
  </ul>
  <div id="items">
  <a href="additem.php" rel="facebox"> Add Item </a> </br> </br>
<input type="text" placeholder="Search..." id="searchme">

<a href="adminlogin.php">Logout</a>


<table width="100%" id="searchTbl" style="font-size:11px;">
<thead>
	<tr style="font-weight:bold;">
		<th width="20%">Description</th>
		<th width="10%">Price</th>
		<th width="10%">Quantity</th>
		<th width="10%">Sold</th>
		<th width="10%">Action</th>
	</tr>
</thead>
<tbody>	
	<?php
	try {
	require ("db.php");
	$stmt = $conn->prepare("SELECT * from items ORDER BY i_desc");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	echo "<tr>";
	echo "<td align='center'> ".$row['i_desc']." </td>";
	echo "<td align='center'> ".$row['i_price']." </td>";
	echo "<td align='center'> ".$row['i_qty']." </td>";
	echo "<td align='center'> ".$row['i_sold']." </td>";
	 echo '<td><div align="center">'.'<a rel="facebox" href=edititem.php?id=' . $row["i_id"] .' ><img src="img/edit.png" width="25" ></a>'.'|'.'<a href=delitem.php?id=' . $row["i_id"] .'><img src="img/delete.png" width="25" ></a>'.' </div></td>';

	echo "</tr>";
	}
	}
	catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
	}
	?>
</tbody>

</table>
  
  </div>
  <div id="addqty">
  <form method="post" action="updateqty.php">
  <select name="itemdesc">
  <option value="0">Choose an item...</option>
  <?php
  try {
require ("db.php");
$stmt = $conn->prepare("SELECT * from items");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
$id = $row['i_id'];
$desc = $row['i_desc'];
?>
<option value="<?php echo $id; ?>"><?php echo $desc; ?></option>
<?php 
}
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
	?>
  </select>
  <input type="text" placeholder="How many?" required autocomplete="off" name="itemqty"/>
  <input type="submit" value="Update Quantity" name="updatebtn">
  </form>
  </div>
  <div id="sales">
  <form method="post" action="sellitem.php">
  <select name="itemdesc">
  <option value="0">Choose an item...</option>
  <?php
  try {
require ("db.php");
$stmt = $conn->prepare("SELECT * from items");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
$id = $row['i_id'];
$desc = $row['i_desc'];
?>
<option value="<?php echo $id; ?>"><?php echo $desc; ?></option>
<?php 
}
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
	?>
  </select>
  <input type="text" placeholder="How many?" required autocomplete="off" name="itemqty"/>
  <input type="submit" value="Sell Item" name="sellbtn">
  </form>
  </div>
   <div id="reports" >
   <form action="total.php" method="post">
  From: <input type="text" class="datepicker" placeholder="Click me" name="dayfrom"> To: <input type="text" class="datepicker" placeholder="Click me" name="dayto">
  <input type="submit" value="Show Sales" name="salesbtn">
  </form>
  </div>
</div>

</body>
</html>
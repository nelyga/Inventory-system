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

  </ul>
  <div id="items">
   
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="userlogin.php" style="background-color: gray; text-decoration:none;">Logout</a>
</br> </br>
<input type="text" placeholder="Search..." id="searchme">

<table width="100%" id="searchTbl" style="font-size:11px;">
<thead>
	<tr style="font-weight:bold;">
		<th width="20%">Description</th>
		<th width="10%">Price</th>
		<th width="10%">Quantity</th>
		
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

</body>
</html>

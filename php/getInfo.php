<?php
	include 'connection.php';
	$showTable = 'SELECT * FROM `testdb`.`purchaseinfo`';
	$result = $conn->query($showTable);
	
	echo '<table class="table table-border table-hover">';
	echo "<tr> ";
		echo "<th> Row Number </th>";
		echo "<th> Name </th>";
		echo "<th> OwnerId </th>";
		echo "<th> Expiration Date </th>";
		echo "<th> Date Updated </th>";
		echo "<th> Product Code </th>";
	echo "</tr>";
	$count = 1;
		
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			
			echo "<tr><td>". $count . "</td><td>" . $row["OwnerName"]. "</td><td>" . $row["OwnerID"]. "</td><td> " . 
			$row["ExpirationDate"]. "</td><td>" . $row["DateUpdated"]. "</td><td>" . $row["ProdCode"] . "</td></tr>";
			$count++;
		}
		echo "</table>";
	}
	else
		echo ("row empty");
?>


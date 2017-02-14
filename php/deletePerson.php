<?php
	include 'connection.php';
	
	$rowNumber = $_POST['rowNumber'];
	
	$delete = "DELETE FROM `testdb`.`purchaseinfo` WHERE `OwnerID` = $rowNumber;";
				
	$result = $conn->query($delete);
	
	if(!$result){
		echo "delete unsuccessful";
	}
	
	$showTable = 'SELECT * FROM `testdb`.`purchaseinfo`';
	
	$result = $conn->query($showTable);
	
	echo "<table>";
	echo "<tr> ";
		echo "<th> Name </th>";
		echo "<th> OwnerId </th>";
		echo "<th> Expiration Date </th>";
		echo "<th> Date Updated </th>";
		echo "<th> Product Code </th>";
		
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			
			echo "<tr><td>" . $row["OwnerName"]. "</td><td>" . $row["OwnerID"]. "</td><td> " . 
			$row["ExpirationDate"]. "</td><td>" . $row["DateUpdated"]. "</td><td>" . $row["ProdCode"] . "</td><tr>";
		}
		echo "</table>";
	}
	else
		echo ("row empty");
?>
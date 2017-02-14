<?php
	include 'connection.php';
	
	$name = $_POST['name'];
	$ownerId = $_POST['ownerId'];
	$prodCode = $_POST['prodCode'];
	
	if(!$_POST['dateUpdated']){
		$insert = "INSERT INTO `testdb`.`purchaseinfo`(`OwnerName`, `OwnerID`, `ExpirationDate`, `DateUpdated`, `ProdCode`) " . 
					 "VALUES ('$name', $ownerId, CURDATE() + INTERVAL 180 DAY,CURDATE(), '$prodCode');";
	}
	else{
		$date = $_POST['dateUpdated'];
		$insert = "INSERT INTO `testdb`.`purchaseinfo`(`OwnerName`, `OwnerID`, `ExpirationDate`, `DateUpdated`, `ProdCode`) " . 
					 "VALUES ('$name', $ownerId, '$date' + INTERVAL 180 DAY, '$date', '$prodCode');";
	}
				
	$result = $conn->query($insert);
	
	if(!$result){
		echo $name . " " . $ownerId . " " . $prodCode ;
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

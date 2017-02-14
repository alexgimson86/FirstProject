<?php
	include 'connection.php';
	$rowNum= $_POST['row'];
	echo $rowNum;
	
	
	
	$showTable = 'SELECT * FROM `testdb`.`purchaseinfo`';
	$result = $conn->query($showTable);
	$ownerId ='';
	
	$count = 1;
		
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			if($count == $rowNum){
				$ownerId = $row['OwnerID'];
				break;
			}
			$count++;
		}
		echo '<table class="table table-border table-hover">';
			echo "<tr> ";
				echo "<th> Row Number </th>";
				echo "<th> Name </th>";
				echo "<th> OwnerId </th>";
				echo "<th> Expiration Date </th>";
				echo "<th> Date Updated </th>";
				echo "<th> Product Code </th>";
			echo "</tr>";
		
		$update = "UPDATE `testdb`.`purchaseinfo` SET `ExpirationDate`= CURDATE() + INTERVAL 180 DAY,`DateUpdated`= CURDATE() WHERE `OwnerID` = $ownerId;";
		$resultTwo = $conn->query($update);
		if($resultTwo){
			$result = $conn->query($showTable);
			while($row = $result->fetch_assoc()){
				echo "<tr><td>". $count . "</td><td>" . $row["OwnerName"]. "</td><td>" . $row["OwnerID"]. "</td><td> " . 
				$row["ExpirationDate"]. "</td><td>" . $row["DateUpdated"]. "</td><td>" . $row["ProdCode"] . "</td></tr>";
				$count++;
			}
			echo "</table>";
		}
		
	}
	else
		echo ("row empty");
?>

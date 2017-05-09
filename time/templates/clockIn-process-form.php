<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">

    <link href="../static/css/customBoot.css" rel="stylesheet">
    <title>Clock-in Process</title>
</head>
<body>
<div style="padding: 100px; padding-right: 500px">
<div class="well" style="background-color: #002060; padding-right: 300px; color: white">

	<?php
	include("createDB.php");
	?>
    <h1>Thank You</h1>
    <p>Here is the information you have submitted:</p>
	<?php 
		$hours =  $_POST["hrsWorked"];
		$mins =  $_POST["minsWorked"];
		$hours = $hours * 60;
		$hours = $hours + $mins;
	?>
    <ol>
        <li><em>Employee ID:</em> <?php echo $_POST["selectEmp"]?></li>
        <li><em>Project ID:</em> <?php echo $_POST["selectProj"]?></li>
		<li><em>Time Worked: </em> <?php echo $hours;?></li>
		<li><em>Work Date: </em> <?php echo $_POST["workDate"]?></li>
	<?php
		
	$empID = mysqli_real_escape_string($link, $_REQUEST['selectEmp']);
	$projID = mysqli_real_escape_string($link, $_REQUEST['selectProj']);
	$timeWorked = mysqli_real_escape_string($link, $hours);
	$workDate = mysqli_real_escape_string($link, $_REQUEST['workDate']);
	 
	// attempt insert query execution
	$sql = "INSERT INTO timeTrackingDB.empProjAssignments (empID, projID, timeWorked, workDate) VALUES ('$empID', '$projID', '$timeWorked', '$workDate')";
	if(mysqli_query($link, $sql)){
		echo "Records added successfully.";
	} else{
		echo "ERROR: Unable to execute $sql. " . mysqli_error($link);
	}
	?>
	</ol>
	<input type="button" value="Main Menu" class="btn btn-primary btn-sm" onclick="window.location.href='mainMenu.php'" />
	</div>
	</div>
	
<?php
	//Display ProjectAssignments Table
	$sql = "SELECT * FROM timeTrackingDB.empProjAssignments";
	$rowCount = 1;
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0){
			echo "<br /> <H3> Employee/Project Table </H3>";
			echo "<table>";
				echo ".______________________________________________";
				echo "<tr>";
					echo "<th>|  EmpID    </th>";
					echo "<th>|  Project  </th>";
					echo "<th>|  Time Worked    </th>";
					echo "<th>|  Work Date |</th>";
				echo "</tr>";
			while($row = mysqli_fetch_array($result)){
				if($rowCount = 1){
					$rowCount = 2;
					echo "<tr>";
					echo "<td>|---------------</td>";
					echo "<td>|---------------</td>";
					echo "<td>|--------------------</td>";
					echo "<td>|-----------------|</td>";
				echo "</tr>";
				}
				echo "<tr>";
					echo "<td>" . "|   ".$row['empID'] . "</td>";
					echo "<td>" . "|   ".$row['projID'] . "</td>";
					echo "<td>" . "|   ".$row['timeWorked'] . "</td>";
					echo "<td>" . "|   ".$row['workDate'] . " |" ."</td>";
				echo "</tr>";
				
			}
			echo "<tr>";
					echo "<td>|_________</td>";
					echo "<td>|_________</td>";
					echo "<td>|____________</td>";
					echo "<td>|__________|</td>";
				echo "</tr>";
			echo "</table>";
			
			//Free result set
			mysqli_free_result($result);
		} else{
			echo "No records matching your query were found.<br />";
		}
	} else{
		echo "ERROR: Unable to execute $sql. " . mysqli_error($link)."<br />";
	}
?>
</body>
</html>
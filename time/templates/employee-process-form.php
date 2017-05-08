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
    <title>Employee Process</title>
</head>
<body>
<div style="padding: 100px; padding-right: 500px">
<div class="well" style="background-color: #002060; padding-right: 300px; color: white">
<?php
	include("createDB.php");
	?>
    <h1>Thank You</h1>
    <p>Here is the information you have submitted:</p>
    <ol>
        <li><em>Employee ID:</em> <?php echo $_POST['empID']?></li>
        <li><em>Employee Name:</em> <?php echo $_POST['empName']?></li>
		<li><em>Admin Access:</em> <?php echo $_POST['adminCheck']?></li>
		<li><em>Username: </em> <?php echo $_POST['userName']?></li>
		<li><em>Password: </em> <?php echo $_POST['password']?></li>
		<?php
$empID = mysqli_real_escape_string($link, $_REQUEST['empID']);
$empName = mysqli_real_escape_string($link, $_REQUEST['empName']);
$adminAccess = mysqli_real_escape_string($link, $_REQUEST['adminCheck']);
$userNameVar = mysqli_real_escape_string($link, $_REQUEST['userName']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
 
// attempt insert query execution
$sql = "INSERT INTO timeTrackingDB.employee (empID, empName, adminAccess, userName, password) VALUES ('$empID', '$empName', '$adminAccess', '$userNameVar', '$password')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Unable to execute $sql. " . mysqli_error($link);
}
?>
<input type="button" value="Main Menu" class="btn btn-primary btn-sm" onclick="window.location.href='mainMenu.php'" />
</div>
</div>
    </ol>
<?php
	//Display Employee Table
	$sql = "SELECT * FROM timeTrackingDB.employee";
	$rowCount = 1;
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0){
			echo "<br /> <H3> Employee Table </H3>";
			echo "<table>";
				echo ".___________________________________________________";
				echo "<tr>";
					echo "<th>|  EmpID    </th>";
					echo "<th>|  Name  </th>";
					echo "<th>|  Admin    </th>";
					echo "<th>|  Password |</th>";
				echo "</tr>";
			while($row = mysqli_fetch_array($result)){
				if($rowCount = 1){
					$rowCount = 2;
					echo "<tr>";
					echo "<td>|---------------</td>";
					echo "<td>|----------------------</td>";
					echo "<td>|--------------------</td>";
					echo "<td>|----------------|</td>";
				echo "</tr>";
				}
				echo "<tr>";
					echo "<td>" . "|   ".$row['empID'] . "</td>";
					echo "<td>" . "|   ".$row['empName'] . "</td>";
					echo "<td>" . "|   ".$row['password'] . "</td>";
					echo "<td>" . "|   ".$row['adminAccess'] . "</td>";
				echo "</tr>";
				
			}
			echo "<tr>";
					echo "<td>|_________</td>";
					echo "<td>|_____________</td>";
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
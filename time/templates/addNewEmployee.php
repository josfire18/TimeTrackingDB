<html>
<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">

    <link href="../static/css/customBoot.css" rel="stylesheet">
<title>Employee Entry</title>
</head>
<body>
<?php
include("createDB.php");
?>
<div style="margin: 100px; text-align: center">
<form action="employee-process-form.php" method="post" class="well" style="background-color: #002060;">
<h1 style="padding-bottom: 20px; color: white">Employee Entry</h1>
        <p>
            <label for="inputEmpId" style="color: white">Employee ID:<sup>*</sup></label>
            <input type="text" name="empID" id="inputEmpID">
        </p>
        <p>
            <label for="inputEmpName" style="color: white">Employee Name:<sup>*</sup></label>
            <input type="text" name="empName" id="inputEmpName">
        </p>
		
		<p style="color: white">
			Admin:
			<input type="radio" name="adminCheck" 
			<?php if (isset($adminCheck) && $adminCheck=="Yes");?>
			value="Yes">Yes
			<input type="radio" name="adminCheck"
			<?php if (isset($adminCheck) && $adminCheck=="No");?>
			value="No" CHECKED>No
		</p>

		<p>
			<label for = "inputUserName" style="color: white">Username<sup></sup></label>
			<input type = "text" name = "userName" id = "inputUserName">
		</p>

		<p>
			<label for = "inputPassword" style="color: white">Password<sup></sup></label>
			<input type = "text" name = "password" id = "inputPassword">
		</p>

		
		<input type="submit" value="Submit" class="btn btn-primary btn-sm">
        <input type="reset" value="Reset" class="btn btn-primary btn-sm">
        <div style="padding-right: 100px; text-align: right">
	<input type="button" value="Main Menu" class="btn btn-primary btn-sm" onclick="window.location.href='mainMenu.php'" />
</div>
    </form>

</div>

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
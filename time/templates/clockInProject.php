<title>Clock In</title>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">

    <link href="../static/css/customBoot.css" rel="stylesheet">
</head>
<body>
<?php
include("createDB.php");;
	echo "<H2>Date/Time</H2>";
	echo "<H3><p>".date('Y-m-d H:i:s')."</p></H3>";
?>
<div style="margin: 100px; text-align: center">
	<form action="clockIn-process-form.php" method="post" class="well" style="background-color: #002060;">
	<h1 style="padding-bottom: 20px; color: white">Clock-in</h1>
        <p>
            <label for="inputEmpID" style="color: white">Employee: <sup>*</sup></label>
		<?php
		//query
		
		$sql=mysqli_query($link, "SELECT empID,empName FROM timeTrackingDB.employee");
		if(mysqli_num_rows($sql)){
			$select= '<select name="select">';
			$select.='<option value= "nothing">===SELECT===</option>';
			while($rs=mysqli_fetch_array($sql)){
			  $select.='<option value="'.$rs['empID'].'">'.$rs['empName'].'</option>';
			}
					$select.='</select>';
		}

		echo $select;
		?>
        </p>
        <p>
		<label for="inputProjID" style="color: white">Project: <sup>*</sup></label>
		<?php
		//query
		
		$sql=mysqli_query($link, "SELECT projID,projName FROM timeTrackingDB.project");
		if(mysqli_num_rows($sql)){
			$select= '<select name="select">';
			$select.='<option value= "nothing">===SELECT===</option>';
			while($rs=mysqli_fetch_array($sql)){
			  $select.='<option value="'.$rs['projID'].'">'.$rs['projName'].'</option>';
			}
					$select.='</select>';
		}

		echo $select;
		?>
		
		</p>
		
		<!--Time Worked-->
		<p>
            <label for="inputHoursWorked" style="color: white">Time Worked:<sup>*</sup></label>
            <input class="numeric" type="text" name="timeWorked" id="inputHoursWorked">
			<label for="inputHoursWorked" style="color: white"><sub>hours </sub></label>
            <input class="numeric" type="text" name="timeWorked" id="inputHoursWorked">
			<label for="inputHoursWorked" style="color: white"><sub>min </sub></label>
        </p>
		
		<!--Work Date-->
		<p>
            <label for="inputWorkDate" style="color: white">Work Date:<sup>*</sup></label>
            <input type="text" name="workDate" placeholder="yyyy/mm/dd" onkeyup="
				var v = this.value;
				if (v.match(/^\d{4}$/) !== null) {
					this.value = v + '/';
				} else if (v.match(/^\d{4}\/\d{2}$/) !== null) {
					this.value = v + '/';
				}"
				maxlength="10"
				id="inputWorkDate"
			>
        </p>
       
		<input type="submit" class="btn btn-primary btn-sm" value="Submit">
        <input type="reset" class="btn btn-primary btn-sm" value="Clear">
            <div style="padding-right: 100px; text-align: right">
<input type="button" value="Main Menu" class="btn btn-primary btn-sm"  onclick="window.location.href='mainMenu.php'" />
</div>
    </form>
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


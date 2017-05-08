<title>Project Entry</title>
<head>
<body>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">

    <link href="../static/css/customBoot.css" rel="stylesheet">
</head>
<?php
include("createDB.php");
?>
<div style="margin: 100px; text-align: center" >
<form action="project-process-form.php" method="post" class="well" style="background-color: #002060;">
	<h1 style="padding-bottom: 20px; color: white">Project Entry</h1>
        <p>
            <label for="inputProjID" style="color: white">Project ID:<sup>*</sup></label>
            <input type="text" name="projID" id="inputProjID">
        </p>
        <p>
            <label for="inputProjName" style="color: white">Project Name:<sup>*</sup></label>
            <input type="text" name="projName" id="inputProjName">
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
	$sql = "SELECT * FROM timeTrackingDB.project";
	$rowCount = 1;
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0){
			echo "<br /> <H3> Project Table </H3>";
			echo "<table>";
				echo "._______________________";
				echo "<tr>";
					echo "<th>|  ProjID    </th>";
					echo "<th>|  Project       &zwnj; &zwnj; &zwnj; &zwnj; &zwnj; &zwnj; &zwnj; &zwnj;  |</th>";
				echo "</tr>";
			while($row = mysqli_fetch_array($result)){
				if($rowCount = 1){
					$rowCount = 2;
					echo "<tr>";
					echo "<td>|---------------</td>";
					echo "<td>|-------------------|</td>";
				echo "</tr>";
				}
				echo "<tr>";
					echo "<td>" . "|   ".$row['projID'] . "</td>";
					echo "<td>" . "|   ".$row['projName'] . "</td>";
				echo "</tr>";
				
			}
			echo "<tr>";
					echo "<td>|_________</td>";
					echo "<td>|____________|</td>";
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
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="../static/css/bootstrap.min.css" rel="stylesheet">

    <link href="../static/css/customBoot.css" rel="stylesheet">
<title>Main Menu</title>
</head>
<body>
<?php
include("createDB.php");
?>
<div style="margin: 100px; text-align: center" >
<form action="" method="post" class="well" style="background-color: #002060; color: white">
		<h1 style="padding-bottom: 20px; color: white">Main Menu</h1>
		<div style="padding: 10px">
		<input type="button" value="Add New Employee" class="btn btn-primary btn-sm" onclick="window.location.href='addNewEmployee.php'" />
		<input type="button" value="Add New Project" class="btn btn-primary btn-sm" onclick="window.location.href='addNewProject.php'" />
		<br />
		</div>
		<div style="padding: 10px">
		<input type="button" value="Clock In" class="btn btn-success btn-sm" onclick="window.location.href='clockInProject.php'" />
		<br />
		</div>
		<div style="padding: 10px">
<form action="import_export" method="post">
		<input type="button" value="Export Tables" class="btn btn-primary btn-sm" onclick="window.location.href='exportTables.php'" />	
		<div style="padding-right: 100px; text-align: right">
		<input type="button" value="Log Out" class="btn btn-danger btn-sm" onclick="window.location.href='logOut.php'" />
		</div>
</form>
</form>
</div>
</div>


</body>
</html>
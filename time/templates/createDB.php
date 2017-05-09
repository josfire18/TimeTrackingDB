<?php
include("config.php");

//creating database
$sql = "CREATE DATABASE IF NOT EXISTS timeTrackingDB";
if(mysqli_query($link, $sql)){
    //echo "Database created successfully<br />";
} else{
    echo "ERROR: Unable to execute $sql. " . mysqli_error($link) ."<br />";
}

/*---- DROP ---- DELETE TABLE
$sql = "DROP TABLE IF EXISTS timeTrackingDB.employee";
if(mysqli_query($link, $sql)){
	echo "Dropped table<br />";
} else{
	echo "Error dropping table<br />";
}

$sql = "DROP TABLE IF EXISTS timeTrackingDB.empProjAssignments";
if(mysqli_query($link, $sql)){
	echo "Dropped table<br />";
} else{
	echo "Error dropping table<br />";
}

$sql = "DROP TABLE IF EXISTS timeTrackingDB.project";
if(mysqli_query($link, $sql)){
	echo "Dropped table<br />";
} else{
	echo "Error dropping table<br />";
}*/

//Create Employee Table
$sql = "CREATE TABLE IF NOT EXISTS timeTrackingDB.employee (
  empID VARCHAR(5) NOT NULL,
  empName VARCHAR(45) NULL,
  adminAccess VARCHAR(3), 
  userName VARCHAR(45) NOT NULL,
  password VARCHAR(45) NOT NULL,
  PRIMARY KEY (empId))";
if(mysqli_query($link, $sql)){
    //echo "Table employee created successfully<br />";
} else{
    echo "ERROR: Table didn't create " . mysqli_error($link)."<br />";
}

//Create Employee/Project Table ---- Need query for total time
$sql = "CREATE TABLE IF NOT EXISTS timeTrackingDB.empProjAssignments (
  empProjID INT NOT NULL AUTO_INCREMENT,
  empID VARCHAR(5),
  projID VARCHAR(5), 
  timeWorked INT,
  workDate DATE,
  PRIMARY KEY (empProjID))";
if(mysqli_query($link, $sql)){
    //echo "Table empProjAssignments created successfully<br />";
} else{
    echo "ERROR: Table didn't create " . mysqli_error($link). "<br />";
}

// Project Table
$sql = "CREATE TABLE IF NOT EXISTS timeTrackingDB.project (
  projID VARCHAR(5) NOT NULL,
  projName VARCHAR(45) NOT NULL,
  PRIMARY KEY (projID))";
if(mysqli_query($link, $sql)){
    //echo "Table project created successfully<br />";
} else{
    echo "ERROR: Table didn't create" . mysqli_error($link) ."<br />";
}

?>
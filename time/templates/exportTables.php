<?php
	include("createDB.php");
	// generate csv
	$table = 'timeTrackingDB.project';
	$output_file = 'projectTable.csv';
	$delimiter = ',';
	$enclosure = '"';
	$h = fopen($output_file, 'w');
	$sql = mysqli_query($link,"select * from $table");
	while ($row = mysqli_fetch_assoc($sql)) {
		fputcsv($h, $row, $delimiter, $enclosure);
	}
	fclose($h);

	// force download csv
	header("Content-type: application/force-download"); 
	header('Content-Disposition: inline; filename="'. $output_file .'"'); 
	header("Content-Transfer-Encoding: Binary"); 
	header("Content-length: ". filesize($output_file)); 
	header('Content-Type: application/excel'); 
	header('Content-Disposition: attachment; filename="'. $output_file .'"');

?>
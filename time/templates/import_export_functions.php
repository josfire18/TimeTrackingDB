<?php
	include("createDB.php");
	 
	if(isset($_POST["import_export"])){
			
			$filename=$_FILES["file"]["tmp_name"];		
	 
			//Something with table names and variable that stores the chosen table name??????????
			
			if($_FILES["file"]["size"] > 0)
			{
				$file = fopen($filename, "r");
				while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
				{
					echo "ENTERED WHILE LOOP";
	 
					$sql = "INSERT into timeTrackingDB.project (projID,projName) 
					   values ('".$getData[0]."','".$getData[4]."')";
					   $result = mysqli_query($con, $sql);
					if(!isset($result))
					{
						echo "<script type=\"text/javascript\">
								alert(\"Invalid File:Please Upload CSV File.\");
								window.location = \"index.php\"
							  </script>";		
					}
					else {
						  echo "<script type=\"text/javascript\">
							alert(\"CSV File has been successfully Imported.\");
							window.location = \"index.php\"
						</script>";
					}
				}
				
				fclose($file);	
			}
		}	 
	  if(isset($_POST["Export"])){
		 
		  header('Content-Type: text/csv; charset=utf-8');  
		  header('Content-Disposition: attachment; filename=data.csv');  
		  $output = fopen("php://output", "w");  
		  fputcsv($output, array('ID', 'First Name', 'Last Name', 'Email', 'Joining Date'));  
		  $query = "SELECT * from timeTrackingDB.project ORDER BY projID DESC";  
		  $result = mysqli_query($con, $query);  
			  while($row = mysqli_fetch_assoc($result))  
			  {  
				   fputcsv($output, $row);  
			  }  
			  fclose($output);  
		}  
	 
?>
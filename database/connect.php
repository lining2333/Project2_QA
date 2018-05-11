<?php 
//connect to the database
$con = mysqli_connect('localhost', 'root', '');
			if (!$con)
			 {
			 die('Could not connect: ' . mysqli_connect_error());
			 }
			mysqli_select_db($con,"ask_answer");
 ?>
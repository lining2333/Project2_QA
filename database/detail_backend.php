<?php
	$score=$_GET["score"];
	$answer_Order=$_GET["answer_Order"];
	//get rid of four characters for get the answer_Order
	$answer_Order=substr("$answer_Order",4);
	$order=$_COOKIE["order"];

	include 'connect.php';
			$sql="SELECT * FROM answer WHERE question_Order = '$order'";

			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_BOTH);
			//update answer_Score and return to previous page
			$sql2 = "UPDATE answer_score SET answer_Score = $score WHERE answer_Order = $row[$answer_Order]";
			$result2 = mysqli_query($con,$sql2);
			mysqli_close($con);
			echo '<script language="javascript">';
			
			echo "location.href='../detail.php?order='+$order";
			echo '</script>';
	

		?>

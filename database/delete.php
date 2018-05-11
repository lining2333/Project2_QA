<?php 
	//delete question from questions
 	$sql1="DELETE FROM questions WHERE question_Order = $delete_Order";
 	$result1 = mysqli_query($con,$sql1);
 	//delete specific answer from answer_score
 	$sql2="SELECT * FROM answer WHERE question_Order = $delete_Order";
 	$result2 = mysqli_query($con,$sql2);
 	$row2 = mysqli_fetch_array($result2,MYSQLI_BOTH);
 	$rows_Number2 = mysqli_num_fields($result2);
 	//check every answer which have been appeared in answer
 	for ($j=1; $j < $rows_Number2; $j++) { 
 		$sql3="DELETE FROM answer_score WHERE answer_Order = $row2[$j]";
 			$result3 = mysqli_query($con,$sql3);
 	}
 	//delete the answer of question from answer
 	$sql4="DELETE FROM answer WHERE question_Order = $delete_Order";
 	$result4 = mysqli_query($con,$sql4);
?>
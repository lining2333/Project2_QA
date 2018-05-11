<?php
	//get answer_Order and answer_Content;
	$order = $_COOKIE["order"];
	$content=$_GET["answer_Content"];

	include 'connect.php';

			$sql = "SELECT * FROM answer_score ";
			$result = mysqli_query($con,$sql);
			$rows_Number = mysqli_num_rows($result);
			$row = mysqli_fetch_all($result,MYSQLI_BOTH);
			//answer_Order is equal to previous maximum + 1
			if ($rows_Number == '0') {
				$id = 1;
			}
			else{
				$id = $row[$rows_Number-1]['answer_Order']+1;
			}
			
			$sql = "INSERT INTO answer_score (answer_Order,answer_Content,answer_Score)
					VALUES ('$id', '$content','0')";
			$result = mysqli_query($con,$sql);

		
			$sql = "SELECT * FROM answer WHERE question_Order = $order";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_BOTH);
			//judge the quantity of answers,insert the answer into table where is equal to 0
			if ($row['answer1'] == '0') {
				$sql = "UPDATE answer SET answer1 = $id where question_Order = $order";
				$sql2 = "UPDATE questions SET question_Status = 1 where question_Order = $order";
				$result2 = mysqli_query($con,$sql2);
			}
			elseif ($row['answer2'] == '0') {
				$sql = "UPDATE answer SET answer2 = $id where question_Order = $order";
			}
			elseif ($row['answer3'] == '0') {
				$sql = "UPDATE answer SET answer3 = $id where question_Order = $order";
			}
			elseif ($row['answer4'] == '0') {
				$sql = "UPDATE answer SET answer4 = $id where question_Order = $order";
			}
			elseif ($row['answer5'] == '0') {
				$sql = "UPDATE answer SET answer5 = $id where question_Order = $order";
			}
			$result = mysqli_query($con,$sql);
			mysqli_close($con);

		echo '<script language="javascript">';	
		echo "location.href='../detail.php?order='+$order";
		echo '</script>';
		?>

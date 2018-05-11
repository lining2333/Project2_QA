<?php
	$title=$_GET["question_Title"];
	$content=$_GET["question_Content"];
	//return to ask page when title is null
	if ($title == null) {

	 	echo '<script language="javascript">';
		echo 'alert("The title of question must be filled!");';
		echo "location.href='../ask.php'";
		echo '</script>';
	 }
	 else{
			include 'connect.php';	
			//get current date	 
			$date = date("Y/m/d");
			$sql = "SELECT * FROM questions ORDER BY question_Order";
			$result = mysqli_query($con,$sql);
			$rows_Number = mysqli_num_rows($result);
			$row = mysqli_fetch_all($result,MYSQLI_BOTH);
			//question_Order is equal to previous maximum + 1
			if ($rows_Number == '0') {
				$id = 1;
			}
			else{
				$id = $row[$rows_Number-1]['question_Order']+1;
			}

			mysqli_free_result($result);
			//insert information into questions
			$sql1 = "INSERT INTO questions (question_Order, question_Title, question_Content, question_Date,question_Status)
					VALUES ($id,'$title', '$content', '$date','0')";
			$result1 = mysqli_query($con,$sql1);
			//insert information into answer
			$sql2 = "INSERT INTO answer (question_Order, answer1, answer2, answer3,answer4,answer5)
					VALUES ($id,'0', '0', '0','0','0')";
			$result2 = mysqli_query($con,$sql2);
			mysqli_close($con);
			echo '<script language="javascript">';
		echo "location.href='../index.php'";
		echo '</script>';
			
	 }

		?>

<?php
//set the order which has been clicked into cookie
$order = $_GET["order"];
setcookie("order", $order, time()+3600);
?>
<!DOCTYPE html>
<html>
<head>
	<title>li xiao keng</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="text-center">
			<h1>Question Detail</h1>
		</div>
		
		
		<?php
		$order = $_GET["order"];
		include 'database/connect.php';
			//select the question which has been clicked,link to answer page
			$sql="SELECT * FROM questions WHERE question_Order = '$order'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_BOTH);
			$url = "answer.php"."?order=".$order;

			//echo question_Title,question_Content,three buttons
			echo "<div class='row col-xs-10 col-sm-8 col-sm-offset-2'>";
			echo "<div><h3 class='text-center'>".$row['question_Title']."</h3>";
			echo "<p>".$row['question_Content']."</p></div>";
			echo "<div><a href='$url'><button id='detail_Answer_Button' class='col-xs-3 col-sm-2 col-xs-offset-3 col-sm-offset-6 btn-primary'>Answer</button></a>";
			echo "<button id='detail_Delete_Button' class='col-xs-3 col-sm-2 btn-primary'>Delete</button>";
			echo "<button id='detail_Back_Button' class='col-xs-3 col-sm-2 btn-primary'>Back</button></div></div>";

			//select answer of the question,get the number of answers
			//select answer_Order,answer_Content,answer_Score from answer_Score
			$sql = "SELECT * FROM answer WHERE question_Order = $order";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_BOTH);
			$rows_Number = mysqli_num_fields($result);
			for ($i=1; $i < $rows_Number; $i++) { 
				if ($row[$i] != 0) {
					$sql1 = "SELECT * FROM answer_score WHERE answer_Order = $row[$i]";
					$result1 = mysqli_query($con,$sql1);
					$row1 = mysqli_fetch_array($result1,MYSQLI_BOTH);
					
					// define id for scores,up_Buttons,down_Buttons
					$score = "score".$i;	
					$score_Up = "upup".$i;
					$score_Down = "down".$i;
					echo "<div class='row col-xs-10 col-sm-8 col-sm-offset-2 '><br><br>";
					echo "<div class='col-xs-12'>";

					echo "<div class='div_Border'><p>".$row1['answer_Content']."</p></div>";

					echo "<div class='col-xs-12'>";
					echo "<button id='$score' class='col-xs-1 col-sm-1 col-xs-offset-9 btn-primary btn-sm' value='0'>".$row1['answer_Score']."</button>";
					
					echo "<button id='$score_Up' class='col-xs-1 col-sm-1 btn-primary btn-sm glyphicon glyphicon-thumbs-up' value='up'></button>";
					echo "<button id='$score_Down' class='col-xs-1 col-sm-1 btn-primary btn-sm glyphicon glyphicon-thumbs-down' value='down'></button></div></div></div>";
				}
				
			}
			
			mysqli_close($con);
		
		?>	

	</div>
	<!-- jquery.min.js source,it should be put in the front of bootstrap.min.js -->
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script src="js/detail.js"></script>
	<!-- bootstrap.min.js source -->
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

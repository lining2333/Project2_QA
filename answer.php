<!DOCTYPE html>
<html>
<head>
	<title>li xiao keng</title>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<div class="container">
		<div class="text-center">
			<h1>Answer Question</h1>
		</div>
		<?php
			//get the order of question which has been clicked,echo question_Title,question_Content
			$order = $_COOKIE["order"];
			include 'database/connect.php';
	
			$sql="SELECT * FROM questions WHERE question_Order = '$order'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($result,MYSQLI_BOTH);

			
			echo "<div class='row col-xs-10 col-sm-offset-1'><h3 class='text-center'>".$row['question_Title']."</h3>";
			echo "<p>".$row['question_Content']."</p></div>";
			?>
		
		<br><br>
		<div class="row col-xs-12"><h3 class="text-center">Please type in your answer.</h3></div>
		
		<div class="container">
			<!-- design a form to post answer -->
			
			<form action="database/answer_backend.php" method="get">
					<div class="col-xs-8 col-sm-offset-2">
						<textarea id="answer_Content" name="answer_Content" class="form-control" rows="10"></textarea>
					</div>
				<div class="row text-right col-xs-10">
				You can also continue to enter <span id="answer_Content_Characters">500</span> characters
				</div>
				<div class="row">
					<input class="col-xs-2 col-sm-offset-4 btn-primary btn-lg" type="submit" name="" id="answer_Submit_Button" value="Submit">
					<button id="answer_Cancel_button" class="col-xs-2 btn-primary btn-lg">Cancel</button>
				</div>
			</form>	

		</div>

	</div>
	
		
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/answer.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
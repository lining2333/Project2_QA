<!DOCTYPE html>
<html>
<head>
	<title>li xiao keng</title>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<div class="container">
		<div class="text-center">
			<h1>Ask Question</h1>
		</div>
		<div class="container">
			<!-- design a form to post question_Title and question_Content -->
			<form action="database/ask_backend.php" method="get">
				<div class="form-group row">
					<label for="question_Title" class="control-label col-xs-2">Question title:</label>
					<div class="col-xs-8">
						<input id="question_Title" name="question_Title" class="form-control" type="text">
					</div>
				</div>
				<div class="form-group row">
					<label for="question_Content" class="control-label col-xs-2">Question content:</label>
					<div class="col-xs-8">
						<textarea id="question_Content" name="question_Content" class="form-control" rows="10"></textarea>
					</div>
				</div>
				<div class="row text-right col-xs-10">
				You can also continue to enter <span id="question_Content_Characters">500</span> characters
				</div>
				
					<!-- a标签属性在表单传递值时失效 -->
					<input class="col-xs-2 col-sm-offset-4 btn-primary btn-lg" type="submit" name="" id="ask_Submit_Button" value="Submit">
			</form>
			<!-- 为什么button按钮不能放在表单中 -->
			<button id="ask_Cancel_Button" class="col-xs-2 btn-primary btn-lg">Cancel</button>
		</div>
	</div>

	
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/ask.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
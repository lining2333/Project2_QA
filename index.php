<!DOCTYPE html>
<html>
<head>
	<title>li xiao keng</title>
	<!-- link for bootstrap.min.css -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<br><h1 class="text-center">Sample Project</h1><br><br>
		<div class="row">
			<!-- echo three keywords -->
			<input id="search_Content" type="text" class="input-lg col-sm-6 col-sm-offset-2 col-xs-10 " value="<?php
			//avoid page prompts
			error_reporting(E_ALL || ~E_NOTICE);
			//judge the value of three keywords when the page get the value of check that is equal to 1
				if ($_GET["check"]==1) {
					include 'database/getCookie.php';
					if($q0=='undefined'){
						$q0='';
					}
					if($q1=='undefined'){
						$q1='';
					}
					if($q2=='undefined'){
						$q2='';
					}
					if ($q==1) {
						echo $q0.' '.$q1.' '.$q2; 
					}	
				}
			?>">
			<button id="search_Button" class="btn btn-lg col-sm-2 col-xs-10">Search</button>
		</div>
		<div class="col-sm-offset-2">
			<span id="search_Content_Span" class="help-block"></span>
		</div><br>


		<div class="row text-center">
			<span><b>Answered Yet?</b></span>
			<div class="radio-inline">
				<input type="radio" id="radio_Yes" name="result_Status" checked>
				<label for="radio_Yes"><b>Yes</b></label>
			</div>
			<div class="radio-inline">
				<!-- q3 is status of condition for searching result  -->
				<input type="radio" id="radio_No" name="result_Status" <?php 
				$q3 = $_GET["q3"];
				if ($q3=='no') {
					echo "checked";
				} ?>>
				<label for="radio_No"><b>No</b></label>
			</div>
			<div class="radio-inline">
				<input type="radio" id="radio_All" name="result_Status" <?php 
				$q3 = $_GET["q3"];
				if ($q3=='all') {
					echo "checked";
				} ?>>
				<label for="radio_All"><b>All</b></label>
			</div>
		</div>
			
		<hr>
		
		<div class="container col-xs-10 col-sm-offset-1">
			<!-- put two buttons in one group and the other two in the other -->
			<div id="index_Buttons" class="row">
				<a href="ask.php"><button id="index_Ask_Button" class="col-xs-2 col-xs-offset-8 col-sm-1 col-sm-offset-10 btn btn-primary">Ask</button></a>
				<button id="index_Edit_Button" class="col-xs-2 col-sm-1 btn btn-primary">Edit</button>
			</div>
			<div id="index_Buttons2" class="row">
				<button id="index_Cancel_Button" class="col-xs-2 col-xs-offset-8 col-sm-1 col-sm-offset-10 btn btn-primary">Cancel</button>
				<button id="index_Delete_Button" class="col-xs-2 col-sm-1 btn btn-primary">Delete</button>
			</div>
			<br>
			<div id="search_Result" class="row col-xs-12">
				<!-- display dynamic page,get the value of variables,connect the database,display the result of searching -->
				<?php
					error_reporting(E_ALL || ~E_NOTICE);
					if ($_GET["check"]==1) {
					// include 'database/getCookie.php';
					include 'database/connect.php';
					include 'database/show.php';	
					}
					?>
			</div>
		</div>
	</div>
	<!-- jquery.min.js source,it should be put in the front of bootstrap.min.js -->
	<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
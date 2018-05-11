<?php 
	//judge the status of search_Condition
	if ($q3 == 'yes') {
		$sql = "SELECT * FROM questions WHERE question_Status = 1 ORDER BY question_Date DESC";
	}
	if ($q3 == 'no') {
		$sql = "SELECT * FROM questions WHERE question_Status = 0 ORDER BY question_Date DESC";
	}
	if ($q3 == 'all') {
		$sql = "SELECT * FROM questions ORDER BY question_Date DESC";
	}

	$result = mysqli_query($con,$sql);
	// echo th of table
		echo "<div class='col-xs-12 text-center'>";
		echo "<table id='table_Index' class='table'>";
		echo "<tr>";
		echo "<th class='col-xs-1 text-center table_Index_Fontsize question_Order_Status'>Order</th>";
		echo "<th class='col-xs-6 text-center table_Index_Fontsize'>question_Title</th>";
		//data_Hidden means question_Date will hide when width of equipment is less than 500px
		echo "<th class='date_Hidden  text-center table_Index_Fontsize '>question_Date</th>";
		echo "<th class='col-xs-1 text-center table_Index_Fontsize'>question_Status</th>";
		echo "</tr>";
	

	$rows_Number = mysqli_num_rows($result);
	$row = mysqli_fetch_all($result,MYSQLI_BOTH);
	
			
	//echo search result when no keywords
	if ($q == 0){
	
		 	for ($i=0; $i < $rows_Number; $i++) { 
					$order = $row[$i]['question_Order'];
					$checkbox_Order = "checkbox".$order;
					$title_Length = strlen($row[$i]['question_Title']);
					//display 30 characters
					if ($title_Length>30) {
						$title_Omit = substr($row[$i]['question_Title'],0,30-$title_Length).'...';   
					}
					else{
						$title_Omit = $row[$i]['question_Title'];
					}
		 		 	echo "<tr>";
					echo "<td   class = 'question_Order_Status'>" . $row[$i]['question_Order'] . "</td>";
					echo "<td style='display:none;'  class = 'question_Order_Status'>" . "<input type='checkbox' id='$checkbox_Order'></input>" . "</td>";
					echo "<td class='question_Title_Button'>"."<button id='$order' class='button_Nostyle title_Lengh'>"."$title_Omit"."</button>" . "</td>";
					 
					echo "<td class='date_Hidden'>" . $row[$i]['question_Date'] . "</td>";
					if ($row[$i]['question_Status'] == 0) {
					echo "<td><span class='glyphicon glyphicon-remove'></span></td>";
					}else{
					echo "<td><span class='glyphicon glyphicon-ok'></span></td>";
					}
					 
					 echo "</tr>";
			}
	}
	else{


			for ($i=0; $i < $rows_Number; $i++) { 

				$a = $row[$i]['question_Title'];
				// judge every title if contain keywords
				$keywords0 = stristr("$a","$q0");
				$keywords1 = stristr("$a","$q1");
				$keywords2 = stristr("$a","$q2");

				if ($keywords0 != "" || $keywords1 != "" || $keywords2 != "") {
					$order = $row[$i]['question_Order'];
					$checkbox_Order = "checkbox".$order;
					$title_Length = strlen($row[$i]['question_Title']);
					if ($title_Length>30) {
						$title_Omit = substr($row[$i]['question_Title'],0,30-$title_Length).'...';   
					}
					else{
						$title_Omit = $row[$i]['question_Title'];
					}
		 		 	echo "<tr>";
					echo "<td   class = 'question_Order_Status'>" . $row[$i]['question_Order'] . "</td>";
					echo "<td style='display:none;'  class = 'question_Order_Status'>" . "<input type='checkbox' id='$checkbox_Order'></input>" . "</td>";
					// get rid of button style
					echo "<td class='question_Title_Button'>"."<button id='$order' class='button_Nostyle title_Lengh'>"."$title_Omit"."</button>" . "</td>";
					 
					echo "<td class='date_Hidden'>" . $row[$i]['question_Date'] . "</td>";
					if ($row[$i]['question_Status'] == 0) {
					echo "<td><span class='glyphicon glyphicon-remove'></span></td>";
					}else{
					echo "<td><span class='glyphicon glyphicon-ok'></span></td>";
					}
					 
					 echo "</tr>";
				}
			}
	}
		echo "</table>";
		mysqli_close($con);

 ?>
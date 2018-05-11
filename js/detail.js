$(document).ready(function(){
	//jump to detail_Delete page when detail_Delete_Button is clicked
	$('#detail_Delete_Button').click(function(){
		window.location.href = "database/detail_Delete.php";
	});
	//jump to detail_Back page when detail_Back_Button is clicked
	$('#detail_Back_Button').click(function(){
		window.location.href = "database/detail_Back.php";
	});
	
	//get id of the button which id clicked,put all buttons into an array.
	$(document).on("click","button",function(event){
		var target = event.target.id;
		var buttons = document.getElementsByTagName("button");

		var scores = new Array(); 
		// var ups = new Array();
		// var downs = new Array();
		for (var i = 3; i < buttons.length; i++) {  
			scores[i] = buttons[i].id; 
			var a = (i-3)%3;
			if (target == scores[i]) {
				//button is up_Button when a=1,therefore,buttons[i-1].id is the id of score
				if (a==1) {
					var score=parseInt(buttons[i-1].innerHTML);
					score += 1;
					window.location.href = 'database/detail_backend.php?score='+score+'&answer_Order='+target;
		
				}
				//button is down_Button when a=w,therefore,buttons[i-2].id is the id of score
				if (a==2) {
					var score=parseInt(buttons[i-2].innerHTML);
					score -= 1;
					window.location.href = 'database/detail_backend.php?score='+score+'&answer_Order='+target;
				}
			}
		}	
	 });
});
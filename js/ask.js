//get the innerHTML of question_Content,let the innerHTML is equal to the number that can be filled
document.getElementById("question_Content").oninput = function(){
	var characters = document.getElementById("question_Content").innerHTML;
	document.getElementById("question_Content_Characters").innerHTML = 500 - characters.length;
	}
$(document).ready(function(){
	$('#ask_Cancel_Button').click(function(){
		//get question_Title and question_Content
		var title = document.getElementById("question_Title").value;
		var content = document.getElementById("question_Content").value;
		//return to index page when the title and content are empty
		if (title == '' && content == '') {
			window.location.href = 'index.php';
		}
		//confirm whether to give up editing page
		else{
			var cancel = confirm("Do you want to give up editing the current content?");
				if (cancel == true) {
					window.location.href = "index.php";	
				}
		}
	});
})



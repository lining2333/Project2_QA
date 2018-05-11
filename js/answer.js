
document.getElementById("answer_Cancel_button").onclick = function()
	{	
		//confirm whether to give up editing page
	var content = document.getElementById("answer_Content").innerhtml;
				var cancel = confirm("Do you want to give up the current content?");
				if (cancel == true) {
					window.history.back(-1);	
				}
	}

document.getElementById("answer_Content").oninput = function(){
	//get the innerHTML of answer_Content,let the innerHTML is equal to the number that can be filled
	var characters = document.getElementById("answer_Content").innerHTML;
	document.getElementById("answer_Content_Characters").innerHTML = 500 - characters.length;
	}



//check the content for searching
function check_Search(search_Content){
	var reg = /^[0-9a-zA-Z\s?]{0,60}$/;
	if (!reg.test(search_Content)) {
		document.getElementById("search_Content_Span").innerHTML = "You can only type in the letters,figures or blanks,no more than 60";
		return 0;
	}
	return 1;
}
//get search_Result by ajax
function loadXMLDoc(url){

	var xmlHttp;
			if (window.XMLHttpRequest) {
				xmlHttp = new XMLHttpRequest();
			}
			else{
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

	xmlHttp.onreadystatechange=function stateChanged() 
			{ 
				if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
				 { 
				 document.getElementById("search_Result").innerHTML=xmlHttp.responseText;
				 } 
			} ;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
}
function search_Result(search_Content){
	var search_Content_Array = search_Content.split(" ");
	var search_All = 1;
			if(search_Content_Array == ""){
				search_All = 0;
			}
	//get three keywords
	var search_Content_Keywords0 = search_Content_Array[0];
	var search_Content_Keywords1 = search_Content_Array[1];
	var search_Content_Keywords2 = search_Content_Array[2];
	var result_Status='yes';
	// get status of search_Condition
	var result_Status1 = $("input[id='radio_Yes']:checked").val();
	var result_Status2 = $("input[id='radio_No']:checked").val();
	var result_Status3 = $("input[id='radio_All']:checked").val();
	if (result_Status2 == 'on') {
		result_Status = 'no';
	}
	if (result_Status3 == 'on') {
		result_Status = 'all';
	}
	//send information to index_backend page
	var url="database/index_backend.php";
		url=url+"?q="+search_All; 
		url=url+"&q0="+search_Content_Keywords0;
		url=url+"&q1="+search_Content_Keywords1;
		url=url+"&q2="+search_Content_Keywords2;
		url=url+"&q3="+result_Status;
		url=url+"&sid="+Math.random();
	loadXMLDoc(url);
}

$(document).ready(function(){
	$('#search_Button').click(function(){
		var search_Content = document.getElementById("search_Content").value;
		check_Search(search_Content);
		search_Result(search_Content);
	});

	// get target.id which is clicked
	$("#search_Result").on("click","button",function(event){
	    var order = event.target.id;
	    window.location.href = 'detail.php?order='+order;
	  });

	$('#index_Edit_Button').click(function(){
		$('#index_Buttons').hide();
		$('#index_Buttons2').show();
		//get information of table
		var c=document.getElementById('table_Index');
		// var len=c.rows.length;
		// var ro=c.rows[0].cells;
		$('table tr').find('td:eq(0)').hide();
		$('table tr').find('td:eq(1)').show();
	});

	$('#index_Delete_Button').click(function(){

		var table = document.getElementById("table_Index");  
		var inputs = table.getElementsByTagName("input");   
		var checkbox_Id = new Array(); 
		var delete_Number = '';
		// insert id of checkbox which is clicked into delete_Number
		  for (var i = 0; i < inputs.length; i++) {   
		    checkbox_Id[i] = inputs[i].id;  
		    var a = $('input[id="'+checkbox_Id[i]+'"]:checked').val();
		    if (a == 'on') {
		     	delete_Number = delete_Number + checkbox_Id[i] + ',';
		     }
		 
		  }  
	    url="database/index_Delete.php";
	    url=url+"?delete_Number="+delete_Number; 
		loadXMLDoc(url);

		$('#index_Buttons').show();
		$('#index_Buttons2').hide();


	});
	$('#index_Cancel_Button').click(function(){

		$('#index_Buttons').show();
		$('#index_Buttons2').hide();
		var search_Content = document.getElementById("search_Content").value;
		search_Result(search_Content);
	});
	
});






function sendRequest(u){
    var obj=$.ajax({url:u,async:false});
    var result=$.parseJSON(obj.responseText);

    return result;  //return object
}

//add course to database
function addCourse(){
	var msg = "";
	if(($("#cid").val().length==0) || ($("#cname").val().length==0) || ($("#cdesc").val().length==0) ){
		msg += "<div class='alert alert-warning alert-dismissible' role='alert'>";
    	msg += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
    	msg += "<span aria-hidden='true'>&times;</span></button>";
        msg += "Please enter values for all fields.</div>";
	}else{
		var c=$("#cid").val();
		var n=$("#cname").val();
		var d=$("#cdesc").val();
		
		var strUrl = "response.php?cmd=1&cid="+c+"&cname="+n+"&cdesc="+d;
		var objResult=sendRequest(strUrl);
		if(objResult.result==1){
			msg = "";			
	    	msg += "<div class='alert alert-success alert-dismissible' role='alert'>";
	    	msg += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
	    	msg += "<span aria-hidden='true'>&times;</span></button>";
	        msg += "Course Added Successfully.</div>";

			$("#cid").val("");
			$("#cname").val("");
			$("#cdesc").val("");
		}else{
			msg = "";
	    	msg += "<div class='alert alert-warning alert-dismissible' role='alert'>";
	    	msg += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
	    	msg += "<span aria-hidden='true'>&times;</span></button>";
	        msg += "Addition of course was unsuccessful.</div>";
		}
	}
	$("#alert").html(msg);
}

//view courses
function viewCourse(){
	var msg="";
	var strUrl = "response.php?cmd=2";
		var objResult=sendRequest(strUrl);
		if(objResult.result==1){
			  var list ="";
	    // $("#view").attr("class", "active");
	    // $("#add").attr("class", "");
	    list += "<h3 class='sub-header'>List of All Courses</h3>";
        list += "<div class='table-responsive'>";
        list += "<table class='table table-striped'>";
        list += "<thead><tr><th>Courses ID</th>";
        list += "<th>Course Name</th><th>Description</th>";
        list += "<th></th></tr></thead><tbody>";
	    for ( var i = 0; i<objResult.courses.length; i++) {  
			list += "<tr><td>"+objResult.courses[i].course_id+"</td>";
        	list += "<td>"+objResult.courses[i].course_name+"</td>";
        	list += "<td>"+objResult.courses[i].course_description+"</td>";
         	list += "<td><button type='button' onclick='editForm("+objResult.courses[i].course_id+")' style='float:right' class='btn btn-default'>edit</button></td></tr>";
	    }
	    list += "</tbody></table>";
	    $("#content").html(list);
			msg = "";			
	    	msg += "<div class='alert alert-success alert-dismissible' role='alert'>";
	    	msg += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
	    	msg += "<span aria-hidden='true'>&times;</span></button>";
	        msg += "List of All Courses.</div>";
		}else{
			msg = "";
	    	msg += "<div class='alert alert-warning alert-dismissible' role='alert'>";
	    	msg += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
	    	msg += "<span aria-hidden='true'>&times;</span></button>";
	        msg += "Unsuccessful.</div>";
		}
	
	$("#alert").html(msg);
}
 
  
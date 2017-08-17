/**
 * signinstuff.js
 * _________
 * This file is called by signin.html and createaccount.html.
 * Its job is to enable forms and allow them to do things.
 */


function check_signin()// This checks for empty fields, called when the submit button is pressed
    {
	console.log("check_signin fired!");
      if (document.forms["form-signin"]["email"].value == "" || document.forms["form-signin"]["password"] == "")
      {
        alert("Please fill in the password or login field.");
        return false;                    // This doesn't submit the form
      }
      else
      {

        return true;                     // This submits the form
      }
    }

function check_createaccount()         // This checks for empty fields, called when the submit button is pressed
{
	
    var birthday = moment(document.forms["form-create"]["bday"].value);
    console.log(document.forms["form-create"]["bday"].value,birthday);
    
  if (document.forms["form-create"]["email"].value == "" || document.forms["form-create"]["pass"].value == "" || document.forms["form-create"]["fName"].value == "" || document.forms["form-create"]["lName"].value == "" || document.forms["form-create"]["bday"].value == "" || document.forms["form-create"]["phone"].value == "" || document.forms["form-create"]["address"].value == "")
  {
    alert("Please fill all fields.");
    return false;                    // This doesn't submit the form
  }
  
  else if (!birthday.isValid()) {
	  alert("Invalid date format");
	  return false;
  }
  
  else if (!isInt(document.forms["form-create"]["phone"].value)) {
	  alert("Phone must be number");
	  return false;
  }
  else
  {
    return true;                     // This submits the form
  }
}


$(document).ready(function() { 
	$("#form-signin").submit(function() {

		var datastring = $("#form-signin").serialize();
		$.ajax({
		    type: "POST",
		    url: "php/signin.php",
		    data: datastring,
		    dataType: "json",
		    success: function(data) {
		    	console.log(data);
		    	console.log(data.items);
		        //didItWork = jQuery.parseJSON(data);
		    	var isEmpty = jQuery.isEmptyObject(data.items);
		    	//console.log(isEmpty);
		    	if (data.items == "no") {
		    		alert("No username found sir/m'lady.");		    	
		    }
		    	else {
		    		console.log(data);
		    		window.location.href = "index.html";
		    	}
		    },
		    error: function(data) {
		        //alert("ERROR");
		        console.log("ERROR",data);
		    }
		});
		
        return false;
    });
    
    
    
	$("#form-create").submit(function() {

		var datastring = $("#form-create").serialize();
		$.ajax({
		    type: "POST",
		    url: "php/createaccount.php",
		    data: datastring,
		    dataType: "json",
		    success: function(data) {
		    	console.log(data);
		    	console.log(data.items);
		        //didItWork = jQuery.parseJSON(data);
		    	var isEmpty = jQuery.isEmptyObject(data.items);
		    	//console.log(isEmpty);
		    	alert("You did it! Screw the pooch the freaking code worked for once! FIREWORKS!!!!!!!!!!!!");
		    		console.log(data);
		    		window.location.href = "index.html";
		    },
		    error: function(data) {
		        //alert(data);
		    	console.log("ERROR");
		        console.log(data);
		        console.log(data.items);
		         
		    }
		});
		
        return false;
    });    
    
});


/*function validate(date){
    var eighteenYearsAgo = moment().subtract(18, "years");
    var birthday = moment(date);

    if (!birthday.isValid()) {
        return "invalid date";    
    }
    else if (eighteenYearsAgo.isAfter(birthday)) {
        return "okay, you're good";    
    }
    else {
        return "sorry, no";    
    }
} */


function isInt(value) {
	  return !isNaN(value) && 
	         parseInt(Number(value)) == value && 
	         !isNaN(parseInt(value, 10));
	}

/*var dataString = 'email=' + email + '&password=' + password;
//alert (dataString);return false;
$.post( "php/signin.php", {em : email, pass : password}, function( data ) {
	  console.log(data);
	  window.location.href = "index.html";
	});
$.ajax({
  type: "POST",
  url: "",
  data: dataString,
  success: function() {
  }
}); */
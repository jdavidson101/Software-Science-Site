/**
 * index.js
 * _________
 * This file is called by every html doc (besides the signin pages). It essentially desides.
 * And it will do other things toi. I haven't decided what they are yet.
 */

// If you aren't logged in...
$(document).ready(function() {
    console.log("ready!asdf");

	checkloginRed();


	
	
});


// Check user's login status
function checkloginRed() {
	
	var isLogged = false;
	$.ajax({
	    type: "POST",
	    url: "php/checkadmin.php",
	    dataType: "text",
	    success: function(data) {
	    	console.log(data);
	    	var isEmpty = jQuery.isEmptyObject(data);
	    	console.log(isEmpty);
	    	if (isEmpty) {
	    		//Do nothing
	    		isLogged = false;
	    			
	    			// Not logged in
	    			window.location.href = "index.html";
	    			
	    }
	    	else {
	    		//Logged in!

	    		// Do nothing
	    		
	    	}
	    },
	    error: function(data) {
	        console.log(data);
	    }
	});
}

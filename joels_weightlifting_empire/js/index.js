/**
 * index.js
 * _________
 * This file is called by every html doc (besides the signin pages). It essentially desides.
 * And it will do other things toi. I haven't decided what they are yet.
 */

// If you aren't logged in...
$(document).ready(function() {
    console.log("ready!");

    // This funtion, defined below, dynamically changes layout depending on the user's choices
	checklogin();
	checkloginA();
    //return false;


	
	
});


$(function() {
    $("#logoutLink").click(function(e) {
    	console.log("LogoutLink Fires"); //Debug
      e.preventDefault(); // if desired...
      
      logout();
      
    });
  });




// This function logs the user out!

// Check user's login status
function checklogin() {
	
	var isLogged = false;
	$.ajax({
	    type: "POST",
	    url: "php/checklogin.php",
	    dataType: "text",
	    success: function(data) {
	    	console.log(data);
	    	var isEmpty = jQuery.isEmptyObject(data);
	    	console.log(isEmpty);
	    	if (isEmpty) {
	    		//Do nothing
	    		isLogged = false;
	    			
	    			
	    			$('.login-filter').css('visibility','visible');
	    			$('.account-filter').css('visibility','hidden');
	    			return isLogged;
	    			
	    }
	    	else {
	    		//Logged in!
	    		console.log(data);
	    		isLogged = true;
    		    $('.login-filter').css('visibility','hidden');
    		    $('.account-filter').css('visibility','visible');
    		    return isLogged;
	    		
	    		
	    	}
	    },
	    error: function(data) {
	        console.log(data);
	        return "ERROR";
	    }
	});
}

///
// Admin variation of checklogin()
///
function checkloginA() {
	
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
	    			
	    			
	    			$('.admin-filter').css('visibility','hidden');
	    			return isLogged;
	    			
	    }
	    	else {
	    		//Logged in!
	    		console.log(data);
	    		isLogged = true;
    		    $('.admin-filter').css('visibility','visible');
    		    return isLogged;
	    		
	    		
	    	}
	    },
	    error: function(data) {
	        console.log(data);
	        return "ERROR";
	    }
	});
}


function logout() {
	$.ajax({
	    type: "POST",
	    url: "php/signout.php",
	    dataType: "text",
	    success: function(data) {
	    	console.log(data);
	    	
	    	// Empty object is a failed object
	    	var isEmpty = jQuery.isEmptyObject(data);
	    	console.log(isEmpty);
	    	if (isEmpty) {
	    		//Do nothing
	    		console.log("Already logged out!");

	    			
	    }
	    	else {
	    		//Logged in!
	    		console.log(data);
	    		checklogin();
	    		checkloginA();
	    		
	    	}
	    },
	    error: function(data) {
	        console.log(data);
	    }
	});
	
	
}



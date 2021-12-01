
const form = document.getElementById("changePswdForm");

form.addEventListener('submit', changePasswordProcess);

function changePasswordProcess(e){

	var oldPassword = document.getElementById('oldpasskey').value;
	var newPassword = document.getElementById('newpasskey').value;
	var cnewPassword = document.getElementById('cnewpasskey').value;

	if(oldPassword == "" || newPassword == "" || cnewPassword == ""){
		alert("All fields are mandatory.");
	}
	else{
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', 'auth', true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		urlData = "oldpasskey=" + oldPassword + "&newpasskey=" + newPassword + "&cnewpasskey=" + cnewPassword + "&changePswdBtn=Change%20Password";
		xhttp.send(urlData);

		xhttp.onreadystatechange = function(){

			if(this.readyState == 4 && this.status == 200){
        
         	var responseObj = JSON.parse(this.responseText);
                     
            if(responseObj.response == "success"){
            	            	
            	document.getElementById('result').innerHTML = responseObj.msg;
            	document.getElementById('result').setAttribute('class', 'alert alert-success');

            	setTimeout(()=> {
					window.location = "http://localhost/BookmarkInterface/profile";	             
	            }, 1000);        
            }
            else if (responseObj.response == "unmatch_password"){
            	document.getElementById('result').innerHTML = responseObj.msg;
            	document.getElementById('result').setAttribute('class', 'alert alert-danger');

            }
            else if (responseObj.response == "oldPasswordError"){
            	document.getElementById('result').innerHTML = responseObj.msg;
            	document.getElementById('result').setAttribute('class', 'alert alert-danger');

            }
            else{
				document.getElementById('result').innerHTML = "Please try again later.";
            	document.getElementById('result').setAttribute('class', 'alert alert-danger');            	
            }      
         }
  	  }
	}

	e.preventDefault();
}
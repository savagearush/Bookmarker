const form = document.getElementById("loginForm");



form.addEventListener('submit', startLogin);

function startLogin(e){

	var userEmail = document.getElementById('username').value;
	var userPass = document.getElementById('passkey').value;

	if(userEmail == "" || userPass == ""){
		alert("All fields are mandatory.");
	}
	else{
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', 'auth', true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		urlData = "username=" + userEmail + "&passkey=" + userPass + "&loginBtn=Login";
		xhttp.send(urlData);

		xhttp.onreadystatechange = function(){

			if(this.readyState == 4 && this.status == 200){
        
         	var responseObj = JSON.parse(this.responseText);
                     
            if(responseObj.response == "success"){
            	            	
            	document.getElementById('result').innerHTML = "Login Done";
            	document.getElementById('result').setAttribute('class', 'alert alert-success');

            	setTimeout(()=> {
					window.location = "http://localhost/BookmarkInterface/profile";	             
	            }, 1000);        
            }
            else{
				document.getElementById('result').innerHTML = "Incorrect Username or Password";
            	document.getElementById('result').setAttribute('class', 'alert alert-danger');            	
            }      
        }





		}
	}

	e.preventDefault();
}
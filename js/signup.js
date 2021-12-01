
let form = document.querySelector('#signUpForm');
const btn = document.getElementById('submitBtn');
form.addEventListener('submit', submitForm);
const emailInput = document.getElementById('username');

emailInput.addEventListener('blur', checkEmailExistance);

function checkEmailExistance(){
	if(emailInput.value == ""){
		alert('please Enter Email Id');
  } 
  else{
    var xhttp = new XMLHttpRequest();
    var url = "checkEmail.php?email=" + emailInput.value;
    xhttp.open('GET', url, true);
    xhttp.send();
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200 ){

          if(this.responseText == "exist"){
              setTimeout(()=>{
                var divEle = document.createElement('div');
                var divtext = document.createTextNode("Email Id already exist. Please choose another one.");
                  divEle.appendChild(divtext);
                  divEle.setAttribute('class', 'alert alert-danger');
                  document.getElementById('result').appendChild(divEle);
                  btn.disabled = true;
                }, 1000)
          } else{
              btn.disabled = false;
              setTimeout(()=>{
                document.getElementById('result').style.display = "none";
              }, 1000)
          } 

      }
    }
  }
}

function submitForm(e){
        
    var userName = document.getElementById('fullname').value;
    var userEmail = document.getElementById('username').value;
    var userPass = document.getElementById('passkey').value;

    if(userName == "" || userEmail == "" || userPass == ""){
      alert('Some field may be left.');
      e.preventDefault();
    } 
    else{
      
      xhttp = new XMLHttpRequest();
      xhttp.open('POST', 'auth.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      urlData = "fullname=" + userName + "&username=" + userEmail + "&passkey=" + userPass + "&createBtn=Create";
      xhttp.send(urlData);
      
      xhttp.onreadystatechange = function(){
        
        if(this.readyState == 4 && this.status == 200){
          document.getElementById('result').style.display = "";
          var responseObj = JSON.parse(this.responseText);
          var divEle = document.createElement('div');
          var divtext = document.createTextNode(responseObj.msg + " Please Login");
            divEle.appendChild(divtext);
            divEle.setAttribute('class', 'alert alert-success');
            document.getElementById('result').appendChild(divEle);
          
            setTimeout(()=> {
             window.location = "http://localhost/BookmarkInterface/";
            }, 4000);        
        
        }
      }
    } 

    e.preventDefault();
}
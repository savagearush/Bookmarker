const form = document.getElementById('form');

form.addEventListener('submit', saveBookmark);

function saveBookmark(e){
	var webName = document.getElementById('siteName').value;
	var webUrl = document.getElementById('siteUrl').value;

	if(webName == "" || webUrl == ""){
		alert('All fields are mandatory.');
	}
	else{

		xhttp = new XMLHttpRequest();
		xhttp.open('POST', 'saveBookmark.php', true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		urlData = "siteName=" + webName + "&siteUrl=" + webUrl + "&save=Submit";
		xhttp.send(urlData);

		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				if(this.responseText == "saved"){
					document.getElementById('result').innerHTML = "Saved in Bookmark List";
    	        	document.getElementById('result').setAttribute('class', 'alert alert-success');
					
					setTimeout(() => {
    	        		window.location = "http://localhost/BookmarkInterface/profile";
					}, 1000);
				}
			}
		}
	}
	e.preventDefault();
}

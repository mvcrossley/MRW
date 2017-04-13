(function(){

	console.log("hello!");
	var httpRequest,
	comment = document.querySelectorAll('.comment'),
	i,
	movieID = window.location.search.slice(4);
	console.log(movieID);

//ON-LOAD
	function makeRequest(url,e){
		httpRequest = new XMLHttpRequest();

		if(!httpRequest){ // Checking to make sure the browser isn't too old	
			alert('Sorry, your browser is too old to access this content.');
			return false; // This exits out of a function, will execute the next line after function is closed
		}

		httpRequest.onreadystatechange = loadComments;				
		httpRequest.open('GET', 'admin/phpscripts/commentsJSON.php?movie_id='+movieID); //Passing in a url through a get protocol
		httpRequest.send();
	}

	function loadComments(url,e){
		if(httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 200){
			var commentData = JSON.parse(httpRequest.responseText);
			console.log(commentData.length);

			for(i=0; i<commentData.length; i++){
				var div = document.createElement ("div");
				var shell = document.querySelector("#reviews");
				shell.appendChild(div);

				div.classlist.add("comment small-12 column");
				div.setAttribute("id", "reviewInd");

				var user = document.createElement ("h4");
				user.innerHTML = commentData.comment_user;
				div.appendChild(user);

				var rating = document.createElement ("h4");
				rating.innerHTML = commentData.comment_user;
				div.appendChild(rating);

				var time = document.createElement ("p");
				time.innerHTML = commentData.comment_user;
				div.appendChild(time);

				var text = document.createElement ("p");
				text.innerHTML = commentData.comment_user;
				div.appendChild(text);
			}
		}
	}

	window.addEventListener('load', makeRequest, false);
})();
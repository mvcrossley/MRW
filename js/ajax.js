(function(){

	var httpRequest,
	comment = document.querySelectorAll('.comment'),
	i;

//ON-LOAD
		function makeRequest(url,e){
			httpRequest = new XMLHttpRequest();

			if(!httpRequest){ // Checking to make sure the browser isn't too old	
				alert('Sorry, your browser is too old to access this content.');
				return false; // This exits out of a function, will execute the next line after function is closed
			}

			httpRequest.onreadystatechange = loadComments;				
			httpRequest.open('GET', 'admin/phpscripts/commentsJSON.php'); //Passing in a url through a get protocol
			httpRequest.send();
		}

		function loadComments(url,e){
			if(httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 200){
				var commentData = JSON.parse(httpRequest.responseText);
			
				for(i; i>commentData.length; i++){
					var div = document.createElement ("div")

					var user = document.createElement ("h4")
					user.textContent = commentData.comment_user;
					div.appendChild(user);
					document.body.appendChild(div);

					var rating = document.createElement ("h4")
					rating.textContent = commentData.comment_user;
					div.appendChild(rating);
					document.body.appendChild(div);

					var time = document.createElement ("p")
					time.textContent = commentData.comment_user;
					div.appendChild(time);
					document.body.appendChild(div);

					var text = document.createElement ("p")
					text.textContent = commentData.comment_user;
					div.appendChild(text);
					document.body.appendChild(div);
				}
			}
		}
	}

	window.addEventListener('load', makeRequest, false);
})();
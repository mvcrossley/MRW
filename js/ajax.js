(function(){

	console.log("hello!");
	var httpRequest,
	comment = document.querySelectorAll('.comment'),
	i,
	movieID = window.location.search.slice(4);//Getting the movie id through the php-generated URL
	console.log(movieID),
	submit = document.querySelector("#submit");

	function makeRequest(url,e){
		httpRequest = new XMLHttpRequest();

		if(!httpRequest){	
			alert('Sorry, your browser is too old to access this content.');
			return false;
		}

		httpRequest.onreadystatechange = loadComments;				
		httpRequest.open('GET', 'admin/phpscripts/commentsJSON.php?movie_id='+movieID); //Passing through the JSON query using the ID gained from the page's URL
		httpRequest.send();
	}

	function loadComments(url,e){
		if(httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 200){
			var commentData = JSON.parse(httpRequest.responseText);
			console.log(commentData.length);
			console.log(commentData);

			for(i=0; i<commentData.length; i++){
				var div = document.createElement ("div");
				var shell = document.querySelector("#reviews");
				shell.appendChild(div);

				div.setAttribute("class", "comment small-12 column");
				div.setAttribute("id", "reviewInd");

				var user = document.createElement ("h4");
				user.innerHTML = commentData[i].comment_user;
				div.appendChild(user);

				var rating = document.createElement ("h4");
				rating.innerHTML = commentData[i].comment_rating;
				div.appendChild(rating);

				var time = document.createElement ("p");
				time.innerHTML = commentData[i].comment_time;
				div.appendChild(time);

				var text = document.createElement ("p");
				text.innerHTML = commentData[i].comment_text;
				div.appendChild(text);
			}
		}
	}

	function postReview() {
		var username = document.getElementById("username").value;
		var time = Date();
		var rating = document.getElementById("rating").value;
		var text = document.getElementById("text").value;

		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'name=' + username + '&time=' + time + '&rating=' + rating + '&text=' + text + '&movieId=' + movieID;
		console.log (dataString);

		if (username == '' || rating == '' || text == '') {
			alert("Please Fill All Fields");
			} else {
				// AJAX code to submit form.
				$.ajax({
					type: "POST",
					url: "admin/phpscripts/commentsAJAX.php",
					data: dataString,
					cache: false,
					success: function(html) {
					alert(html);
					}
				});
			}
		return false;
	}

	window.addEventListener('load', makeRequest, false);
})();
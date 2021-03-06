(function(){

	var httpRequest,
	comment = document.querySelectorAll('.comment'),
	i,
	movieID = window.location.search.slice(4);//Getting the movie id through the php-generated URL
	var submit = document.querySelector("#submit");
	var shell = document.querySelector("#reviews");
	var home = document.querySelector("#home");

	function makeRequest(url,e){
		httpRequest = new XMLHttpRequest();

		if(!httpRequest){	
			alert('Sorry, your browser is too old to access this content.');
			return false;
		}else{
			httpRequest.onreadystatechange = loadComments;				
			httpRequest.open('GET', 'admin/phpscripts/commentsJSON.php?movie_id='+movieID); //Passing through the JSON query using the ID gained from the page's URL
			httpRequest.send();
		}
	}

	function loadComments(url,e){
		if(httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 200){
			var commentData = JSON.parse(httpRequest.responseText);
			console.log(commentData.length);
			console.log(commentData);

			for(i=0; i<commentData.length; i++){
				var div = document.createElement ("div");
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
				var span = document.createElement ("span");
				span.innerHTML = commentData[i].comment_time;
				div.appendChild(span);
				div.appendChild(time);

				var text = document.createElement ("p");
				text.innerHTML = commentData[i].comment_text;
				div.appendChild(text);
			}
		}
	}


	function postReview(e) {
		var username = document.querySelector("#nickname input").value;
		//var time = new Date(month, date, year);
		var rating = document.querySelector("#rating select").value;
		var text = document.querySelector("#review textarea").value;
		console.log('hello!');

		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'username=' + username + '&rating=' + rating + '&text=' + text + '&id=' + movieID;
		console.log (dataString);

		if (username == '' || rating == '' || text == '') {
			alert("Please Fill All Fields");
		} else {
			e.preventDefault();
			// AJAX code to submit form.
			$.ajax({
				type: "POST",
				url: "admin/phpscripts/commentsAJAX.php",
				data: dataString,
				cache: false,
				success: function() {
					shell.innerHTML="";
					makeRequest();
				}
			});
		}
		return false;
	}

	submit.addEventListener('click', postReview, false);
	window.addEventListener('load', makeRequest, false);
})();
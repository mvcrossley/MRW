(function(){

	var httpRequest,
	comment = document.querySelectorAll('.comment'),
	genreBut = document.querySelectorAll('.genre'),
	genre = window.location.search.slice(4),
	i;
	var shell = document.querySelector("#reviews");
	var home = document.querySelector("#home");

	for (var j=0; j<genreBut.length; j++){
			//genreBut[j].addEventListener('click', makeRequest2, false);
		}

	function makeRequest(url,e){
		httpRequest = new XMLHttpRequest();

		if(!httpRequest){	
			alert('Sorry, your browser is too old to access this content.');
			return false;
		}else{
			httpRequest.onreadystatechange = loadThumbs;				
			httpRequest.open('GET', 'admin/phpscripts/thumbsJSON.php'); //Passing through the JSON query using the ID gained from the page's URL
			httpRequest.send();
		}
	}

	function makeRequest2(url,e){
		httpRequest = new XMLHttpRequest();
		var filterName = e.currentTarget.id;

		if(!httpRequest){	
			alert('Sorry, your browser is too old to access this content.');
			return false;
		}else{
			httpRequest.onreadystatechange = loadGenre;				
			httpRequest.open('GET', 'admin/phpscripts/filtersJSON.php?movie_genre='+filterName); //Passing through the JSON query using the ID gained from the page's URL
			httpRequest.send();
		}
	}

	function loadThumbs(url,e){
		if(httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 200){
			var thumbData = JSON.parse(httpRequest.responseText);
			//console.log(thumbData.length);
			//console.log(thumbData);

			for(i=0; i<thumbData.length; i++){
				var div = document.createElement ("div");
				home.appendChild(div);
				div.setAttribute("class", "small-6 medium-3 large-2 column end movieThumb");

				var div2 = document.createElement("div");
				div.appendChild(div2);
				div2.setAttribute("class", "movieCon");

				var linkshell = document.createElement("a");
				div2.appendChild(linkshell);
				linkshell.setAttribute("class", "pickmovie");
				linkshell.setAttribute("id", thumbData[i].movie_id);
				linkshell.setAttribute("href", "details.php?id="+thumbData[i].movie_id);

				var thumbnail = document.createElement ("img");
				linkshell.appendChild(thumbnail);
				thumbnail.setAttribute("src", "images/"+thumbData[i].movie_thumb);

				var movietitle = document.createElement ("h4");
				linkshell.appendChild(movietitle);
				movietitle.innerHTML = thumbData[i].movie_title;
			}
		}
	}

	function loadGenre(url,e){
		if(httpRequest.readyState === XMLHttpRequest.DONE && httpRequest.status === 200){
			var genreData = JSON.parse(httpRequest.responseText);
			//console.log(genreData.length);
			//console.log(genreData);
			home.innerHTML=""; //Resets the thumbnails so that new ones may be generated

			for(i=0; i<genreData.length; i++){

				var div = document.createElement ("div");
				home.appendChild(div);
				div.setAttribute("class", "small-6 medium-3 large-2 column end movieThumb");

				var div2 = document.createElement("div");
				div.appendChild(div2);
				div2.setAttribute("class", "movieCon");

				var linkshell = document.createElement("a");
				div2.appendChild(linkshell);
				linkshell.setAttribute("class", "pickmovie");
				linkshell.setAttribute("id", genreData[i].movie_id);
				linkshell.setAttribute("href", "details.php?id="+genreData[i].movie_id);

				var thumbnail = document.createElement ("img");
				linkshell.appendChild(thumbnail);
				thumbnail.setAttribute("src", "images/"+genreData[i].movie_thumb);

				var movietitle = document.createElement ("h4");
				linkshell.appendChild(movietitle);
				movietitle.innerHTML = genreData[i].movie_title;
			}
		}
	}

	window.addEventListener('load', makeRequest, false);
})();
	// Loading iFrame Player API code asynchronously.

	var playbtn = document.querySelector('#play-button');
	var volbtn = document.querySelector('#vol-button');

	var tag = document.createElement('script');
		tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	/////
	//code to load video is on details.php so PHP can fill out videoID from database
	/////

	function onPlayerReady(e) {
		e.target.playVideo();

	}

	// The API calls this function when the player's state changes.
	function onPlayerStateChange(e) {
	}

	function playVideo(e){
		if(e.currentTarget.className == "fa fa-play"){
			playbtn.classList.remove('fa-play');
			playbtn.classList.add('fa-pause');
			player.playVideo();
		}else if(e.currentTarget.className == "fa fa-pause"){
			playbtn.classList.remove('fa-pause');
			playbtn.classList.add('fa-play');
			player.pauseVideo();
		}	
	}

	function muteVideo(e){
		if(e.currentTarget.className == "fa fa-volume-up"){
			volbtn.classList.remove('fa-volume-up');
			volbtn.classList.add('fa-volume-off');
			player.mute();
		}else if(e.currentTarget.className == "fa fa-volume-off"){
			volbtn.classList.remove('fa-volume-off');
			volbtn.classList.add('fa-volume-up');
			player.unMute();
		}	
	}


playbtn.addEventListener('click', playVideo, false);
volbtn.addEventListener('click', muteVideo, false);
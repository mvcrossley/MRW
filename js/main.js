(function(){

	var navButton = document.querySelectorAll('.navButton');
	var pageTitle = document.querySelector("#pageTitle");
	var pageDesc = document.querySelector("#pageDesc");
	var conCon = document.querySelector("#contentCon");
	var conCon1 = document.querySelector("#contentCon1");
	var conCon2 = document.querySelector("#contentCon2");
	var conImg1 = document.querySelector("#contentCon1 img");
	var conImg2 = document.querySelector("#contentCon2 img");
	var conName1 = document.querySelector("#contentCon1 h3");
	var conName2 = document.querySelector("#contentCon2 h3");	
	var conNameSub1 = document.querySelector("#contentCon1 h4");
	var conNameSub2 = document.querySelector("#contentCon2 h4");
	var conText1 = document.querySelector("#contentCon1 p");
	var conText2 = document.querySelector("#contentCon2 p");
	var i;

	var newClass;
	


	function changePage(){
		pageTitle.classList.remove(newClass); //Clears any existing classes so that it may change back each time
		pageDesc.classList.remove(newClass);
		conCon.classList.remove(newClass);

		pageTitle.classList.add(newClass);
		pageDesc.classList.add(newClass);
		//console.log(introObject[this.id].desc);
		newClass = this.id;
		pageTitle.firstChild.nodeValue = introObject[newClass].title; //These are accessing parts of an object located in contentObject
		pageDesc.firstChild.nodeValue = introObject[newClass].desc;
		
		var dObject = detailObject[newClass];

		if (dObject['con1']){
			conImg1.src = dObject['con1'].image;
			conName1.firstChild.nodeValue = dObject['con1'].name;
			conNameSub1.firstChild.nodeValue = dObject['con1'].desc;
			conText1.firstChild.nodeValue = dObject['con1'].text;
		}
		if (dObject['con2']){
			conImg2.src = dObject['con2'].image;
			conName2.firstChild.nodeValue = dObject['con2'].name;
			conNameSub2.firstChild.nodeValue = dObject['con2'].desc;
			conText2.firstChild.nodeValue = dObject['con2'].text;
		}		
	}


	[].forEach.call(navButton, function(e) {
		e.addEventListener('click', changePage, true);
	});

	pageTitle.firstChild.nodeValue = introObject["home"].title; //These change the content on load
	pageDesc.firstChild.nodeValue = introObject["home"].desc;
	pageTitle.classList.add("home");
	var detailHome = detailObject['home']
	console.log(detailHome['con1']);

	if (detailHome['con1']){
			conImg1.src = detailHome['con1'].image;
			conName1.firstChild.nodeValue = detailHome['con1'].name;
			conNameSub1.firstChild.nodeValue = detailHome['con1'].desc;
			conText1.firstChild.nodeValue = detailHome['con1'].text;
		}
	if (detailHome['con2']){
		conImg2.src = detailHome['con2'].image;
		conName2.firstChild.nodeValue = detailHome['con2'].name;
		conNameSub2.firstChild.nodeValue = detailHome['con2'].desc;
		conText2.firstChild.nodeValue = detailHome['con2'].text;
	}


})();


	/*tmnlObject.forEach(name, function(){
		console.log();
		tmnlCon.innerHTML = '<h2>'+element+'</h2>';
	});*/


	// function tmnlContent(){

	// 	console.log (tmnlCon);

	// 	for (var i in tmnlObject){
	// 		var newDiv = document.createElement('div');
	// 		newDiv.className = 'object';
	// 		newDiv.innerHTML = '<div class=\'testimonial small-12 medium-4 large-4 columns\'>'+tmnlObject[i].pic+tmnlObject[i].name+tmnlObject[i].case+tmnlObject[i].testimonial+'</div>';
	// 		document.body.appendChild(newDiv);
	// 	}



	// 		// for(var j in tmnlObject){
	// 		// 	//console.log(j);
				
	// 		// 	//tmnlCon.innerHTML += '<div class="large-12 columns"></div>';	
	// 		// 	//var newDiv = tmnlCon.createElement('div');

	// 		// 	//newDiv;			
	// 		// 	var tmnlObj = tmnlObject[j];

	// 		// 	for (var i in tmnlObj){
	// 		// 		//console.log(i);
	// 		// 		//console.log(tmnlObj[i]);
	// 		// 		var arrayOutput = document.createElement('div');
	// 		// 		var tObj = tmnlObj[i];
					
	// 		// 			if(i === 'name'){
	// 		// 				var newN = document.createElement('p');
	// 		// 			}


	// 		// 		arrayOutput.className = 'object';
	// 		// 		document.body.appendChild(arrayOutput);
					
	// 		// 	}
	// 		// }
	// }

	//window.addEventListener("load", tmnlContent, false);


	/*
		for (var i in tmnlObject){
			var newDiv = document.createElement('div');
			newDiv.className = 'object';
			newDiv.innerHTML = '<h2>'+tmnlObject[i]+'</h2>';
			document.body.appendChild(newDiv);
		}
	*/
	

/*	var cars = ['Saab','Volvo','BMW','GC','Nissan','Ford'];
for (var c in cars) {
    var newElement = document.createElement('div');
    newElement.id = cars[c]; 
    newElement.className = "car";
    newElement.innerHTML = cars[c];
    document.body.appendChild(newElement);
}


for(var i in dObject){
			console.log(dObject[i]);
			//tmnlCon.innerHTML = '<div class=\'detailCon small-12 medium-6 columns\'>'+tmnlObject[i].pic+tmnlObject[i].name+tmnlObject[i].case+tmnlObject[i].testimonial+'</div>';
			var newDiv = document.createElement('div');
			newDiv.classList.add(newClass);
			newDiv.classList.add(newClass);
			newDiv.innerHTML = '<h2>'+dObject[i].name+'</h2><p>'+dObject[i].desc+'</p>';
			document.body.appendChild(newDiv);
		}*/

	//window.addEventListener('load', tmnlDump, false);



/*
	var theImages = document.querySelectorAll(".image-holder");
	var heading = document.querySelector(".heading");
	var title = document.querySelector(".main-copy h2");
	var paragraph = document.querySelector(".main-copy p");
	var appliedClass;

	function changeElements()
	{
		heading.classList.remove(appliedClass); //Clears any existing classes so that it may change back each time
		title.classList.remove(appliedClass);

		heading.classList.add(this.id);
		title.classList.add(this.id);
		
		appliedClass = this.id;
		title.firstChild.nodeValue = dynamicContent[this.id].headline; //These are accessing parts of an object located in contentObject
		paragraph.firstChild.nodeValue = dynamicContent[this.id].text;
	}

	[].forEach.call(theImages, function(image) {
		image.addEventListener('click', changeElements, true);
	});

	title.firstChild.nodeValue = dynamicContent["spring"].headline; //These change the content on load
	paragraph.firstChild.nodeValue = dynamicContent["spring"].text;
	heading.classList.add("spring");
*/
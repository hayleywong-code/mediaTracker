var mediaDisplay = document.getElementById("mediaDisplay");
var options = document.getElementById("options");

function showMedia(value) {
	let ajax = new XMLHttpRequest();

	ajax.open('GET', 'controller.php?todo=' + value, true);
	ajax.send();

	ajax.onreadystatechange = function() {
		str = "";
		if(ajax.readyState == 4 && ajax.status == 200) {
			str = ajax.responseText;
		}
			mediaDisplay.innerHTML = str;
	}
}


function resetData() {
	var deleteButton = document.getElementById("deleteButton");
	let curClass = deleteButton.classList;
	
	if(curClass.contains("btn-danger")) {
		deleteButton.setAttribute("class", "btn btn-lg btn-warning");
		deleteButton.textContent = "Are you sure?";
	} else if (curClass.contains("btn-warning")) {
		deleteButton.setAttribute("class", "btn btn-lg btn-danger");
		deleteButton.textContent = "Reset Lists";
		let ajax = new XMLHttpRequest();

		ajax.open('GET', 'controller.php?todo=reset', true);
		ajax.send();
		alert("Your data has been reset!")
	}
}


const watchlistGenres = ["Action", "Adventure", "Animation", "Biography", "Comedy", "Crime", "Documentary", "Drama", "Family", "Fantasy", "Film Noir", "History", "Horror", "Music", "Musical", "Mystery", "Romance", "Sci-Fi", "Sport", "Superhero", "Thriller", "War", "Western"];
const booklistGenres = ["Adventure", "Art", "Children's", "Contemporary", "Cookbook", "Development", "Dystopian", "Families & Relationships", "Fantasy", "Guide/How-To", "Health", "Historical Fiction", "History", "Horror", "Humor", "Memoir", "Motivational", "Mystery", "Paranormal", "Romance", "Science Fiction", "Self-Help", "Thriller", "Travel"];

function addGenres(itemType) {
	var genreSection = document.getElementById("genreSelect");
	let genreArray;
	
	if(itemType == "watchlist") {
		genreArray = watchlistGenres;
	} else {
		genreArray = booklistGenres
	}
	var str = "";
	
	for(var i = 0; i < genreArray.length; i++) {
		str += '<div class="form-check form-check-inline">';
		str += '<input class="form-check-input" type="checkbox" id="' + i + '">';
		str += '<label class="form-check-label" for="' + i + '">' + genreArray[i] + '</label></div>';
	}
	
	genreSection.innerHTML = str;
	
}
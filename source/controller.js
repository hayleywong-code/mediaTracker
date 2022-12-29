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
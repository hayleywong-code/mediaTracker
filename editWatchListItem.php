<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Media Tracker</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./source/styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=2">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body>
    
    	<nav class="navbar navbar-expand" style="padding-right: 100px; padding-left: 100px; background-color: #A3BBAD;">
    		<a class="navbar-brand" href="./main.php">
    			<h1>Media Tracker</h1>
    		</a>
    		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
  			
  			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-item nav-link" href="./main.php">Home</a>
                  <a class="nav-item nav-link active" href="./watchlist.html">Movies and Shows</a>
                  <a class="nav-item nav-link" href="./books.html">Books</a>
                  <a class="nav-item nav-link" href="./settings.html">Settings</a>
                </div>
  			</div>
    	</nav>
    	
    	<div id="options">
    		<nav class="navbar navbar-expand" style="padding-right: 100px; padding-left: 100px;">
        		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        			<span class="navbar-toggler-icon"></span>
      			</button>
      			
      			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                      <a class="nav-item nav-link" href="./watchlist.html">Go Back</a>
                    </div>
      			</div>
        	</nav>
    	</div>
    	
    	<form class="general-padding addItem" action="controller.php" method="post" id="watchlistForm">
    		<h3>Edit </h3>
    		<div class="row g-3 align-items-center">
        		<div class="col-auto">
    				<label for="title" class="col-form-label">Title</label>
    			</div>
    			<div class="col-auto">
    				<input type="text" name="title" id="title" class="form-control" required>
    			</div>
    			
        		<div class="col-auto">
    				<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="type" id="Show" value="Show" required>
						<label class="form-check-label" for="show">Show</label>
    				</div>
    				<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="type" id="Movie" value="Movie" required>
						<label class="form-check-label" for="show">Movie</label>
    				</div>
    			</div>
			</div>
			
			<div class="row g-3 align-items-center">
    			<div class="col-auto">
    				<label for="date" class="col-form-label">Date Added/Watched</label>
    			</div>
    			<div class="col-auto">
   					<input type="date" id="date" name="date" class="form-control">
   				</div>
   				
   				<div class="col-auto">
    				<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="status" value="To Be Watched" required>
						<label class="form-check-label" for="show">To Be Watched</label>
    				</div>
    				<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="status" value="In Progress" required>
						<label class="form-check-label" for="show">In Progress</label>
    				</div>
    				<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="status" value="Completed" required>
						<label class="form-check-label" for="show">Completed</label>
    				</div>
    			</div>
   			</div>
			
			<div class="row">
				<div class="col-auto" id="genreSelect">
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Action" id="Action">
						<label class="form-check-label" for="Action">Action</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Adventure" id="Adventure">
						<label class="form-check-label" for="Adventure">Adventure</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Animation" id="Animation">
						<label class="form-check-label" for="Animation">Animation</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Biography" id="Biography">
						<label class="form-check-label" for="Biography">Biography</label>
					</div>
					<div class="form-check form-check-inline">
    					<input class="form-check-input" name="genreArray[]" type="checkbox" value="Comedy" id="Comedy">
    					<label class="form-check-label" for="Comedy">Comedy</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Crime" id="Crime">
						<label class="form-check-label" for="Crime">Crime</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Documentary" id="Documentary">
						<label class="form-check-label" for="Documentary">Documentary</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Drama" id="Drama">
						<label class="form-check-label" for="Drama">Drama</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Family" id="Family">
						<label class="form-check-label" for="Family">Family</label></div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Fantasy" id="Fantasy">
						<label class="form-check-label" for="Fantasy">Fantasy</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Film Noir" id="Film Noir">
						<label class="form-check-label" for="Film Noir">Film Noir</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="History" id="History">
						<label class="form-check-label" for="History">History</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Horror" id="Horror">
						<label class="form-check-label" for="Horror">Horror</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Music" id="Music">
						<label class="form-check-label" for="Music">Music</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Musical" id="Musical">
						<label class="form-check-label" for="Musical">Musical</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Mystery" id="Mystery">
						<label class="form-check-label" for="Mystery">Mystery</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Romance" id="Romance">
						<label class="form-check-label" for="Romance">Romance</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Sci-Fi" id="Sci-Fi">
						<label class="form-check-label" for="Sci-Fi">Sci-Fi</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Sport" id="Sport">
						<label class="form-check-label" for="Sport">Sport</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Superhero" id="Superhero">
						<label class="form-check-label" for="Superhero">Superhero</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Thriller" id="Thriller">
						<label class="form-check-label" for="Thriller">Thriller</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="War" id="War">
						<label class="form-check-label" for="War">War</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Western" id="Western">
						<label class="form-check-label" for="Western">Western</label>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-auto">
					<select class="form-select" id="rating" name=rating>
						 <option value="(-) Not Yet Rated" selected>Select Your Rating</option>
						 <option value="(5) Masterpiece">(5) Masterpiece</option>
						 <option value="(4) Very Good">(4) Very Good</option>
						 <option value="(3) Fine">(3) Fine</option>
						 <option value="(2) Bad">(2) Bad</option>
						 <option value="(1) Horrible">(1) Horrible</option>
					</select>
				</div>
			</div>
			<input type="hidden" name="id" id="id">
			<input class="btn btn-primary" type="submit" name="editForm-w" value="Submit Edits" required>
		</form>
        
        <script src="./source/controller.js"></script>

<?php
function editItem($id, $title, $type, $status, $date, $rating, $genre) {
    echo '<script>
' .
         '  document.getElementById("id").value = "' . $id . '";
' .
         '  document.getElementById("title").value = "' . $title . '";
' .
         '  document.getElementById("' . $type . '").checked=true;
' .
         '  document.getElementsByName("status").forEach(element => (element.value === "' . $status . '" ? element.checked = true : element.checked = false));
' .
         '  document.getElementById("date").value = "' . $date .'";
' .
         '  for(var i = 0; i < 6; i++) {(rating.options[i].value == "' . $rating . '" ? rating.options[i].selected = true : rating.options[i]);}
' .
         '  var genres = "' . $genre . '".split(", ");
' .
         '  var form = document.getElementById("watchlistForm");
' .
         '  for(var i = 0; i < form.elements.length; i++) {
' .
         '  var element = form.elements[i];
' .
         '  (element.type == "checkbox" ? (genres.includes(element.value) ? element.checked = true : element.checked) : element.type);}
' .
'</script>' . PHP_EOL;
}

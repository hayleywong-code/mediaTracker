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
                  <a class="nav-item nav-link" href="./watchlist.html">Movies and Shows</a>
                  <a class="nav-item nav-link active" href="./books.html">Books</a>
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
    	
    	<form class="general-padding addItem" action="controller.php" method="post" id="bookForm">
    		<h3>Edit </h3>
    		<div class="row g-3 align-items-center">
        		<div class="col-auto">
    				<label for="title" class="col-form-label">Title</label>
    			</div>
    			<div class="col-auto">
    				<input type="text" name="title" id="title" class="form-control" required>
    			</div>
    			
        		<div class="col-auto">
    				<label for="author" class="col-form-label">Author</label>
    			</div>
    			<div class="col-auto">
    				<input type="text" name="author" id="author" class="form-control" required>
    			</div>
			</div>
			
			<div class="row g-3 align-items-center">
    			<div class="col-auto">
    				<label for="date" class="col-form-label">Date Added/Read</label>
    			</div>
    			<div class="col-auto">
   					<input type="date" id="date" name="date" class="form-control">
   				</div>
   				
   				<div class="col-auto">
    				<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="status" value="To Be Watched" required>
						<label class="form-check-label" for="show">To Be Read</label>
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
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Adventure" id="Adventure">
						<label class="form-check-label" for="Adventure">Adventure</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Art" id="Art">
						<label class="form-check-label" for="Art">Art</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Children's" id="Children's">
						<label class="form-check-label" for="Children's">Children's</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Contemporary" id="Contemporary">
						<label class="form-check-label" for="Contemporary">Contemporary</label>
					</div>
					<div class="form-check form-check-inline">
    					<input class="form-check-input" name="genreArray[]" type="checkbox" value="Cookbook" id="Cookbook">
    					<label class="form-check-label" for="Cookbook">Cookbook</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Development" id="Development">
						<label class="form-check-label" for="Development">Development</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Dystopian" id="Dystopian">
						<label class="form-check-label" for="Dystopian">Dystopian</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Families & Relationships" id="Families & Relationships">
						<label class="form-check-label" for="Families & Relationships">Families & Relationships</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Fantasy" id="Fantasy">
						<label class="form-check-label" for="Fantasy">Fantasy</label></div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Guide/How-To" id="Guide/How-To">
						<label class="form-check-label" for="Guide/How-To">Guide/How-To</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Health" id="Health">
						<label class="form-check-label" for="Health">Health</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Historical Fiction" id="Historical Fiction">
						<label class="form-check-label" for="Historical Fiction">Historical Fiction</label>
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
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Humor" id="Humor">
						<label class="form-check-label" for="Humor">Humor</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Memoir" id="Memoir">
						<label class="form-check-label" for="Memoir">Memoir</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Motivational" id="Motivational">
						<label class="form-check-label" for="Motivational">Motivational</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Mystery" id="Mystery">
						<label class="form-check-label" for="Mystery">Mystery</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Paranormal" id="Paranormal">
						<label class="form-check-label" for="Paranormal">Paranormal</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Romance" id="Romance">
						<label class="form-check-label" for="Romance">Romance</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Science Fiction" id="Science Fiction">
						<label class="form-check-label" for="Science Fiction">Science Fiction</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Self-Help" id="Self-Help">
						<label class="form-check-label" for="Self-Help">Self-Help</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Thriller" id="Thriller">
						<label class="form-check-label" for="Thriller">Thriller</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" name="genreArray[]" type="checkbox" value="Travel" id="Travel">
						<label class="form-check-label" for="Travel">Travel</label>
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
			<input class="btn btn-primary" type="submit" name="editForm-b" value="Submit Edits" required>
		</form>
        
        <script src="./source/controller.js"></script>

<?php
function editBook($id, $title, $author, $status, $date, $rating, $genre) {
    echo '<script>
' .
         '  document.getElementById("id").value = "' . $id . '";
' .
         '  document.getElementById("title").value = "' . $title . '";
' .
         '  document.getElementById("author").value ="' . $author .'";
' .
         '  document.getElementsByName("status").forEach(element => (element.value === "' . $status . '" ? element.checked = true : element.checked = false));
' .
         '  document.getElementById("date").value = "' . $date .'";
' .
         '  for(var i = 0; i < 6; i++) {(rating.options[i].value == "' . $rating . '" ? rating.options[i].selected = true : rating.options[i]);}
' .
         '  var genres = "' . $genre . '".split(", ");
' .
         '  var form = document.getElementById("bookForm");
' .
         '  for(var i = 0; i < form.elements.length; i++) {
' .
         '  var element = form.elements[i];
' .
         '  (element.type == "checkbox" ? (genres.includes(element.value) ? element.checked = true : element.checked) : element.type);}
' .
'</script>' . PHP_EOL;
}

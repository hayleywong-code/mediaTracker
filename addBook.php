<!DOCTYPE html>
<html>
    <head>
        <title>Media Tracker</title>
        <link rel="stylesheet" type="text/css" href="./source/styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=2">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body onload="addGenres('books')">
    
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
                  <a class="nav-item nav-link" href="./watchlist.php">Movies and Shows</a>
                  <a class="nav-item nav-link active" href="./books.php">Books</a>
                  <a class="nav-item nav-link" href="./settings.php">Settings</a>
                </div>
  			</div>
    	</nav>
    	
    	<form class="general-padding addItem">
    		<h3>Add A Book</h3>
    		<div class="row g-3 align-items-center">
        		<div class="col-auto">
    				<label for="title" class="col-form-label">Title</label>
    			</div>
    			<div class="col-auto">
    				<input type="text" id="title" class="form-control" required>
    			</div>
    			
        		<div class="col-auto">
    				<label for="author" class="col-form-label">Author</label>
    			</div>
    			<div class="col-auto">
    				<input type="text" id="author" class="form-control" required>
    			</div>
			</div>
			
			<div class="row g-3 align-items-center">
    			<div class="col-auto">
    				<label for="date" class="col-form-label">Date Added/Read</label>
    			</div>
    			<div class="col-auto">
   					<input type="date" id="date" class="form-control">
   				</div>
   				
   				<div class="col-auto">
    				<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="status" id="tbw" value="tb">
						<label class="form-check-label" for="show">To Be Read</label>
    				</div>
    				<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="status" id="ip" value="ip">
						<label class="form-check-label" for="show">In Progress</label>
    				</div>
    				<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="status" id="c" value="c">
						<label class="form-check-label" for="show">Completed</label>
    				</div>
    			</div>
   			</div>
			
			<div class="row">
				<div class="col-auto" id="genreSelect"></div>
			</div>
			
			<div class="row">
				<div class="col-auto">
					<label for="rating" class="form-label">Rating</label>
				</div>
				<div class="col-auto">
					<input type="range" class="form-range" min="0" max="5" step="1" id="rating">
				</div>
			</div>
			
			<input class="btn btn-primary"type="submit" name="add" value="Add Book" required>
    	</form>
        
        <footer class="bg-light text-center text-lg-start">
        	<div class="text-center p-3">
        		<b>Media Tracker</b> by <a href="https://www.linkedin.com/in/hayleylwong">Hayley Wong</a>.
        	</div>
        </footer>
        
        <script src="./source/controller.js"></script>
    </body>
</html>
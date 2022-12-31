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
                  <a class="nav-item nav-link active" href="./main.php">Home</a>
                  <a class="nav-item nav-link" href="./watchlist.html">Movies and Shows</a>
                  <a class="nav-item nav-link" href="./books.html">Books</a>
                  <a class="nav-item nav-link" href="./settings.html">Settings</a>
                </div>
  			</div>
    	</nav>
    	
    	<div id="options"></div>
    	
    	<div id="mediaDisplay" class="home">
    		<h1>Media Tracker</h1>
    		Track the media you consume throughout your everyday life!
    		
    		<p>
    			<?php
                    include './DatabaseAdapter.php';
                    new DatabaseAdapter();
                ?>
			</p>
        </div>
        
        <footer class="bg-light text-center text-lg-start">
        	<div class="text-center p-3">
        		<b>Media Tracker</b> by <a href="https://www.linkedin.com/in/hayleylwong">Hayley Wong</a>.
        	</div>
        </footer>
        
        <script src="./source/controller.js"></script>
    </body>
</html>
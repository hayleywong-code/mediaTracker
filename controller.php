<?php

require_once './DatabaseAdapter.php';

$db = new DatabaseAdapter();

if(isset ($_GET['todo']) && $_GET['todo'] === 'w') {
    echo getWatchListAsHTML() . PHP_EOL;
}

if(isset ($_GET['todo']) && $_GET['todo'] === 'b') {
    echo getBooksAsHTML() . PHP_EOL;
}

if (isset ($_GET['todo']) && $_GET['todo'] === 'reset') {
    $db->resetDatabase();
}

if (isset ( $_POST['addBook'] )) {
    $title = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);
    $date = $_POST['date'];
    $status = $_POST['status'];
    $genres = $_POST['genreArray'];
    $rating = $_POST['rating'];
    
    if($date == NULL) {
        $date = date("Y/m/d");
    }
    
    $db->addBook($title, $author, $date, $status, $genres, $rating);
    
    header( "Location: books.html" );
    exit;
}


if (isset ( $_POST['addWatchList'] )) {
    $title = htmlspecialchars($_POST['title']);
    $itemType = $_POST['type'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $genres = $_POST['genreArray'];
    $rating = $_POST['rating'];
    
    if($date == NULL) {
        $date = date("Y/m/d");
    }
    
    $db->addWatchList($title, $itemType, $date, $status, $genres, $rating);
    
    header( "Location: watchlist.html" );
    exit;
}


function getWatchListAsHTML() {
    $result = '<table class="table table-hover"><thead><tr><th scope="col">Title</th>' .
              '<th scope="col">Type</th><th scope="col">Genre</th><th scope="col">Status</th>' .
              '<th scope="col">Date</th><th scope="col">Rating</th>' .
              '<th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">' .
              '</th></tr>' . PHP_EOL;
    
    echo $result;
}

function getBooksAsHTML() {
    $result = '<table class="table table-hover"><thead><tr><th scope="col">Title</th>' .
              '<th scope="col">Author</th><th scope="col">Genre</th><th scope="col">Status</th>' .
              '<th scope="col">Date</th><th scope="col">Rating</th>' .
              '<th data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">' .
              '</th></tr>' . PHP_EOL;
    
    echo $result;
}
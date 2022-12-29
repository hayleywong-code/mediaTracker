<?php

require_once './DatabaseAdapter.php';

$db = new DatabaseAdapter();

if($_GET['todo'] === 'w') {
    echo getWatchListAsHTML() . PHP_EOL;
} else if($_GET['todo'] === 'b') {
    echo getBooksAsHTML() . PHP_EOL;
} else if ($_GET['todo'] === 'reset') {
    $db->resetDatabase();
    
}

function getWatchListAsHTML() {
    $result = '<table class="table table-hover"><thead><tr><th scope="col">Title</th>' .
              '<th scope="col">Type</th><th scope="col">Genre</th><th scope="col">Status</th>' .
              '<th scope="col">Date</th><th scope="col">Rating</th></tr>' . PHP_EOL;
    
    echo $result;
}

function getBooksAsHTML() {
    $result = '<table class="table table-hover"><thead><tr><th scope="col">Title</th>' .
        '<th scope="col">Author</th><th scope="col">Genre</th><th scope="col">Status</th>' .
        '<th scope="col">Date</th><th scope="col">Rating</th></tr>' . PHP_EOL;
    
    echo $result;
}
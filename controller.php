<?php

require_once './DatabaseAdapter.php';

$db = new DatabaseAdapter();

if(isset ($_GET['todo']) && $_GET['todo'] === 'w') {
    if(isset($_GET['id'])) {
        $db->deleteWatchList($_GET['id']);
        header( "Location: watchlist.html");
        exit;
    } else {
        echo getWatchListAsHTML($db->getAllWatchlist()) . PHP_EOL;
    }
}

if(isset ($_GET['todo']) && $_GET['todo'] === 'b') {
    if(isset($_GET['id'])) {
        $db->deleteBooks($_GET['id']);
        header( "Location: books.html" );
        exit;
    } else {
        echo getBooksAsHTML($db->getAllBooks()) . PHP_EOL;
    }
}

if (isset ($_GET['todo']) && $_GET['todo'] === 'reset') {
    echo $db->resetDatabase();
}

if (isset ( $_POST['addBook'] )) {
    $title = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);
    $date = $_POST['date'];
    $status = $_POST['status'];
    $genres = implode(', ', $_POST['genreArray']);
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
    $genres = implode(', ', $_POST['genreArray']);
    $rating = $_POST['rating'];
    
    if($date == NULL) {
        $date = date("Y/m/d");
    }
    
    $db->addWatchList($title, $itemType, $date, $status, $genres, $rating);
    
    header( "Location: watchlist.html" );
    exit;
}


function getWatchListAsHTML($arr) {
    $result = '<table class="table table-hover"><thead><tr><th scope="col" class="title">Title</th>' .
              '<th scope="col">Type</th><th scope="col">Status</th>' .
              '<th scope="col">Date</th><th scope="col">Rating</th><th scope="col" class="options"></th></tr></thead><tbody>';
    
    foreach ($arr as $item) {
        
        $result .= '<tr><td hidden value="' . $item["id"] . '";</td><td>' . $item['title'] .'</td><td>' . $item['type'] .'</td>' .
            '<td>' . $item['status'] .'</td><td>' . $item['date'] .'</td><td>' . $item['rating'] .'</td>' .
            '<td><img class="icon" src="./source/icons/edit.png" alt="Edit Icon">' . 
            '<img class="icon" src="./source/icons/delete.png" onclick="deleteItem(0,' . $item["id"] . '); return false;"alt="Delete Icon"></td></tr>';
    }
    
    echo $result;
}

function getBooksAsHTML($arr) {
    $result = '<table class="table table-hover"><thead><tr><th scope="col" class="title">Title</th>' .
              '<th scope="col">Author</th><th scope="col">Status</th>' .
              '<th scope="col">Date</th><th scope="col">Rating</th><th scope="col" class="options"></th></tr></thead><tbody>';
    
    foreach ($arr as $book) {
        
        $result .= '<tr><td hidden value="' . $book["id"] . '";</td><td>' . $book['title'] .'</td><td>' . $book['author'] .'</td>' .
                   '<td>' . $book['status'] .'</td><td>' . $book['date'] .'</td><td>' . $book['rating'] .'</td>' .
                   '<td><img class="icon" src="./source/icons/edit.png" alt="Edit Icon">' .
                   '<img class="icon" src="./source/icons/delete.png" onclick="deleteItem(0,' . $book["id"] . '); return false;"alt="Delete Icon"></td></tr>';
    }
    
    echo $result . '</tbody></table>' . PHP_EOL;
}
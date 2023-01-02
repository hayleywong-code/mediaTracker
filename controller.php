<?php

require_once './DatabaseAdapter.php';

$db = new DatabaseAdapter();

if(isset ($_GET['todo']) && $_GET['todo'] === 'w') {
    echo getWatchListAsHTML($db->getAllWatchlist()) . PHP_EOL;
}

if(isset ($_GET['todo']) && $_GET['todo'] === 'b') {
    echo getBooksAsHTML($db->getAllBooks()) . PHP_EOL;
    exit;
}

if (isset ($_GET['todo']) && $_GET['todo'] === 'reset') {
    echo $db->resetDatabase();
    exit;
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

if (isset ( $_POST['delete'] )) {
    if($_POST['type'] == 'w') {
        $db->deleteWatchList($_POST['id']);
        header( "Location: watchlist.html" );
        exit;
    }
    
    if($_POST['type'] == 'b') {
        $db->deleteBook($_POST['id']);
        header( "Location: books.html" );
        exit;
    }
}

if (isset ( $_POST['edit'] )) {
    if($_POST['type'] == 'w') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $type = $_POST['itemType'];
        $status = $_POST['status'];
        $date = $_POST['date'];
        $rating = $_POST['rating'];
        $genre = $_POST['genre'];
        
        include('./editWatchListItem.php');
        editItem($id, $title, $type, $status, $date, $rating, $genre);
    }
    
    if($_POST['type'] == 'b') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $status = $_POST['status'];
        $date = $_POST['date'];
        $rating = $_POST['rating'];
        $genre = $_POST['genre'];
        
        include('./editBook.php');
        editBook($id, $title, $author, $status, $date, $rating, $genre);
    }
}

if (isset ( $_POST['editForm-w'])) {
    $id = $_POST['id'];
    $title = htmlspecialchars($_POST['title']);
    $itemType = $_POST['type'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $genres = implode(', ', $_POST['genreArray']);
    $rating = $_POST['rating'];
    
    if($date == NULL) {
        $date = date("Y/m/d");
    }
    
    $db->updateWatchlist($id, $title, $itemType, $date, $status, $genres, $rating);
    
    header( "Location: watchlist.html" );
    exit;
}

if (isset ( $_POST['editForm-b'])) {
    $id = $_POST['id'];
    $title = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);
    $date = $_POST['date'];
    $status = $_POST['status'];
    $genres = implode(', ', $_POST['genreArray']);
    $rating = $_POST['rating'];
    
    if($date == NULL) {
        $date = date("Y/m/d");
    }
    
    $db->updateBook($id, $title, $author, $date, $status, $genres, $rating);
    
    header( "Location: books.html" );
    exit;
}

function getWatchListAsHTML($arr) {
    $result = '<table class="table table-striped"><thead><tr><th scope="col" class="title-col">Title</th>' .
              '<th scope="col" class="type-col">Type</th><th scope="col">Status</th>' .
              '<th scope="col">Date</th><th scope="col rating-col">Rating</th><th scope="col" class="option-col"></th></tr></thead><tbody>';
    
    foreach ($arr as $item) {
        
        $result .= '<tr><td hidden value="' . $item["id"] . '";</td><td>' . $item['title'] .'</td><td>' . $item['type'] .'</td>' .
                   '<td>' . $item['status'] .'</td><td>' . $item['date'] .'</td><td>' . $item['rating'] .'</td>' .
                   '<td><form action="controller.php" method="post"><input type="submit" name="edit" value="Edit" class="btn btn-link options">' .
                   '<input type="submit" name="delete" value="Delete" class="btn btn-link options">' .
                   '<input type="hidden" name="id" value="' . $item["id"] . '"</input><input type="hidden" name="type" value="w"</input>' . 
                   '<input type="hidden" name="title" value="' . $item["title"] . '"</input>' .
                   '<input type="hidden" name="itemType" value="' . $item["type"] . '"</input>' .
                   '<input type="hidden" name="status" value="' . $item["status"] . '"</input>' .
                   '<input type="hidden" name="date" value="' . $item["date"] . '"</input>' .
                   '<input type="hidden" name="rating" value="' . $item["rating"] . '"</input>' .
                   '<input type="hidden" name="genre" value="' . $item["genre"] . '"</input>' .
                   '</form></td></tr>';
    }
    
    echo $result;
}

function getBooksAsHTML($arr) {
    $result = '<table class="table table-striped"><thead><tr><th scope="col" class="book-title-col">Title</th>' .
              '<th scope="col" class="author-col">Author</th><th scope="col">Status</th>' .
              '<th scope="col">Date</th><th scope="col">Rating</th><th scope="col option-col"></th></tr></thead><tbody>';
    
    foreach ($arr as $book) {
        
        $result .= '<tr><td hidden value="' . $book["id"] . '";</td><td>' . $book['title'] .'</td><td>' . $book['author'] .'</td>' .
                   '<td>' . $book['status'] .'</td><td>' . $book['date'] .'</td><td>' . $book['rating'] .'</td>' .
                   '<td><form action="controller.php" method="post"><input type="submit" name="edit" value="Edit" class="btn btn-link options">' .
                   '<input type="submit" name="delete" value="Delete" class="btn btn-link options">' .
                   '<input type="hidden" name="id" value="' . $book["id"] . '"</input><input type="hidden" name="type" value="b"</input>' . 
                   '<input type="hidden" name="title" value="' . $book["title"] . '"</input>' .
                   '<input type="hidden" name="author" value="' . $book["author"] . '"</input>' .
                   '<input type="hidden" name="status" value="' . $book["status"] . '"</input>' .
                   '<input type="hidden" name="date" value="' . $book["date"] . '"</input>' .
                   '<input type="hidden" name="rating" value="' . $book["rating"] . '"</input>' .
                   '<input type="hidden" name="genre" value="' . $book["genre"] . '"</input>' .
                   '</form></td></tr>';

    }
    
    echo $result . '</tbody></table>' . PHP_EOL;
}
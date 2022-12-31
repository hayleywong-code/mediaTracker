<?php

class DatabaseAdapter {
    private $DB;
    
    public function __construct() {
        try {
            $this->DB = new PDO (
                'mysql:dbname=hayleywong-code-mediaTracker;charsetutf8;host=127.0.0.1',
                'root',
                '');
            $this->DB->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo('Error establishing connection to hayleywong-code-mediaTracker. Please read the README for more information on usage.');
        }
    }
    
    public function resetDatabase() {
        $stmt = $this->DB->prepare("DELETE FROM books;");
        $stmt->execute();
        
        $stmt = $this->DB->prepare("DELETE FROM watchlist;");
        $stmt->execute();        
    }
    
    public function addBook($title, $author, $date, $status, $genres, $rating) {
        $insertStmt = "INSERT INTO books (title, author, genre, status, date, rating) " .
            "VALUES (:title, :author, :genre, :status, :date, :rating)";
        
        $stmt = $this->DB->prepare($insertStmt);
        
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':genre', $genres);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':rating', $rating);
        
        $stmt->execute();
    }
    
    public function deleteBook($id) {
        $deleteStmt = "DELETE FROM books WHERE id=:id";
        
        $stmt = $this->DB->prepare($deleteStmt);
        
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();        
    }
    
    public function addWatchList($title, $itemType, $date, $status, $genres, $rating) {
        $insertStmt = "INSERT INTO watchlist (title, genre, type, status, date, rating) " .
            "VALUES (:title, :genre, :type, :status, :date, :rating)";
        
        $stmt = $this->DB->prepare($insertStmt);
        
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':genre', $genres);
        $stmt->bindParam(':type', $itemType);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':rating', $rating);
        
        $stmt->execute();
    }
    
    public function deleteWatchList($id) {
        $deleteStmt = "DELETE FROM watchlist WHERE id=:id";
        
        $stmt = $this->DB->prepare($deleteStmt);
        
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
    }
    
    public function getAllBooks() {
        $stmt = $this->DB->prepare("SELECT * FROM books");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    
    public function getAllWatchlist() {
        $stmt = $this->DB->prepare("SELECT * FROM watchlist");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
}
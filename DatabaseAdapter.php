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
        $stmt = $this->DB->prepare("DROP TABLE books;");
        $stmt->execute();
        
        $stmt = $this->DB->prepare("DROP TABLE watchlist");
        $stmt->execute();
        
        $update = " CREATE TABLE books ( " .
                  " id int(20) NOT NULL AUTO_INCREMENT primary key, " .
                  " title varchar(255) NOT NULL, " . 
                  " author varchar(255) NOT NULL, " .
                  " genre varchar(255) NOT NULL, " .
                  " status varchar(255) NOT NULL, " .
                  " date date NOT NULL, " .
                  " rating varchar(255) NOT NULL); ";
        $stmt = $this->DB->prepare($update);
        $stmt->execute();
        
        $update = " CREATE TABLE watchlist ( " .
                  " id int(20) NOT NULL AUTO_INCREMENT primary key, " .
                  " title varchar(255) NOT NULL, " .
            	  " genre varchar(255) NOT NULL, " .
            	  " type varchar(255) NOT NULL, " .
            	  " status varchar(255) NOT NULL, " .
            	  " date date NOT NULL, " .
            	  " rating varchar(255) NOT NULL); ";
        $stmt = $this->DB->prepare($update);
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
    
    public function updateBook($id, $title, $author, $date, $status, $genres, $rating) {
        $updateStmt = "UPDATE books SET title=:title, author=:author, genre=:genre, status=:status, date=:date, rating=:rating " .
            "WHERE id=:id";
        
        $stmt = $this->DB->prepare($updateStmt);
        
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':genre', $genres);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':rating', $rating);
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
    
    public function updateWatchlist($id, $title, $itemType, $date, $status, $genres, $rating) {
        $updateStmt = "UPDATE watchlist SET title=:title, genre=:genre, type=:type, status=:status, date=:date, rating=:rating " .
            "WHERE id=:id";
        
        $stmt = $this->DB->prepare($updateStmt);
        
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':genre', $genres);
        $stmt->bindParam(':type', $itemType);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':rating', $rating);
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
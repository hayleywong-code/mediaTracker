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
        $stmt = $this->DB->prepare("DROP DATABASE IF EXISTS hayleywong-code-mediaTracker;");
        $stmt->execute();
        
        $stmt = $this->DB->prepare("CREATE DATABASE hayleywong-code-mediaTracker");
        $stmt->execute();
        
        $update = " CREATE TABLE books (" .
                  " title varchar(255) NOT NULL, " .
                  " author varchar(255) NOT NULL, " .
                  " genre varchar(255) NOT NULL, " .
                  " status varchar(255) NOT NULL, " .
                  " date date NOT NULL, " .
                  " rating int(1) NOT NULL);";
        $stmt = $this->DB->prepare($update);
        $stmt->execute();
        
        $update = " CREATE TABLE watchlist (" .
            " title varchar(255) NOT NULL, " .
            " genre varchar(255) NOT NULL, " .
            " type varchar(255) NOT NULL, " .
            " status varchar(255) NOT NULL, " .
            " date date NOT NULL, " .
            " rating int(1) NOT NULL);";
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
    
}
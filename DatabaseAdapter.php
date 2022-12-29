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
            $stmt = $this->DB->prepare("create database hayleywong-code-mediaTracker;");
            $stmt->execute();
        }
    }
}
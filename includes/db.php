<?php
// Simple SQLite/MySQL Connection Wrapper
// Using SQLite for instant portability in this competition context, 
// but code is ready for MySQL by changing the DSN.

class Database {
    private $host = "localhost";
    private $db_name = "smart_emi_db";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            // MySQL Connection (Active)
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            
            // SQLite (Commented out)
            // $this->conn = new PDO("sqlite:../includes/smart_emi.sqlite");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Create table if not exists
            $query = "CREATE TABLE IF NOT EXISTS history (
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        amount REAL,
                        rate REAL,
                        tenure INTEGER,
                        emi REAL,
                        timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
                      )";
            $this->conn->exec($query);

        } catch(PDOException $exception) {
            // echo "Connection error: " . $exception->getMessage(); // Silent fail to prevent JSON corruption
            error_log("Connection error: " . $exception->getMessage());
        }

        return $this->conn;
    }
}
?>

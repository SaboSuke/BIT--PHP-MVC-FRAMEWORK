<?php
/** User: Sabo */

use \app\core\Database;

class m0001_initial{

    private Database $db;

    /**
     * migration constructor
     * 
     */
    public function __construct(){
        $this->db = \app\core\Application::$app->db;
    }

    public function up(){
        $QUERY = "CREATE TABLE users(
            id INT AUTO_INCREMENT PRIMARY KEY,
            email  VARCHAR(255) NOT NULL,
            first_name VARCHAR(255) NOT NULL,
            last_name VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";
        $this->db->pdo->exec($QUERY);
    }
    
    public function down(){
        $QUERY = "DROP TABLE users;";
        $this->db->pdo->exec($QUERY);
    }
    
}
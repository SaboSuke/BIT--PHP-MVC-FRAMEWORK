<?php
/** User: Sabo */

use \sabosuke\bit_mvc_core\db\Database;

class m0003_init_theme{

    private Database $db;

    /**
     * migration constructor
     * 
     */
    public function __construct(){
        $this->db = \sabosuke\bit_mvc_core\Application::$app->db;
    }

    public function up(){
        $QUERY = "CREATE TABLE themes(
            id INT AUTO_INCREMENT PRIMARY KEY,
            name  VARCHAR(255) NOT NULL,
            path VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";
        $this->db->pdo->exec($QUERY);
    }
    
    public function down(){
        $QUERY = "DROP TABLE themes;";
        $this->db->pdo->exec($QUERY);
    }
    
}
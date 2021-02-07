<?php
/** User: Sabo */

use \app\core\Database;

class m0002_add_password_column{

    private Database $db;

    /**
     * migration constructor
     * 
     */
    public function __construct(){
        $this->db = \app\core\Application::$app->db;
    }

    public function up(){
        $QUERY = "ALTER TABLE users 
                ADD COLUMN password VARCHAR(512) NOT NULL;";
        $this->db->pdo->exec($QUERY);
    }
    
    public function down(){
        $QUERY = "ALTER TABLE users 
                DROP COLUMN password;";
        $this->db->pdo->exec($QUERY);
    }
    
}
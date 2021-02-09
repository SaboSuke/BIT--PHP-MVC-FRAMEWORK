<?php
/** User: Sabo */

use \sabosuke\bit_mvc_core\db\Database;

class m0002_add_password_column{

    private Database $db;

    /**
     * migration constructor
     * 
     */
    public function __construct(){
        $this->db = \sabosuke\bit_mvc_core\Application::$app->db;
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
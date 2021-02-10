<?php
/** User: Sabo */

use \sabosuke\bit_mvc_core\db\Database;

class m0004_add_file_path_column{

    private Database $db;

    /**
     * migration constructor
     * 
     */
    public function __construct(){
        $this->db = \sabosuke\bit_mvc_core\Application::$app->db;
    }

    public function up(){
        $QUERY = "ALTER TABLE themes 
                ADD COLUMN file_path VARCHAR(512) NOT NULL;";
        $this->db->pdo->exec($QUERY);
    }
    
    public function down(){
        $QUERY = "ALTER TABLE themes 
                DROP COLUMN file_path;";
        $this->db->pdo->exec($QUERY);
    }
    
}
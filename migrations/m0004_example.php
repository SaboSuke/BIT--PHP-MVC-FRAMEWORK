<?php
/** User: Sabo */

use \sabosuke\bit_mvc_core\db\Database;
use app\models\__QueryBuilder;

class m0004_example extends __QueryBuilder{

    private Database $db;

    /**
     * migration constructor
     * 
     */
    public function __construct(){
        $this->db = \sabosuke\bit_mvc_core\Application::$app->db;
    }

    public function up(){
        $QUERY = "CREATE TABLE test(
            id INT AUTO_INCREMENT PRIMARY KEY,
            name  VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";
        if (!$this->newTable($QUERY)){
            echo "You have an error in your sql syntax!" . PHP_EOL;
        }
    }
    
    public function down(){
        if(!$this->dropTable('themes'))
            echo "Table does not exist!". PHP_EOL;
    }
    
}
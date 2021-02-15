<?php
/** User: Sabo */

namespace app\models;
use sabosuke\bit_mvc_core\query_builder\QueryBuilder;
use sabosuke\bit_mvc_core\Application;

/** 
 * Class Test
 * 
 * @author Essam Abed <abedissam95@gmail.com>
 * @package app\models
*/

class Test{

    private QueryBuilder $qb;

    /**
     * Test constructor
     * 
     */
    public function __construct(){
        $qb = new QueryBuilder();
        //echo "<br><br>";
        //var_dump($result);
        // foreach($result as $val){
        //     echo $val['id'];
        // }
    }

}
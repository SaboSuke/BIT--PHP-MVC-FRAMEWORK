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

class Test extends QueryBuilder{

    /**
     * Test constructor
     * 
     */
    public function __construct(){
        
    }

    public function _select(string $tableName, ?string $tableAlias = null, ?array $columns = []): string{
        return parent::select($tableName, $tableAlias, $columns);
    }
    
    public function _select_conditional(string $tableName, ?string $tableAlias = null, ?array $columns = [], ?string $condition = null): string{
        return parent::select($tableName, $tableAlias, $columns);
    }

    public function _selectUsingFunction(
        string $tableName, 
        string $columnName,
        string $function,
        string $tableAlias = null, 
        string $columnAlias = null
    ): string{
        return parent::selectUsingFunction($tableName, $columnName, $function, $tableAlias, $columnAlias);
    }

    public function _insert(string $tableName, ?array $columns = [], array $values): string{
        return parent::insert($tableName, $columns, $values);
    }

    public function _update(string $tableName, array $columns, array $values): string{
        return parent::update($tableName, $columns, $values);
    }

    public function _delete(string $tableName): string{
        return parent::delete($tableName);
    }

    public function _joinTableOn(string $tableName, ?string $tableAlias = null, string $condition): string{
        return parent::joinTableOn($tableName, $tableAlias, $condition);
    }

    public function _joinTableUsing(string $tableName, string $columnName): string{
        return parent::joinTableUsing($tableName, $columnName);
    }

    public function _innerJoin(string $tableName, ?string $tableAlias = null, string $condition): string{
        return parent::innerJoin($tableName, $tableAlias, $condition);
    }
    
    public function _leftJoin(string $tableName, ?string $tableAlias = null, string $condition): string{
        return parent::leftJoin($tableName, $tableAlias, $condition);
    }
    
    public function _rightJoin(string $tableName, ?string $tableAlias = null, string $condition): string{
        return parent::rightJoin($tableName, $tableAlias, $condition);
    }
    
    public function _outerJoin(string $tableName, ?string $tableAlias = null, string $condition): string{
        return parent::outerJoin($tableName, $tableAlias, $condition);
    }

    public function _where($condition): string{
        return parent::where($condition);
    }

    public function _andWhere(string $condition, string $selectStatement): string{
        return parent::andWhere($condition, $selectStatement);
    }

    public function _having(string $condition): string{
        return parent::having($condition);
    }

    public function _orderBy($columns, ?string $sortBy = "ASC"): string{
        return parent::orderBy($columns, $sortBy);
    }

    public function _groupBy(string $column): string{
        return parent::groupBy($column);
    }

    public function _getQuery($query): string{
        return parent::getQuery($query);
    }

    public function _getResult($query): array{
        return parent::getResult($query);
    }

}
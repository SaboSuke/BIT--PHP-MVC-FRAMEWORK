# QueryBuilder Documentation

> We start by creating an instance of the QueryBuilder class

```PHP 
$qb = new QueryBuilder();
```

## _select

```PHP
$qb->_select (string $tableName, ?string $tableAlias, ?array $columns): string
```

*snippet :*

> you can select all records by removing the where

```PHP
$query = $qb->_select('users'); 
$query .= $qb->_joinTableUsing('other_user', 'id'); 
$query .= $qb->_where('id = 2');
$query .= $qb->_groupBy('id');
$query .= $qb->_orderBy('id', 'DESC');
$query = $qb->_getQuery($query);
var_dump($qb->_getResult($query));
```

## _insert

```PHP
$qb->_insert(string $tableName, ?array $columns, array $values): string
```

*snippet :*

```PHP
$query = $qb->_insert('themes', ['name', 'path'], ['test', 'test.css']
$qb->_getResult($query);
```
> if the columns are null you have to provide all the values for each column inside the `$values` array sorted the same way as the database. 

> not that in this case we can get the result without using _getQuery($query) method since we only one method.

## _update

```PHP
$qb->_update(string $tableName, array $columns, array $values): string
```

*snippet :*

```PHP
$query = $qb->_update('themes', ['name', 'path'], ['test', 'test.css'] 
$query .= $qb->_where('id = 1');
$query = $qb->_getQuery($query);
$qb->_getResult($query);
```

## _delete

```PHP
$qb->_delete(string $tableName): string
```

*snippet :*

```PHP
$query = $qb->_delete('themes'); 
$query .= $qb->_where('id = 1');
$query = $qb->_getQuery($query);
$qb->_getResult($query);
```

## _where

```PHP
$qb->_where(string $condition): string
```

*snippet :*

> you use _where() after executing a _select() and specify the condition

```PHP
$query = $qb->_select('users', 'alas', ['id', 'first_name']);
$query .= $qb->_where("id = 2"); //or $query .= $qb->_where("first_name = Jack");
$query = $qb->_getQuery($query);
var_dump($qb->_getResult($query)); //returns an array containing the results
```

## _andWhere

```PHP
$qb->_andWhere(string $condition, string $selectStatement): string
```

## _having

```PHP
$qb->_having(string $condition): string
```

## _orderby

```PHP
$qb->_orderBy(string | array $columns, ?string $sortBy = "ASC | DESC"): string
```

## _groupBy

```PHP
$qb->_groupBy(string $column): string
```

## join, inner join, left join, right join, outer join, join + using

> note that inner, left, right and outer join has the same parameters. same goes for _joinTableOn.

```PHP
$qb->_joinTableOn(string $tableName, ?string $tableAlias, string $condition): string


$qb->_innerJoin(string $tableName, ?string $tableAlias, string $condition): string


$qb->_leftJoin(string $tableName, ?string $tableAlias, string $condition): string


$qb->_rightJoin(string $tableName, ?string $tableAlias, string $condition): string


$qb->_outerJoin(string $tableName, ?string $tableAlias, string $condition): string
```

```PHP
 $qb->_joinTableUsing(string $tableName, string $columnName): string
```

## Using All | IN | EXISTS (SELECT statement) inside where

*example :*

```SQL
SELECT column_name
FROM table_name
WHERE EXISTS | IN | ALL (SELECT column_name FROM table_name);
```

> using this function you'll be able to creating a select statement inside where.

> note that _where($condition) function does not work in this situation

*snippet :*

```PHP
$st = $qb->_select("other_user", 'o', ['id', 'first_name', 'last_name']);
$st .= $qb->_where("u.id = o.id");

$query = $qb->_select("users", 'u', ['id', 'first_name', 'last_name'])
$query .= $qb->_andWhere("EXISTS ", $st);
$query = $qb->_getQuery($query);
echo $query;
var_dump('<pre>', $qb->_getResult($query), '</pre>');
```
> As you can see, we've created a select statement first then we passed it to the _andWhere function and specified that we want it inside EXISTS.

## Using `JOIN table_name USING(column_name)` in SELECT

*example:*

```SQL
SELECT column_name
FROM table_name JOIN table_name USING(column_name)
HAVING FUNCTION(column_name);
```

*snippet :*

```PHP
$query = $qb->_select('users'); 
$query .= $qb->_joinTableUsing('other_user', 'id');
$query .= $qb->_having('MAX(id)');
$query = $qb->_getQuery($query);
var_dump($qb->_getResult($query));
```

## using INNER JOIN in a SELECT statement

*example :*

```SQL
SELECT column_name
FROM table_name t1 INNER JOIN table_name t2
ON t1.column_name = t2.column_name;
```

> keep in mind that alias can be null

*snippet :*

```PHP
$query = $qb->_select('users', 'u'); 
$query .= $qb->_innerJoin('other_user', 'o',"u.id = o.id");
$query = $qb->_getQuery($query);
var_dump($qb->_getResult($query));
```

## _getQuery
> getQuery returns the whole query after you finish adding where group by etc..
```PHP
$qb->_getQuery(string $query): string
```

## _getResult

```PHP
$qb->_getResult(string $query): array
```
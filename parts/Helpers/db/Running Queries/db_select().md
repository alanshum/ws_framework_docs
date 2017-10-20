**Description**
Select data from active database.

This supports simple and straight forward select statements. For complex logics (e.g. grouping, sub-queries), you will still have to write your own sql queries and make use of [`db_query()`](#db_query).

Note: WHERE values will be automatically escaped. See [`escape()`](#escape).

--------
**Parameters**
name	type	def_value	desc
select	mixed		SELECT portion, can be string or array (glued by a comma ",")
from	mixed		FROM table references, can be string or array (glued by a comma ",")
where	mixed	''	WHERE condition, can be string or array or associative array (glued by "AND", see usage below )
order	mxied	''	ORDER BY section, can be string or simple array or associative array (glued by "AND", see usage below )
prep_single	bool	FALSE	if a single record is expected (so it will be a 1-dimensional array instead of 2-dimensional array) to save some codes. <br> Note: if the actual result data is more than 1 row, it will still return a 2-dimensional array)

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
Array	query results

--------
**Examples**
1. Simple select query
```php
$data = db_select( 'username' , 'users' , array( 'u.username' => 'asc' ) );
// $data will be an two dimensional array: 1st level is indexed array and 2nd level is associative array:
// $data = array(
//		0 => array( 'username' => 'john' ),
//		1 => array( 'username' => 'jane' ),
//		2 => ... ,
// );
```

2. More complex query
```php
$select = array( 'u.username' , 'u.password' , 'p.profilepic' );
// SELECT u.username, u.password, p.profilepic

$from = 'users u, profiles p';
// FROM users u, profiles p

$where = array( 'u.username' => $_POST['username'], 'p.password' => crypt( $_POST['password'] ) );
// WHERE `u.username` = 'user1' AND `u.password` = '$1$q2dljdmO$GOqtv0hxwsbXbeldqYzVp0'
// key and value is glued by "="

$order = array( 'u.username' => 'asc' );
// ORDER BY `u.username` asc

$data2 = db_select( $select, $from, $where, $order , TRUE );
// $data2 will be an associative array (one dimensional).
// $data2 = array( 'username' => '...', 'password' => '...' , 'profilepic' => '...') ;
```

3. Here we list other possibilities:

A. It is absolutely fine if you write your own portion in simple strings, for all **$select**, **$from**, **$where**, **$order** parts.
```php
$select = 'user,pass';
// SELECT user,pass
```

B. No special effect for associative array for **$select** and  **$from**, it will just read the values.
```php
$from = array( 'a' => 'table1' );
// FROM table1
```

C. It is also fine to use indexed array for **$where** and **$order**, and will be glued with AND. Useful to customized the query.
```php
$where = array( 'col1 = "a"', 'col2 !="b"' );
// WHERE col1 = "a" AND col2 != "b"
```
```php
$order = array( 'col1 asc', 'col2 desc');
// ORDER BY col1 asc AND col2 desc
```


--------
**Changelog**


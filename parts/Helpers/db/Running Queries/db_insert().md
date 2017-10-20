**Description**
Insert a single record into active database set.

--------
**Parameters**
name	type	def_value	desc
table	string		table name
data	array		data array (associative array)

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
TRUE	on success
FALSE	otherwise

--------
**Examples**

```php
$data = array( 'id' => 'jdoe', 'name' => 'John Doe' );
$result = db_insert( 'user_table' , $data );
```

--------
**Changelog**


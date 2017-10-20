**Description**
Update table for the data with the condition supplied.

--------
**Parameters**
name	type	def_value	desc
table	string		table name
data	array		data array (associative array)
where	mixed		condition. See [`db_select()`](#db_select) for how "where" can be specified

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
Int	number of rows affected if success
FALSE	on failure

--------
**Examples**

```php
$data = array( 'name' => 'John Doe' );
$result = db_update( 'user_table' , $data , array( 'id' => 'jdoe' ) );
```

--------
**Changelog**


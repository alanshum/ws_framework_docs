**Description**
Delete records from table with the condition supplied.

--------
**Parameters**
name	type	def_value	desc
table	string		table name
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
$result = db_delete( 'user_table' ,array( 'id' => 'jdoe' ) );
// the row will be deleted. $result = 1 if there was a record with id = 'jdoe'; 0 if not; FALSE if the record is not found
```

--------
**Changelog**


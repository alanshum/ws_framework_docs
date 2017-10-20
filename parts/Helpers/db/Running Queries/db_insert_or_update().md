**Description**
Insert a single record into database, or update a record if the primary key value is already exist.

Use with care if you may accidentally rewrites an old record. Not to be used with multiple primary keys table.

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
FALSE	on failure
0	for not updated nor inserted
1	for insert
2	for update

--------
**Examples**

```php
$data = array( 'id' => 'jdoe', 'name' => 'John Doe' );
$result = db_insert_or_update( 'user_table' , $data );
```

--------
**Changelog**


**Description**
Escape and quote values as needed for SQL statement. Note:

- Strings are auto escaped in the querying functions above. Use this for custom SQL statements as needed.
- to use MySQL functions in the string, put prefix **`fx:`** and escaping will be skipped. e.g. `fx:now()`

--------
**Parameters**
name	type	def_value	desc
str	string / array		string to be escaped. can also be array to escape repeatedly

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
String/Array	escaped values suitable to run in MySQL query

--------
**Examples**

```php
$id = $_POST['id'];
$sql = 'SELECT * FROM user_table WHERE id=' . escape( $id );
$query = db_query( $sql );
```

--------
**Changelog**


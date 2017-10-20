**Description**
Open a connection to database.

Note: You should be using [`db_set_active()`](#db_set_active) instead. Otherwise you cannot make use of the other helpers.

--------
**Parameters**
name	type	def_value	desc
options	array		array of properties

--------
**Properties**
name	type	def_value	desc
user	string		Database user name
pass	string		Database password
db	string		Database name
host	string	'localhost'	DB host name


--------
**Return Values**
type	desc
Object	mysqli_connect() object

--------
**Examples**

```php
$conn = db_connect( array( 'user' => ... , 'pass' => ... , 'db' => 'testdb' ) );
```

--------
**Changelog**


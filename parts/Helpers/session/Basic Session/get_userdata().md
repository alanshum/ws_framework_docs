**Description**
Get user session data.

--------
**Parameters**
name	type	def_value	desc
key	string	`NULL`	User data item key to retrieve. if unspecified (i.e. the default, `NULL`), all user data (in array) will be retrieved.

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
Array/String	user session data values
NULL	if the key is not found

--------
**Examples**

```php
$session_data = get_userdata();
// get array of all session data (i.e. an alias to $_SESSION, especially when flash data is not used).

$user = get_userdata( 'username ');
// get a single session item. If it is not set, NULL will be returned.
// As opposed to $_SESSION, get_userdata will not throw an error if the key is not found.
```

--------
**Changelog**


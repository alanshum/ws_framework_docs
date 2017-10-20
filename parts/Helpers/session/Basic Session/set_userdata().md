**Description**
Set or update user session data. You may also put an associative array as the only parameter to store multiple session keys at once. (Please see examples for the syntaxes)

--------
**Parameters**
name	type	def_value	desc
key	Array/String		User data item key or associative array of session items
value	Array/String	NULL	value to store

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
void

--------
**Examples**

```php
// syntax 1 - single item: 
set_userdata( 'username' , 'john' );

// syntax 2 - multiple items:
$newdata = array( 
	'username' => 'jane' ,
	'email' => 'jane@example.com'
);
set_userdata( $newdata );

// you can get the session data by: get_userdata('username') and get_userdata('email')

```

--------
**Changelog**
- 2017.10.17
	`$key` parameter was renamed from `$data` for clarity

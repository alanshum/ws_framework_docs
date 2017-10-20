**Description**
Add or change flash data.

--------
**Parameters**
name	type	def_value	desc
key	array/string		flash data key; or an associative array with `key=>value` pairs. See examples for syntax.
value	string	''	flash data value; only used if string key is specified in $key
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
set_flashdata( 'message' , 'Hello World' );

// syntax 2 - multiple items:
$newdata = array( 
	'message' => 'Hello World' ,
	'error' => 'err1'
);
set_flashdata( $newdata );
// you can get the session data by: get_flashdata('message') and get_userdata('error')


// common usage example:
if( ! valid_user( $username ) )
{
	set_flashdata('message','You are not allowed to enter this area.');
	redirect();
}
```

--------
**Changelog**


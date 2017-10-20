**Description**
Check if input string is json encoded.

--------
**Parameters**
name	type	def_value	desc
string	string		input string to be checked
return_data	bool	FALSE	Return decoded data if TRUE

--------
**Return Values**
type	desc
TRUE	if string is json encoded
FALSE	otherwise
Array	of data is `$return_data` set to TRUE

--------
**Examples**

```php
if( $decoded = is_json( $str, TRUE ) ) { ... }
```
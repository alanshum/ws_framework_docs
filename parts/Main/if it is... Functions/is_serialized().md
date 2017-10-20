**Description**
Check if an input is valid PHP serialized string.

--------
**Parameters**
name	type	def_value	desc
value	string		Input string to be checked
return_data	bool	FALSE	Return unserialized data if TRUE

--------
**Return Values**
type	desc
TRUE	if the input is serialized
FALSE	otherwise
Array	of data is `$return_data` is TRUE

--------
**Examples**

```php
if( $unserialized = is_serialized( $str, TRUE ) ) { ... }
```

--------
**Changelog**
- 2016-02-18
	- If the value is a serialized FALSE only, return an array with FALSE as the only item.
**Description**
Making a 2-dimentional numeric data array associative, with the key field value as the array item key. If the array is already an associative array, does nothing.

--------
**Parameters**
name	type	def_value	desc
data	array		input data array
key_field	string	'uniqid'	key field value to be used as array item key

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
Array - associative array

--------
**Examples**

```php
$data = make_data_assoc( open_datafile( ... ) , 'user_id' );
```

--------
**Changelog**
- 2016-02-11
	- Changed $key_field default from 'id' to 'uniqid'.


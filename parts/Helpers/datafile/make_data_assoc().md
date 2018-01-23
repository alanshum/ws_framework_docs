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
Array	associative array
FALSE	if key_field is not found

--------
**Examples**

```php
$data = open_datafile( ... );

printr($data);
// $data:
Array(
	[0] => Array(
		'uniqid' => "id001" ,
		'values' => ... ,
	)
	[1] => Array(
		'uniqid' => "id002" ,
		'values' => ... ,
	)
)


$data = make_data_assoc( $data , 'user_id' );

printr($data);
// $data is now:
// note the change of first level element keys
Array(
	[id001] => Array(
		'uniqid' => "id001" ,
		'values' => ... ,
	)
	[id002] => Array(
		'uniqid' => "id002" ,
		'values' => ... ,
	)
)
```

--------
**Changelog**
- 2016-02-11
	- Changed $key_field default from 'id' to 'uniqid'.


**Description**
Add a header row to the data. Headers are read from the first array item.

Basically a reverse of [array_header_to_keys()](#array_header_to_keys). You may use it before saving data to a dataset. If the sub-item of the input array is not an associative array, does nothing.

--------
**Parameters**
name	type	def_value	desc
data	array		data to be saved in array of `key => value` pairs

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
Array

--------
**Examples**

```php
$data = array( 
	0 => array( 
		'name' => 'John', 
		'id' => '123456' ),
	1 => ...
);
$data = add_header_from_keys( $data );

// $data = array( 
//	0 => array( 'name' , 'id' ), 
//	1 => array( 'John', '123456' ),
//	2 => ... );
```

--------
**Changelog**


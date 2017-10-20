**Description**
Search the array for a value (irrespective to keys).

--------
**Parameters**
name	type	def_value	desc
array	array		input array to be searched
needle	string		value to be searched

--------
**Return Values**
type	desc
Array	search results. The orginal array key is retained.

--------
**Examples**

```php
$data = tsv2array( ... );
$results = array_value_search( $data, 'Peter' );
```
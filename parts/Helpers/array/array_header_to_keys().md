**Description**
Making first item of array to array keys and remove the 1st item in the result array for 2 dimentional array.

Note: If you are using [`tsv2array()`](#tsv2array), this is automatically called if `$has_header` is *TRUE*.

--------
**Parameters**
name	type	def_value	desc
array	array		input array

--------
**Return Values**
type	desc
Array	(prep'd)

--------
**Examples**

```php
$data = array(
	array( 'key1' , 'key2' , 'key3' ),
	array( 'value1A' , 'value2A', 'value3A' ),
	array( 'value1B' , 'value2B', 'value3B' ),
	);

printr( array_header_to_keys($data) );

// prints:
// Array
// (
//     [0] => Array
//         (
//             [key1] => value1A
//             [key2] => value2A
//             [key3] => value3A
//         )
//     [1] => Array
//         (
//             [key1] => value1B
//             [key2] => value2B
//             [key3] => value3B
//         )
// )
```

--------
**Changelog**
- 2016-02-16
	- Fixed a bug that if the item has no value, the value will becomes *NULL*. Now changes to *''* (blank) string

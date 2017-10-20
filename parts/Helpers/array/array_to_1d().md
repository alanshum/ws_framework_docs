**Description**
Flattens multi-dimentional array into one-dimentional, while keeping the values only (array keys are lost).

--------
**Parameters**
name	type	def_value	desc
arr	array		input array to be flattened

--------
**Return Values**
type	desc
Array (1 dimensional)

--------
**Examples**

```php
$example = array( 'a' => '1', 'b' => array( 'c' => '2', 'd' => '3' ) );
printr( array_to_1d( $example ) );

// prints:
// Array
// (
//     [0] => 1
//     [1] => 2
//     [2] => 3
// )
```

--------
**Changelog**
- 2017-10-13
	- named changed from `array_to1d()` inline with other functions.
	- `array_to1d()` is now an alias, subject to removal.
- Added on: 2016-02-05

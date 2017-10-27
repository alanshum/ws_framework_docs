**Description**
Extract an item from an array and remove from original array. Consider it [`array_shift()`](http://php.net/manual/function.array-shift.php) but by a specified key.

--------
**Parameters**
name	type	def_value	desc	by_ref
array	array		source array;	TRUE
key	string		item key to be extracted

--------
**Return Values**
type	desc
Array	extracted array; Also note that the item in the input array is removed

--------
**Examples**

```php
$data = array(
	'user1' => array( ... ),
	'user2' => array( ... ),
	...
	'user11' => array( ... ),
	'user12' => array( ... ),
	'user13' => array( ... ),
	...
);
$result = array_extract( $data, 'user12' );
```

So the variables values are:
```php
$result = array( 'user12' -> array( ... ) );
$data = array(
	'user1' => array( ... ),
	'user2' => array( ... ),
	...
	'user11' => array( ... ),
	// 'user12' is removed from original array
	'user13' => array( ... ),
	...
);
```
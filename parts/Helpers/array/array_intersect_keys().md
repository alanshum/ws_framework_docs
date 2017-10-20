**Description**
Return an array of intersection of keys in both array. A minor modification to the native [`array_intersect_key()`](http://php.net/manual/en/function.array-intersect-key.php), that the 2nd array can be a simple array (list). 

You can consider this function for "I want to keep these keys only".

--------
**Parameters**
name	type	def_value	desc
array1	array		input array
keys_array	array		The array item keys to keep in `$array1`; it can be array or csv values.

--------
**Return Values**
type	desc
Array	containing all the entries of `$array1` which have keys that are present in `$keys_array`.

--------
**Examples**

```php
$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$keys_array = 'blue,red';
print_r( array_intersect_keys( $array1, $keys_array ) ) ;

// prints:
// Array
// (
//     [blue] => 1
//     [red] => 2
// )
```
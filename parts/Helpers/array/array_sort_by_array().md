**Description**
Sort an array by the order of items in the second array. If there are some values in the first array that are not in the order array, those array items will be appended after the ordered items.

--------
**Parameters**
name	type	def_value	desc
array	array		input array to be sorted
order_array	array		the array of items in order; can also use csv.
key_to_order	string		the key in the first array to be ordered

--------
**Return Values**
type	desc
Array	sorted in custom order

--------
**Examples**

```php
$data = array(
	'user1' => array( 'user_type' =>¡@'admin' ),
	'user2' => array( 'user_type' =>¡@'user' ),
	'user3' => array( 'user_type' =>¡@'editor' ),
);
$order = array( 'admin', 'editor', 'user' );
$data = array_sort_by_array( $data, $order, 'user_type' );
// the $data array will be sorted to this order: user1, user3, user2
```
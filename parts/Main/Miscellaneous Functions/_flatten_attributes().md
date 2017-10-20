**Description**
Flatten the 2nd level array for html elements so that it will make it easier to manipulate while it is an array.

You do not need to call this function if you are using [`_print_attributes()`](#_print_attributes).

--------
**Parameters**
name	type	def_value	desc
attributes	array	''	Array of element attributes in `key => value` pairs

--------
**Return Values**
type	desc
Array	(one-dimensional array)

--------
**Examples**

```php
$attr['class'][] = 'class1';
$attr['class'][] = 'class2';
$attr['id'] = 'id';
$attr = _flatten_attributes( $attr );
// $attr = array( 'class' => 'class1 class2', 'id' => 'id' );
```
**Description**
Print html tag attributes **if** the attribute **has some values**, i.e. not an empty string `''`.

Set the value to *NULL* to print the attribute name for boolean attributes.

You do not need to call this function if you use [`html()`](#html).

--------
**Parameters**
name	type	def_value	desc
attributes	array	''	Array of element attributes in `key => value` pairs, of *any* attributes (e.g. id, class, etc.)


--------
**Return Values**
type	desc
String	of attributes

--------
**Examples**

```php
$attr['class'][] = 'class1';	// will be printed
$attr['class'][] = 'class2';	// will be printed
$attr['id'] = 'id';				// will be printed
$attr['style'] = '';			// will NOT be printed since blank
$attr['disabled'] = NULL;		// will be printed since it is NULL
echo '<img' . _print_attributes( $attr ) .'>';
// prints: <img class="class1 class2" id="id" disabled>
```

--------
**Changelog**
- 2016-03-30
	- fixed an issue that the attribute is not printed when the value is zero

**Description**
Returns default value if input value is empty (check with `empty()`).

--------
**Parameters**
name	type	def_value	desc
value	string		Input value to be checked if it is empty. Note that this is passed by reference. (`&$value`)
default	string		Default value to set to the input variable if it is empty

--------
**Return Values**
type	desc
void

--------
**Examples**

```php
$str = '';
empty_default( $str , '123' );		// $str = '123'
$str2 = '456';
empty_default( $str2 , '123' );		// $str2 = '456'
```
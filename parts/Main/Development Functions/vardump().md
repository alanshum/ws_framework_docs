**Description**
Print argument using `var_dump()` for unlimited number of arguments. As opposed to `printr()`, no styling is added in favor of xdebug.

--------
**Parameters**
name	type	def_value	desc
arg1, ...	mixed		Arguments to be printed.

--------
**Return Values**
type	desc
void

--------
**Examples**

```php
vardump( $array1, $object2 , 'die' , $wont_show );		// kills the script after printing $object2
```

**Description**
Print arguments using `var_dump()` for unlimited number of arguments. As opposed to [`rrr()`](#rrr), no styling is added in favor of xdebug.

The script will be killed after printing the arguments. (i.e. This is the "die" version of [`dd()`](#dd)).

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
ddd( $array1, $object2 );		// kills the script after printing $object2
```

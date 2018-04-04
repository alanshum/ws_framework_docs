**Description**
Print arguments using `print_r()` for unlimited number of arguments with proper styles (`<pre>`).

The script will be killed after printing the arguments. (i.e. This is the "die" version of [`rr()`](#rr)).

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
rrr( $array1, $object2 );		// kills the script after printing $object2
```

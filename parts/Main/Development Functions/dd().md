**Description**
Print arguments using `var_dump()` for unlimited number of arguments. As opposed to `printr()`, no styling is added in favor of xdebug.

The script will be killed after printing the arguments. Basically this is an alias to [`vardump()`](#vardump).

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
dd( $array1, $object2 );		// kills the script after printing $object2
```

--------
**Changelog**

2017.11.28: newly added

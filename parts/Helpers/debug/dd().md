**Description**
Print arguments using `var_dump()` for unlimited number of arguments. As opposed to [`rr()`](#rr), no styling is added in favor of xdebug.

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
dd( $array1, $object2 );
```

--------
**Changelog**

2018.04.04: renamed from `vardump()`
2017.11.28: newly added

**Description**
Trim all items in the array recursively for space characters.

Note: this will not remove empty array items. Use [`array_filter()`](http://php.net/manual/function.array-filter.php) if you need to remove empty array items.

--------
**Parameters**
name	type	def_value	desc
array	array		Input array

--------
**Return Values**
type	desc
Array	with items trimmed

--------
**Examples**

```php
$arr2 = array_trim( $arr );
```

--------
**Changelog**
- 2015-12-30
	- Fixed a bug that child array are not trimmed.
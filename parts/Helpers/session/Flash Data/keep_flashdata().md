**Description**
Set the flash data to keep for next request.

Note: You can also set the 2nd parameter of [`get_flashdata()`](#get_flashdata) to `TRUE`d instead of using this function.

--------
**Parameters**
name	type	def_value	desc
$key	string		key of flash data to be retrieved

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
Mixed	data of specified key

--------
**Examples**

```php
keep_flashdata( 'message' );
```

--------
**Changelog**
- 2017.10.20
	- removed the ability to return whole flash data array which is meaningless

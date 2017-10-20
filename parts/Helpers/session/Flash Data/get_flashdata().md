**Description**
Fetch a specific flashdata item from the session array.

If `$key` is not specified, an array of all flash data will be fetched

--------
**Parameters**
name	type	def_value	desc
key	string	''	Flash data key
keep	bool	FALSE	*TRUE* if keep the flash data for next request. (Otherwise will be destroyed automatically)

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
Array/String	value of the flash data or array of values
NULL	if the flash data key is not found

--------
**Examples**

```php
<?=get_flashdata( 'message' );?>
```

--------
**Changelog**


**Description**
Filter and format data text so that it is safe for data file saving.

In essence, what it does to each value:
- trim()
- newline (`\n` ,`\r`, `\r\n` character) to `<br>`
- `\t` (tab) to `' '` (single space)
- `&amp;` to `&`
- 3rd (or later) level(s) array will be simply flattened by `json_encode()`.

--------
**Parameters**
name	type	def_value	desc
data	array	array()	data to prep

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
Array	of data

--------
**Examples**

```php
$result = save_datafile( 'data.txt', prep_for_datafile( $data ) );
```

--------
**Changelog**


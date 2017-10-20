**Description**
Create tab character ("\t") repeatedly. A shorthand to `char("\t")`.

This is useful to indenting html source for debugging.


--------
**Parameters**
name	type	def_value	desc
num	int	1	Indentation level (number of tabs)

--------
**Return Values**
type	desc
String	

--------
**Examples**

```php
echo t(0) . '<table>';
echo t(1) . '<tr>...';
echo t(2) . '<td>...';
....
```
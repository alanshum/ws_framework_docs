**Description**
Open delimited text data file and load content as array.

The function will replace `"` (double quote) to `&quot;`.

For general uses, [get_data()](#get_data) should be a better choice.

--------
**Parameters**
name	type	def_value	desc
filename	string		file path and name to use
delimiter	string	"\\t" (tab)	column delimiter

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
Array	of data from data file

--------
**Examples**

```php
$data = open_datafile( '/tmp/data.txt' );
```

--------
**Changelog**


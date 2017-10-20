**Description**
Prep data array into delimited values and save to file as text data file.

--------
**Parameters**
name	type	def_value	desc
filename	string		file path and name to use
open_mode	string	'a'	[php fopen mode](http://php.net/manual/en/function.fopen.php)
delimiter	string	"\t" (tab)	column delimiter

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
Int	Bytes saved
FALSE	if data is not an array

--------
**Examples**

```php
$result = save_datafile( '/tmp/data.txt', 'a+', ',');		// if csv
```

--------
**Changelog**


**Description**
Convert tab-separated values string to 2-dimensional array. If the data supplied is already an array, does nothing.

Note: you can use `//` to comment out a row in data for convenience.

--------
**Parameters**
name	type	def_value	desc
data	string		Delimited string data to be converted
has_header	bool	TRUE	TRUE to make first array item as the key of the 2nd level array (and the first item will be removed in the array)
row_key	bool/string	TRUE	If *TRUE*, search for 'id' field (opinionated value) as the 1st level array keys. <br> If *FALSE*, keep numeric 1st level array keys. <br> If *string*, search for identifier field as specified in this value and make it as 1st level array keys. Otherwise, the first level array keys are numeric. For example, if your id field is named "row_id", you can pass this string as this parameter, so that the first level keys are properly named to make it into an associative array. Note: if same key values exist, the later ones will have the numeric key appended after the key value, so that data will not be overwritten and appears as separate array item.
delimiter	string	"\t"	Column delimiter character.
convert_spaces	bool	TRUE	If *TRUE*, convert 4 consecutive spaces to tabs before tsv to array conversion. Editors may replace tabs with spaces automatically.


--------
**Return Values**
type	desc
Array	of data (2-dimentional array)

--------
**Examples**

```php
$data = tsv2array('
id	name	title
john	John Doe	Mr.
jane	Jane Doe	Ms.
// 3	This Record is Commented Out
');

print_r($data):
```

prints:
```php
Array
(
    [john] => Array
        (
            [id] => john
            [name] => John Doe
            [title] => Mr.
        )

    [jane] => Array
        (
            [id] => jane
            [name] => Jane Doe
            [title] => Ms.
        )

)
```

--------
**Changelog**
- 2018-01-21
	Added `$convert_spaces` parameter

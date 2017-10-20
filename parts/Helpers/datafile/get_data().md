**Description**
Get all records from data file as an array, with the first row as array keys.

This is *a helper of helpers*. That is you can achieve the same result by using together with `[open_datafile()](#open_datafile)`, `[array_header_to_keys()](#array_header_to_keys)`, `[make_data_assoc()](#make_data_assoc)`.

--------
**Parameters**
name	type	def_value	desc
dataset	string	'default'	the dataset to be used which defined in `settings.php`
key_field	string	FALSE	key field to make the data array to be an associative array. *FALSE* (default) to keep it numeric.


--------
**Return Values**
type	desc
Array	of data retrieved (2-dimensional)
FALSE	if the dataset does not exist

--------
**Examples**

```php
$data = get_data();
$data = get_data( 'set1' );
$data = get_data( 'set2', 'user_id' );
```
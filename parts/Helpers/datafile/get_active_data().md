**Description**
An extension to [`get_data()`](#get_data). This returns "active" data only.

The value of "active" field must not be evaluated as *FALSE* or *empty*: i.e. 0, NULL, FALSE, and `''` (blank).

--------
**Parameters**
name	type	def_value	desc
dataset	string	'default'	the dataset to be used which defined in `settings.php`
active_key	string	'active'	the field to be used to evaluate the record is active or not; Default 'active' is an opinionated field name.
key_field	string	FALSE	key field to make the data array to be an associative array. *FALSE* (default) to keep it numeric.


--------
**Return Values**
type	desc
Array	of data retrieved (2-dimensional)
FALSE	if the dataset does not exist

--------
**Examples**

```php
$data = get_active_data( 'set1' );
$data = get_active_data( 'set2', 'status' , 'user_id' );
```
**Description**
Check if the record already exist in datafile.

--------
**Parameters**
name	type	def_value	desc
key_field	string		the field name to be checked against
value	string		the value of the record to be checked
dataset	string	'default'	the data file setting to be used. Defined in `settings.php`

--------
**Return Values**
type	desc
TRUE	if the record is not found (i.e. unique)
FALSE	otherwise (i.e. found in data)

--------
**Examples**

```php
if ( is_unique_record( 'id' , '12345' ) { ... } else { ... }
```
**Description**
Genearate the real file path of the dataset.

You should not be using this function unless you are writing your own scripts to access the file directly.

--------
**Parameters**
name	type	def_value	desc
set_name	string	'default'	Name of the dataset

--------
**Return Values**
type	desc
String	if the dataset is set
FALSE	if the dataset is not found

--------
**Examples**

```php
$file = dataset( 'set1' );
```
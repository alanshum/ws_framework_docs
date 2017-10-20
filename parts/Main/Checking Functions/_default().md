**Description**
To set default values in `$options`.

--------
**Parameters**
name	type	def_value	desc
defaults	array		Default values in `key => value` pairs
options	array		The input array to set the default values if key is not present

--------
**Return Values**
type	desc
Array

--------
**Examples**

```php
$opts = _default( array(
		'date' => date('Ymd'),
		), $options);
```
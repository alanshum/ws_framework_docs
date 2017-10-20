**Description**
To check if `$options` has the array keys specified in `$required`

--------
**Parameters**
name	type	def_value	desc
required	array		keys that are required to exist
options	array		array to be checked against

--------
**Return Values**
type	desc
TRUE	if ALL required keys are present
FALSE	otherwise

--------
**Examples**

```php
if( ! _required( array(
		'username',
		'password',
	) , $options ) ) return FALSE;
```
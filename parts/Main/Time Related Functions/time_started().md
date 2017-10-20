**Description**
Checks if current time is already past the specific time.

--------
**Parameters**
name	type	def_value	desc
type	string	'start'	Time type defined or custom date (refer to [`timestr()`](#timestr) )

--------
**Return Values**
type	desc
TRUE	if the time already past
FALSE	otherwise

--------
**Examples**

```php
if( ! time_started() )
	echo "Application period is not yet started.";
```
**Description**
Checks if current time is still not yet past the specific time.

--------
**Parameters**
name	type	def_value	desc
type	string	'end'	Time type defined or custom date (refer to [`timestr()`](#timestr) )

--------
**Return Values**
type	desc
TRUE	if the time is still not yet past
FALSE	otherwise

--------
**Examples**

```php
if( time_ended() )
	echo "Application period is already ended.";
else
	// show form
	...
```
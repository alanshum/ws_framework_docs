**Description**
Checks if current time is over the specific time.

--------
**Parameters**
name	type	def_value	desc
type	string	'end'	Time type defined or custom date (refer to [`timestr()`](#timestr) )

--------
**Return Values**
type	desc
TRUE	The time is already passed
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

So to combine with [`time_started()`](#time_started) and [`form_disabled()`](#form_disabled):
```php
form_disabled( TRUE );
if( ! time_started() )
{
    echo "Application period is not yet started.";
}
elseif( time_ended() )
{
    echo "Application period is already ended.";
}
else
{
    // show form
    form_disabled( FALSE );
}

// The form below
// ...
```

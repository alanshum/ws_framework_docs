**Description**
Return a string of the time type in specified date format.   
The time types are defined in [settings.php - date section](#dates).

This time string is useful in time comparisons.

--------
**Parameters**
name	type	def_value	desc
type	string	''	Time type defined in `settings.php`. If this is *empty*, returns string as of the time now. You can also specify custom date here directly if you are not using the time types defined. (see examples below)
format	string	YmdHis	Php [date format](http://php.net/manual/en/function.date.php "PHP date&#40;&#41;") to output

--------
**Return Values**
type	desc
String	of formatted time
FALSE	if the type is not set or the custom date is invalid.

--------
**Examples**

```php
echo timestr();		// echo time now (e.g. 201512121234)
echo timestr( 'start' );		// echo 201512311338
echo timestr( 'end' , 'Y-m-d H:i');		// echo 2015-12-31 13:38
echo timestr( '2015-1-23 12:34');		// echo 201501231234
```
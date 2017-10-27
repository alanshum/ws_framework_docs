**Description**
Log a message in logs. This adds date time automatically. If the severity level is lower than that specified in settings, the message will not be logged.
*ERROR* is the highest level; Then *DEBUG*; *INFO* is the lowest;

--------
**Parameters**
name	type	def_value	desc
msg	text		Message to log
level	enum	'error'	Severity level of the message ( *ERROR* / *DEBUG* / *INFO* )

--------
**Return Values**
type	desc
void

--------
**Examples**

```php
if( $TEST ) { log_message( 'testing log' ); }
// the following line is added in a log file in logs folder:
// ERROR - 2015-12-11 16:52:08 --> tesing log
```
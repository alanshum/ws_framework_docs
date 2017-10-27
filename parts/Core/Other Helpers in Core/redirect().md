**Description**
Redirect by HTTP header.

--------
**Parameters**
name	type	def_value	desc
uri	string	''	URI to be directed
method	enum	'location'	Redirect method ( *location* / *refresh* )
http_response_code	int	'302'	Force http response code, for location method only

--------
**Return Values**
type	desc
void

--------
**Examples**

```php
if( TRUE )
	redirect( 'users' );
```
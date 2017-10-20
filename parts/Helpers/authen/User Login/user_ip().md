**Description**
Get user's IP address. Basically an alias to `$_SERVER['REMOTE_ADDR']`, but more reliable.

--------
**Parameters**
name	type	def_value	desc


--------
**Return Values**
type	desc
String	of IP Address

--------
**Examples**

```php
// To prep data to be saved and record user's IP
$data_to_be_saved[1]['ip'] = user_ip();
```
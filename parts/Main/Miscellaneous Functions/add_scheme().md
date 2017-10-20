**Description**
Add a scheme if no scheme is defined in the $url. A scheme can be `http://`, `ftp://`, `https://`, `file://`, etc.

Normally, you will not call this manually in the application, but from other url-handling helper functions.

--------
**Parameters**
name	type	def_value	desc
url	string		url to be checked
scheme	string	'http://'	scheme to add if no scheme is stated

--------
**Return Values**
type	desc
String	URL with added scheme

--------
**Examples**

```php
$url = 'abc.example.com';
echo add_scheme( $url );
// prints: http://abc.example.com

$url2 = 'http://def.example.com';
echo add_scheme( $url, 'https://' );
// prints: http://def.example.com since a scheme is present
```
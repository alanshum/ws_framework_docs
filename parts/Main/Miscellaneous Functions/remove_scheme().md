**Description**
Remove scheme (e.g. http:// ) from a url.

--------
**Parameters**
name	type	def_value	desc
url	string		input url

--------
**Return Values**
type	desc
String	url without scheme

--------
**Examples**

```php
echo remove_scheme( http://www.example.com );
// prints: www.example.com
```
**Description**
Check if an url exists.  
Note: In essence only check if the server response with 200 (OK) code

--------
**Parameters**
name	type	def_value	desc
url	string		Input url to be checked


--------
**Return Values**
type	desc
TRUE	if the url exists
FALSE	otherwise

--------
**Examples**

```php
if( url_exist( 'http://www.example.com/test.html' ) ) { ... }
```
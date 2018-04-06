**Description**
require a php file and return the result after the code is run. That is, normally we will get some html code or text as how your required file design. Sometimes you may not want to include the php file directly for various reasons and only need the generated results.

--------
**Parameters**
name	type	def_value	desc
filename	string		file path and name

--------
**Return Values**
type	desc
String

--------
**Examples**

```php
$result = get_require( '/some/path/to/file' );
```
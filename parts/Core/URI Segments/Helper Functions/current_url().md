**Description**
Make a proper full web address of the URI based on **current page url**.
Useful for pages in sub-folder (`pages/folder1`) with assets under the same sub-folder.
Note:
- If the uri has a scheme (e.g. http:// ) , it will not be prep'd.
- If no uri is inputted, the base url will be returned.

--------
**Parameters**
name	type	def_value	desc
uri	string	""	URI to check and set

--------
**Return Values**
type	desc
string	the complete URL

--------
**Examples**

The url is: http://your_domain.com/example/test/
"example" is application root.
"test" is the handler page.
```php
echo current_url( 'image.png');		// prints: http://your_domain.com/pages/test/image.png
echo current_url();		// prints: http://your_domain.com/pages/test
```

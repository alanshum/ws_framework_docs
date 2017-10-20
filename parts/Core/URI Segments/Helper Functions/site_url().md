**Description**
Make a proper full web address of the URI based on the **application root** defined in index.php.
Useful for pages in `pages` with assets under other sub-folders of root (e.g. `/img/`).
Note: 
- If the uri has a scheme (e.g. `http://` ) , it will not be prep'd.
- If no uri is inputted, the base url will be returned.
- If your index.php is NOT on the same level as application root, please REMEMBER to add the extra segment when you call this as this function is NOT based on current url.

--------
**Parameters**
name	type	def_value	desc
uri	string	''	URI to check and set

--------
**Return Values**
type	desc
String	the complete url

--------
**Examples**

```php
echo site_url();		// prints: http://your_domain.com
echo site_url( 'img/test.png');		// prints: http://your_domain.com/img/test.png
```
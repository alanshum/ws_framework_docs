**Description**
Include file once (`include_once()`) based on application root.

It will check if the file exist. If the file name does not exist, it will also append extensions ".php" and ".inc.php" to search.

If the file does not exist, the original filename inputted will be used directly.

--------
**Parameters**
name	type	def_value	desc
filename	string		file name to be included
require	bool	FALSE	TRUE to use `require_once` instead of `include_once`
repeat	bool	FALSE	TRUE to use `include` or `require` instead of those `_once` counterparts

--------
**Return Values**
type	desc
void

--------
**Examples**

```php
incl('header');		// you should have a file named "header.php" or "header.inc.php" in the application root path.
incl('incl/myfile.php');
```

--------
**Changelog**
2016-02-05: New
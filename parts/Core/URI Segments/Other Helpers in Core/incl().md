**Description**
Include file based on application root.  
It will check if the file exist. If the file name does not exist, it will also append extensions ".php" and ".inc.php" to search.

--------
**Parameters**
name	type	def_value	desc
filename	string		file name to be included

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
- Added on: 2016-02-05
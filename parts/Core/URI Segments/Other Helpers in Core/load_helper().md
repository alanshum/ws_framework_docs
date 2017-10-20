**Description**
Load a helper. Add a log if the helper file is not found.  
If the helper is already loaded previously, it will not be loaded again.

--------
**Parameters**
name	type	def_value	desc
helper_name	string		name of the helper to be loaded

--------
**Return Values**
type	desc
void

--------
**Examples**

```php
load_helper('my_accessories');
// Note that the file should be named "my_accessories_helper.php" in "helpers" directory.
```
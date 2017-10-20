**Description**
Backup the data file of the dataset in a sub-directory "backup" in `$config_item['data_path']`. The function will try to create the folder if it does not exist. The filename will be appended with current datetime string.

--------
**Parameters**
name	type	def_value	desc
set_name	string	'default'	dataset to backup

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
String	filename of the backup copy
FALSE	if dataset is not found
NULL	if the backup directory is not writable

--------
**Examples**

```php
$bakfile = backup_dataset( 'set1' );
```

--------
**Changelog**


**Description**
Delete ONE record from data file

--------
**Parameters**
name	type	def_value	desc
key_field	string		key field of the data. Can be *FALSE* if intended to use numeric dataset
key_field_value	string		key field value of the record to be updated (must be unique, otherwise, will update the first record in the data file)
dataset	string	'default'	Dataset to use
backup	bool	FALSE	Backup data file before deletion. (See [`backup_dataset()`](#backup_dataset))


--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
Int	for successful deletes, number of bytes of data file saved after deletion
TRUE	for successful deletes, if no more records in the dataset after deletion
FALSE	if the dataset is not found
NULL	if the record is not found

--------
**Examples**

```php
$result = delete_record( 'user_id', '0' );
if( $result ) { ... }
```

--------
**Changelog**
- 2016-01-21
	- Added $key_field to use.

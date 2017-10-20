**Description**
Update ONE record in the dataset.

Note that it will check against the current data columns. If a column does not exist, the value will not be added to the row; On the other hand, if the existing column is not exist in new data, the old values will be kept.

--------
**Parameters**
name	type	def_value	desc
key_field	string		key field of the data. Can be *FALSE* if intended to use numeric dataset
key_field_value	string		key field value of the record to be updated (must be unique, otherwise, will update the first record in the data file)
new_data	array		array of data to be updated (`key=>value` pairs)
dataset	string	'default'	Dataset to use
backup	bool	FALSE	Backup data file before update. (See [`backup_dataset()`](#backup_dataset))
update_key_field_value	bool	FALSE	If the key field value should be updated if the key field exists in $new_data. This is handy as you do not need to remove the key field in the data array beforehand

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
Int	for successful updates, number of bytes of data file saved after updates
FALSE	if the dataset is not found
NULL	if the record is not found

--------
**Examples**

```php
$data = array( 'name' => 'New Name' );
$result = update_record( 'user_id' , '0' , $data );
if( $results ) { ... }
```

--------
**Changelog**


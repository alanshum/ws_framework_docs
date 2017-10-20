**Description**
Get field (column) names of the table

--------
**Parameters**
name	type	def_value	desc
table	string		Table name

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
Array	field names

--------
**Examples**

```php
foreach( db_list_fields( 'user_table' ) as $col_name )
{
	echo "<th>{ $col_name }</th>";
}
```

--------
**Changelog**


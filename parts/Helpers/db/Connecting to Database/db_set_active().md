**Description**
Change active DB connection set.

--------
**Parameters**
name	type	def_value	desc
db_config	string	'default'	DB configuration set name

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
TRUE	if the active set is changed
FALSE	otherwise.

--------
**Examples**

```php
db_set_active( 'set2' );		// set to use set2
db_set_active();				// set to use the default set
```

--------
**Changelog**


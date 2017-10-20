**Description**
Check if a field-value pair is unique in a table. Useful for checking unique / primary keys before insertion.

--------
**Parameters**
name	type	def_value	desc
table	string		table name
field	string		field name
value	string		the value to be checked

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
TRUE	if it is unique (does not exist in the table)
FALSE	otherwise

--------
**Examples**

```php

```

--------
**Changelog**
- 2017.10.17
	- Renamed from "db_unique()" for naming convention

**Description**
Add a select options set to be used by select types.

--------
**Parameters**
name	type	def_value	desc
name	string		a name to refer to this options set
options	string/array		delimited values or array of values of select options. See Standard Use Case > [7. Options](#7-options)

--------
**Return Values**
type	desc
void

--------
**Examples**

```php
add_options_set( 'option1', array(...) );
```

--------
**Changelog**
- 2016-01-21
	- Name changed from `add_select_options()` for clarity. Also changed the way it works.

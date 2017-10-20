**Description**
Get html to append for an option. This is called automatically when using the form helper. Normally you will not be calling this manually unless you are writing your own helper function.

--------
**Parameters**
name	type	def_value	desc
option_set_name	string		option set name
option_id	string		id of the option in the set


--------
**Return Values**
type	desc
String	if the option set and option id is found
FALSE	otherwise

--------
**Examples**

```php
echo get_option_html( 'bool' , 'Y');
```

--------
**Changelog**
- Added on: 2016-02-05


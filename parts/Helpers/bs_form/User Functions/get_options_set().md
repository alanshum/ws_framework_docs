**Description**
Get the select options set (which was added by [add_options_set()](#add_options_set)). Note: the options set are use by [form_gen_fieldset()](#form_gen_fieldset) automatically and rarely you will need to use this manually.

--------
**Parameters**
name	type	def_value	desc
option_set	string	''	name of option set to retrieve. If blank, all options sets will be returned as multi-dimentional array
no_result	mixed	FALSE	value to return if the option set is not found
fix_numeric_array	bool	TRUE	if prep the options set to make numeric array to return meaningful values in select types. That is, if your array keys are only numbers, you will get the value of the array item instead. (For associative arrays, you get the array keys instead.)


--------
**Return Values**
type	desc
Array

--------
**Examples**

```php
if( get_options_set( 'option_set_1' ) )
{
	...
}
```

--------
**Changelog**
- 2016-02-12
	- Renamed from `get_select_option()` for clarity, which is now remained as an alias for backward compatibility

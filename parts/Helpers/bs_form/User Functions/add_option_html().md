**Description**
Add html code to a select option in an option set. This function is to give more flexibility as originally you cannot modify select options easily. For examples, if you have some special html code need to add to a specific option only, this will be helpful.

--------
**Parameters**
name	type	def_value	desc
option_set_name	string		option set name
option_id	string		id (array key) of the option in the set
html	string		html code to add for the option


--------
**Return Values**
type	desc
void

--------
**Examples**

```php
add_option_html( 'bool' , 'Y' , '<p>Please think twice before your choose yes.</p>');
```

--------
**Changelog**
- Added on: 2016-02-05


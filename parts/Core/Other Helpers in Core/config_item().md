**Description**
Read the config item with the item name specified

--------
**Parameters**
name	type	def_value	desc
item	string		the config item name to read

--------
**Return Values**
type	desc
Mixed	value of the config item
FALSE	if the item cannot be found

--------
**Examples**

```php
echo config_item('title');
```
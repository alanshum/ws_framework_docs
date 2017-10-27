**Description**
Add a JavaScript block in the application, so as to load after page content (by [`printjs()`](#printjs)).

--------
**Parameters**
name	type	def_value	desc
script	string		Script block to add
is_link	bool	FALSE	Specify *TRUE* if `$script` specifies a link to script file instead of codes


--------
**Return Values**
type	desc
void

--------
**Examples**

```php
addjs( "$('body').what_you_want_to_do(...)");
addjs( '/js/vendor/script.js' , TRUE );
```
**Description**
Check if a helper is loaded

--------
**Parameters**
name	type	def_value	desc	by_ref
helper_name	string		Helper name to be checked

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
TRUE	if the helper is already loaded
FALSE	otherwise

--------
**Examples**

```php
echo helper_loaded('recaptcha') ? recaptcha_js() : '';
```

--------
**Changelog**

**Description**
Generate a recaptcha div with the site key.

--------
**Parameters**
name	type	def_value	desc
size	enum	normal	valid value: *normal* / *compact*; Note: "compact" size is more like vertical mode
tab_index	int	0	tab index value if you are setting tab index for other inputs

--------
**Return Values**
type	desc
String	of HTML code

--------
**Examples**

```php
echo recaptcha_widget();
echo recaptcha_widget( 'compact' );
```
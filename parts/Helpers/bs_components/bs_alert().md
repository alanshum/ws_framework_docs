**Description**
Generate an alert block

--------
**Parameters**
name	type	def_value	desc
head	string	''	header in bold (Note: separate with $body with a space only)
body	string	''	message text
contextual	enum	'info'	contextual classes ( info / success / warning / danger)
dismissible	bool	FALSE	add a close button if *TRUE*
attributes	array	array()	html tag attributes in `key => value` pairs to be printed in the `div` element of the alert

--------
**Return Values**
type	desc
String	HTML code

--------
**Examples**

```php
echo bs_alert( 'Success!', 'Data saved successfully', 'success', TRUE );
```
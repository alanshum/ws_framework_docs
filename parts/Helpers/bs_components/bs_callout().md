**Description**
Create a callout box.

--------
**Parameters**
name	type	def_value	desc
title	string	''	title of the box
content	string	''	content in the box
contextual	enum	'default'	contextual classes ( default / primary / info / danger / warning / success )
attributes	array	array()	tag attributes (on wrapper div)

--------
**Return Values**
type	desc
String	of HTML code

--------
**Examples**

```php
echo bs_callout( 'Warning' , 'You are not allowed to enter this area.' , 'warning' );
```
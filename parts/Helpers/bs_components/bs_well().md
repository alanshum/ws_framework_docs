**Description**
Create a well to give inset effect.

--------
**Parameters**
name	type	def_value	desc
html	string		wrap the well to this html code block
modifier	enum	''	the bs well modifier class ( '' / sm / lg )
attributes	array	array()	tag attributes

--------
**Return Values**
type	desc
String	of HTML code

--------
**Examples**

```php
echo bs_well( form_gen_fieldset( $fs1 ) );		// wrap the fieldset in well
echo bs_well( '<p>Some Text</p>' , 'sm' );		// a small sized well effect
```
**Description**
Create fieldset open tag and legend tag. Normally you will use [form_gen_fieldset()](#form_gen_fieldset) instead.

--------
**Parameters**
name	type	def_value	desc
legend	string/bool	''	Text to show as the caption of the fieldset. No `<legend>` tag will be created if it is an empty string
attributes	array	array()	Attributes to print in `<fieldset>` tag, e.g. id, class, etc.


--------
**Return Values**
type	desc
String	of HTML code

--------
**Examples**

```php
echo form_fieldset_open();
// prints: <fieldset>

echo form_fieldset_open('Please Sign In:', array('id'=>'fs1'));
// prints: <fieldset id="fs1"><legend>Please Sign In:</legend>
```
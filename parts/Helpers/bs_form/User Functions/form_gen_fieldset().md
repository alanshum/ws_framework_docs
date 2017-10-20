**Description**
Generate a fieldset with form fields in Bootstrap style.

In essence, this function is simply a combination call of `form_fieldset_open()` and `form_gen_elements()`. However, to streamline the use case of the form helper, this function is essential.

Note: All elements will have an auto-id generated. For instance, if the id of the field is *field1*, then the `<label>` will have an id *label_field1*, the field element (`<input>`,`<textarea>`, etc.) will have id *field1*. For select options, an auto number will be added, e.g. *field1-1* (starting from 1). There will be an auto id for input group div as well.

--------
**Parameters**
name	type	def_value	desc
fields	array/string		data of the fieldset. See [Standard User Case](#Standard-Use-Case) section.
legend	string/bool	''	Text to show as the caption of the fieldset. Specify *FALSE* if no need to create the fieldset tag: `<fieldset>`.
form_type	enum	''	Bootstrap form type ( '' / horizontal / inline ) <br> If $form_type is *horizontal*, you can also specify the label width e.g. *horizontal-4*
attributes	array	array()	attributes add to fieldset open tag (e.g. id, class, ...)

--------
**Return Values**
type	desc
String	html code of the whole fieldset (or fields)

--------
**Examples**

```php
$fs1 = tsv2array('
...
');
echo form_gen_fieldset( $fs1, '' , $form_type );
```
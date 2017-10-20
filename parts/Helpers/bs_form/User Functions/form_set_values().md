**Description**
This set the `value` attribute in `$fields`, if the key exists in `$data`. This is useful for repopulating form data. Normally you will use together with [form_gen_fieldset()](#form_gen_fieldset).

Consider the tab-separated values you will use. Normally the "value" column is empty. Now this function (re)popoluate the value column in the array with values from the form or from database.

--------
**Parameters**
name	type	def_value	desc
fields 	array 	 	fields data
data 	array 	 	array to search for field value

--------
**Return Values**
type	desc
Array	prep'd $fields with values from $data

--------
**Examples**

```php
echo form_gen_fieldset( form_set_values( $fs1, $P ) );
```
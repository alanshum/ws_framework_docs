**Description**
Creates a single form element

--------
**Parameters**
name	type	def_value	desc
type	enum		valid form helper input types (see Standard Use Case > [3. type](#3-type))
form_type	enum	''	Bootstrap form type ( '' / horizontal / inline ) <br> If $form_type is *horizontal*, you can also specify the label width e.g. *horizontal-4*
name	string	''	name & id attributes of the field
label	mixed| ''	label text. If no label tag should be created, put `FALSE`
value	string	''	value attribute
options	array	array()	other form helper input attributes (name, id, label, type, value, validate, desc, placeholder, options, extra, append, prepend)
set_value	mixed	FALSE	if want to set value for the element with [form_set_value()](#form_set_value), supply the $data array; FALSE (default) as not using this feature.

--------
**Return Values**
type	desc
String	of HTML code

--------
**Examples**

```php
echo form_element( 'text' , '' , 'login','Login Name');
// prints:
// <div id="form-group_login" class="form-group">
// 	<label for="login" id="label_login">Login Name</label>
// 	<input name="login" id="login" class="form-control" type="text">
// </div>
```

--------
**Changelog**
- 2016-02-02
	- Fixed an issue if $options is not an array. (You can now use `''` if not defined)

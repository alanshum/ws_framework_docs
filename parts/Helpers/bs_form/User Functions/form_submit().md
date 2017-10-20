**Description**
Make a submit button.

--------
**Parameters**
name	type	def_value	desc
text	string	'Submit'	Button text
form_type	enum	''	Bootstrap form type ( '' / horizontal / inline ) <br> If $form_type is *horizontal*, you can also specify the label width e.g. *horizontal-4*
contextual	enum	'primary'	contextual classes
id	string	''	id of the button
class	string	''	class of the button
extra	string	''	extra attributes / text to be included in the tag.

--------
**Return Values**
type	desc
String	of HTML code

--------
**Examples**

```php
echo form_submit();
// prints: <button type="submit" class="btn btn-primary">Submit</button>

echo form_submit('','horizontal');
// prints:
//	<div class="form-group">
//		<div class="col-sm-offset-3 col-sm-9">
//			<button type="submit" class="btn btn-primary">Submit</button>
//		</div>
//	</div>
// note: default constant value is 3
```

--------
**Changelog**
- 2016-02-03
	- Added $contextual; removed $class default.

**Description**
Create a button or tag with `.btn` class

--------
**Parameters**
name	type	def_value	desc
text	string	''	The visible text on the button
element	enum	'button'	Element to be used: <br> *button* <br> *a* / *anchor* (alias to a) - a class="btn" <br> *input* - input type=button <br> *submit* - input type=submit
size	enum	''	Button sizes: xs / sm / lg; ''(blank) or 'md' is the default size - md is a pseudo choice as default size does not need to specify originally.
contextual	enum	'default'	Button contextual classes. You may also specify ''(blank) for default <br> (default / primary / success / info / warning / danger / link)
attributes	array	array()	other tag attributes

--------
**Return Values**
type	desc
String	of html code

--------
**Examples**

```php
echo bs_btn( 'Edit' );
```

--------
**Changelog**
- 2016-01-22
	- Added alias `bs_button()`.
	- Removed `type="submit"` for button element.
	- Added $size and $contextual.
	- Rewritten to make use of `html()`.

**Description**
Create a link in button style which prep url automatically. In essence a shorthand to call [`bs_btn()`](#bs_btn) for links.

--------
**Parameters**
name	type	def_value	desc
href	string	'#nogo'	The url to be linked. If is does not have a scheme specified, it assumes internal links and prepend with [`site_url()`](#site_url).
text	string	''	The visible text on the button / link
title	string	''	anchor title (hover popup text)
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
echo bs_a_btn( 'edit/' . $id , 'Edit' );		// a button
echo bs_a_btn( 'edit/' . $id , 'Edit', 'xs' , 'link' );		// a link (button style)
```

--------
**Changelog**
- 2016-02-12
	- if $href begins with a "#" character, it will not be prep'd with `site_url()`
- 2016-02-01
	- Added $size and $contextual.

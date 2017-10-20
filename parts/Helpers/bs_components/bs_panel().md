**Description**
Creates a panel.

--------
**Parameters**
name	type	def_value	desc
title	string	''	Panel heading text. Leave blank for no title
content	string	''	Panel body text or html
footer	string	''	Footer text. Leave blank for no footer
contextual	enum	'default'	Contextual class. ( primary / success / info / warning / danger / default )
div_content	bool	TRUE	*TRUE* if use `<div class="panel-body">` to wrap content, <br> *FALSE* to use custom content html (e.g. wrap with table, list groups); <br> Note: no need to add `.panel-body` to tables and list groups
attributes	array	array()	wrapper div attributes, e.g. id, class, etc.
head_attributes	array	array()	panel head wrapper div attributes
body_attributes	array	array()	panel body wrapper div attributes; no effect if $div_content is FALSE.


--------
**Return Values**
type	desc
String	of HTML code

--------
**Examples**

```php
echo bs_panel( 'Welcome' , html(...) );

// for $content part, you may also use bs_list_group() or table
echo bs_panel( 'Please select' , bs_list_group( array(...) ) , '' , FALSE );
```

--------
**Changelog**
- 2016-02-12
	- added $head_attributes, $body_attributes to add more flexibility

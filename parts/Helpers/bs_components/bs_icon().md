**Description**
Create markup for glyphicon, close button and caret.

--------
**Parameters**
name	type	def_value	desc
name	enum		*close* - for close icon <br> *caret* - for caret <br> *valid glyphicon name* - for glyphicons (e.g. asterisk, plus). Refer to the [Bootstrap docs](http://getbootstrap.com/components/#glyphicons).
contextual	enum	''	text contextual class. Not applicable to "close" and "caret" ( *muted / primary / success / info / warning / danger* )
attributes	array	array()	other tag attributes
tag_to_use	string	span	specifiy if you would use another html element (e.g. `i`) to hold the icon.

--------
**Return Values**
type	desc
String	of HTML code

--------
**Examples**

```php
echo bs_icon( 'remove', 'danger' );
echo bs_icon( 'close' );
echo bs_icon( 'caret' );
```
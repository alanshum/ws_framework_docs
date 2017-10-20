**Description**
Produces a closing `</fieldset>` tag. The only advantage to use this function is it permits you to pass data to it which will be added directly below the tag and you do not have to close php blocks.

--------
**Parameters**
name	type	def_value	desc
text	string	''	html code or text to add immediately after the close tag is ended `</fieldset>\n$text...`

--------
**Return Values**
type	desc
String	of HTML code

--------
**Examples**

```php
echo form_fieldset_close( '</div></div>');
// prints
// </fieldset>
// </div></div>
```
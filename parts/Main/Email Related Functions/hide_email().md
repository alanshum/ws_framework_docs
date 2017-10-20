**Description**
Email obfuscation with rot13 with proper JavaScript code to show it nicely.

--------
**Parameters**
name	type	def_value	desc
email	string		Email address to obfuscate
text	string	''	Text to show on email link. Leave *blank* to show email address (treated email text, not plain text)
id	string	uniqid()	Specify ID of the element. Useful if you will reference it in some JavaScript code. Otherwise it will be a random unique id.

--------
**Return Values**
type	desc
String	of html code (`<a>` tag)

--------
**Examples**

```php
<p><b>Email</b>: <?=hide_email('test@example.com');?></p>
```
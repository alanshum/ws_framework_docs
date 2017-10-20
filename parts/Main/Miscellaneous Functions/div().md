**Description**
Wraps html code into a `<div>` element.  

(A shorthand of [html()]('html'))

--------
**Parameters**
name	type	def_value	desc
html	string	''	html code to wrap into the div
class	string	''	class of the div tag
attributes	array	''	other attributes of the div tag
html_close_comment	bool	TRUE	If *TRUE*, add a html comment after close tag to make better view source. Text to add is from id and class attributes. No effect for self-closing elements. <br>**Note:** different from [`html()`](#html) where the default is *FALSE*

--------
**Return Values**
type	desc
String	html code generated

--------
**Examples**

```php
echo div( html( 'p' , '' , 'Hello World!') );
// prints:
// <div><p>Hello World!</p></div>
```

--------
**Changelog**
- Added on: 2016-01-22
**Description**
Prepare a html element.  

Note: This is not an intelligent function. You must give instructions if that is a self-closing element or is an element with close tag. Defaults to self-closing element (i.e. no close tag will be made).

--------
**Parameters**
name	type	def_value	desc
element	string		Element name to be printed. E.g. a, form, input, etc.
attributes	array	''	Any attributes to be printed inside the open tag. Sub array items can also be array. For details please refer to [`_print_attributes()`](#_print_attributes). You may also specify '' (blank) for $attributes if no attributes to add if you need close comment (below).
html_close_comment	bool	FALSE	If *TRUE*, add a html comment after close tag to make view source better. Text to add is from id and class attributes (see examples). No effect for self-closing elements.

--------
**Return Values**
type	desc
String	html code generated

--------
**Examples**


Basic usage:
```php
echo html( 'a' , array( 'href' => 'www.example.com', 'title' => 'Hover Text'), 'Test Website');
// Prints: <a href="www.example.com" title="Hover Text">Test Website</a>

echo html( 'div' , array( 'id' => 'div1' ) , "Test" , '/ #div1');
// Prints: <div id="div1">Test</div> <!-- / #div1 -->

echo html( 'img', array( 'src' => 'test.png' );
// Prints: <img src="test.png">

echo html( 'div', array( 'class' => 'myclass' , '' );
// Prints: <div class="myclass"></div>
```
What makes this function really useful is you can modify the attributes array before generating the tag:
```php
$attr = array( 'class' => 'myclass' );
if( $P['a'] == FALSE )
{
	$attr['class'] => 'yourclass';
}
echo html( 'div' , $attr , 'Sample Text' );
// if $P['a'] is really false:
// prints: <div class="yourclass">Sample Text</div>
```
You can also wrap html() into another html() just like a chain:
```php
echo html( 'div' , '' , 
		html( 'h4' , '' , 
			html( 'a' , $attr, 'A link in a h4 in a div')
		)
	);
```
**Description**
Prepare a html element. It can also accept array of elements to be prep'd consecutively (see example).

Note: This is not an intelligent function. You must give instructions if that is a self-closing element or is an element with close tag. Defaults to self-closing element (i.e. no close tag will be made).

--------
**Parameters**
name	type	def_value	desc
element	string/array		Element name to be printed. E.g. a, form, input, etc.<br> If this is an array, the `html()` will be run repeatedly for the tags specified
attributes	array	''	Any attributes to be printed inside the open tag. Sub array items can also be array. For details please refer to [`_print_attributes()`](#_print_attributes). You may also specify `''` (blank) for `$attributes` if no attributes to add if you need close comment (the param below).<br> If $element is an array, you must have respective number of array items for the matching element, otherwise no attributes will be printed.
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
$attr = array( 'href' => 'www.example.com', 'title' => 'Hover Text');
echo html( 'div' , '' ,
		html( 'h4' , '' ,
			html( 'a' , $attr, 'A link in a h4 in a div')
		)
	);
```

The above can also be transformed in the following syntax:
```php
$attr = array( 'href' => 'www.example.com', 'title' => 'Hover Text');
echo html( ['a','h4','div'] , [$attr] , 'A link in a h4 in a div' );
// consider it "inner" element goes first in the array

// for $attributes part (2nd parameter), we can omit those do not have any attributes. The function just check for the same array index (key) to use.
```

This example prints:
```html
<div><h4><a href="www.example.com" title="Hover Text">A link in a h4 in a div</a></h4></div>
```

--------
**Changelog**

2017.10.25: Added the ability to call html() multiple times in a row directly

**Description**
Create list from array. Can be multi-dimentional array for nested list.

--------
**Parameters**
name	type	def_value	desc
data	array		Input data array
list_type	enum	'ul'	Type of list to be generated. Valid values: *ol* / *ul*; ordered list or unordered list
attributes	array	''	wrapper element (`<ul>` / `<ol>`) attributes. (see [_print_attributes()](#_print_attributes))

--------
**Return Values**
type	desc
String	of HTML code

--------
**Examples**

```php
$set1 = array( 1,2,3,4,5,6,7 );
echo array2list( $set1 , 'ol' );
// prints:
// <ol>
// 	<li>1</li>
// 	<li>2</li>
// 	<li>3</li>
// 	<li>4</li>
// 	<li>5</li>
// 	<li>6</li>
// 	<li>7</li>
// </ol>

$set2 = array( 'a','b' => array( 'c','d' ), 'e' => array( 'f','g' ) );
echo array2list( $set2 );
// prints:
// <ul>
// 	<li>a</li>
// 	<li>b
// <ul>
// 	<li>c</li>
// 	<li>d</li>
// </ul>
// </li>
// 	<li>e
// <ul>
// 	<li>f</li>
// 	<li>g</li>
// </ul>
// </li>
// </ul>
```
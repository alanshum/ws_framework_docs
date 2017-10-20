**Description**
Make accordion using panels and collapse.

--------
**Parameters**
name	type	def_value	desc

items	array		items array. See usage for format.
attributes	array	array()	panel group attributes
contextual	enum	'default'	panels' contextual classes ( primary / success / info / warning / danger )
expanded	mixed	FALSE	FALSE = all collapsed; TRUE = 1st item expanded; string = "header" values of panel to be expanded, can be csv or array

--------
**Return Values**
type	desc
void

--------
**Examples**

```php
// $items format
// Type 1 - for simple header and content pairs
$items1 = array (
	'Group 1' => 'some content...',
	'Group 2' => 'some content...',
);

// Type 2 - for panels with footer
$items2 = array(
	array(
		'header'	=> 'Group 1',
		'content'	=> 'some content...',
		'footer'	=> 'footer text',
	),
	array(
		...
	),
);

// first panel will be expanded on load
echo bs_accordion( $items1, '' , '' , TRUE );

// all panel will be collapsed on load
echo bs_accordion( $items1 );

// panel with header "Group 3" will be expanded
echo bs_accordion( $items2 , '', '' , 'Group 3' );

```

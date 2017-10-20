**Description**
Create a list group. Custom list item content is not supported.

--------
**Parameters**
name	type	def_value	desc
items	array		Items of the list group. See *Examples* for details
list_type	enum	'basic'	type of list group. ( **basic** / **linked** / **button** ) <br> Basic:  `<ul><li>` <br> Linked: `<div><a>` <br> Button: `<div><button>`
attributes	array	array()	wrapper div attributes e.g. id, class etc.
--------
**Return Values**
type	desc
String	of HTML code

--------
**Examples**

1. Simple List
```php
// this creates a simple list group
$items1 = array( '1','2','3','4' );
echo bs_list_group( $items1 );

// prints:
// <ul class="list-group">
// 	<li class="list-group-item">1</li>
// 	<li class="list-group-item">2</li>
// 	<li class="list-group-item">3</li>
// 	<li class="list-group-item">4</li>
// </ul>
```

2. Linked list
```
// make key as the text to be printed, and attributes of the item as the sub array values.
$items2 = array(
	'text1' => array( 'class' => 'active' , 'href' => 'http://1.example.com'),
	'text2' => array( 'class' => 'active' , 'href' => 'http://2.example.com'),
	// Be reminded to specify "href" for links
);
echo bs_list_group( $items2 , 'linked' );

// prints:
// <div class="list-group">
// 	<a class="active list-group-item" href="http://1.example.com">text1</a>
// 	<a class="active list-group-item" href="http://2.example.com">text2</a>
// </div>
```

3. Button list
```
$items3 = array(
	'text2' => array( 'type' => 'submit' , 'class' => 'disabled' ),
	'text3' => array( 'type' => 'submit' , 'class' => 'disabled' ),
	// Be reminded to specify "type" of buttons ( button / submit / reset)
	// default type="button" if not set
	// Also other button attributes if needed (e.g. the class in this example)
);
echo bs_list_group( $items3 , 'button' );

// prints:
// <div class="list-group">
// 	<button type="submit" class="disabled list-group-item">text2</button>
// 	<button type="submit" class="disabled list-group-item">text3</button>
// </div>
```

4. The other type of `$items` array, for complex "text" content which cannot be put in array key
```
$items4 = array(
	array('text' => 'Complex text that is not suitable to put as array key'),
	array('text' => html(...), 'href' => ... ),
);
```

5. Badges
```php
// Simply add "badge" key in the item array:
$items5a = array(
	array( 'text' => ... , 'badge' => 'badge_text' ),
	...
	);
);

// for multiple badges, put the badge texts as an sub-array:
$items5b =
array(
	array(
		'text' => ... ,
		'badge = >
		array(
			'badge_text1',
			'badge_text2',
		),
	),
);
```


--------
**Changelog**
- 2015-01-19
	- Added support for badge.
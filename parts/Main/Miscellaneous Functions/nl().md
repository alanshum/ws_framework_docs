**Description**
This function has 2 types of results (see examples):

1. Create newline character ("\n") repeatedly. A shorthand to `char("\n")`.
2. Warp the input text (html code) with newline character to both ends.

This is useful to format html source for debugging.

--------
**Parameters**
name	type	def_value	desc
num	int/string	1	number of newline chars OR input html

--------
**Return Values**
type	desc
void

--------
**Examples**

Use 1: (normally to be used together with `t()`)
```php
echo '<div>' . nl() . t() . '<p>';
// prints:
// <div>
//    <p>
```

Use 2:
```php
$html1 = "<div><p>Hello World!</p></div>";
$html2 = "<div><p>See You!</p></div>";
$html3 = "<div><p>Next Time!</p></div>";
echo $html1 . nl( $html2 ) . $html3;
// prints:
// <div><p>Hello World!</p></div>
// <div><p>See You!</p></div>
// <div><p>Next Time!</p></div>

// for comparison:
echo $html1 . $html2 . $html3;
// prints:
// <div><p>Hello World!</p></div><div><p>See You!</p></div><div><p>Next Time!</p></div>
```
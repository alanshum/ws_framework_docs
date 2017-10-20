**Description**
Wraps html codes into grid column.(default: `.col-xs-12`).

Note: For simple usage only. For multiple grid classes, either specify it in `$attributes['class']`, or use [div()](#div) function instead.

--------
**Parameters**
name	type	def_value	desc
html	string		html code to wrap the column with
size	enum	'xs'	grid size option ( *xs / sm / md / lg* )
column	int	'12'	number of columns (max 12)
offset	int	0	add offset to the same grid size for non-zero values
attributes	array	array()	other tag attributes

--------
**Return Values**
type	desc
void

--------
**Examples**

```php
echo bs_col( $some_html , 'md' , '6');
```

--------
**Changelog**
- Added on: 2016-01-22
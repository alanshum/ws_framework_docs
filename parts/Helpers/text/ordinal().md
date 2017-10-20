**Description**
Display numbers with ordinal suffix (1st, 42nd, 106th, etc.)

--------
**Parameters**
name	type	def_value	desc
n	int		input number
superscript	bool	FALSE	if the suffix should be in superscript (wrapped in `<sup></sup>` tag)

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
String	formatted text

--------
**Examples**

```php
echo ordinal(1);
// prints: 1st

echo ordinal(22,TRUE);
// prints: 22<sup>nd</sup>
```

--------
**Changelog**


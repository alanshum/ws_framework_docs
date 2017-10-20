**Description**
Print arguments in new lines with `<br>` tag.

--------
**Parameters**
name	type	def_value	desc
arg1, ...	mixed		Arguments to be printed. Strings or array of string. 'die' to `die()`. (In essence, it will also print objects using `printr()`)

--------
**Return Values**
type	desc
void

--------
**Examples**

```php
echob( 'a','b' );
// prints: 
// a
// b
```

--------
**Changelog**
- 2016-02-15
	-  now accepts array of strings (previously only strings)
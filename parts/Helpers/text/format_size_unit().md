**Description**
Convert size in bytes into proper human-readable units (TB/GB/MB/KB/bytes).

--------
**Parameters**
name	type	def_value	desc
bytes	int		Value to convert in number of bytes
decimals	int	0	Correct the size to how many decimal places

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
$value = filesize( 'test.txt' );
echo "The file size is " . format_size_unit( $value , 2 );
// prints: The file size is 12.35MB
```

--------
**Changelog**
- 2016-02-05
	- changed default rounding decimal places from 2 to 0 which is more intuitive

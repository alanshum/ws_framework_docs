**Description**
Converts comma-delimited (or other delimited type) values to array. Does nothing if the supplied value is already an array.

--------
**Parameters**
name	type	def_value	desc
text	string		delimited values to be converted
delimiter	string	','	delimiter character

--------
**Return Values**
type	desc
Array	(single level)

--------
**Examples**

```php
$data = csv2array( '1,a,2,b,3,c')
printr($data);
// prints:
// Array
// (
//     [0] => 1
//     [1] => a
//     [2] => 2
//     [3] => b
//     [4] => 3
//     [5] => c
// )
```

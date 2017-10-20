**Description**
Convert a 2D array to TSV values. Basically a reverse to [`tsv2array()`](#tsv2array).

--------
**Parameters**
name	type	def_value	desc
haystack	array		input array (2-dimensional)
make_header	bool	TRUE	If *TRUE*, make array keys (of first item) to be the header row
delimiter	string	"\t"	Column delimiter character

--------
**Return Values**
type	desc
String	(delimited)

--------
**Examples**

```php
$data= array(
	array( 'id'=>'12345','pw'=>'zxcv'),
	array( 'id'=>'23456','pw'=>'asdf')
	);
print_r( array2tsv( $data ) );

// prints:
// id       pw
// 12345	zxcv
// 23456	asdf
```
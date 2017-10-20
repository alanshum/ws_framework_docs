**Description**
Search multi-dimentional array for the `key=>value` search pairs. All the search pairs must be matched. You can consider it a "AND" query for multiple pairs.

--------
**Parameters**
name	type	def_value	desc
array	array		input array to be searched
pairs	array		array of `search_key=>search_value` pairs


--------
**Return Values**
type	desc
Array	of search results

--------
**Examples**

```php
$data = tsv2array( ... );
$results1 = array_multi_search( $data, array( 'id' => '123' ) );
$results2 = array_multi_search( $data, array( 'surname' => 'Chan', 'firstname' => 'Peter' ) );
```
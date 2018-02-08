**Description**
Sort database-style results

--------
**Parameters**
name	type	def_value	desc
array	array		input array to be sorted
col1	string		sort by this column name
col1_order	enum	SORT_ASC	PHP sorting order flag (i.e. `SORT_ASC` / `SORT_DESC` )
...			$col1 and $col1_corder can be repeated for additional sort criteria.

--------
**Return Values**
type	desc
Array	sorted

--------
**Examples**

```php
$data = array(
	array( 'user_id' => '132' ),
	array( 'user_id' => '66'),
	...
);
$data = array_subval_sort( $data, 'user_id' , SORT_ASC );
```

--------
**Changelog**
2018.02.08: Renamed from array_order_by (which remained as alias) for clarity
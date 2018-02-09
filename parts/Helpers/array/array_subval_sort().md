**Description**
Sort database-style results.

Note: "subval" here means "Sub-Value" which in turn means sub-level array item value.

--------
**Parameters**
name	type	def_value	desc
array	array		input array to be sorted
col1	string		sort by this column name
col1_order	enum	SORT_ASC	PHP sorting order flag (`SORT_ASC` / `SORT_DESC` )
col2_flag	enum	SORT_REGULAR	PHP sorting type flag (`SORT_REGULAR` / `SORT_NUMERIC` / `SORT_STRING` / `SORT_LOCALE_STRING` / `SORT_NATURAL` / `SORT_FLAG_CASE`).  See [php doc](http://php.net/manual/en/function.array-multisort.php) for details.
...			`$col1`, `$col1_order` and `$col2_flag` can be repeated for additional sort criteria.

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
2018.02.08: Renamed from `array_order_by()` (which remained as alias) for clarity
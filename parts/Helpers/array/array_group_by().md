**Description**
Group array data by one of the keys and make it one more dimension deeper.

If the key to group does not exist, the record will be grouped to key `''` (blank).

--------
**Parameters**
name	type	def_value	desc
array	array		input array
group_by_key	string		the key of the input array item to be grouped
keep_key_item	bool	TRUE	if *TRUE*, the value of the key array item will be kept in the deeper level array; <br> if *FALSE*, the value of the key array item will be removed otherwise.

--------
**Return Values**
type	desc
Array	(2 dimensional array)

--------
**Examples**

```php
$data = array(
	array( 'id' => 1, 'group' => 'admin' ),
	array( 'id' => 2, 'group' => 'user' ),
	array( 'id' => 3, 'group' => 'admin' ),
);
$data = array_group_by( $data, 'group' );
print_r( $data );

// prints:
Array
(
    [admin] => Array
        (
            [0] => Array
                (
                    [id] => 1
                    [group] => admin
                )
            [1] => Array
                 (
                    [id] => 3
                    [group] => admin
                 )
        )
    [user] => Array
        (
            [0] => Array
                (
                    [id] => 2
                    [group] => user
                )
        )
)
```
In the example above, if $keep_key_item is set to FALSE, the last level array items with the key "group" will be removed.

--------
**Changelog**
2018.01.11: changed variable name from `$keep_array_item` to `$keep_key_item` for clarity.
2017.11.03: Fixed an issue with group by key does not exist. Php errors won't be shown anymore if they key does not exist.


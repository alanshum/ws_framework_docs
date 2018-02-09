
```php
add_options_set( 'options1', array(
	'1'=>'One' , '2'=>'Two',
) );
$data = tsv2array('
// 1   2     ...  7
id     label ...  options
sid    Year  ...  $options1
');
```

There is a pre-defined `$ws_select_options` variable. You can add item in this array using [`add_options_set()`](#add_options_set) and then specify `$options1` as the option value in the TSV.

To add a select option easily, you can create the options array first and then use `add_options_set()`. This also make it simplier for those select fields with the same options set.

Two commonly used options has been pre-defined:

1. `status` (same value & label: Active / Inactive / Deleted )
2. `bool` (value=>label: Y=>Yes / N=>No )


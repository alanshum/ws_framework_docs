The options can be specified using the `serialize()` or `json_encode()`functions. Either one is fine and the system will detect.

```php
$options1 = array('1'=>'One' , '2'=>'Two');
) ) );
$data = tsv2array('
// 1 2 ... 7
id    label  ... options
sid   Year   ... ' . serialize( $options1 ) . '...
num   Number ... ' . json_encoded( $options1 ) . '...
');
```
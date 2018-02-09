Specify in the TSV with pre-defined separator: "`||`" (two vertical bar, or <kbd>shift-\</kbd>). This is useful for simple lists.

On the other hand, for a even more simpler list (the value and desc is the same), simply put csv there.

```php
$data = tsv2array('
// 1 2 ... 7
id      label  ...   options
year    Year   ...   1||One,2||Two ...
age     Age    ...   14,15,16,17,18
');
```

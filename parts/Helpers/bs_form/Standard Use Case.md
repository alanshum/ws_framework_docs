The helper is developed with the consideration of "fieldsets" with multiple fields in a fieldset. Therefore, instead of manually creating form fields individually, we can make use of an array of settings of the fieldset in tab seperated values (TSV). Consider the following code snippet:

```php
$fs1 = tsv2array('
//1    2    3    4    5    6    7    8    9    10    11
id    label    type    validate    desc    placeholder    options    extra    value    append    prepend
sid    Student ID    text    required,custom[integer]
password    password    password    required
');

$form_type = 'horizontal';
echo form_open( '' , $form_type );
echo form_gen_fieldset( form_set_values( $fs1, $P ), '' , $form_type );
echo form_submit( '' , $form_type );
echo form_fieldset_close();
echo form_close();
```

Note:

- The numbers are here to help counting the tabs only.
- The header line [i.e. id label ...] is one single line, which will be converted as array keys.

This code block creates a form with the 2 fields (sid, password), in Bootstrap's horizontal form style.
The use of TSV minimizes the typing required, although in essence the functions accepts array as input. Therefore, you can also modify the array first before generating the form fields.

For the data to input in the TSV is discussed below. You can reorder the TSV, just to change order the column header in the way you prefer.

Please also refer to [`tsv2array()`](#tsv2array) in **array** helper. Also, please read below sections for explanations of each helper functions.

For horizontal form type, you can also specify the width of label, e.g. `horizontal-6`. The element width would be the remaining width. Otherwise, for site-wide label width, you can modify the constant `HORIZONTAL_FORM_LABEL_WIDTH` in `config/constants.php`.

Please also note that there is a global form disabled state switch. Please refer to [form_disabled()](#form_disabled) for details. However, you can completely ignore it if you do not need this functionality.
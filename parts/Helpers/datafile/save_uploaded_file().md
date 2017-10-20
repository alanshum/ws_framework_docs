**Description**
Save the uploaded file (from form) to the upload directory.

--------
**Parameters**
name	type	def_value	desc
field_name	string		the form field name of the file
new_file_name	string	''	Specify new file name if needs to be changed <br> BLANK to keep original file name.
upload_dir	string	'upload'	Save file to this directory <br> Relative to application root OR you can specify an absolute path. <br> Note: the directory must be created and writable by the apache user <br> *if not specified, will defaults to `$config['upload_dir']`*
allowed_size	int	''	if specified, check the file against this size limit; *if not specified, will defaults to `$config['allowed_size']`*
allowed_exts	mixed	''	if specified, check the file if it is of one of these file extensions <br> an array or csv of extensions <br> *if not specified, will defaults to `$config['allowed_exts']`*
allowed_types	mixed	''	if specified, check the file if it is of this mime type <br> an array or csv of mime types <br> *if not specified, will defaults to `$config['allowed_types']`*

--------
**Return Values**
type	desc
TRUE	if the file is successfully saved to the destination directory.
FALS	if the file is FAILED to be saved (but passes the checks). Possible reason is destination directory permissions.
Array	of checking result if there are some errors with the following keys (values in boolean): <br> "size" - file size is within $allowed_size <br> "ext" - file extension is one of the allowed <br> "type" - MIME type is one of the allowed <br> "path_length" - if the file path is too lon
NULL	if the file size is 0 (zero);

--------
**Examples**

```php
$result = save_uploaded_file( 'file_cv' , date('Ymd').'-'.$P['name'].pdf , 2*1024*1024, 'pdf,txt,docx' , 'application/pdf,text/plain,application/msword');

// Note to check against TRUE rather than NOT FALSE, as array of checks is one of the possible return
if( $result !== TRUE )
{
	var_dump( $result ).
}
else
{
	echo "File successfully uploaded!}
}
```

--------
**Changelog**
- 2016-02-05
	- renamed from `save_file()` for clarity. Rewritten for its major flaws in original version.

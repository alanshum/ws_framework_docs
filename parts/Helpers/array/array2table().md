**Description**
Creates a simple html table from a 2-dimensional array. Useful for displaying simple database results. Note:

- if the sub-array key name begins with `file` (e.g. 'file' or 'file_uploaded'), it will auto link to the file in `$options['upload_dir']` directory with file size shown. (This field should only save the file name)
- it replaces underscores "_" to spaces of table headers (th) for better readability
- There are two default set of search & replace phrases:
	- "ip_addr" to "IP_Address"
	- "_id" to "_ID"

--------
**Parameters**
name	type	def_value	desc
array	array		input array (2 dimensional)
options	array	''	optional properties listed below:


--------
**Properties**
name	type	def_value	desc
id	string	''	table id
class	string	''	table class
upload_dir	string	`$config['upload_dir']`	Directory name for *file* fields
search	array	''	Search for this in column header (th) and replace with that in $replace
replace	array	''	Replace with this, must match the item count in $search
counting	bool	FALSE	If *TRUE*, add a auto counting first column starting from 1

--------
**Return Values**
type	desc
String	of HTML code

--------
**Examples**

```php
$data = tsv2array('
id	name    title	file
john    John Doe    Mr.	john.pdf
jane    Jane Doe    Ms.	jane.pdf
');

echo array2table($data, array('counting' => true));
```

The above prints:
```html
<table class="table table-condensed table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Id</th>
			<th>Name</th>
			<th>Title</th>
			<th>File</th>
		</tr>
		</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>john</td>
			<td>John Doe</td>
			<td>Mr.</td>
			<td><a href="upload/john.pdf">Click <small>(10 bytes)</small></a></td>
		</tr>
		<tr>
			<td>2</td>
			<td>jane</td>
			<td>Jane Doe</td>
			<td>Ms.</td>
			<td><a href="upload/jane.pdf">Click <small>(4 bytes)</small></a></td>
		</tr>
	</tbody>
</table>
```

--------
**Changelog**
2017.10.25: file check is done before creating link to "file" field(s).
2017.10.13: fixed an issue where auto counting is not correct.

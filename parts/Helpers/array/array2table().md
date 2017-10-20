**Description**
Creates a simple html table from a 2D array. Useful for displaying simple database results. Note:

- if the sub-array key name begins with `file_`, it will auto link to the file in `$options['upload_dir']` directory. (This field should only save the file name)
- it will replace underscores "_" to spaces by default for table headers (th)

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
id	name    title
john    John Doe    Mr.
jane    Jane Doe    Ms.
');

echo array2table($data, array('counting' => true));

// prints:
// <table class="table table-condensed table-hover">
// 	<thead>
// 		<tr>
// 			<th>#</th>
// 			<th>Id</th>
// 			<th>Name</th>
// 			<th>Title</th>
// 		</tr>
// 		</thead>
// 	<tbody>
// 		<tr>
// 			<td>1</td>
// 			<td>john</td>
// 			<td>John Doe</td>
// 			<td>Mr.</td>
// 		</tr>
// 		<tr>
// 			<td>2</td>
// 			<td>jane</td>
// 			<td>Jane Doe</td>
// 			<td>Ms.</td>
// 		</tr>
// 	</tbody>
// </table>
```

--------
**Changelog**
- 2017.10.13
	- fixed an issue where auto counting is not correct

**Description**
This makes proper form open tag. It also accept an array as the first argument that include part or all of the arguments as array keys. E.g. `form_open( array( 'id'=> ... , 'action' => ... )`

--------
**Parameters**
name	type	def_value	desc
action	string	''	form handler. If empty, will point back to current page. `htmlentities( $_SERVER['REQUEST_URI'] )`
type	string	''	Bootstrap form type ( '' / horizontal / inline)
id	string	''	form id
class	string	''	class of the form
multipart	bool	FALSE	TRUE to open multipart form (e.g. for file upload)
extra	string	''	Anything to add before the form open tag is ended (`<form action="" ... extra_stuff here>`)
text	string	''	html code or text to add immediately after the open tag is ended `<form>$text...`
method	enum	'post'	HTTP method ( GET / POST )

--------
**Return Values**
type	desc
String	of HTML code

--------
**Examples**

```php
echo form_open();		// a simple open tag that points to itself as handler

echo form_open('submit.php','horizontal','form1','capture',TRUE,'disabled');
// prints:
// <form action="submit.php" class="form-horizontal capture" id="form1" enctype="multipart/form-data" disabled>
```
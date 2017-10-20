**Description**
Check authentication by NIS service. This function is only useful in MATH and is now removed from the framework.

--------
**Parameters**
name	type	def_value	desc
login	string		login user name
password	string		login password
valid_types	array	'stf,lec,spc'	user type (from user home path). Defaults to staff or special accounts only. Other valid types: course / epymt / etc / gds / msc. Note: spc also include some postdoc accounts

--------
**Return Values**
type	desc
TRUE	on success
FALSE	otherwise

--------
**Examples**

```php
$result = nis_auth( $username, $password );
if( $result === TRUE ) { ... }
```
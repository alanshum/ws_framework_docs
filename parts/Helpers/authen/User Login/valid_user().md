**Description**
Check if the user name is a valid user. List of user names can be set in `settings.php`.  
Normally this will work together with other authentication service for checking password, and this function to check if the user is eligible to use this application.

--------
**Parameters**
name	type	def_value	desc
name_to_check	string		user name to be checked
type	enum	'users'	valid values: users / admin; You can also add your custom user types in `settings.php`. User type to be checked against

--------
**Return Values**
type	desc
TRUE	if the name is on list
FALSE	otherwise

--------
**Examples**

```php
if( valid_user( $username ) ) { ... }		// check against list of normal users
if( valid_user( $username, 'admin' ) { ... }	// check against list of admin users
```
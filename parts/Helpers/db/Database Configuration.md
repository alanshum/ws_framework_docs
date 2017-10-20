Define database configuration(s) in `config/settings.php`, including at least the user name, password, and database name.
```php
// Examples
$db['default'] = array(
	'user'	=> 'user01',
	'pass'	=> 'pass01',
	'db'	=> 'testdb01',
	'port	=> 3306,			// default: 3306 if not set
	'host'	=> 'localhost',		// default: localhost if not set
);
$db['another_set'] = array( ... )
```

**Important**: Do NOT delete the "default" set.

You can define more sets as adding a new key to `$db` as in the example above.
The user adjustable settings are as follows: (in index.php)

--------

**$ws_loader['basepath']**  
Specify the application base path, which is the container directory of "core", "config", "pages" directories. If this is empty, it will use the current index.php file path. You can use relative (to this file) path or absolute path here. Do not put trailing slash. 

Examples:
```php
$ws_loader['basepath'] = '';		// default

$ws_loader['basepath'] = '..';
// parent dir, useful when you put 2nd instance of index.php in sub-directories.
// you can refer to the 2nd example of Page Dir below

$ws_loader['basepath'] = '/var/www/ws';		// absolute path
```

--------

**$ws_loader['pages_dir']**  
Specify the "pages" directory, where the application pages locates. The path is relative to the Application Root path specified above. Do not put trailing slash.

Examples:
```php
$ws_loader['pages_dir'] = '';		// default, which points to "pages"

$ws_loader['pages_dir'] = 'admin';
// if this index.php is a 2nd instance and in a sub-dir called "admin".

```

--------

**$ws_loader['settings']**  
Generally speaking, most of the time you only need a single instance of index.php so that this is not used. However, when you put up a 2nd instance, some times the settings you have made in config.in.php may not be valid / applicable to that instance. Therefore, you need to override it to make it usable. One line for each settings.

Examples:
```php
$ws_loader['settings']['title'] = 'Admin Only Page';
$ws_loader['settings']['valid_users'] = 'Admin';
```

--------

**$ws_loader['incl_header'] / $ws_loader['incl_footer']**  
Specify if you would include header and footer (header.inc.php / footer.inc.php).  By design, this should be enabled.

However this is useful if there is some page in the application that a site header/footer should not be displayed. You will need to write your own includes by using incl().

Please note the styles of 404 page, if you are not including or not using index.

Specify TRUE or FALSE in the variables.

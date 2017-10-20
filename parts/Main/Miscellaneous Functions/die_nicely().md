**Description**
Die nicely with styles. Useful to show simple error message immediately without having the need to make a new page.

--------
**Parameters**
name	type	def_value	desc
text	string	''	Error message content to display (wrapped with `<p>`)
caption	string	''	Error message caption to display (wrapped with `<h2>`).
include_header	bool	FALSE	Include header.inc.php if *TRUE* - since `header.inc.php` already included before loading the page file, the use is very limited before header is included by index.php. For instance, making a custom library and this is called before `header.inc.php` is loaded. However, if this is called too early before main helper is loaded, this function will fail to be called anyway (PHP error). <br> No effect if `$ws_loader['incl_header']` is FALSE. <br>NOTE: footer is always included; again if `$ws_loader['incl_footer']` is FALSE, footer will not be included.

--------
**Return Values**
type	desc
void

--------
**Examples**

```php
if( ! valid_user() )
{
	die_nicely( 'You are not allowed to access this page.' , 'Access Denied');
}
```

--------
**Changelog**
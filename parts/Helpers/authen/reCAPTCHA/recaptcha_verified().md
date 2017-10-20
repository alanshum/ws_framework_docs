**Description**
Verify the recaptcha submitted in the recaptcha widget. Note that it does not accept any parameters as this will read the POST data for the recaptcha input and settings for secret key.

--------
**Parameters**
name	type	def_value	desc


--------
**Return Values**
type	desc
TRUE	if reCAPTCHA input is valid
FALSE	otherwise
NULL	if either the recaptcha input OR secret key is missing

--------
**Examples**

```php
if( recaptcha_verified() ) { ... } 
```
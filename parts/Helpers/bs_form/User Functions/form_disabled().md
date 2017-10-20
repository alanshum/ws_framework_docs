**Description**
This function has two uses (see examples):
1. Making all form elements in disabled state (or not).
	- Note: This is a global switch. Meaning that you can change this settings once and change for all fields.
	- Default disabled state is FALSE. (i.e. you can completely ignore this function if you do not need this.)
2. Returns the string `disabled` if form is in "disabled" state. (this use is designed for form field helper functions to set the disabled state.)

--------
**Parameters**
name	type	def_value	desc
value	bool	''	Set if the form should be disabled. <br> If the value is empty, it returns the string `disabled` if form is in disabled state.

--------
**Return Values**
type	desc
Void	if setting disabled state (use 1)
String/Null	(use 2)

--------
**Examples**

```php
// for use 1:
form_disabled( TRUE );		// init
if( time_started() AND ! time_ended() )
	form_disabled( FALSE );
```

--------
**Changelog**
- Added on: 2016-02-01


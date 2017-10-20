**Description**
Prep headers and send email using php `mail()` function.

Note: Keep in mind that even if the email was accepted by smtp server for delivery, it does NOT mean the email is actually sent and received by your recipients.

--------
**Parameters**
name	type	def_value	desc
options	array		array with the following properties:


--------
**Properties**
name	type	def_value	desc
to	array		"To" recipients; can also be csv
cc	array		"Cc" recipients; can also be csv
bcc	array		"Bcc" recipients; can also be csv
from	string	config_item('email_from')	Send email to be shown.
subject	string		email subject
message	string / array		mail message content, which can be array or string. The message will be imploded with `"<br>\n"` (new line) if it is in an array so that you can compose the message easier.
html	bool	TRUE	Set the email in html format. FALSE if should be in plain text.
smtp	string	config_item('email_smtp')	SMTP server to be used
charset	string	config_item('email_charset')	Character set to be used. The default is "utf-8"

--------
**Return Values**
type	desc
String	if accepted for delivery, the hash value of the address parameter
FALSE	on failure.

--------
**Examples**

```php
$email = array(
	'to'	=> array( $name . ' <' . $email . '>' , 'John <john@example.com>'),
	'cc'	=> 'jane@example.com',
	'bcc'	=> $bcc_list,
	'from'	=> 'Someone <sender@example.com>',
	'subject'	=> 'Hello',
	'message'	=> array(
		'Dear ' . $name,
		'......',
		'Best Regards,',
		'Someone',
	)
);
$result = send_email( $email );
```
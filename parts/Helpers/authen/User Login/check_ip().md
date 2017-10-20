**Description**
Check if the client's IP address matches with **any** IP addresses specified.

To make it error prone, this function accept *any* numbers of arguments, as well as arguments in array or csv.

An IP address can be either:

1. a full IPv4 address (**xxx.xxx.xxx.xxx**) (you can use an asterisk to substitute any part of the IP as a wildcard) (e.g. 192.\*.1.\*)
2. predefined keywords for localhost ("**LOCAL**" or "**LOCALHOST**")

--------
**Parameters**
name	type	def_value	desc
ips, ...	array		List of valid IP addresses, can also be in csv, or even as separate arguments.

--------
**Return Values**
type	desc
TRUE	if matched *any* of the IP in the arguments
FALSE	otherwise

--------
**Examples**

```php
if( check_ip( '202.168.*.*', LOCAL ) ) ...
```
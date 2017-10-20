**Description**
Fetch URI segments based on **application root**.  
Note: it currently has an alias `segment()`, which is deprecated and will be removed.  

--------
**Parameters**
name	type	def_value	desc
n	mixed	FALSE	The segment item to return. *0* being the first item.<br>*FALSE* to return an array of ALL segments.
no_result	bool/mixed	FALSE	What to return if no result.

--------
**Return Values**
type	desc
FALSE	when segment is not found
Mixed	when segment is not found and has a custom value for `$no_result`
String	uri segment text
Array	array of uri segments text (when `$n == FALSE` which is default)

--------
**Examples**
All functions call with this url: `http://www.example.com/app/test/hello/arg1/arg2`,  
while *test* is the application root, *hello* is the handler page (`pages/hello.php`)

```php
$segs1 = segments();		// $segs1 = array( 'hello' , 'arg1' , 'arg2' );
$segs2 = csegments();		// $segs2 = array( 'hello' );
$segs3 = psegments();		// $segs3 = array( 'arg1' , 'arg2' );
$segs4 = fsegments();		// $segs4 = array( 'app' , 'test' , 'hello' , 'arg1' , 'arg2' );

echo segments(0);		// prints: hello
echo segments(1);		// prints: arg1
echo segments(2);		// prints: arg2
echo segments(3);		// prints nothing since returns FALSE.
echo segments(3, 'Not Found');		// prints: Not Found

echo csegments(0);		// prints: hello
echo csegments(1);		// prints nothing since returns FALSE.

echo psegments(0);		// prints: arg1
echo psegments(1);		// prints: arg2
echo psegments(2);		// prints nothing since returns FALSE.

echo fsegments(0);		// prints: app
echo fsegments(1);		// prints: test
echo fsegments(2);		// prints: hello
echo fsegments(3);		// prints: arg1
echo fsegments(4);		// prints: arg2
echo fsegments(5);		// prints nothing since returns FALSE.
```

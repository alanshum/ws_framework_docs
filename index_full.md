# WS Framework Docs
## Changelog

The changelog is put at the top for easy updating only. Please read [Introduction](#introduction).  
*This records changes affects the base framework. Function API changes are recorded in their own sections.*  

Date       | Description
---------- | -----------
2017-10-17 | Removed `$SS` alias for session as it is not helpful at all. <br> Use `$_SESSION` superglobals or the Session helpers directly
2016-03-29 | Fixed the segment behaviour to work properly when the page is under subdirectories. 
2016-02-05 | Added **$ws_loader** - index loader settings. <br> Multi instances of index.php and settings override is now possible. 
2016-01-19 | Added **array** helper. Moved array related helper functions in from main helper.
2016-01-18 | Fixed **%PAGE_TITLE%** showing up incorrectly when `die()`.
2016-01-15 | Template: **%HTML_TITLE%** renamed to **%PAGE_TITLE%** for clarity
2015-12-28 | CSS packages: removed Bourbon and Corpus which is not used nor deployed once after test.



--------




--------


## Introduction
### Preface

I loved the [CodeIgniter](http://codeigniter.com/) framework. However it's getting bulky (it iis still very light-weight, just more than I needed) and not very friendly (to me). And I had to work on a server with php4.01 only (!)(although the support of php4 is continuously removed in this framework) and CI just do not fit. Therefore I referred to CI and write my own simple framework to support my daily works, which includes writing many small websites, mainly form handling and other events websites. This file documents what is going on in using this framework and will probably serve just as a note to myself.

I don't like OO programming much. Therefore in this framework mostly are procedural functions and logic. No MVC, No OOP. Simple and sweet. Perhaps not very sweet, but enough to do my tasks quickly and easily. Although some helpers adopted are really in OO style, I don't really hate it, but I will wrap it as procedural functions.  

What WS stands for? Although this is built for my job, the first completed mini "project" is my personal "WorkSpace".  

-- *written by Alan, Jun 2015*  




--------


### What's Inside

- PHP libraries and helpers
	- mainly procedural functions
- JavaScript plugins
- Scss helpers and plugins
	- including Bootstrap CSS framework Scss files




--------


### License

I did not set any license to this framework for the time being (as of 2015-12-23).  

However, as some functions and code snippets are taken and modified from CodeIgniter and other open-sourced projects, I suppose this should be open-sourced. You may use it under any suitable open-licenses (perhaps MIT license? I am not sure).  

I only claim that as the author of this framework this can be changed at any time without prior notices, and I keep the copyright of this framework, except those functions, scripts or code snippets otherwise specified in the code.   



--------


### Author Info

- Name
	- Alan SHUM
- Email
	- alanshum88@gmail.com




--------


### Code Style


```
function( $var , $var2 )
{
	$x = $a + $b;
	return TRUE;
}

$tmp = fx1( fx2( fx3( $var1 ) , $var2 ) );
```
- Brackets, open brackets stick together with its "owner", and 1 space between the "arguments"
- Commas in function are separated with *everything* by 1 space
- Curly brackets in new lines
- Boolean Data Type: TRUE / FALSE / NULL in CAPS
- Most of the other coding style come from [CodeIgniter 2](http://www.codeigniter.com/userguide2/general/styleguide.html).




--------


### Styling of This Document

Notation            | Description
------------------- | -------------
(horizontal rule)   | Section break ; <br>continuous section breaks for different topics.
$arg1 = VALUE       | argument of function with default value
[ $arg2 ]           | Optional argument; for optional value without default value specified,<bR> the default value is "" (blank string) 
`<h5>`              | All documentation of php functions API are set to use `<h5>`, regardless of its parent level.



--------




--------




--------


## Using the Framework

As this is a self-defined framework, many stuff has been "pre-defined" and have "opinionated values" (or, simply "hard-coded") to make things work in an efficient way. Therefore, please read the following sections on how to use it.

Note: This framework is built with the support to Bootstrap (v3). Support to v4 is not implemented. Some functions (on displaying content) are normally defined with Bootstrap classes.



--------


### Pages and Segments

All "pages" of the application should goes in the **pages** directory. For instance, create a "test.php" and you can access it in the web by *http://your-site.com/test*. You may also make sub-directories as needed (but this is not very thoroughly tested).  

You can use add argument to the url with `/`.  

Consider this url:  http://your-site.com/test/arg1/hello  

If you do not have the file `/pages/test/arg1/hello.php` but only `/pages/test.php`, then you can access the rest of the url segment as arguments by using `segments()`. In this case, `segments(0)` will return `'arg1'` and `segments(1)` will return `'hello'`. Please refer to [Core > Segments](#segments) section below for details.  



--------


### .htaccess

Please edit the `.htaccess` file in the root of the framework. There are 2 sections which you should modify on each application:



--------


#### RewriteBase

Please search for "RewriteBase" and change the path based on your application root (i.e. where index.php locates). This is essential otherwise the application will just die except the default page.



--------


#### Options to rewrite `www.`

There are two options:  
Option 1: rewrite www.example.com â†’ example.com  
Option 2: rewrite example.com â†’ www.example.com  
Choose one of them and comment out the other section.  



--------




--------


### Templates

The framework applies the same header and footer template to all the page.  
Please edit `header.inc.php` and `footer.inc.php` as needed.  
(Also read [Loader Settings](#loader-settings) section below.)



--------


### index.php

The index.php is served as a "base loader" to load the pages. Do not edit if you are not sure what's going on. Put your application pages in `/pages/` directory.  



--------


#### Multiple Instances

You can have multiple instances of index.php in different directories, and share the same system files. In this framework, we assumes that all these instances belong to the same application with minor settings modifications. On the contrary, if you share the same system files across multiple applications, it will be scary if you need to update the core!



--------


#### Loader Settings

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




--------




--------


### Pre-defined Variables and Aliases

All system variables begin with `$ws_` prefix. Do not create / overwrite / modify these variables. You can refer to the index.php for a list of system variables.

There are some other pre-defined aliases of variables / constants to simplify your codes:

Var/Const  | Description of the Alias
---------- | ------------------------
`$P`       | (CAPITAL P) alias for `$_POST`
`$G`       | (CAPITAL G) alias for `$_GET`
`$F`       | (CAPTIAL F) alias for `$_FILES`
`$S`       | (CAPITAL S) alias for `$_SERVER`
`DS`       | alias for `DIRECTORY_SEPARATOR`

Note: What I meant for *alias* here, is that you can keep modifying these variables (e.g. `$P`), while keeping the original one intact (e.g. `$_POST` is unchanged). It is sometimes useful to have 2 copies of the same data to manipulate the program easily. A shorter variable name of these commonly used variables can increase readabilty. For instance, it is clumpsy if the code is flooded with `$_POST['surname']` , `$_POST['name']`, etc. (consider having over 5 or 10 like these), but a bit more readable by `$P['surname']`, `$P['name']`, etc.



--------


### Commonly Used Stuff to Note

- Page Title
	- Use [`set_page_title()`](#set_page_title) to set page title. Useful for pages that you would like an separate page heading. The position is defined in *header.inc.php* with **%PAGE_TITLE%** tag. (i.e., you can use `set_page_title()` anywhere in the page and the title will be set for you)
- Add select options
	- Use [`add_options_set()`](#add_options_set) to add new options. See also [options](#7-options) section in bs_form_helper section.
- Add new JavaScript blocks
	- Use [`addjs()`](#addjs) to add new JavaScript block inline with the program codes in a page. This is required as JavaScript is loaded *AFTER* page content. A `<script></script>` tag will be wrapped for each array item. The scripts are printed in *footer.inc.php* with [`printjs()`](#printjs).



--------


#### CSV, TSV and Array

Array is commonly used in php and in this framework. However, typing arrays sometimes is not very efficient if it is a multi-dimensional array. Thus sometimes tab-separated values (TSV) is used in place of 2-dimensional arrays, with the aid of [`tsv2array()`](#tsv2array) helper. Also, sometimes it is easier to list a set of items in comma-separated values (CSV). Thus, most helper functions supports an auto conversion of csv to array for its arguments (with [`csv2array()`](#csv2array)). That is, if the function's argument requires an array (but not associative array), you can use CSV. However, please check the function's API doc to make sure that.



--------


#### Defaults

Most of the functions have multiple optional arguments. To reduce the use of array parameter, but to skip some optional arguments in the middle, most of the helpers accepts blank string `''` to keep using default values with the introduction of [`empty_defaults()`](#empty_defaults). 




--------




--------


### File Structure

The original site structure as follows:

Path     | Description
-------- | ---------------
config/  | site wide configuration files
core/    | core libraries
css/     | all style sheets should be put here
 ../loader.scss         | base loader of different helpers, frameworks, etc.
 ../style.scss          | this is styles for the math theme
 ../_page_specific.scss | put custom styles of the application here
 ../js-plugins/         | put css from JavaScript / jQuery plugins in separate file in this folder and make reference in js-plugins.scss
 ../js-plugins.scss     | put calls to load plugin's styles here
data/    | data file storage (with the use of datafile helper)
fonts/   | put font files here
helpers/ | helper function collections
 ../local_helpers.inc.php     | put custom helper function here
img/     | images that is used site wide. Page-dependent images are advised to create a sub-folder of the file name in `page/`
js/      | script files
 ../main.js              | put run-time script calls here
 ../plugins.js           | put jQuery plugins here (compress the code first, and put comments above the code block)
 ../vendor/              | JavaScript frameworks, libraries, etc. that comes from a well-known source (so do not mix up with our own scripts)
logs/    | error logs (separated by each day)
pages/   | application files. You can create sub-folders.
footer.inc.php    | site footer (included in every page)
header.inc.php    | site header (included in every page)
index.php         | the "loader" of the framework




--------




--------




--------


## Config
### settings.php

All settings of the application. Most of the items are self-explanatory in comments.  
Do **NOT** delete any existing variables. Set it to blank `$config['item'] = '';` instead if it is not used.  
Note: This list may not be up-to-date. Please follow what you have in `settings.php`.  
You may also set up any site-wide settings that you can access via `config_item('example_settings')`; Please refer to [`config_item()`](#config_item).



--------


#### Auto-load Helpers

Variable                 | Description
------------------------ | -----------
`$config['helpers']`     | array of helpers to be loaded




--------


#### Title of Application

Variable                 | Description
------------------------ | -----------
`$config['title']`       | Application title, affects how to show in template header and the `<title>` tag in `<head>`
`$config['subtitle']`    | Sub title only shows in header area



--------


#### Datafile Helper
#### Admin Access

To be used by [`valid_user()`](#valid_user).

Variable                 | Description
------------------------ | -----------
`$config['valid_admin']` | Admin user names
`$config['valid_users']` | Normal users, no need to repeat admin user names

<!-- this is the deprecated version.
`$config['admin_ip']`    | IP of authorized users, to access pages protected by `valid_user()` function; *Note*: localhost user is always allowed.
`$config['admin_key']`   | Key to access pages protected by `valid_user()` function. Note that`admin_ip` takes privilege. Append `?v=the_key` to access by admin key. -->




--------


#### Dates

To be used with [`timestr()`](#timestr) / [`time_started()`](#time_started) / [`time_ended()`](#time_ended).  
You may specify any unambiguous date format, e.g. '2015-01-01 12:34'.  
On the contrary, "01-02-2015" is not advised as this could cause confusion on the order of day and month part.  
You can also define you own "date" settings, that the variable ends with '_date'.  
E.g. `$config['test_date'] = '...'`, and access via `timestr('test')`;

Variable                 | Description
------------------------ | -----------
`$config['start_date']`  | Start date of the application
`$config['end_date']`    | End date of the application




--------




--------


### constants.php

There are a few framework constants defined. You can change the value to something else to suit your needs.  
Please do *NOT* delete any existing constants.  
You may also define your own site-wide constants in this file.  




--------




--------




--------


## Core

Core is the core library (which in essence also helpers) that the framework will not work without these functions.



--------


### URI Segments

For description of how uri segments work, please see section: [Using the Framework](#using-the-framework).



--------


#### Helper Functions

Note: segments() = csegments() + psegments().  
fsegments() is the superset of segments(). However, fsegments() do not have any portability as it is based on absolute path to the web root, while other "segments" functions rely on relative root to the application.



--------


##### segments()

`segments( [$n], [$no_result] )`

Fetch URI segments based on **application root**.    
Note: it currently has an alias `segment()`, which is deprecated and will be removed.  

**Parameters**

- [mixed **$n** = FALSE]
  - The segment item to return. *0* being the first item.
  - *FALSE* to return an array of ALL segments.
- [bool/mixed **$no_result** = FALSE]
  - What to return if no result.

**Return Values**

- *FALSE* - when segment is not found
- *Mixed* - when segment is not found and has a custom value for `$no_result`
- *String* - uri segment text
- *Array* - array of uri segments text (when `$n == FALSE` which is default)

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




--------


##### csegments()

`csegments( [$n], [$no_result] )`

Similar to `segments()`, except that this returns segments based on the **<u>c</u>urrent** page.  
Note: it currently has an alias `csegment()`, which is deprecated and will be removed.  
Please refer to [segments()](#segments) for details of parameters, return values and examples.  

**Parameters**

- [mixed **$n** = FALSE]

- [bool/mixed **$no_result** = FALSE]





--------


##### psegments()

`psegments( [$n], [$no_result] )`

Similar to `segments()`, except that this returns segments for the **<u>p</u>arameters** only.  
Note: it currently has an alias `psegment()`, which is deprecated and will be removed.  
Please refer to [segments()](#segments) for details of parameters, return values and examples.  

**Parameters**

- [mixed **$n** = FALSE]

- [bool/mixed **$no_result** = FALSE]





--------


##### fsegments()

`fsegments( [$n], [$no_result] )`

Similar to `segments()`, except that this returns segments based on the **<u>f</u>ull path**.  
This is useful if your application is nested under a sub-directory.  
  
Please note that `fsegments()` does not have portability as it relies on web root instead of application root. For instance, if you move the application into a deeper sub-directory, it will have different returns.  
  
Please refer to [segments()](#segments) for details of parameters, return values and examples.  

**Parameters**

- [mixed **$n** = FALSE]

- [bool/mixed **$no_result** = FALSE]





--------


##### site_url()

`site_url( [$uri] )`

Make a proper full web address of the URI based on the **application root** defined in index.php.  
Useful for pages in `pages` with assets under other sub-folders of root (e.g. `/img/`).  
Note:   
- If the uri has a scheme (e.g. `http://` ) , it will not be prep'd.  
- If no uri is inputted, the base url will be returned.  
- If your index.php is NOT on the same level as application root, please REMEMBER to add the extra segment when you call this as this function is NOT based on current url.  

**Parameters**

- [string **$uri** = '']
  - URI to check and set

**Return Values**

- *String* - the complete url

**Examples**

  
```php  
echo site_url();		// prints: http://your_domain.com  
echo site_url( 'img/test.png');		// prints: http://your_domain.com/img/test.png  
```  




--------


##### current_url()

`current_url( [$uri] )`

Make a proper full web address of the URI based on **current page url**.  
Useful for pages in sub-folder (`pages/folder1`) with assets under the same sub-folder.  
Note:  
- If the uri has a scheme (e.g. http:// ) , it will not be prep'd.  
- If no uri is inputted, the base url will be returned.  

**Parameters**

- [string **$uri** = ""]
  - URI to check and set

**Return Values**

- *String* - the complete URL

**Examples**

  
The url is: http://your_domain.com/example/test/  
"example" is the directory where the application is located.  
"test" is the handler.  
```php  
echo current_url( 'image.png');		// prints: http://your_domain.com/pages/example/test/image.png  
echo current_url();		// prints: http://your_domain.com/pages/example/test  
```  




--------


#### Other Helpers in Core
##### is_php()

`is_php( [$version] )`

Determines if the current version of PHP is greater then the supplied value  

**Parameters**

- [string **$version** = '5.0.0']
  - the version number to check agains if system version is greater than that

**Return Values**

- *TRUE* - if current php version is equal to or greater than `$version`
- *FALSE* - otherwise




--------


##### config_item()

`config_item( $item )`

Read the config item with the item name specified  

**Parameters**

- string **$item**
  - the config item name to read

**Return Values**

- *Mixed* - value of the config item
- *FALSE* - if the item cannot be found

**Examples**

  
```php  
echo config_item('title');  
```  




--------


##### log_message()

`log_message( $msg, [$level] )`

Log a message in logs. This adds date time automatically. If the severity level is lower than that specified in settings, the message will not be logged.  
*ERROR* is the highest level; Then *DEBUG*; *INFO* is the lowest;  

**Parameters**

- text **$msg**
  - Message to log
- [enum **$level** = 'error']
  - Severity level of the message ( *ERROR* / *DEBUG* / *INFO* )

**Return Values**

- *Void*

**Examples**

  
```php  
if( $TEST ) { log_message( 'testing log' ); }  
// the following line is added in a log file in logs folder:  
// ERROR - 2015-12-11 16:52:08 --> tesing log  
```  




--------


##### redirect()

`redirect( [$uri], [$method], [$http_response_code] )`

Redirect by HTTP header.  

**Parameters**

- [string **$uri** = '']
  - URI to be directed
- [enum **$method** = 'location']
  - Redirect method ( *location* / *refresh* )
- [int **$http_response_code** = '302']
  - Force http response code, for location method only

**Return Values**

- *Void*

**Examples**

  
```php  
if( TRUE )  
	redirect( 'users' );  
```  




--------


##### load_helper()

`load_helper( $helper_name )`

Load a helper. Add a log if the helper file is not found.    
If the helper is already loaded previously, it will not be loaded again.  

**Parameters**

- string **$helper_name**
  - name of the helper to be loaded

**Return Values**

- *Void*

**Examples**

  
```php  
load_helper('my_accessories');  
// Note that the file should be named "my_accessories_helper.php" in "helpers" directory.  
```  




--------


##### addjs()

`addjs( $script, $is_link )`

Add a JavaScript block in the application, so as to load after page content (by [`printjs()`](#printjs)).  

**Parameters**

- string **$script**
  - Script block to add
- bool **$is_link**
  - Specify *TRUE* if `$script` specifies a link to script file instead of codes

**Return Values**

- *Void*

**Examples**

  
```php  
addjs( "$('body').what_you_want_to_do(...)");  
addjs( '/js/vendor/script.js' , TRUE );  
```  




--------


##### printjs()

`printjs(  )`

Returns the JavaScript code blocks (added by [`addjs()`](#addjs) ) so as to print out in html template (footer).  

**Parameters**

- *nil*

**Return Values**

- *String* - String of HTML code

**Examples**

  
```html  
<?=printjs()?>  
</body>  
```  




--------


##### set_page_title()

`set_page_title( $title )`

Set part of the `<title>` in `<head>` of the page.    
Set the header template with **`%PAGE_TITLE%`** for this to show up.  

**Parameters**

- string **$title**
  - Page title to be shown

**Return Values**

- *Void*

**Examples**

  
```php  
set_page_title( 'Admin Area');  
```  




--------


##### incl()

`incl( $filename )`

Include file based on application root.    
It will check if the file exist. If the file name does not exist, it will also append extensions ".php" and ".inc.php" to search.  

**Parameters**

- string **$filename**
  - file name to be included

**Return Values**

- *Void*

**Examples**

  
```php  
incl('header');		// you should have a file named "header.php" or "header.inc.php" in the application root path.  
incl('incl/myfile.php');  
```  

**Changelog**

- Added on: 2016-02-05  




--------




--------




--------


## Main

The main helpers contains a mix of useful functions that should be most needed by all applications, and some base functions for other functions to rely on.

This is currently put in helpers category, but in essence this is like in a mix of core and helper. Therefore this is moved out as a separate section so as for easy reference.

(The differences of "core" & "main" is defined by, if those in "main" is missing, the framework would still runs, probably in reduced functionality, while missing those in "core" cannot and the framework will die immediately.)



--------


### Development Functions

Since `die()` is frequently use in conjunction with these functions, you can specify `'die'` as one of the parameters to kill the script. (You can use the constant `DIE` and `die` as well)



--------


##### echob()

`echob( $arg1, ... )`

Print arguments in new lines with `<br>` tag.  

**Parameters**

- mixed **$arg1, ...**
  - Arguments to be printed. Strings or array of string. 'die' to `die()`. (In essence, it will also print objects using `printr()`)

**Return Values**

- *Void*

**Examples**

  
```php  
echob( 'a','b' );  
// prints:   
// a  
// b  
```  

**Changelog**

- 2016-02-15  
	-  now accepts array of strings (previously only strings)  




--------


##### printr()

`printr( $arg1, ... )`

Print arguments using `print_r()` for unlimited number of arguments with proper styles (`<pre>`).  

**Parameters**

- mixed **$arg1, ...**
  - Arguments to be printed.

**Return Values**

- *Void*

**Examples**

  
```php  
printr($_SERVER, $P);  
```  




--------


##### vardump()

`vardump( $arg1, ... )`

Print argument using `var_dump()` for unlimited number of arguments. As opposed to `printr()`, no styling is added in favor of viewing source.  

**Parameters**

- mixed **$arg1, ...**
  - Arguments to be printed.

**Return Values**

- *Void*

**Examples**

  
```php  
vardump( $array1, $object2 , 'die' , $wont_show );		// kills the script after printing $object2  
```  




--------




--------


### Checking Functions
##### _required()

`_required( $required, $options )`

To check if `$options` has the array keys specified in `$required`  

**Parameters**

- array **$required**
  - keys that are required to exist
- array **$options**
  - array to be checked against

**Return Values**

- *TRUE* - if ALL required keys are present
- *FALSE* - otherwise

**Examples**

  
```php  
if( ! _required( array(  
		'username',  
		'password',  
	) , $options ) ) return FALSE;  
```  




--------


##### _default()

`_default( $defaults, $options )`

To set default values in `$options`.  

**Parameters**

- array **$defaults**
  - Default values in `key => value` pairs
- array **$options**
  - The input array to set the default values if key is not present

**Return Values**

- *Array*

**Examples**

  
```php  
$opts = _default( array(  
		'date' => date('Ymd'),  
		), $options);  
```  




--------




--------


### if it is... Functions
##### is_json()

`is_json( $string, [$return_data] )`

Check if input string is json encoded.  

**Parameters**

- string **$string**
  - input string to be checked
- [bool **$return_data** = FALSE]
  - Return decoded data if TRUE

**Return Values**

- *TRUE* - if string is json encoded
- *FALSE* - otherwise
- *Array* - of data is `$return_data` set to TRUE

**Examples**

  
```php  
if( $decoded = is_json( $str, TRUE ) ) { ... }  
```  




--------


##### is_serialized()

`is_serialized( $value, [$return_data] )`

Check if an input is valid PHP serialized string.  

**Parameters**

- string **$value**
  - Input string to be checked
- [bool **$return_data** = FALSE]
  - Return unserialized data if TRUE

**Return Values**

- *TRUE* - if the input is serialized
- *FALSE* - otherwise
- *Array* - of data is `$return_data` is TRUE

**Examples**

  
```php  
if( $unserialized = is_serialized( $str, TRUE ) ) { ... }  
```  

**Changelog**

- 2016-02-18  
	- If the value is a serialized FALSE only, return an array with FALSE as the only item.  




--------


##### is_assoc()

`is_assoc( $array )`

Check if the input array is associative array.  

**Parameters**

- array **$array**
  - Input array to be checked

**Return Values**

- *TRUE* - if input array is an associative array
- *FALSE* - otherwise

**Examples**

  
```php  
if( ! is_assoc( $data ) ) { ... }  
```  




--------


##### url_exists()

`url_exists( $url )`

Check if an url exists.    
Note: In essence only check if the server response with 200 (OK) code  

**Parameters**

- string **$url**
  - Input url to be checked

**Return Values**

- *TRUE* - if the url exists
- *FALSE* - otherwise

**Examples**

  
```php  
if( url_exist( 'http://www.example.com/test.html' ) ) { ... }  
```  




--------




--------


### Email Related Functions
##### hide_email()

`hide_email( $email, [$text], [$id] )`

Email obfuscation with rot13 with proper JavaScript code to show it nicely.  

**Parameters**

- string **$email**
  - Email address to obfuscate
- [string **$text** = '']
  - Text to show on email link. Leave *blank* to show email address (treated email text, not plain text)
- [string **$id** = uniqid()]
  - Specify ID of the element. Useful if you will reference it in some JavaScript code. Otherwise it will be a random unique id.

**Return Values**

- *String* - of html code (`<a>` tag)

**Examples**

  
```php  
<p><b>Email</b>: <?=hide_email('test@example.com');?></p>  
```  




--------


##### send_email()

`send_email( $options )`

Prep headers and send email using php `mail()` function.  
  
Note: Keep in mind that even if the email was accepted by smtp server for delivery, it does NOT mean the email is actually sent and received by your recipients.  

**Parameters**

- array **$options**
  - array with the following properties:

**Properties**

- array **$to**
  - "To" recipients; can also be csv
- array **$cc**
  - "Cc" recipients; can also be csv
- array **$bcc**
  - "Bcc" recipients; can also be csv
- [string **$from** = config_item('email_from')]
  - Send email to be shown.
- string **$subject**
  - email subject
- string / array **$message**
  - mail message content, which can be array or string. The message will be imploded with `"
  - \n"` (new line) if it is in an array so that you can compose the message easier.
- [bool **$html** = TRUE]
  - Set the email in html format. FALSE if should be in plain text.
- [string **$smtp** = config_item('email_smtp')]
  - SMTP server to be used
- [string **$charset** = config_item('email_charset')]
  - Character set to be used. The default is "utf-8"

**Return Values**

- *String* - if accepted for delivery, the hash value of the address parameter
- *FALSE* - on failure.

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




--------




--------


### Time Related Functions
##### timestr()

`timestr( [$type], [$format] )`

Return a string of the time type in specified date format.     
The time types are defined in [settings.php - date section](#dates).  
  
This time string is useful in time comparisons.  

**Parameters**

- [string **$type** = '']
  - Time type defined in `settings.php`. If this is *empty*, returns string as of the time now. You can also specify custom date here directly if you are not using the time types defined. (see examples below)
- [string **$format** = YmdHis]
  - Php [date format](http://php.net/manual/en/function.date.php "PHP date&#40;&#41;") to output

**Return Values**

- *String* - of formatted time
- *FALSE* - if the type is not set or the custom date is invalid.

**Examples**

  
```php  
echo timestr();		// echo time now (e.g. 201512121234)  
echo timestr( 'start' );		// echo 201512311338  
echo timestr( 'end' , 'Y-m-d H:i');		// echo 2015-12-31 13:38  
echo timestr( '2015-1-23 12:34');		// echo 201501231234  
```  




--------


##### time_started()

`time_started( [$type] )`

Checks if current time is already past the specific time.  

**Parameters**

- [string **$type** = 'start']
  - Time type defined or custom date (refer to [`timestr()`](#timestr) )

**Return Values**

- *TRUE* - if the time already past
- *FALSE* - otherwise

**Examples**

  
```php  
if( ! time_started() )  
	echo "Application period is not yet started.";  
```  




--------


##### time_ended()

`time_ended( [$type] )`

Checks if current time is still not yet past the specific time.  

**Parameters**

- [string **$type** = 'end']
  - Time type defined or custom date (refer to [`timestr()`](#timestr) )

**Return Values**

- *TRUE* - if the time is still not yet past
- *FALSE* - otherwise

**Examples**

  
```php  
if( time_ended() )  
	echo "Application period is already ended.";  
else  
	// show form  
	...  
```  




--------




--------


### Miscellaneous Functions
##### die_nicely()

`die_nicely( [$text], [$caption], [$include_header] )`

Die nicely with styles. Useful to show simple error message immediately without having the need to make a new page.  

**Parameters**

- [string **$text** = '']
  - Error message content to display (wrapped with `<p>`)
- [string **$caption** = '']
  - Error message caption to display (wrapped with `<h2>`).
- [bool **$include_header** = FALSE]
  - Include header.inc.php if *TRUE* - since `header.inc.php` already included before loading the page file, the use is very limited before header is included by index.php. For instance, making a custom library and this is called before `header.inc.php` is loaded. However, if this is called too early before main helper is loaded, this function will fail to be called anyway (PHP error). 
  -  No effect if `$ws_loader['incl_header']` is FALSE. 
  - NOTE: footer is always included; again if `$ws_loader['incl_footer']` is FALSE, footer will not be included.

**Return Values**

- *Void*

**Examples**

  
```php  
if( ! valid_user() )  
{  
	die_nicely( 'You are not allowed to access this page.' , 'Access Denied');  
}  
```  




--------


##### get_require()

`get_require( $filename )`

require a php file and return the result after the code is run. That is, normally we will get some html code or text as how your required file design. Sometimes you may not want to include the php file directly for various reasons and only need to results.  

**Parameters**

- string **$filename**
  - file path and name

**Return Values**

- *String*

**Examples**

  
```php  
$result = get_require( '/some/path/to/file' );  
```  




--------


##### empty_default()

`empty_default( $value, $default )`

Returns default value if input value is empty (check with `empty()`).  

**Parameters**

- string **$value**
  - Input value to be checked if it is empty. Note that this is passed by reference. (`&$value`)
- string **$default**
  - Default value to set to the input variable if it is empty

**Return Values**

- *Void*

**Examples**

  
```php  
$str = '';  
empty_default( $str , '123' );		// $str = '123'  
$str2 = '456';  
empty_default( $str2 , '123' );		// $str2 = '456'  
```  




--------


##### html()

`html( $element, [$attributes], [$html_close_comment] )`

Prepare a html element.    
  
Note: This is not an intelligent function. You must give instructions if that is a self-closing element or is an element with close tag. Defaults to self-closing element (i.e. no close tag will be made).  

**Parameters**

- string **$element**
  - Element name to be printed. E.g. a, form, input, etc.
- [array **$attributes** = '']
  - Any attributes to be printed inside the open tag. Sub array items can also be array. For details please refer to [`_print_attributes()`](#_print_attributes). You may also specify '' (blank) for $attributes if no attributes to add if you need close comment (below).
- [bool **$html_close_comment** = FALSE]
  - If *TRUE*, add a html comment after close tag to make view source better. Text to add is from id and class attributes (see examples). No effect for self-closing elements.

**Return Values**

- *String* - html code generated

**Examples**

  
  
Basic usage:  
```php  
echo html( 'a' , array( 'href' => 'www.example.com', 'title' => 'Hover Text'), 'Test Website');  
// Prints: <a href="www.example.com" title="Hover Text">Test Website</a>  
  
echo html( 'div' , array( 'id' => 'div1' ) , "Test" , '/ #div1');  
// Prints: <div id="div1">Test</div> <!-- / #div1 -->  
  
echo html( 'img', array( 'src' => 'test.png' );  
// Prints: <img src="test.png">  
  
echo html( 'div', array( 'class' => 'myclass' , '' );  
// Prints: <div class="myclass"></div>  
```  
What makes this function really useful is you can modify the attributes array before generating the tag:  
```php  
$attr = array( 'class' => 'myclass' );  
if( $P['a'] == FALSE )  
{  
	$attr['class'] => 'yourclass';  
}  
echo html( 'div' , $attr , 'Sample Text' );  
// if $P['a'] is really false:  
// prints: <div class="yourclass">Sample Text</div>  
```  
You can also wrap html() into another html() just like a chain:  
```php  
echo html( 'div' , '' ,   
		html( 'h4' , '' ,   
			html( 'a' , $attr, 'A link in a h4 in a div')  
		)  
	);  
```  




--------


##### div()

`div( [$html], [$class], [$attributes], [$html_close_comment] )`

Wraps html code into a `<div>` element.    
  
(A shorthand of [html()]('html'))  

**Parameters**

- [string **$html** = '']
  - html code to wrap into the div
- [string **$class** = '']
  - class of the div tag
- [array **$attributes** = '']
  - other attributes of the div tag
- [bool **$html_close_comment** = TRUE]
  - If *TRUE*, add a html comment after close tag to make better view source. Text to add is from id and class attributes. No effect for self-closing elements. 
  - **Note:** different from [`html()`](#html) where the default is *FALSE*

**Return Values**

- *String* - html code generated

**Examples**

  
```php  
echo div( html( 'p' , '' , 'Hello World!') );  
// prints:  
// <div><p>Hello World!</p></div>  
```  

**Changelog**

- Added on: 2016-01-22  




--------


##### _flatten_attributes()

`_flatten_attributes( [$attributes] )`

Flatten the 2nd level array for html elements so that it will make it easier to manipulate while it is an array.  
  
You do not need to call this function if you are using [`_print_attributes()`](#_print_attributes).  

**Parameters**

- [array **$attributes** = '']
  - Array of element attributes in `key => value` pairs

**Return Values**

- *Array* - (one-dimensional array)

**Examples**

  
```php  
$attr['class'][] = 'class1';  
$attr['class'][] = 'class2';  
$attr['id'] = 'id';  
$attr = _flatten_attributes( $attr );  
// $attr = array( 'class' => 'class1 class2', 'id' => 'id' );  
```  




--------


##### _print_attributes()

`_print_attributes( [$attributes] )`

Print html tag attributes **if** the attribute **has some values**, i.e. not an empty string `''`.  
  
Set the value to *NULL* to print the attribute name for boolean attributes.  
  
You do not need to call this function if you use [`html()`](#html).  

**Parameters**

- [array **$attributes** = '']
  - Array of element attributes in `key => value` pairs, of *any* attributes (e.g. id, class, etc.)

**Return Values**

- *String* - of attributes

**Examples**

  
```php  
$attr['class'][] = 'class1';	// will be printed  
$attr['class'][] = 'class2';	// will be printed  
$attr['id'] = 'id';				// will be printed  
$attr['style'] = '';			// will NOT be printed since blank  
$attr['disabled'] = NULL;		// will be printed since it is NULL  
echo '<img' . _print_attributes( $attr ) .'>';  
// prints: <img class="class1 class2" id="id" disabled>  
```  

**Changelog**

- 2016-03-30  
	- fixed an issue that the attribute is not printed when the value is zero  




--------


##### add_scheme()

`add_scheme( $url, [$scheme] )`

Add a scheme if no scheme is defined in the $url. A scheme can be `http://`, `ftp://`, `https://`, `file://`, etc.  
  
Normally, you will not call this manually in the application, but from other url-handling helper functions.  

**Parameters**

- string **$url**
  - url to be checked
- [string **$scheme** = 'http://']
  - scheme to add if no scheme is stated

**Return Values**

- *String* - URL with added scheme

**Examples**

  
```php  
$url = 'abc.example.com';  
echo add_scheme( $url );  
// prints: http://abc.example.com  
  
$url2 = 'http://def.example.com';  
echo add_scheme( $url, 'https://' );  
// prints: http://def.example.com since a scheme is present  
```  




--------


##### remove_scheme()

`remove_scheme( $url )`

Remove scheme (e.g. http:// ) from a url.  

**Parameters**

- string **$url**
  - input url

**Return Values**

- *String* - url without scheme

**Examples**

  
```php  
echo remove_scheme( http://www.example.com );  
// prints: www.example.com  
```  




--------


##### char()

`char( $char, [$num] )`

Create a character repeatedly.  

**Parameters**

- string **$char**
  - the character to be created
- [int **$num** = 1]
  - number of times to be repeated

**Return Values**

- *String* - generated characters

**Examples**

  
```php  
echo char( '*' , 10 );  
// prints: **********  
```  




--------


##### t()

`t( [$num] )`

Create tab character ("\t") repeatedly. A shorthand to `char("\t")`.  
  
This is useful to indenting html source for debugging.  

**Parameters**

- [int **$num** = 1]
  - Indentation level (number of tabs)

**Return Values**

- *String*

**Examples**

  
```php  
echo t(0) . '<table>';  
echo t(1) . '<tr>...';  
echo t(2) . '<td>...';  
....  
```  




--------


##### nl()

`nl( [$num] )`

This function has 2 types of results (see examples):  
  
1. Create newline character ("\n") repeatedly. A shorthand to `char("\n")`.  
2. Warp the input text (html code) with newline character to both ends.  
  
This is useful to format html source for debugging.  

**Parameters**

- [int/string **$num** = 1]
  - number of newline chars OR input html

**Return Values**

- *Void*

**Examples**

  
Use 1: (normally to be used together with `t()`)  
```php  
echo '<div>' . nl() . t() . '<p>';  
// prints:  
// <div>  
//    <p>  
```  
  
Use 2:  
```php  
$html1 = "<div><p>Hello World!</p></div>";  
$html2 = "<div><p>See You!</p></div>";  
$html3 = "<div><p>Next Time!</p></div>";  
echo $html1 . nl( $html2 ) . $html3;  
// prints:  
// <div><p>Hello World!</p></div>  
// <div><p>See You!</p></div>  
// <div><p>Next Time!</p></div>  
  
// for comparison:  
echo $html1 . $html2 . $html3;  
// prints:  
// <div><p>Hello World!</p></div><div><p>See You!</p></div><div><p>Next Time!</p></div>  
```  




--------




--------




--------


## Helpers

Helpers, as the name suggests, help you with tasks. Each helper file is a collection of functions in a particular category. Helper files located in `./helpers/`. All helper file names should ends with `_helper.php`, e.g. `array_helper.php`.

To load a helper in a page, use `load_helper( 'helper_name' );` (e.g. `load_helper('array');`). To auto-load a helper for the whole site, add the name of helper(s) in `$config['helpers']` in `settings.php`.

Since most likely we will have our own helper functions in each application (and for that specific application), a blank `local_helper.php` is here and set to auto-load by default.




--------


### array

We deal with arrays a lot so the array helpers are here to help.



--------


##### tsv2array()

`tsv2array( $data, [$has_header], [$row_key], [$delimiter], [$convert_spaces] )`

Convert tab-separated values string to 2-dimensional array. If the data supplied is already an array, does nothing.  
  
Note: you can use `//` to comment out a row in a data for convenience.  

**Parameters**

- string **$data**
  - Delimited string data to be converted
- [bool **$has_header** = TRUE]
  - TRUE to make first array item as the key of the 2nd level array (and the first item will be removed in the array)
- [bool/string **$row_key** = TRUE]
  - If *TRUE*, search for `'id'` field (opinionated value) as the 1st level array keys. 
  -  If *FALSE*, keep numeric 1st level array keys. 
  -  If *string*, search for identifier field as specified in this value and make it as 1st level array keys. Otherwise, the first level array keys are numeric. For example, if your id field is named "row_id", you can pass this string for this parameter, so that the first level keys are properly named to make it into an associative array. Note: if same key value exists, the later ones will have the original numeric key appended after the key value, so that data will not be overwritten and appears as separate array item.
- [string **$delimiter** = "\t"]
  - Column delimiter character.
- [bool **$convert_spaces** = TRUE]
  - If *TRUE*, convert 4 consecutive spaces to tabs before conversion. Editors may replace tabs with spaces automatically.

**Return Values**

- *Array* - of data (2-dimentional array)

**Examples**

  
```php  
$data = tsv2array('  
id	name	title  
john	John Doe	Mr.  
jane	Jane Doe	Ms.  
// 3	This Record is Commented Out  
');  
  
print_r($data):  
// prints:  
// Array  
// (  
//     [john] => Array  
//         (  
//             [id] => john  
//             [name] => John Doe  
//             [title] => Mr.  
//         )  
//   
//     [jane] => Array  
//         (  
//             [id] => jane  
//             [name] => Jane Doe  
//             [title] => Ms.  
//         )  
//   
// )  
```  

**Changelog**

- 2018-01-21  
	Added `$convert_spaces` parameter  




--------


##### array_header_to_keys()

`array_header_to_keys( $array )`

Making first item of array to array keys and remove the 1st item in the result array for 2 dimentional array.  
  
Note: If you are using [`tsv2array()`](#tsv2array), this is automatically called if `$has_header` is *TRUE*.  

**Parameters**

- array **$array**
  - input array

**Return Values**

- *Array* - (prep'd)

**Examples**

  
```php  
$data = array(  
	array( 'key1' , 'key2' , 'key3' ),  
	array( 'value1A' , 'value2A', 'value3A' ),  
	array( 'value1B' , 'value2B', 'value3B' ),  
	);  
  
printr( array_header_to_keys($data) );  
  
// prints:  
// Array  
// (  
//     [0] => Array  
//         (  
//             [key1] => value1A  
//             [key2] => value2A  
//             [key3] => value3A  
//         )  
//     [1] => Array  
//         (  
//             [key1] => value1B  
//             [key2] => value2B  
//             [key3] => value3B  
//         )  
// )  
```  

**Changelog**

- 2016-02-16  
	- Fixed a bug that if the item has no value, the value will becomes *NULL*. Now changes to *''* (blank) string  




--------


##### csv2array()

`csv2array( $text, [$delimiter] )`

Converts comma-delimited (or other delimited type) values to array. Does nothing if the supplied value is already an array.  

**Parameters**

- string **$text**
  - delimited values to be converted
- [string **$delimiter** = ',']
  - delimiter character

**Return Values**

- *Array* - (single level)

**Examples**

  
```php  
$data = csv2array( '1,a,2,b,3,c')  
printr($data);  
// prints:  
// Array  
// (  
//     [0] => 1  
//     [1] => a  
//     [2] => 2  
//     [3] => b  
//     [4] => 3  
//     [5] => c  
// )  
```  




--------


##### array2tsv()

`array2tsv( $haystack, [$make_header], [$delimiter] )`

Convert a 2D array to TSV values. Basically a reverse to [`tsv2array()`](#tsv2array).  

**Parameters**

- array **$haystack**
  - input array (2-dimensional)
- [bool **$make_header** = TRUE]
  - If *TRUE*, make array keys (of first item) to be the header row
- [string **$delimiter** = "\t"]
  - Column delimiter character

**Return Values**

- *String* - (delimited)

**Examples**

  
```php  
$data= array(  
	array( 'id'=>'12345','pw'=>'zxcv'),  
	array( 'id'=>'23456','pw'=>'asdf')  
	);  
print_r( array2tsv( $data ) );  
  
// prints:  
// id       pw  
// 12345	zxcv  
// 23456	asdf  
```  




--------


##### array2list()

`array2list( $data, [$list_type], [$attributes] )`

Create list from array. Can be multi-dimentional array for nested list.  

**Parameters**

- array **$data**
  - Input data array
- [enum **$list_type** = 'ul']
  - Type of list to be generated. Valid values: *ol* / *ul*; ordered list or unordered list
- [array **$attributes** = '']
  - wrapper element (`<ul>` / `<ol>`) attributes. (see [_print_attributes()](#_print_attributes))

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
$set1 = array( 1,2,3,4,5,6,7 );  
echo array2list( $set1 , 'ol' );  
// prints:  
// <ol>  
// 	<li>1</li>  
// 	<li>2</li>  
// 	<li>3</li>  
// 	<li>4</li>  
// 	<li>5</li>  
// 	<li>6</li>  
// 	<li>7</li>  
// </ol>  
  
$set2 = array( 'a','b' => array( 'c','d' ), 'e' => array( 'f','g' ) );  
echo array2list( $set2 );  
// prints:  
// <ul>  
// 	<li>a</li>  
// 	<li>b  
// <ul>  
// 	<li>c</li>  
// 	<li>d</li>  
// </ul>  
// </li>  
// 	<li>e  
// <ul>  
// 	<li>f</li>  
// 	<li>g</li>  
// </ul>  
// </li>  
// </ul>  
```  




--------


##### array2table()

`array2table( $array, [$options] )`

Creates a simple html table from a 2D array. Useful for displaying simple database results. Note:  
  
- if the sub-array key name begins with `file_`, it will auto link to the file in `$options['upload_dir']` directory. (This field should only save the file name)  
- it will replace underscores "_" to spaces by default for table headers (th)  

**Parameters**

- array **$array**
  - input array (2 dimensional)
- [array **$options** = '']
  - optional properties listed below:

**Properties**

- [string **$id** = '']
  - table id
- [string **$class** = '']
  - table class
- [string **$upload_dir** = `$config['upload_dir']`]
  - Directory name for *file* fields
- [array **$search** = '']
  - Search for this in column header (th) and replace with that in $replace
- [array **$replace** = '']
  - Replace with this, must match the item count in $search
- [bool **$counting** = FALSE]
  - If *TRUE*, add a auto counting first column starting from 1

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
$data = tsv2array('  
id	name    title  
john    John Doe    Mr.  
jane    Jane Doe    Ms.  
');  
  
echo array2table($data, array('counting' => true));  
  
// prints:  
// <table class="table table-condensed table-hover">  
// 	<thead>  
// 		<tr>  
// 			<th>#</th>  
// 			<th>Id</th>  
// 			<th>Name</th>  
// 			<th>Title</th>  
// 		</tr>  
// 		</thead>  
// 	<tbody>  
// 		<tr>  
// 			<td>1</td>  
// 			<td>john</td>  
// 			<td>John Doe</td>  
// 			<td>Mr.</td>  
// 		</tr>  
// 		<tr>  
// 			<td>2</td>  
// 			<td>jane</td>  
// 			<td>Jane Doe</td>  
// 			<td>Ms.</td>  
// 		</tr>  
// 	</tbody>  
// </table>  
```  

**Changelog**

- 2017.10.13  
	- fixed an issue where auto counting is not correct  




--------


##### array_extract()

`array_extract( $array, $key )`

Extract an item from an array and remove from original array. Consider it [`array_shift()`](http://php.net/manual/function.array-shift.php) but by a specified key.  

**Parameters**

- array **$array**
  - source array; **array is passed by reference**
- string **$key**
  - item key to be extracted

**Return Values**

- *Array* - extracted array; Also note that the item in the input array is removed

**Examples**

  
```php  
$data = array(  
	'user1' => array( ... ),  
	'user2' => array( ... ),  
	...  
	'user11' => array( ... ),  
	'user12' => array( ... ),  
	'user13' => array( ... ),  
	...  
);  
$result = array_extract( $data, 'user12' );  
  
// $result = array( 'user12' -> array( ... ) );  
// $data = array(  
// 	'user1' => array( ... ),  
// 	'user2' => array( ... ),  
// 	...  
// 	'user11' => array( ... ),  
// 	'user13' => array( ... ),  
// 	...  
// );  
```  




--------


##### array_group_by()

`array_group_by( $array, $group_by_key, [$keep_array_item] )`

Group array data by one of the keys and make it one more dimension deeper  

**Parameters**

- array **$array**
  - input array
- string **$group_by_key**
  - the key of the input array item to be grouped
- [bool **$keep_array_item** = TRUE]
  - if *TRUE*, the value of the key array item will be kept in the deeper level array; 
  -  if *FALSE*, the value of the key array item will be removed otherwise.

**Return Values**

- *Array* - (2 dimensional array)

**Examples**

  
```php  
$data = array(  
	array( 'id' => 1, 'group' => 'admin' ),  
	array( 'id' => 2, 'group' => 'user' ),  
	array( 'id' => 3, 'group' => 'admin' ),  
);  
$data = array_group_by( $data, 'group' );  
print_r( $data );  
  
// prints:  
// Array  
// (  
//     [admin] => Array  
//         (  
//             [0] => Array  
//                 (  
//                     [id] => 1  
//                     [group] => admin  
//                 )  
//             [1] => Array  
//                  (  
//                     [id] => 3  
//                     [group] => admin  
//                  )  
//         )  
//     [user] => Array  
//         (  
//             [0] => Array  
//                 (  
//                     [id] => 2  
//                     [group] => user  
//                 )  
//         )  
// )  
```  
In the example above, if $keep_array_item is set to FALSE, the last level array items with key "group" will be removed.  




--------


##### array_multi_search()

`array_multi_search( $array, $pairs )`

Search multi-dimentional array for the `key=>value` search pairs. All the search pairs must be matched. You can consider it a "AND" query for multiple pairs.  

**Parameters**

- array **$array**
  - input array to be searched
- array **$pairs**
  - array of `search_key=>search_value` pairs

**Return Values**

- *Array* - of search results

**Examples**

  
```php  
$data = tsv2array( ... );  
$results1 = array_multi_search( $data, array( 'id' => '123' ) );  
$results2 = array_multi_search( $data, array( 'surname' => 'Chan', 'firstname' => 'Peter' ) );  
```  




--------


##### array_order_by()

`array_order_by( $array, $col1, [$col1_order], ... )`

Sort database-style results  

**Parameters**

- array **$array**
  - input array to be sorted
- string **$col1**
  - sort by this column name
- [enum **$col1_order** = SORT_ASC]
  - PHP sorting order flag (i.e. `SORT_ASC` / `SORT_DESC` )
-  **...**
  - $col1 and $col1_corder can be repeated for additional sort criteria.

**Return Values**

- *Array* - sorted

**Examples**

  
```php  
$data = array(   
	array( 'user_id' => '132' ),   
	array( 'user_id' => '66'),  
	...  
);  
$data = array_order_by( $data, 'user_id' , SORT_ASC );  
```  




--------


##### array_sort_by_array()

`array_sort_by_array( $array, $order_array, $key_to_order )`

Sort an array by the order of items in the second array. If there are some values in the first array that are not in the order array, those array items will be appended after the ordered items.  

**Parameters**

- array **$array**
  - input array to be sorted
- array **$order_array**
  - the array of items in order; can also use csv.
- string **$key_to_order**
  - the key in the first array to be ordered

**Return Values**

- *Array* - sorted in custom order

**Examples**

  
```php  
$data = array(  
	'user1' => array( 'user_type' =>¡@'admin' ),  
	'user2' => array( 'user_type' =>¡@'user' ),  
	'user3' => array( 'user_type' =>¡@'editor' ),  
);  
$order = array( 'admin', 'editor', 'user' );  
$data = array_sort_by_array( $data, $order, 'user_type' );  
// the $data array will be sorted to this order: user1, user3, user2  
```  




--------


##### array_to_1d()

`array_to_1d( $arr )`

Flattens multi-dimentional array into one-dimentional, while keeping the values only (array keys are lost).  

**Parameters**

- array **$arr**
  - input array to be flattened

**Return Values**

- *Array (1 Dimensional)*

**Examples**

  
```php  
$example = array( 'a' => '1', 'b' => array( 'c' => '2', 'd' => '3' ) );  
printr( array_to_1d( $example ) );  
  
// prints:  
// Array  
// (  
//     [0] => 1  
//     [1] => 2  
//     [2] => 3  
// )  
```  

**Changelog**

- 2017-10-13  
	- named changed from `array_to1d()` inline with other functions.  
	- `array_to1d()` is now an alias, subject to removal.  
- Added on: 2016-02-05  




--------


##### array_trim()

`array_trim( $array )`

Trim all items in the array recursively for space characters.  
  
Note: this will not remove empty array items. Use [`array_filter()`](http://php.net/manual/function.array-filter.php) if you need to remove empty array items.  

**Parameters**

- array **$array**
  - Input array

**Return Values**

- *Array* - with items trimmed

**Examples**

  
```php  
$arr2 = array_trim( $arr );  
```  

**Changelog**

- 2015-12-30  
	- Fixed a bug that child array are not trimmed.  




--------


##### array_value_search()

`array_value_search( $array, $needle )`

Search the array for a value (irrespective to keys).  

**Parameters**

- array **$array**
  - input array to be searched
- string **$needle**
  - value to be searched

**Return Values**

- *Array* - search results. The orginal array key is retained.

**Examples**

  
```php  
$data = tsv2array( ... );  
$results = array_value_search( $data, 'Peter' );  
```  




--------




--------


### authen

The Authentication and Security helper contains functions on this area. However, note that this is not a complete package so you are required to write your own routine with these helpers.



--------


#### reCAPTCHA

These functions resembles the basic usage of reCAPTCHA. Please setup the site key and secure key in `settings.php`.



--------


##### recaptcha_js()

`recaptcha_js(  )`

Return the JavaScript line to be included to use reCAPTCHA. You need to call this to include the script in html `<head>` section.  

**Parameters**

- *nil*

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo recaptcha_js();  
```  




--------


##### recaptcha_verified()

`recaptcha_verified(  )`

Verify the recaptcha submitted in the recaptcha widget. Note that it does not accept any parameters as this will read the POST data for the recaptcha input and settings for secret key.  

**Parameters**

- *nil*

**Return Values**

- *TRUE* - if reCAPTCHA input is valid
- *FALSE* - otherwise
- *NULL* - if either the recaptcha input OR secret key is missing

**Examples**

  
```php  
if( recaptcha_verified() ) { ... }   
```  




--------


##### recaptcha_widget()

`recaptcha_widget( [$size], [$tab_index] )`

Generate a recaptcha div with the site key.  

**Parameters**

- [enum **$size** = normal]
  - valid value: *normal* / *compact*; Note: "compact" size is more like vertical mode
- [int **$tab_index**]
  - tab index value if you are setting tab index for other inputs

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo recaptcha_widget();  
echo recaptcha_widget( 'compact' );  
```  




--------


#### User Login
##### check_ip()

`check_ip( $ips, ... )`

Check if the client's IP address matches with **any** IP addresses specified.  
  
To make it error prone, this function accept *any* numbers of arguments, as well as arguments in array or csv.  
  
An IP address can be either:  
  
1. a full IPv4 address (**xxx.xxx.xxx.xxx**) (you can use an asterisk to substitute any part of the IP as a wildcard) (e.g. 192.\*.1.\*)  
2. predefined keywords for localhost ("**LOCAL**" or "**LOCALHOST**")  

**Parameters**

- array **$ips, ...**
  - List of valid IP addresses, can also be in csv, or even as separate arguments.

**Return Values**

- *TRUE* - if matched *any* of the IP in the arguments
- *FALSE* - otherwise

**Examples**

  
```php  
if( check_ip( '202.168.*.*', LOCAL ) ) ...  
```  




--------


##### user_ip()

`user_ip(  )`

Get user's IP address. Basically an alias to `$_SERVER['REMOTE_ADDR']`, but more reliable.  

**Parameters**

- *nil*

**Return Values**

- *String* - of IP Address

**Examples**

  
```php  
// To prep data to be saved and record user's IP  
$data_to_be_saved[1]['ip'] = user_ip();  
```  




--------


##### valid_user()

`valid_user( $name_to_check, [$type] )`

Check if the user name is a valid user. List of user names can be set in `settings.php`.    
Normally this will work together with other authentication service for checking password, and this function to check if the user is eligible to use this application.  

**Parameters**

- string **$name_to_check**
  - user name to be checked
- [enum **$type** = 'users']
  - valid values: users / admin; You can also add your custom user types in `settings.php`. User type to be checked against

**Return Values**

- *TRUE* - if the name is on list
- *FALSE* - otherwise

**Examples**

  
```php  
if( valid_user( $username ) ) { ... }		// check against list of normal users  
if( valid_user( $username, 'admin' ) { ... }	// check against list of admin users  
```  




--------




--------


### bs_components

The Bootstrap Components helper contains various function to make proper html code for elements in B style. Since B's styles and components have its own pre-defined code structure, this helper simplifies the need of repeating the same codes again.

The list of functions is added when it is used so do not expect a less-used component will have a function here. All functions in this helper return HTML codes to be printed by yourself.



--------


##### bs_a_btn()

`bs_a_btn( [$href], [$text], [$title], [$size], [$contextual], [$attributes] )`

Create a link in button style which prep url automatically. In essence a shorthand to call [`bs_btn()`](#bs_btn) for links.  

**Parameters**

- [string **$href** = '#nogo']
  - The url to be linked. If is does not have a scheme specified, it assumes internal links and prepend with [`site_url()`](#site_url).
- [string **$text** = '']
  - The visible text on the button / link
- [string **$title** = '']
  - anchor title (hover popup text)
- [enum **$size** = '']
  - Button sizes: xs / sm / lg; ''(blank) or 'md' is the default size - md is a pseudo choice as default size does not need to specify originally.
- [enum **$contextual** = 'default']
  - Button contextual classes. You may also specify ''(blank) for default 
  -  (default / primary / success / info / warning / danger / link)
- [array **$attributes** = array()]
  - other tag attributes

**Return Values**

- *String* - of html code

**Examples**

  
```php  
echo bs_a_btn( 'edit/' . $id , 'Edit' );		// a button  
echo bs_a_btn( 'edit/' . $id , 'Edit', 'xs' , 'link' );		// a link (button style)  
```  

**Changelog**

- 2016-02-12  
	- if $href begins with a "#" character, it will not be prep'd with `site_url()`  
- 2016-02-01  
	- Added $size and $contextual.  




--------


##### bs_accordion()

`bs_accordion( $, $items, [$attributes], [$contextual], [$expanded] )`

Make accordion using panels and collapse.  

**Parameters**

-  **$**

- array **$items**
  - items array. See usage for format.
- [array **$attributes** = array()]
  - panel group attributes
- [enum **$contextual** = 'default']
  - panels' contextual classes ( primary / success / info / warning / danger )
- [mixed **$expanded** = FALSE]
  - FALSE = all collapsed; TRUE = 1st item expanded; string = "header" values of panel to be expanded, can be csv or array

**Return Values**

- *Void*

**Examples**

  
```php  
// $items format  
// Type 1 - for simple header and content pairs  
$items1 = array (  
	'Group 1' => 'some content...',  
	'Group 2' => 'some content...',  
);  
  
// Type 2 - for panels with footer  
$items2 = array(  
	array(  
		'header'	=> 'Group 1',  
		'content'	=> 'some content...',  
		'footer'	=> 'footer text',  
	),  
	array(  
		...  
	),  
);  
  
// first panel will be expanded on load  
echo bs_accordion( $items1, '' , '' , TRUE );  
  
// all panel will be collapsed on load  
echo bs_accordion( $items1 );  
  
// panel with header "Group 3" will be expanded  
echo bs_accordion( $items2 , '', '' , 'Group 3' );  
  
```  




--------


##### bs_alert()

`bs_alert( [$head], [$body], [$contextual], [$dismissible], [$attributes] )`

Generate an alert block  

**Parameters**

- [string **$head** = '']
  - header in bold (Note: separate with $body with a space only)
- [string **$body** = '']
  - message text
- [enum **$contextual** = 'info']
  - contextual classes ( info / success / warning / danger)
- [bool **$dismissible** = FALSE]
  - add a close button if *TRUE*
- [array **$attributes** = array()]
  - html tag attributes in `key => value` pairs to be printed in the `div` element of the alert

**Return Values**

- *String* - HTML code

**Examples**

  
```php  
echo bs_alert( 'Success!', 'Data saved successfully', 'success', TRUE );  
```  




--------


##### bs_btn()

`bs_btn( [$text], [$element], [$size], [$contextual], [$attributes] )`

Create a button or tag with `.btn` class  

**Parameters**

- [string **$text** = '']
  - The visible text on the button
- [enum **$element** = 'button']
  - Element to be used: 
  -  *button* 
  -  *a* / *anchor* (alias to a) - a class="btn" 
  -  *input* - input type=button 
  -  *submit* - input type=submit
- [enum **$size** = '']
  - Button sizes: xs / sm / lg; ''(blank) or 'md' is the default size - md is a pseudo choice as default size does not need to specify originally.
- [enum **$contextual** = 'default']
  - Button contextual classes. You may also specify ''(blank) for default 
  -  (default / primary / success / info / warning / danger / link)
- [array **$attributes** = array()]
  - other tag attributes

**Return Values**

- *String* - of html code

**Examples**

  
```php  
echo bs_btn( 'Edit' );  
```  

**Changelog**

- 2016-01-22  
	- Added alias `bs_button()`.  
	- Removed `type="submit"` for button element.  
	- Added $size and $contextual.  
	- Rewritten to make use of `html()`.  




--------


##### bs_callout()

`bs_callout( [$title], [$content], [$contextual], [$attributes] )`

Create a callout box.  

**Parameters**

- [string **$title** = '']
  - title of the box
- [string **$content** = '']
  - content in the box
- [enum **$contextual** = 'default']
  - contextual classes ( default / primary / info / danger / warning / success )
- [array **$attributes** = array()]
  - tag attributes (on wrapper div)

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo bs_callout( 'Warning' , 'You are not allowed to enter this area.' , 'warning' );  
```  




--------


##### bs_icon()

`bs_icon( $name, [$contextual], [$attributes], [$tag_to_use] )`

Create markup for glyphicon, close button and caret.  

**Parameters**

- enum **$name**
  - *close* - for close icon 
  -  *caret* - for caret 
  -  *valid glyphicon name* - for glyphicons (e.g. asterisk, plus). Refer to [B docs](http://getbootstrap.com/components/#glyphicons).
- [enum **$contextual** = '']
  - text contextual class. Not applicable to "close" and "caret" ( *muted / primary / success / info / warning / danger* )
- [array **$attributes** = array()]
  - other tag attributes
- [string **$tag_to_use** = span]
  - specifiy if you would use another html element (e.g. `i`) to hold the icon.

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo bs_icon( 'remove', 'danger' );  
echo bs_icon( 'close' );  
echo bs_icon( 'caret' );  
```  




--------


##### bs_list_group()

`bs_list_group( $items, [$list_type], [$attributes] )`

Create a list group. Custom list item content is not supported.  

**Parameters**

- array **$items**
  - Items of the list group. See *Examples* for details
- [enum **$list_type** = 'basic']
  - type of list group. ( **basic** / **linked** / **button** ) 
  -  Basic:  `<ul><li>` 
  -  Linked: `<div><a>` 
  -  Button: `<div><button>`
- [array **$attributes** = array()]
  - wrapper div attributes e.g. id, class etc.

**Return Values**

- *String* - of HTML code

**Examples**

  
1. Simple List  
```php  
// this creates a simple list group  
$items1 = array( '1','2','3','4' );  
echo bs_list_group( $items1 );  
  
// prints:  
// <ul class="list-group">  
// 	<li class="list-group-item">1</li>  
// 	<li class="list-group-item">2</li>  
// 	<li class="list-group-item">3</li>  
// 	<li class="list-group-item">4</li>  
// </ul>  
```  
  
2. Linked list  
```  
// make key as the text to be printed, and attributes of the item as the sub array values.  
$items2 = array(  
	'text1' => array( 'class' => 'active' , 'href' => 'http://1.example.com'),  
	'text2' => array( 'class' => 'active' , 'href' => 'http://2.example.com'),  
	// Be reminded to specify "href" for links  
);  
echo bs_list_group( $items2 , 'linked' );  
  
// prints:  
// <div class="list-group">  
// 	<a class="active list-group-item" href="http://1.example.com">text1</a>  
// 	<a class="active list-group-item" href="http://2.example.com">text2</a>  
// </div>  
```  
  
3. Button list  
```  
$items3 = array(  
	'text2' => array( 'type' => 'submit' , 'class' => 'disabled' ),  
	'text3' => array( 'type' => 'submit' , 'class' => 'disabled' ),  
	// Be reminded to specify "type" of buttons ( button / submit / reset)  
	// default type="button" if not set  
	// Also other button attributes if needed (e.g. the class in this example)  
);  
echo bs_list_group( $items3 , 'button' );  
  
// prints:  
// <div class="list-group">  
// 	<button type="submit" class="disabled list-group-item">text2</button>  
// 	<button type="submit" class="disabled list-group-item">text3</button>  
// </div>  
```  
  
4. The other type of `$items` array, for complex "text" content which cannot be put in array key  
```  
$items4 = array(  
	array('text' => 'Complex text that is not suitable to put as array key'),  
	array('text' => html(...), 'href' => ... ),  
);  
```  
  
5. Badges  
```php  
// Simply add "badge" key in the item array:  
$items5a = array(  
	array( 'text' => ... , 'badge' => 'badge_text' ),  
	...  
	);  
);  
  
// for multiple badges, put the badge texts as an sub-array:  
$items5b =  
array(  
	array(  
		'text' => ... ,  
		'badge = >  
		array(  
			'badge_text1',  
			'badge_text2',  
		),  
	),  
);  
```  

**Changelog**

- 2015-01-19  
	- Added support for badge.  




--------


##### bs_panel()

`bs_panel( [$title], [$content], [$footer], [$contextual], [$div_content], [$attributes], [$head_attributes], [$body_attributes] )`

Creates a panel.  

**Parameters**

- [string **$title** = '']
  - Panel heading text. Leave blank for no title
- [string **$content** = '']
  - Panel body text or html
- [string **$footer** = '']
  - Footer text. Leave blank for no footer
- [enum **$contextual** = 'default']
  - Contextual class. ( primary / success / info / warning / danger / default )
- [bool **$div_content** = TRUE]
  - *TRUE* if use `<div class="panel-body">` to wrap content, 
  -  *FALSE* to use custom content html (e.g. wrap with table, list groups); 
  -  Note: no need to add `.panel-body` to tables and list groups
- [array **$attributes** = array()]
  - wrapper div attributes, e.g. id, class, etc.
- [array **$head_attributes** = array()]
  - panel head wrapper div attributes
- [array **$body_attributes** = array()]
  - panel body wrapper div attributes; no effect if $div_content is FALSE.

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo bs_panel( 'Welcome' , html(...) );  
  
// for $content part, you may also use bs_list_group() or table  
echo bs_panel( 'Please select' , bs_list_group( array(...) ) , '' , FALSE );  
```  

**Changelog**

- 2016-02-12  
	- added $head_attributes, $body_attributes to add more flexibility  




--------


##### bs_well()

`bs_well( $html, [$modifier], [$attributes] )`

Create a well to give inset effect.  

**Parameters**

- string **$html**
  - wrap the well to this html code block
- [enum **$modifier** = '']
  - the bs well modifier class ( '' / sm / lg )
- [array **$attributes** = array()]
  - tag attributes

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo bs_well( form_gen_fieldset( $fs1 ) );		// wrap the fieldset in well  
echo bs_well( '<p>Some Text</p>' , 'sm' );		// a small sized well effect  
```  




--------




--------


### bs_form

The Bootstrap Form helper contains a standard use case to help creating forms (in B style) easily. This was developed from an old form helper (deprecated in favour of the use of B framework).

Please study the basics of Bootstrap framework before you can use these helpers properly.



--------


#### Standard Use Case

The helper is developed with the consideration of "fieldsets" with multiple fields in a fieldset. Therefore, instead of manually creating form fields individually, we can make use of an array of settings of the fieldset in tab seperated values (TSV). Consider the following code snippet:

```php
$fs1 = tsv2array('
//1	2	3	4	5	6	7	8	9	10	11
id	label	type	validate	desc	placeholder	options	extra	value	append	prepend
sid	Student ID	text	required,custom[integer]
password	password	password	required
');

$form_type = 'horizontal';
echo form_open( '' , $form_type );
echo form_gen_fieldset( form_set_values( $fs1, $P ), '' , $form_type );
echo form_submit( '' , $form_type );
echo form_fieldset_close();
echo form_close();
```

(Note: the number are here to help counting the tabs)

This code block creates a form with the 2 fields (sid, password), in B's horizontal form style.
The use of TSV minimizes the typing required, although in essence the functions accepts array as input. Therefore, you can also modify the array first before generating the form fields.

For the data to input in the TSV is discussed below. You can reorder the TSV, just to change order the column header in the way you prefer.

Please also refer to [`tsv2array()`](#tsv2array) in **arrays** helper. Also, please read below sections for explanations of each helper functions.

For horizontal form type, you can specify the width of label, e.g. `horizontal-6`. The element width would be the remaining width. Otherwise, for site-wide label width, you can modify the constant `HORIZONTAL_FORM_LABEL_WIDTH` in `config/constants.php`.

Please also note that there is a global form disabled state switch. Please refer to [form_disabled()](#form_disabled) for details. However, you can completely ignore it if you do not need this functionality.



--------


##### 1. id

The unique id and the name of the field.

Note: if you have to specify id and name differently, use [html()](#html) to create your own tag as this is out of the standard use case.



--------


##### 2. label

Text label to be displayed. For radio and checkbox, this will be the group label (not the label next to the select option).

If no label tag should be created, put **FALSE** as value.



--------


##### 3. type

The following describes the form element types available in this helper:

type | Description
--- | ---
hidden | a hidden field. *label* attribute has no effect
select | Standard select list make use of `<option>` tags.
select-radio | List of options in radio buttons. Only 1 option can be chosen.
select-checkbox | List of options in checkboxes. Multiple options can be made.
static | text wrapped in `<p>` tag. Specify the text in *value* attribute. The text is aligned on the element side. Note: *label* does still prints and you still need to give an unique *id* although this is not printed.
html | plain html code to output. Specify the code in *label* or *value* attribute. If both attributes are specified, *label* takes precedence and the other discards.
textarea | Standard textarea. Default *rows* = 2. Specify *rows* value in *options* (this is a special case)
checkbox | Single checkbox. Use *desc* attributes to specify text next to the checkbox.
file| Standard file upload field
text | Standard text field
All other valid HTML5 input types | Those input types must begin with `<input`.

See [7. options](#7-options) section below for select options.

Note: There is no type for a single radio option as this is not helpful at all.



--------


##### 4. validate

Add a validation class. In this framework we make use of the [jquery-validationEngine plugin](http://posabsolute.github.io/jQuery-Validation-Engine/ "Complete docs here").

Separate validation rules with comma (,).

Some common validation rules are listed below:

Rule [Keyword / E.g.] | Description
--- | ---
required | A required field
min[0.1] / max[99] | Specify min / max value of the field (value)
minSize[1] / maxSize[200] | Specify min / max character length
custom[email] | valid email address (e.g. test@example.com)
custom[phone] | valid phone (e.g. 30561309, 6543-1234, +58 295416 7216)
custom[url] | valid url address (e.g. http://..., https://..., ftp://...)
custom[date] | valid date (YYYY-MM-DD)
custom[number] | floating points (with optional sign) (e.g. -143.22, .77 , +234.23)
custom[integer] | integers (with optional sign) (e.g. -635, +2201, 738)
ipv4 | An IP (v4) address (e.g. 127.0.0.1)

Note: Multiple "custom" rules are separated with commas with square brackets. e.g. custom[phone,integer]



--------


##### 5. desc

Descriptive text show next to (or under - depends on form type) the field.



--------


##### 6. placeholder

Placeholder text show inside the field, when it is empty.



--------


##### 7. options

This attribute has effect only on the 3 select types. (Special: *options* can also specify the *rows* attribute of *textarea*, just put an integer as options for textarea.)

Options is an array with `value => description` pair in essence. However, to work nicely with TSV, you may also use `value1||desc1, value2||desc2` syntax.

- value: the value to be captured in data
- desc: the text to be shown to user on the select list / checkboxes / radio.



--------


###### a. select options


```php
add_options_set( 'options1', array(
	'1'=>'One' , '2'=>'Two',
) );
$data = tsv2array('
// 1 2 ... 7
id	label ... options
sid	Year ... $options1
');
```

There is a pre-defined `$ws_select_options` variable. You can add item in this array using [`add_options_set()`](#add_options_set) and then specify `$options1` as the option value.

To add a select option easily, you can create the options array first and then use `add_options_set()`. This is also good for those selects with same options set

Two commonly used options has been pre-defined:

1. status (same value&label: Active / Inactive / Deleted )
2. bool (value=>label: Y=>Yes / N=>No )





--------


###### b. serialized  json encoded array

The options can be specified using the `serialize()` or `json_encode()`functions. Either one is fine and the system will detect.

```php
$options1 = array('1'=>'One' , '2'=>'Two');
) ) );
$data = tsv2array('
// 1 2 ... 7
id	label ... options
sid	Year ... ' . serialize( $options1 ) . ' ...
num	Number ... ' . json_encoded( $options1 ) . '...
');
```



--------


###### c. value-desc pair

Specify in the TSV with pre-defined separator: "`||`" (two vertical bar, or <kbd>shift-\</kbd>). This is useful for simple lists.

On the other hand, for a even more simpler list (the value and desc is the same), simply put csv there.

```php
$data = tsv2array('
// 1 2 ... 7
id	label ... options
year	Year ... 1||One,2||Two ...
age	Age	..	14,15,16,17,18
');
```




--------


##### 8. extra

Any extra stuff to put *in* the field's tag. This is not filtered (except we will `trim()` and then add one space in front to the string). You can even put JavaScript call here, examples:  
`disabled`
`onclick="somescript();"`  



--------


##### 9. value

Value (initial value) of the field. For checkbox and radio the one with the value will be set checked.



--------


##### 10&11. append & prepend

Any text or code to append or prepend to the field, using [B's input group addon functionality](http://getbootstrap.com/components/#input-groups-basic).



--------


#### User Functions
##### form_open()

`form_open( [$action], [$type], [$id], [$class], [$multipart], [$extra], [$text], [$method] )`

This makes proper form open tag. It also accept an array as the first argument that include part or all of the arguments as array keys. E.g. `form_open( array( 'id'=> ... , 'action' => ... )`  

**Parameters**

- [string **$action** = '']
  - form handler. If empty, will point back to current page. `htmlentities( $_SERVER['REQUEST_URI'] )`
- [string **$type** = '']
  - Bootstrap form type ( '' / horizontal / inline)
- [string **$id** = '']
  - form id
- [string **$class** = '']
  - class of the form
- [bool **$multipart** = FALSE]
  - TRUE to open multipart form (e.g. for file upload)
- [string **$extra** = '']
  - Anything to add before the form open tag is ended (`<form action="" ... extra_stuff here>`)
- [string **$text** = '']
  - html code or text to add immediately after the open tag is ended `<form>$text...`
- [enum **$method** = 'post']
  - HTTP method ( GET / POST )

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo form_open();		// a simple open tag that points to itself as handler  
  
echo form_open('submit.php','horizontal','form1','capture',TRUE,'disabled');  
// prints:  
// <form action="submit.php" class="form-horizontal capture" id="form1" enctype="multipart/form-data" disabled>  
```  




--------


##### form_close()

`form_close( [$text] )`

Produces a closing `</form>` tag. The only advantage to use this function is it permits you to pass data to it which will be added directly below the tag and you do not have to close php blocks.  

**Parameters**

- [string **$text** = '']
  - html code or text to add immediately after the close tag is ended `</form>\n$text...`

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo form_close( '</div></div>');  
// prints  
// </form>  
// </div></div>  
```  




--------


##### form_gen_fieldset()

`form_gen_fieldset( $fields, [$legend], [$form_type], [$attributes] )`

Generate a fieldset with form fields in Bootstrap style.  
  
In essence, this function is simply a combination call of `form_fieldset_open()` and `form_gen_elements()`. However, to streamline the use case of the form helper, this function is essential.  
  
Note: All elements will have an auto-id generated. For instance, if the id of the field is *field1*, then the `<label>` will have an id *label_field1*, the field element (`<input>`,`<textarea>`, etc.) will have id *field1*. For select options, an auto number will be added, e.g. *field1-1* (starting from 1). There will be an auto id for input group div as well.  

**Parameters**

- array/string **$fields**
  - data of the fieldset. See [Standard User Case](#Standard-Use-Case) section.
- [string/bool **$legend** = '']
  - Text to show as the caption of the fieldset. Specify *FALSE* if no need to create the fieldset tag: `<fieldset>`.
- [enum **$form_type** = '']
  - Bootstrap form type ( '' / horizontal / inline ) 
  -  If $form_type is *horizontal*, you can also specify the label width e.g. *horizontal-4*
- [array **$attributes** = array()]
  - attributes add to fieldset open tag (e.g. id, class, ...)

**Return Values**

- *String* - html code of the whole fieldset (or fields)

**Examples**

  
```php  
$fs1 = tsv2array('  
...  
');  
echo form_gen_fieldset( $fs1, '' , $form_type );  
```  




--------


##### form_fieldset_open()

`form_fieldset_open( [$legend], [$attributes] )`

Create fieldset open tag and legend tag. Normally you will use [form_gen_fieldset()](#form_gen_fieldset) instead.  

**Parameters**

- [string/bool **$legend** = '']
  - Text to show as the caption of the fieldset. No `<legend>` tag will be created if it is an empty string
- [array **$attributes** = array()]
  - Attributes to print in `<fieldset>` tag, e.g. id, class, etc.

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo form_fieldset_open();  
// prints: <fieldset>  
  
echo form_fieldset_open('Please Sign In:', array('id'=>'fs1'));  
// prints: <fieldset id="fs1"><legend>Please Sign In:</legend>  
```  




--------


##### form_fieldset_close()

`form_fieldset_close( [$text] )`

Produces a closing `</fieldset>` tag. The only advantage to use this function is it permits you to pass data to it which will be added directly below the tag and you do not have to close php blocks.  

**Parameters**

- [string **$text** = '']
  - html code or text to add immediately after the close tag is ended `</fieldset>\n$text...`

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo form_fieldset_close( '</div></div>');  
// prints  
// </fieldset>  
// </div></div>  
```  




--------


##### form_submit()

`form_submit( [$text], [$form_type], [$contextual], [$id], [$class], [$extra] )`

Make a submit button.  

**Parameters**

- [string **$text** = 'Submit']
  - Button text
- [enum **$form_type** = '']
  - Bootstrap form type ( '' / horizontal / inline ) 
  -  If $form_type is *horizontal*, you can also specify the label width e.g. *horizontal-4*
- [enum **$contextual** = 'primary']
  - contextual classes
- [string **$id** = '']
  - id of the button
- [string **$class** = '']
  - class of the button
- [string **$extra** = '']
  - extra attributes / text to be included in the tag.

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo form_submit();  
// prints: <button type="submit" class="btn btn-primary">Submit</button>  
  
echo form_submit('','horizontal');  
// prints:  
//	<div class="form-group">  
//		<div class="col-sm-offset-3 col-sm-9">  
//			<button type="submit" class="btn btn-primary">Submit</button>  
//		</div>  
//	</div>  
// note: default constant value is 3  
```  

**Changelog**

- 2016-02-03  
	- Added $contextual; removed $class default.  




--------


##### form_submitted()

`form_submitted(  )`

Check if form is submitted.  

**Parameters**

- *nil*

**Return Values**

- *TRUE* - if form is submitted
- *FALSE* - otherwise

**Examples**

  
```php  
if( form_submitted() ) { // ... }  
```  




--------


##### form_set_values()

`form_set_values( [$fields ], [$data ] )`

This set the `value` attribute in `$fields`, if the key exists in `$data`. This is useful for repopulating form data. Normally you will use together with [form_gen_fieldset()](#form_gen_fieldset).  
  
Consider the tab-separated values you will use. Normally the "value" column is empty. Now this function (re)popoluate the value column in the array with values from the form or from database.  

**Parameters**

- [array  **$fields ** =  ]
  - fields data
- [array  **$data ** =  ]
  - array to search for field value

**Return Values**

- *Array* - prep'd $fields with values from $data

**Examples**

  
```php  
echo form_gen_fieldset( form_set_values( $fs1, $P ) );  
```  




--------


##### form_set_value()

`form_set_value( $field, $data )`

Similar to [form_set_values()](#form_set_values). However this only set value for a single form field. Normally you will not calling this manually and you should simply specify TRUE to the last argument when using [form_element()](#form_element).  

**Parameters**

- array **$field**
  - field array (single field)
- array **$data**
  - values array (e.g. data from post or database)

**Return Values**

- *Array*

**Examples**

  
*No examples for general uses are available at the moment*  

**Changelog**

- Added on: 2016-02-05  




--------


##### form_disabled()

`form_disabled( [$value] )`

This function has two uses (see examples):  
1. Making all form elements in disabled state (or not).  
	- Note: This is a global switch. Meaning that you can change this settings once and change for all fields.  
	- Default disabled state is FALSE. (i.e. you can completely ignore this function if you do not need this.)  
2. Returns the string `disabled` if form is in "disabled" state. (this use is designed for form field helper functions to set the disabled state.)  

**Parameters**

- [bool **$value** = '']
  - Set if the form should be disabled. 
  -  If the value is empty, it returns the string `disabled` if form is in disabled state.

**Return Values**

- *Void* - if setting disabled state (use 1)
- *String/Null* - (use 2)

**Examples**

  
```php  
// for use 1:  
form_disabled( TRUE );		// init  
if( time_started() AND ! time_ended() )  
	form_disabled( FALSE );  
```  

**Changelog**

- Added on: 2016-02-01  




--------


##### form_element()

`form_element( $type, [$form_type], [$name], [$label], [$value], [$options], [$set_value] )`

Creates a single form element  

**Parameters**

- enum **$type**
  - valid form helper input types (see Standard Use Case > [3. type](#3-type))
- [enum **$form_type** = '']
  - Bootstrap form type ( '' / horizontal / inline ) 
  -  If $form_type is *horizontal*, you can also specify the label width e.g. *horizontal-4*
- [string **$name** = '']
  - name & id attributes of the field
- [mixed| '' **$label** = label text. If no label tag should be created, put `FALSE`]

- [string **$value** = '']
  - value attribute
- [array **$options** = array()]
  - other form helper input attributes (name, id, label, type, value, validate, desc, placeholder, options, extra, append, prepend)
- [mixed **$set_value** = FALSE]
  - if want to set value for the element with [form_set_value()](#form_set_value), supply the $data array; FALSE (default) as not using this feature.

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo form_element( 'text' , '' , 'login','Login Name');  
// prints:  
// <div id="form-group_login" class="form-group">  
// 	<label for="login" id="label_login">Login Name</label>  
// 	<input name="login" id="login" class="form-control" type="text">  
// </div>  
```  

**Changelog**

- 2016-02-02  
	- Fixed an issue if $options is not an array. (You can now use `''` if not defined)  




--------


##### add_options_set()

`add_options_set( $name, $options )`

Add a select options set to be used by select types.  

**Parameters**

- string **$name**
  - a name to refer to this options set
- string/array **$options**
  - delimited values or array of values of select options. See Standard Use Case > [7. Options](#7-options)

**Return Values**

- *Void*

**Examples**

  
```php  
add_options_set( 'option1', array(...) );  
```  

**Changelog**

- 2016-01-21  
	- Name changed from `add_select_options()` for clarity. Also changed the way it works.  




--------


##### get_options_set()

`get_options_set( [$option_set], [$no_result], [$fix_numeric_array] )`

Get the select options set (which was added by [add_options_set()](#add_options_set)). Note: the options set are use by [form_gen_fieldset()](#form_gen_fieldset) automatically and rarely you will need to use this manually.  

**Parameters**

- [string **$option_set** = '']
  - name of option set to retrieve. If blank, all options sets will be returned as multi-dimentional array
- [mixed **$no_result** = FALSE]
  - value to return if the option set is not found
- [bool **$fix_numeric_array** = TRUE]
  - if prep the options set to make numeric array to return meaningful values in select types. That is, if your array keys are only numbers, you will get the value of the array item instead. (For associative arrays, you get the array keys instead.)

**Return Values**

- *Array*

**Examples**

  
```php  
if( get_options_set( 'option_set_1' ) )  
{  
	...  
}  
```  

**Changelog**

- 2016-02-12  
	- Renamed from `get_select_option()` for clarity, which is now remained as an alias for backward compatibility  




--------


##### add_option_html()

`add_option_html( $option_set_name, $option_id, $html )`

Add html code to a select option in an option set. This function is to give more flexibility as originally you cannot modify select options easily. For examples, if you have some special html code need to add to a specific option only, this will be helpful.  

**Parameters**

- string **$option_set_name**
  - option set name
- string **$option_id**
  - id (array key) of the option in the set
- string **$html**
  - html code to add for the option

**Return Values**

- *Void*

**Examples**

  
```php  
add_option_html( 'bool' , 'Y' , '<p>Please think twice before your choose yes.</p>');  
```  

**Changelog**

- Added on: 2016-02-05  




--------


##### get_option_html()

`get_option_html( $option_set_name, $option_id )`

Get html to append for an option. This is called automatically when using the form helper. Normally you will not be calling this manually unless you are writing your own helper function.  

**Parameters**

- string **$option_set_name**
  - option set name
- string **$option_id**
  - id of the option in the set

**Return Values**

- *String* - if the option set and option id is found
- *FALSE* - otherwise

**Examples**

  
```php  
echo get_option_html( 'bool' , 'Y');  
```  

**Changelog**

- Added on: 2016-02-05  




--------


#### Internal Functions

A brief description and note on the "internal" functions that is called by other user functions in this helper.

For details, please study the source code.



--------


##### form_gen_elements()

`form_gen_elements( $fields, $form_type )`

Generate all form elements in fields data. You should be using `form_gen_fieldset()` instead of this function. Calls `_prep_tag()`.  

**Parameters**

-  **$fields**

-  **$form_type**





--------


##### form_prep()

`form_prep( $data )`

Formats text so that it can be safely placed in a form field in the event it has HTML tags.  

**Parameters**

- string/array **$data**





--------


##### _prep_tag()

`_prep_tag( $i, $form_type )`

Create a form field tag in Boostrap style with the tag's specifications. This is core function of the form helper to generate elements.  
TODO: form.inline styles  

**Parameters**

-  **$i**

-  **$form_type**





--------


##### _prep_options()

`_prep_options( $options )`

Prep select options properly  

**Parameters**

-  **$options**





--------


##### _fix_options_values()

`_fix_options_values( $select_options )`

prep options set to make numeric array to return meaningful values in select types  

**Parameters**

-  **$select_options**





--------


##### _print_options()

`_print_options( $tag, $type )`

Print out options properly according to select type  

**Parameters**

-  **$tag**

-  **$type**





--------


##### _print_form_attributes()

`_print_form_attributes( $attributes_to_print, $array_with_value )`

Prepare attributes inside a tag clean and nicely for making form elements in form helper  

**Parameters**

-  **$attributes_to_print**

-  **$array_with_value**





--------




--------


### datafile

The Datafile helper contains functions that assist in working with data files. You will use keep data in text files instead of in database. Useful if you do not have access to databases or if the application is simple.

You can create many "dataset" (data file) for convenience. Please refer to Settings > [Datafile Helper](#datafile-helper).

Note: for ALL functions which has set to use 'default' dataset, you can simply use a blank string `''` to keep using the default if you need to pass other arguments. (By the aid of [empty_defaults()](#empty_defaults).)



--------


##### is_unique_record()

`is_unique_record( $key_field, $value, [$dataset] )`

Check if the record already exist in datafile.  

**Parameters**

- string **$key_field**
  - the field name to be checked against
- string **$value**
  - the value of the record to be checked
- [string **$dataset** = 'default']
  - the data file setting to be used. Defined in `settings.php`

**Return Values**

- *TRUE* - if the record is not found (i.e. unique)
- *FALSE* - otherwise (i.e. found in data)

**Examples**

  
```php  
if ( is_unique_record( 'id' , '12345' ) { ... } else { ... }  
```  




--------


##### save_uploaded_file()

`save_uploaded_file( $field_name, [$new_file_name], [$upload_dir], [$allowed_size], [$allowed_exts], [$allowed_types] )`

Save the uploaded file (from form) to the upload directory.  

**Parameters**

- string **$field_name**
  - the form field name of the file
- [string **$new_file_name** = '']
  - Specify new file name if needs to be changed 
  -  BLANK to keep original file name.
- [string **$upload_dir** = 'upload']
  - Save file to this directory 
  -  Relative to application root OR you can specify an absolute path. 
  -  Note: the directory must be created and writable by the apache user 
  -  *if not specified, will defaults to `$config['upload_dir']`*
- [int **$allowed_size** = '']
  - if specified, check the file against this size limit; *if not specified, will defaults to `$config['allowed_size']`*
- [mixed **$allowed_exts** = '']
  - if specified, check the file if it is of one of these file extensions 
  -  an array or csv of extensions 
  -  *if not specified, will defaults to `$config['allowed_exts']`*
- [mixed **$allowed_types** = '']
  - if specified, check the file if it is of this mime type 
  -  an array or csv of mime types 
  -  *if not specified, will defaults to `$config['allowed_types']`*

**Return Values**

- *TRUE* - if the file is successfully saved to the destination directory.
- *FALS* - if the file is FAILED to be saved (but passes the checks). Possible reason is destination directory permissions.
- *Array* - of checking result if there are some errors with the following keys (values in boolean): <br> "size" - file size is within $allowed_size <br> "ext" - file extension is one of the allowed <br> "type" - MIME type is one of the allowed <br> "path_length" - if the file path is too lon
- *NULL* - if the file size is 0 (zero);

**Examples**

  
```php  
$result = save_uploaded_file( 'file_cv' , date('Ymd').'-'.$P['name'].pdf , 2*1024*1024, 'pdf,txt,docx' , 'application/pdf,text/plain,application/msword');  
  
// Note to check against TRUE rather than NOT FALSE, as array of checks is one of the possible return  
if( $result !== TRUE )  
{  
	var_dump( $result ).  
}  
else  
{  
	echo "File successfully uploaded!}  
}  
```  

**Changelog**

- 2016-02-05  
	- renamed from `save_file()` for clarity. Rewritten for its major flaws in original version.  




--------


##### get_data()

`get_data( [$dataset], [$key_field] )`

Get all records from data file as an array, with the first row as array keys.  
  
This is *a helper of helpers*. That is you can achieve the same result by using together with `[open_datafile()](#open_datafile)`, `[array_header_to_keys()](#array_header_to_keys)`, `[make_data_assoc()](#make_data_assoc)`.  

**Parameters**

- [string **$dataset** = 'default']
  - the dataset to be used which defined in `settings.php`
- [string **$key_field** = FALSE]
  - key field to make the data array to be an associative array. *FALSE* (default) to keep it numeric.

**Return Values**

- *Array* - of data retrieved (2-dimensional)
- *FALSE* - if the dataset does not exist

**Examples**

  
```php  
$data = get_data();  
$data = get_data( 'set1' );  
$data = get_data( 'set2', 'user_id' );  
```  




--------


##### get_active_data()

`get_active_data( [$dataset], [$active_key], [$key_field] )`

An extension to [`get_data()`](#get_data). This returns "active" data only.  
  
The value of "active" field must not be evaluated as *FALSE* or *empty*: i.e. 0, NULL, FALSE, and `''` (blank).  

**Parameters**

- [string **$dataset** = 'default']
  - the dataset to be used which defined in `settings.php`
- [string **$active_key** = 'active']
  - the field to be used to evaluate the record is active or not; Default 'active' is an opinionated field name.
- [string **$key_field** = FALSE]
  - key field to make the data array to be an associative array. *FALSE* (default) to keep it numeric.

**Return Values**

- *Array* - of data retrieved (2-dimensional)
- *FALSE* - if the dataset does not exist

**Examples**

  
```php  
$data = get_active_data( 'set1' );  
$data = get_active_data( 'set2', 'status' , 'user_id' );  
```  




--------


##### add_record()

`add_record( $data, [$dataset], [$audit_fields] )`

Prep data and append a single record to data file.  
  
This function will auto *remove* `submit` key in the data array, and *add* `uniqid` (unique id), `date_added`, `ip_addr` attributes. Also add header row if this file is empty. This is useful for saving form results.  
  
This is a *helper of helpers*, which calls [`array_header_to_keys()`](#array_header_to_keys), [`prep_for_datafile()`](#prep_for_datafile), and [`save_datafile()`](#save_datafile).  

**Parameters**

- array **$data**
  - Data to be saved, in array of `key => value` pairs
- [string **$dataset** = default]
  - the dataset to be used which defined in `settings.php`
- [bool **$audit_fields** = TRUE]
  - add audit fields (Unique ID, Date Added, IP Address) values to the record. 
  -  "Unique ID" is generated by `uniqid()` 
  -  "Date Added" is the system date and time when the record is added 
  -  "IP Address" is the user's IP address.

**Return Values**

- *Int* - number of bytes saved (evaluates to TRUE)
- *FALSE* - if the dataset does not exist

**Examples**

  
```php  
$data = array( 'id' => '12345' , 'name' => 'John Doe' )  
$result = add_record( $data );		// if default set  
```  

**Changelog**

- 2016-01-21  
	- Changed name from `save_record()` for clarity.  




--------


##### update_record()

`update_record( $key_field, $key_field_value, $new_data, [$dataset], [$backup], [$update_key_field_value] )`

Update ONE record in the dataset.  
  
Note that it will check against the current data columns. If a column does not exist, the value will not be added to the row; On the other hand, if the existing column is not exist in new data, the old values will be kept.  

**Parameters**

- string **$key_field**
  - key field of the data. Can be *FALSE* if intended to use numeric dataset
- string **$key_field_value**
  - key field value of the record to be updated (must be unique, otherwise, will update the first record in the data file)
- array **$new_data**
  - array of data to be updated (`key=>value` pairs)
- [string **$dataset** = 'default']
  - Dataset to use
- [bool **$backup** = FALSE]
  - Backup data file before update. (See [`backup_dataset()`](#backup_dataset))
- [bool **$update_key_field_value** = FALSE]
  - If the key field value should be updated if the key field exists in $new_data. This is handy as you do not need to remove the key field in the data array beforehand

**Return Values**

- *Int* - for successful updates, number of bytes of data file saved after updates
- *FALSE* - if the dataset is not found
- *NULL* - if the record is not found

**Examples**

  
```php  
$data = array( 'name' => 'New Name' );  
$result = update_record( 'user_id' , '0' , $data );  
if( $results ) { ... }  
```  




--------


##### delete_record()

`delete_record( $key_field, $key_field_value, [$dataset], [$backup] )`

Delete ONE record from data file  

**Parameters**

- string **$key_field**
  - key field of the data. Can be *FALSE* if intended to use numeric dataset
- string **$key_field_value**
  - key field value of the record to be updated (must be unique, otherwise, will update the first record in the data file)
- [string **$dataset** = 'default']
  - Dataset to use
- [bool **$backup** = FALSE]
  - Backup data file before deletion. (See [`backup_dataset()`](#backup_dataset))

**Return Values**

- *Int* - for successful deletes, number of bytes of data file saved after deletion
- *TRUE* - for successful deletes, if no more records in the dataset after deletion
- *FALSE* - if the dataset is not found
- *NULL* - if the record is not found

**Examples**

  
```php  
$result = delete_record( 'user_id', '0' );  
if( $result ) { ... }  
```  

**Changelog**

- 2016-01-21  
	- Added $key_field to use.  




--------


##### add_header_from_keys()

`add_header_from_keys( $data )`

Add a header row to the data. Headers are read from the first array item.  
  
Basically a reverse of [array_header_to_keys()](#array_header_to_keys). You may use it before saving data to a dataset. If the sub-item of the input array is not an associative array, does nothing.  

**Parameters**

- array **$data**
  - data to be saved in array of `key => value` pairs

**Return Values**

- *Array*

**Examples**

  
```php  
$data = array(   
	0 => array(   
		'name' => 'John',   
		'id' => '123456' ),  
	1 => ...  
);  
$data = add_header_from_keys( $data );  
  
// $data = array(   
//	0 => array( 'name' , 'id' ),   
//	1 => array( 'John', '123456' ),  
//	2 => ... );  
```  




--------


##### open_datafile()

`open_datafile( $filename, [$delimiter] )`

Open delimited text data file and load content as array.  
  
The function will replace `"` (double quote) to `&quot;`.  
  
For general uses, [get_data()](#get_data) should be a better choice.  

**Parameters**

- string **$filename**
  - file path and name to use
- [string **$delimiter** = "\\t" (tab)]
  - column delimiter

**Return Values**

- *Array* - of data from data file

**Examples**

  
```php  
$data = open_datafile( '/tmp/data.txt' );  
```  




--------


##### save_datafile()

`save_datafile( $filename, [$open_mode], [$delimiter] )`

Prep data array into delimited values and save to file as text data file.  

**Parameters**

- string **$filename**
  - file path and name to use
- [string **$open_mode** = 'a']
  - [php fopen mode](http://php.net/manual/en/function.fopen.php)
- [string **$delimiter** = "\t" (tab)]
  - column delimiter

**Return Values**

- *Int* - Bytes saved
- *FALSE* - if data is not an array

**Examples**

  
```php  
$result = save_datafile( '/tmp/data.txt', 'a+', ',');		// if csv  
```  




--------


##### prep_for_datafile()

`prep_for_datafile( [$data] )`

Filter and format data text so that it is safe for data file saving.  
  
In essence, what it does to each value:  
- trim()  
- newline (`\n` ,`\r`, `\r\n` character) to `<br>`  
- `\t` (tab) to `' '` (single space)  
- `&amp;` to `&`  
- 3rd (or later) level(s) array will be simply flattened by `json_encode()`.  

**Parameters**

- [array **$data** = array()]
  - data to prep

**Return Values**

- *Array* - of data

**Examples**

  
```php  
$result = save_datafile( 'data.txt', prep_for_datafile( $data ) );  
```  




--------


##### dataset()

`dataset( [$set_name] )`

Genearate the real file path of the dataset.  
  
You should not be using this function unless you are writing your own scripts to access the file directly.  

**Parameters**

- [string **$set_name** = 'default']
  - Name of the dataset

**Return Values**

- *String* - if the dataset is set
- *FALSE* - if the dataset is not found

**Examples**

  
```php  
$file = dataset( 'set1' );  
```  




--------


##### backup_dataset()

`backup_dataset( [$set_name] )`

Backup the data file of the dataset in a sub-directory "backup" in `$config_item['data_path']`. The function will try to create the folder if it does not exist. The filename will be appended with current datetime string.  

**Parameters**

- [string **$set_name** = 'default']
  - dataset to backup

**Return Values**

- *String* - filename of the backup copy
- *FALSE* - if dataset is not found
- *NULL* - if the backup directory is not writable

**Examples**

  
```php  
$bakfile = backup_dataset( 'set1' );  
```  




--------


##### make_data_assoc()

`make_data_assoc( $data, [$key_field] )`

Making a 2-dimentional numeric data array associative, with the key field value as the array item key. If the array is already an associative array, does nothing.  

**Parameters**

- array **$data**
  - input data array
- [string **$key_field** = 'uniqid']
  - key field value to be used as array item key

**Return Values**

- *Array - Associative Array*

**Examples**

  
```php  
$data = make_data_assoc( open_datafile( ... ) , 'user_id' );  
```  

**Changelog**

- 2016-02-11  
	- Changed $key_field default from 'id' to 'uniqid'.  




--------




--------


### db

The database helper aids you in connecting and retrieving data from MySQL database, using MySQLi.

This is in essence a library. However this library is NOT very complete. E.g. data escaping is missing in some parts. Need to use with care, but good enough for general use.



--------


#### Database Configuration

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



--------


#### Connecting to Database

The default set is automatically connected once the library is loaded. All functions manipulate the data is for the **active** set. If you have multiple set and you want to switch the active set, please use `db_set_active( 'set2' )`. To change back to the default set, simply `db_set_active()`.



--------


##### db_set_active()

`db_set_active( [$db_config] )`

Change active DB connection set.  

**Parameters**

- [string **$db_config** = 'default']
  - DB configuration set name

**Return Values**

- *TRUE* - if the active set is changed
- *FALSE* - otherwise.

**Examples**

  
```php  
db_set_active( 'set2' );		// set to use set2  
db_set_active();				// set to use the default set  
```  




--------


##### db_get_active()

`db_get_active(  )`

Get the name of active data connection set  

**Parameters**

- *nil*

**Return Values**

- *String* - name of the dataset

**Examples**

```php  
echo db_get_active();  
// prints: 'default' or whatever set name you defined  
```  




--------


##### db_connect()

`db_connect( $options )`

Open a connection to database.  
  
Note: You should be using [`db_set_active()`](#db_set_active) instead. Otherwise you cannot make use of the other helpers.  

**Parameters**

- array **$options**
  - array of properties

**Properties**

- string **$user**
  - Database user name
- string **$pass**
  - Database password
- string **$db**
  - Database name
- [string **$host** = 'localhost']
  - DB host name

**Return Values**

- *Object* - mysqli_connect() object

**Examples**

  
```php  
$conn = db_connect( array( 'user' => ... , 'pass' => ... , 'db' => 'testdb' ) );  
```  




--------


#### Running Queries

Please use [`db_query()`](#db_query) for a standard SQL query statement. Otherwise, you can also use [`db_select()`](#db_select), [`db_insert()`](#db_insert), [`db_insert_or_update()`](#db_insert_or_update), [`db_update()`](#db_update), [`db_delete()`](#db_delete) for valid queries. Please refer to the API doc of the functions below.



--------


##### db_query()

`db_query( $sql, [$prep_single], [$keep] )`

Make a SQL query to active database. You can make use of this function for custom SQL statements.  
  
This also serves as a "base" function of other querying methods.  

**Parameters**

- string **$sql**
  - SQL statement to run
- [bool **$prep_single** = FALSE]
  - if return a 1-dimesional result array (refer to [`db_select()`](#db_select) )
- [bool **$keep** = TRUE]
  - keep sql statement for debug (refer to [`db_last_queries()`](#db_last_queries) )

**Return Values**

- *FALSE* - on failure
- *Array* - of data for SELECT query
- *Object* - for SHOW, DESCRIBE or EXPLAIN quries
- *TRUE* - for other successful queries.

**Examples**

  
```php  
$data = db_query( "SELECT * FROM test_table WHERE colA = 1" );  
```  




--------


##### db_select()

`db_select( $select, $from, [$where], [$order], [$prep_single] )`

Select data from active database.  
  
This supports simple and straight forward select statements. For complex logics (e.g. grouping, sub-queries), you will still have to write your own sql queries and make use of [`db_query()`](#db_query).  
  
Note: WHERE values will be automatically escaped. See [`escape()`](#escape).  

**Parameters**

- mixed **$select**
  - SELECT portion, can be string or array (glued by a comma ",")
- mixed **$from**
  - FROM table references, can be string or array (glued by a comma ",")
- [mixed **$where** = '']
  - WHERE condition, can be string or array or associative array (glued by "AND", see usage below )
- [mxied **$order** = '']
  - ORDER BY section, can be string or simple array or associative array (glued by "AND", see usage below )
- [bool **$prep_single** = FALSE]
  - if a single record is expected (so it will be a 1-dimensional array instead of 2-dimensional array) to save some codes. 
  -  Note: if the actual result data is more than 1 row, it will still return a 2-dimensional array)

**Return Values**

- *Array* - query results

**Examples**

1. Simple select query  
```php  
$data = db_select( 'username' , 'users' , array( 'u.username' => 'asc' ) );  
// $data will be an two dimensional array: 1st level is indexed array and 2nd level is associative array:  
// $data = array(  
//		0 => array( 'username' => 'john' ),  
//		1 => array( 'username' => 'jane' ),  
//		2 => ... ,  
// );  
```  
  
2. More complex query  
```php  
$select = array( 'u.username' , 'u.password' , 'p.profilepic' );  
// SELECT u.username, u.password, p.profilepic  
  
$from = 'users u, profiles p';  
// FROM users u, profiles p  
  
$where = array( 'u.username' => $_POST['username'], 'p.password' => crypt( $_POST['password'] ) );  
// WHERE `u.username` = 'user1' AND `u.password` = '$1$q2dljdmO$GOqtv0hxwsbXbeldqYzVp0'  
// key and value is glued by "="  
  
$order = array( 'u.username' => 'asc' );  
// ORDER BY `u.username` asc  
  
$data2 = db_select( $select, $from, $where, $order , TRUE );  
// $data2 will be an associative array (one dimensional).  
// $data2 = array( 'username' => '...', 'password' => '...' , 'profilepic' => '...') ;  
```  
  
3. Here we list other possibilities:  
  
A. It is absolutely fine if you write your own portion in simple strings, for all **$select**, **$from**, **$where**, **$order** parts.  
```php  
$select = 'user,pass';  
// SELECT user,pass  
```  
  
B. No special effect for associative array for **$select** and  **$from**, it will just read the values.  
```php  
$from = array( 'a' => 'table1' );  
// FROM table1  
```  
  
C. It is also fine to use indexed array for **$where** and **$order**, and will be glued with AND. Useful to customized the query.  
```php  
$where = array( 'col1 = "a"', 'col2 !="b"' );  
// WHERE col1 = "a" AND col2 != "b"  
```  
```php  
$order = array( 'col1 asc', 'col2 desc');  
// ORDER BY col1 asc AND col2 desc  
```  




--------


##### db_insert()

`db_insert( $table, $data )`

Insert a single record into active database set.  

**Parameters**

- string **$table**
  - table name
- array **$data**
  - data array (associative array)

**Return Values**

- *TRUE* - on success
- *FALSE* - otherwise

**Examples**

  
```php  
$data = array( 'id' => 'jdoe', 'name' => 'John Doe' );  
$result = db_insert( 'user_table' , $data );  
```  




--------


##### db_update()

`db_update( $table, $data, $where )`

Update table for the data with the condition supplied.  

**Parameters**

- string **$table**
  - table name
- array **$data**
  - data array (associative array)
- mixed **$where**
  - condition. See [`db_select()`](#db_select) for how "where" can be specified

**Return Values**

- *Int* - number of rows affected if success
- *FALSE* - on failure

**Examples**

  
```php  
$data = array( 'name' => 'John Doe' );  
$result = db_update( 'user_table' , $data , array( 'id' => 'jdoe' ) );  
```  




--------


##### db_insert_or_update()

`db_insert_or_update( $table, $data )`

Insert a single record into database, or update a record if the primary key value is already exist.  
  
Use with care if you may accidentally rewrites an old record. Not to be used with multiple primary keys table.  

**Parameters**

- string **$table**
  - table name
- array **$data**
  - data array (associative array)

**Return Values**

- *FALSE* - on failure
- *0* - for not updated nor inserted
- *1* - for insert
- *2* - for update

**Examples**

  
```php  
$data = array( 'id' => 'jdoe', 'name' => 'John Doe' );  
$result = db_insert_or_update( 'user_table' , $data );  
```  




--------


##### db_delete()

`db_delete( $table, $where )`

Delete records from table with the condition supplied.  

**Parameters**

- string **$table**
  - table name
- mixed **$where**
  - condition. See [`db_select()`](#db_select) for how "where" can be specified

**Return Values**

- *Int* - number of rows affected if success
- *FALSE* - on failure

**Examples**

  
```php  
$result = db_delete( 'user_table' ,array( 'id' => 'jdoe' ) );  
// the row will be deleted. $result = 1 if there was a record with id = 'jdoe'; 0 if not; FALSE if the record is not found  
```  




--------


#### Query Helpers
##### escape()

`escape( $str )`

Escape and quote values as needed for SQL statement. Note:  
  
- Strings are auto escaped in the querying functions above. Use this for custom SQL statements as needed.  
- to use MySQL functions in the string, put prefix **`fx:`** and escaping will be skipped. e.g. `fx:now()`  

**Parameters**

- string / array **$str**
  - string to be escaped. can also be array to escape repeatedly

**Return Values**

- *String/Array* - escaped values suitable to run in MySQL query

**Examples**

  
```php  
$id = $_POST['id'];  
$sql = 'SELECT * FROM user_table WHERE id=' . escape( $id );  
$query = db_query( $sql );  
```  




--------


##### db_insert_id()

`db_insert_id(  )`

Get the insert ID number from database inserts  

**Parameters**

- *nil*

**Return Values**

- *String* - insert id

**Examples**

  
```php  
echo db_insert_id();  
```  




--------


##### db_table_structure()

`db_table_structure( $table )`

Get table structure  

**Parameters**

- string **$table**
  - Table name

**Return Values**

- *Array* - table structure metadata

**Examples**

  
```php  
printr( db_table_structure( 'user_table' );  
```  




--------


##### db_list_fields()

`db_list_fields( $table )`

Get field (column) names of the table  

**Parameters**

- string **$table**
  - Table name

**Return Values**

- *Array* - field names

**Examples**

  
```php  
foreach( db_list_fields( 'user_table' ) as $col_name )  
{  
	echo "<th>{ $col_name }</th>";  
}  
```  




--------


##### db_last_queries()

`db_last_queries(  )`

Get all sql statments queried (as of this method is executed).  
  
This is useful during development for debugging.  

**Parameters**

- *nil*

**Return Values**

- *Array* - sql statements

**Examples**

  
```php  
printr(  db_last_queries() );  
```  




--------


##### db_is_unique()

`db_is_unique( $table, $field, $value )`

Check if a field-value pair is unique in a table. Useful for checking unique / primary keys before insertion.  

**Parameters**

- string **$table**
  - table name
- string **$field**
  - field name
- string **$value**
  - the value to be checked

**Return Values**

- *TRUE* - if it is unique (does not exist in the table)
- *FALSE* - otherwise

**Examples**

  
```php  
  
```  

**Changelog**

- 2017.10.17  
	- Renamed from "db_unique()" for naming convention  




--------




--------


### dom

DOM helper is the PHP Simple HTML DOM Parser package by S.C. Chen.

Plaese read the [quick start guide](http://simplehtmldom.sourceforge.net/) and [full documentation](http://simplehtmldom.sourceforge.net/manual.htm) at the official site for details.



--------


### krumo

Krumo is a package to replace of `print_r()` and `var_dump()`. Please read the official site for details:  [http://krumo.sourceforge.net/](http://krumo.sourceforge.net/)



--------


##### krumo()

`krumo( $var1, $var2, ... )`

The most (if not the only) useful function in the package. It supports any number of variables of any type.  

**Parameters**

- mixed **$var1, $var2, ...**
  - anything to be printed

**Return Values**

- *Void*

**Examples**

*All examples are taken from the official site.*  
  
```php  
krumo($_SERVER, $_ENV);  
  
$x1->x2->x3->x4->x5->x6->x7->x8->x9 = 'X10';  
krumo($x1);  
```  




--------


##### Other Functions

```php
// print a debug backtrace
krumo::backtrace();

// print all the included(or required) files
krumo::includes();

// print all the included functions
krumo::functions();

// print all the declared classes
krumo::classes();

// print all the defined constants
krumo::defines();


// enable/disable Krumo on-the-fly

// disable Krumo
krumo::disable();

// Krumo is disabled, nothing is printed
krumo::includes();

// enable Krumo
krumo::enable();

// Krumo is enable, printing is OK
krumo::classes();
// This proves to be very useful when your PHP code gets swamped with Krumo calls dumping debuging information, and instead of removing each of those dumps one by one, you can just disable them.
```



--------




--------


### local

The Local helper file is created for your ease to write custom helper functions, especially specific single application. No functions or anything is written here by the framework. This is a just-for-convenience feature. It is fine for you to create new helpers with other names.



--------


### session

Session helper helps in manipulating session in php, as well as adding a "flash data" ability (see "[Flash Data](#flash-data)" section). Instead of helper functions, this is in essence a library for manipulating session. Upon loading the session helper the php session will also be started.



--------


#### Basic Session

We call the basic session "user data" which means the data added to session for user. "Flash data" is some session data that we will only use once and drop after use. However, this is in essence aliases to manipulate with `$_SESSION` superglobals with the exception to hide "flash data" entries. Therefore to use these functions or to use `$_SESSION` directly is up to your preference.



--------


##### set_userdata()

`set_userdata( $key, [$value] )`

Set or update user session data. You may also put an associative array as the only parameter to store multiple session keys at once. (Please see examples for the syntaxes)  

**Parameters**

- Array/String **$key**
  - User data item key or associative array of session items
- [Array/String **$value** = NULL]
  - value to store

**Return Values**

- *Void*

**Examples**

  
```php  
// syntax 1 - single item:   
set_userdata( 'username' , 'john' );  
  
// syntax 2 - multiple items:  
$newdata = array(   
	'username' => 'jane' ,  
	'email' => 'jane@example.com'  
);  
set_userdata( $newdata );  
  
// you can get the session data by: get_userdata('username') and get_userdata('email')  
  
```  

**Changelog**

- 2017.10.17  
	`$key` parameter was renamed from `$data` for clarity  




--------


##### get_userdata()

`get_userdata( [$key] )`

Get user session data.  

**Parameters**

- [string **$key** = `NULL`]
  - User data item key to retrieve. if unspecified (i.e. the default, `NULL`), all user data (in array) will be retrieved.

**Return Values**

- *Array/String* - Vaues of user session data
- *NULL* - if the key is not found

**Examples**

  
```php  
$session_data = get_userdata();  
// get array of all session data (i.e. an alias to $_SESSION, especially when flash data is not used).  
  
$user = get_userdata( 'username ');  
// get a single session item. If it is not set, NULL will be returned.  
// As opposed to $_SESSION, get_userdata will not throw an error if the key is not found.  
```  




--------


##### has_userdata()

`has_userdata( $key )`

Check if the user data item exists.  

**Parameters**

- string **$key**
  - user data item key

**Return Values**

- *TRUE* - if user data item is found
- *FALSE* - otherwise

**Examples**

  
```php  
if( has_userdata( 'username' ) ) { ... }  
```  




--------


##### unset_userdata()

`unset_userdata( $key )`

Remove a user data  

**Parameters**

- string **$key**
  - user data item key

**Return Values**

- *Void*

**Examples**

  
```php  
unset_userdata( 'username' );  
```  




--------


#### Flash Data

This framework supports "flash data", which the session data will only be available for the next server request, and are then removed automatically. This can be very useful, especially for one-time informational, error or status messages.



--------


##### set_flashdata()

`set_flashdata( $key, [$value] )`

Add or change flash data.  

**Parameters**

- array/string **$key**
  - flash data key; or an associative array with `key=>value` pairs. See examples for syntax.
- [string **$value** = '']
  - flash data value; only used if string key is specified in $key

**Return Values**

- *Void*

**Examples**

  
```php  
// syntax 1 - single item:   
set_flashdata( 'message' , 'Hello World' );  
  
// syntax 2 - multiple items:  
$newdata = array(   
	'message' => 'Hello World' ,  
	'error' => 'err1'  
);  
set_flashdata( $newdata );  
// you can get the session data by: get_flashdata('message') and get_userdata('error')  
  
  
// common usage example:  
if( ! valid_user( $username ) )  
{  
	set_flashdata('message','You are not allowed to enter this area.');  
	redirect();  
}  
```  




--------


##### get_flashdata()

`get_flashdata( [$key], [$keep] )`

Fetch a specific flashdata item from the session array.  
  
If `$key` is not specified, an array of all flash data will be fetched  

**Parameters**

- [string **$key** = '']
  - Flash data key
- [bool **$keep** = FALSE]
  - *TRUE* if keep the flash data for next request. (Otherwise will be destroyed automatically)

**Return Values**

- *Array/String* - value of the flash data or array of values
- *NULL* - if the flash data key is not found

**Examples**

  
```php  
<?=get_flashdata( 'message' );?>  
```  




--------


##### has_flashdata()

`has_flashdata( [$key] )`

Check if a flash data item exists  

**Parameters**

- [string **$key** = '']
  - Flash data key

**Return Values**

- *TRUE* - if the flash data key exists
- *FALSE* - otherwise

**Examples**

  
```php  
if( has_flashdata( 'message' );  
```  




--------




--------


### text

The Text Helper file contains functions that assist in working with text.

Most functions in this helper is a shameless copy of text helper from CodeIgniter, and others are adopted from other sources.

For these functions from CodeIgniter 2.0:

##### word_limiter()
##### character_limiter()
##### ascii_to_entities()
##### entities_to_ascii()
##### word_censor()
##### highlight_code()
##### highlight_phrase()
##### word_wrap()
##### ellipsize()

Refer to [CodeIgniter 2.2 User Guide: Text Helper functions](https://www.codeigniter.com/userguide2/helpers/text_helper.html)



--------


##### format_size_unit()

`format_size_unit( $bytes, [$decimals] )`

Convert size in bytes into proper human-readable units (TB/GB/MB/KB/bytes).  

**Parameters**

- int **$bytes**
  - Value to convert in number of bytes
- [int **$decimals**]
  - Correct the size to how many decimal places

**Return Values**

- *String* - formatted text

**Examples**

  
```php  
$value = filesize( 'test.txt' );  
echo "The file size is " . format_size_unit( $value , 2 );  
// prints: The file size is 12.35MB  
```  

**Changelog**

- 2016-02-05  
	- changed default rounding decimal places from 2 to 0 which is more intuitive  




--------


##### ordinal()

`ordinal( $n, [$superscript] )`

Display numbers with ordinal suffix (1st, 42nd, 106th, etc.)  

**Parameters**

- int **$n**
  - input number
- [bool **$superscript** = FALSE]
  - if the suffix should be in superscript (wrapped in `<sup></sup>` tag)

**Return Values**

- *String* - formatted text

**Examples**

  
```php  
echo ordinal(1);  
// prints: 1st  
  
echo ordinal(22,TRUE);  
// prints: 22<sup>nd</sup>  
```  




--------




--------




--------


## JavaScript
### Usage

To add some custom JavaScript calls, you can either:

1. make use of the [`addjs()`](#addjs) helper if the script if for a single page only; or
2. add in the `js/main.js` if this is going to be site wide.

For plugins, put them in the `js/plugins.js` instead of keeping separate files and link in html head. Best to [compress](http://closure-compiler.appspot.com/) it first and put related basic usage info and link in a doc block before the compressed code.



--------


### Plugins

This list all the basic usage and links related documentation of the plugins and packages already included.



--------


#### Mathjax

The default math delimiters are `$$...$$` and `\[...\]` for displayed mathematics, and `\(...\)` for in-line mathematics.

[Documentation](http://docs.mathjax.org/en/latest/start.html) | [Official Site](http://www.mathjax.org)



--------


#### Validation Engine

[Official Site](https://github.com/posabsolute/jQuery-Validation-Engine)

Refer to Bootstrap Form helper - [validate](#4-validate)



--------


#### Rotate13

`$.rot13('test@example.com');`

See [`hide_email()`](#hide_email) helper.

Documentation and Official Site lost.



--------


#### Bootstrap HTML5 Sortable

Make Bootstrap elements sortable (draggable)

[Documentation](http://psfpro.ru/html5sortable/index.html) | [Official Site](https://github.com/psfpro/bootstrap-html5sortable)



--------


#### Bootstrap Popover Extra Placements

Provide additional popover placement positions. Once you have added the "extra-placements" plug-in, instantiate a popover just as normal, but we can use the additional placement options.

[Official Site](https://github.com/dkleehammer/bootstrap-popover-extra-placements)



--------


#### Columnizer

`$('wrapper_tag').columnize({ columns: 5 });`

Make children elements in columns

[Official Site](http://welcome.totheinter.net/columnizer-jquery-plugin/)

Note: You may also use the CSS3 attribute: `column-count`, but this plugins should have better browser support.



--------


#### jQuery Sticky

`$('#sidebar').sticky();`

Replacement of Bootstrap's Affix: makes an element sticky to the the screen (normally for menus)

[Official Site](http://labs.anthonygarand.com/sticky)



--------


#### Smooth Scroll

Enable smooth scroll for in-page bookmark

Add attribute **data-scroll** to `<a>` tags

```html
<a data-scroll href="#bazinga">Anchor Link</a>
...
<span id="bazinga">Bazinga!</span>
```

[Official Site](http://github.com/cferdinandi/smooth-scroll)



--------


#### Quick Pagination

`$("ul.pagination1").quickPagination();`

Covnert long lists and page content into numbered pages

[Documentation](http://www.jquery4u.com/demos/jquery-quick-pagination/) | [Official Site](http://www.sitepoint.com/jquery-quick-pagination-list-items/)



--------


#### Table Sorter

`$('#myTable').tablesorter();`

Make table sortable by headers

[Documentation & Official Site](http://tablesorter.com/docs/)



--------


#### Select All

`$('.mySelector').selectall();`

Select all content of the selector.



--------


#### Masonry (package)

Put elements into piles / wall like styles (auto-fill / shift)

[Documentation & official Site](http://masonry.desandro.com)



--------


#### Malihu Scrollbar

A nice scrollbar for elements. (Other details to be completed)



--------




--------




--------


## CSS
### Framework

Bootstrap CSS framework v3 is used.

Documentations: [CSS](https://getbootstrap.com/docs/3.3/css/) | [Components](https://getbootstrap.com/docs/3.3/components/) | [JavaScript](https://getbootstrap.com/docs/3.3/javascript/) | [All Components in One Page](http://anvoz.github.io/bootstrap-tldr/)

[Official Site](https://getbootstrap.com/docs/3.3/)



--------


### Bootstrap Additionals

Some additional tools for the Bootstrap framework has been added.



--------


#### Callout

```
<div class="bs-callout bs-callout-default">
	<h4>Default Callout</h4>
	This is a default callout.
</div>
```

Callout boxes of the Bootstrap documentation

[Documentation](http://cpratt.co/twitter-bootstrap-callout-css-styles/)

Refer to the [`bs_callout()`](#bs_callout) helper.



--------


#### Responsive Alignment

Added the following responsive floats and text alignment classes in this format:
`[TYPE]-[DIRECTION]-[SCREEN_SIZE]`

Valid *[TYPE]*:
**pull** - for quick floats
**text** - for text alignment

Valid *[DIRECTION]*:
**left** / **right**

Valid *[SCREEN_SIZE]*;
**xs** / **sm** / **md** / **lg**


That is, the available classes are:

`pull-left-xs`, `pull-left-sm`, `pull-left-md`, `pull-left-lg`,
`pull-right-xs`, `pull-right-sm`, `pull-right-md`, `pull-right-lg`,
`text-left-xs`, `text-left-sm`, `text-left-md`, `text-left-lg`,
`text-right-xs`, `text-right-sm`, `text-right-md`, `text-right-lg`,

[Official Site](https://github.com/calebzahnd/Responsive-Alignment-for-Bootstrap)



--------


#### Responsive Line Breaks

Class | Description
---   | ---
`.break-xs/sm/md/lg`   | break **ONLY** on that screen size
`.break-sm/md-up`      | break on that screen size **and** higher
`.break-sm/md/lg-down` | break on screen size **which is lower than** specified.<br> i.e. `.break-md-down` will not break on md

Note: those classes of some screen size that look like missing is intended as they are meaningless. E.g. `.break-xs-up` is actually bare `<br>`.

---
**Examples**

```
<br class="break-sm-up">
<br class="break-md">
<br class="break-lg-down">
```
[Official Site](http://danielmall.com/articles/responsive-line-breaks/)



--------


#### Table

Added the follow classes:

- `.no-hover`
	- Add to `<tr>` if hover style is not needed on that row for table with hovered rows.
		- `<table class="table table-hover"><tr class="no-hover">...`
- `.no-border`
	- Add to `<table>` if the table does not need any border at all while keeping other styling intact.
		- `<table class="table no-border">`
	- for multiple `<tbody>`, originally it is a 2px border separator. this will also make the border transparent to keep some separation.



--------




--------


### Scss Helpers

(This section is to be finished)

###### headings()
`headings`




--------




--------




--------


## Index

Index of functions

{index}

--------



This marks the end of the documentation.
This document is written in [GitHub Flavored Markdown](https://help.github.com/articles/github-flavored-markdown/)


--------



&copy; {cur_year} [Alan Shum](mailto:alanshum88@gmail.com). All rights reserved.




--------




--------



# WS Framework Docs
## Changelog

The changelog is put at the top for easy updating only. Please read [Introduction](#introduction).  
*This records changes affects the base framework. Function API changes are recorded in their own sections.*  

Date       | Description
---------- | -----------
2017-10-17 | Removed `$SS` alias for session as it is not helpful at all. <br> Use `$_SESSION` superglobals or the Session helpers directly
2016-03-29 | Fixed the segment behaviour to work properly when the page is under subdirectories. 
2016-02-05 | Added **$ws_loader** - index loader settings. <br> Multi instances of index.php and settings override is now possible. 
2016-01-19 | Added **array** helper. Moved array related helper functions in from main helper.
2016-01-18 | Fixed **%PAGE_TITLE%** showing up incorrectly when `die()`.
2016-01-15 | Template: **%HTML_TITLE%** renamed to **%PAGE_TITLE%** for clarity
2015-12-28 | CSS packages: removed Bourbon and Corpus which is not used nor deployed once after test.



--------




--------


## Introduction
### Preface

I loved the [CodeIgniter](http://codeigniter.com/) framework. However it's getting bulky (it iis still very light-weight, just more than I needed) and not very friendly (to me). And I had to work on a server with php4.01 only (!)(although the support of php4 is continuously removed in this framework) and CI just do not fit. Therefore I referred to CI and write my own simple framework to support my daily works, which includes writing many small websites, mainly form handling and other events websites. This file documents what is going on in using this framework and will probably serve just as a note to myself.

I don't like OO programming much. Therefore in this framework mostly are procedural functions and logic. No MVC, No OOP. Simple and sweet. Perhaps not very sweet, but enough to do my tasks quickly and easily. Although some helpers adopted are really in OO style, I don't really hate it, but I will wrap it as procedural functions.  

What WS stands for? Although this is built for my job, the first completed mini "project" is my personal "WorkSpace".  

-- *written by Alan, Jun 2015*  




--------


### What's Inside

- PHP libraries and helpers
	- mainly procedural functions
- JavaScript plugins
- Scss helpers and plugins
	- including Bootstrap CSS framework Scss files




--------


### License

I did not set any license to this framework for the time being (as of 2015-12-23).  

However, as some functions and code snippets are taken and modified from CodeIgniter and other open-sourced projects, I suppose this should be open-sourced. You may use it under any suitable open-licenses (perhaps MIT license? I am not sure).  

I only claim that as the author of this framework this can be changed at any time without prior notices, and I keep the copyright of this framework, except those functions, scripts or code snippets otherwise specified in the code.   



--------


### Author Info

- Name
	- Alan SHUM
- Email
	- alanshum88@gmail.com




--------


### Code Style


```
function( $var , $var2 )
{
	$x = $a + $b;
	return TRUE;
}

$tmp = fx1( fx2( fx3( $var1 ) , $var2 ) );
```
- Brackets, open brackets stick together with its "owner", and 1 space between the "arguments"
- Commas in function are separated with *everything* by 1 space
- Curly brackets in new lines
- Boolean Data Type: TRUE / FALSE / NULL in CAPS
- Most of the other coding style come from [CodeIgniter 2](http://www.codeigniter.com/userguide2/general/styleguide.html).




--------


### Styling of This Document

Notation            | Description
------------------- | -------------
(horizontal rule)   | Section break ; <br>continuous section breaks for different topics.
$arg1 = VALUE       | argument of function with default value
[ $arg2 ]           | Optional argument; for optional value without default value specified,<bR> the default value is "" (blank string) 
`<h5>`              | All documentation of php functions API are set to use `<h5>`, regardless of its parent level.
B                   | A single capital letter "B" represents Bootstrap for simplicity



--------




--------




--------


## Using the Framework

As this is a self-defined framework, many stuff has been "pre-defined" and have "opinionated values" (or, simply "hard-coded") to make things work in an efficient way. Therefore, please read the following sections on how to use it.

Note: This framework is built with the support to Bootstrap (v3). Support to v4 is not implemented. Some functions (on displaying content) are normally defined with Bootstrap classes.



--------


### Pages and Segments

All "pages" of the application should goes in the **pages** directory. For instance, create a "test.php" and you can access it in the web by *http://your-site.com/test*. You may also make sub-directories as needed (but this is not very thoroughly tested).  

You can use add argument to the url with `/`.  

Consider this url:  http://your-site.com/test/arg1/hello  

If you do not have the file `/pages/test/arg1/hello.php` but only `/pages/test.php`, then you can access the rest of the url segment as arguments by using `segments()`. In this case, `segments(0)` will return `'arg1'` and `segments(1)` will return `'hello'`. Please refer to [Core > Segments](#segments) section below for details.  



--------


### .htaccess

Please edit the `.htaccess` file in the root of the framework. There are 2 sections which you should modify on each application:



--------


#### RewriteBase

Please search for "RewriteBase" and change the path based on your application root (i.e. where index.php locates). This is essential otherwise the application will just die except the default page.



--------


#### Options to rewrite `www.`

There are two options:  
Option 1: rewrite www.example.com â†’ example.com  
Option 2: rewrite example.com â†’ www.example.com  
Choose one of them and comment out the other section.  



--------




--------


### Templates

The framework applies the same header and footer template to all the page.  
Please edit `header.inc.php` and `footer.inc.php` as needed.  
(Also read [Loader Settings](#loader-settings) section below.)



--------


### index.php

The index.php is served as a "base loader" to load the pages. Do not edit if you are not sure what's going on. Put your application pages in `/pages/` directory.  



--------


#### Multiple Instances

You can have multiple instances of index.php in different directories, and share the same system files. In this framework, we assumes that all these instances belong to the same application with minor settings modifications. On the contrary, if you share the same system files across multiple applications, it will be scary if you need to update the core!



--------


#### Loader Settings

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




--------




--------


### Pre-defined Variables and Aliases

All system variables begin with `$ws_` prefix. Do not create / overwrite / modify these variables. You can refer to the index.php for a list of system variables.

There are some other pre-defined aliases of variables / constants to simplify your codes:

Var/Const  | Description of the Alias
---------- | ------------------------
`$P`       | (CAPITAL P) alias for `$_POST`
`$G`       | (CAPITAL G) alias for `$_GET`
`$F`       | (CAPTIAL F) alias for `$_FILES`
`$S`       | (CAPITAL S) alias for `$_SERVER`
`DS`       | alias for `DIRECTORY_SEPARATOR`

Note: What I meant for *alias* here, is that you can keep modifying these variables (e.g. `$P`), while keeping the original one intact (e.g. `$_POST` is unchanged). It is sometimes useful to have 2 copies of the same data to manipulate the program easily. A shorter variable name of these commonly used variables can increase readabilty. For instance, it is clumpsy if the code is flooded with `$_POST['surname']` , `$_POST['name']`, etc. (consider having over 5 or 10 like these), but a bit more readable by `$P['surname']`, `$P['name']`, etc.



--------


### Commonly Used Stuff to Note

- Page Title
	- Use [`set_page_title()`](#set_page_title) to set page title. Useful for pages that you would like an separate page heading. The position is defined in *header.inc.php* with **%PAGE_TITLE%** tag. (i.e., you can use `set_page_title()` anywhere in the page and the title will be set for you)
- Add select options
	- Use [`add_options_set()`](#add_options_set) to add new options. See also [options](#7-options) section in bs_form_helper section.
- Add new JavaScript blocks
	- Use [`addjs()`](#addjs) to add new JavaScript block inline with the program codes in a page. This is required as JavaScript is loaded *AFTER* page content. A `<script></script>` tag will be wrapped for each array item. The scripts are printed in *footer.inc.php* with [`printjs()`](#printjs).



--------


#### CSV, TSV and Array

Array is commonly used in php and in this framework. However, typing arrays sometimes is not very efficient if it is a multi-dimensional array. Thus sometimes tab-separated values (TSV) is used in place of 2-dimensional arrays, with the aid of [`tsv2array()`](#tsv2array) helper. Also, sometimes it is easier to list a set of items in comma-separated values (CSV). Thus, most helper functions supports an auto conversion of csv to array for its arguments (with [`csv2array()`](#csv2array)). That is, if the function's argument requires an array (but not associative array), you can use CSV. However, please check the function's API doc to make sure that.



--------


#### Defaults

Most of the functions have multiple optional arguments. To reduce the use of array parameter, but to skip some optional arguments in the middle, most of the helpers accepts blank string `''` to keep using default values with the introduction of [`empty_defaults()`](#empty_defaults). 




--------




--------


### File Structure

The original site structure as follows:

Path     | Description
-------- | ---------------
config/  | site wide configuration files
core/    | core libraries
css/     | all style sheets should be put here
 ../loader.scss         | base loader of different helpers, frameworks, etc.
 ../style.scss          | this is styles for the math theme
 ../_page_specific.scss | put custom styles of the application here
 ../js-plugins/         | put css from JavaScript / jQuery plugins in separate file in this folder and make reference in js-plugins.scss
 ../js-plugins.scss     | put calls to load plugin's styles here
data/    | data file storage (with the use of datafile helper)
fonts/   | put font files here
helpers/ | helper function collections
 ../local_helpers.inc.php     | put custom helper function here
img/     | images that is used site wide. Page-dependent images are advised to create a sub-folder of the file name in `page/`
js/      | script files
 ../main.js              | put run-time script calls here
 ../plugins.js           | put jQuery plugins here (compress the code first, and put comments above the code block)
 ../vendor/              | JavaScript frameworks, libraries, etc. that comes from a well-known source (so do not mix up with our own scripts)
logs/    | error logs (separated by each day)
pages/   | application files. You can create sub-folders.
footer.inc.php    | site footer (included in every page)
header.inc.php    | site header (included in every page)
index.php         | the "loader" of the framework




--------




--------




--------


## Config
### settings.php

All settings of the application. Most of the items are self-explanatory in comments.  
Do **NOT** delete any existing variables. Set it to blank `$config['item'] = '';` instead if it is not used.  
Note: This list may not be up-to-date. Please follow what you have in `settings.php`.  
You may also set up any site-wide settings that you can access via `config_item('example_settings')`; Please refer to [`config_item()`](#config_item).



--------


#### Auto-load Helpers

Variable                 | Description
------------------------ | -----------
`$config['helpers']`     | array of helpers to be loaded




--------


#### Title of Application

Variable                 | Description
------------------------ | -----------
`$config['title']`       | Application title, affects how to show in template header and the `<title>` tag in `<head>`
`$config['subtitle']`    | Sub title only shows in header area



--------


#### Datafile Helper
#### Admin Access

To be used by [`valid_user()`](#valid_user).

Variable                 | Description
------------------------ | -----------
`$config['valid_admin']` | Admin user names
`$config['valid_users']` | Normal users, no need to repeat admin user names

<!-- this is the deprecated version.
`$config['admin_ip']`    | IP of authorized users, to access pages protected by `valid_user()` function; *Note*: localhost user is always allowed.
`$config['admin_key']`   | Key to access pages protected by `valid_user()` function. Note that`admin_ip` takes privilege. Append `?v=the_key` to access by admin key. -->




--------


#### Dates

To be used with [`timestr()`](#timestr) / [`time_started()`](#time_started) / [`time_ended()`](#time_ended).  
You may specify any unambiguous date format, e.g. '2015-01-01 12:34'.  
On the contrary, "01-02-2015" is not advised as this could cause confusion on the order of day and month part.  
You can also define you own "date" settings, that the variable ends with '_date'.  
E.g. `$config['test_date'] = '...'`, and access via `timestr('test')`;

Variable                 | Description
------------------------ | -----------
`$config['start_date']`  | Start date of the application
`$config['end_date']`    | End date of the application




--------




--------


### constants.php

There are a few framework constants defined. You can change the value to something else to suit your needs.  
Please do *NOT* delete any existing constants.  
You may also define your own site-wide constants in this file.  




--------




--------




--------


## Core

Core is the core library (which in essence also helpers) that the framework will not work without these functions.



--------


### URI Segments

For description of how uri segments work, please see section: [Using the Framework](#using-the-framework).



--------


#### Helper Functions

Note: segments() = csegments() + psegments().  
fsegments() is the superset of segments(). However, fsegments() do not have any portability as it is based on absolute path to the web root, while other "segments" functions rely on relative root to the application.



--------


##### segments()

`segments( [$n], [$no_result] )`

Fetch URI segments based on **application root**.    
Note: it currently has an alias `segment()`, which is deprecated and will be removed.  

**Parameters**

- [mixed **$n** = FALSE]
  - The segment item to return. *0* being the first item.
  - *FALSE* to return an array of ALL segments.
- [bool/mixed **$no_result** = FALSE]
  - What to return if no result.

**Return Values**

- *FALSE* - when segment is not found
- *Mixed* - when segment is not found and has a custom value for `$no_result`
- *String* - uri segment text
- *Array* - array of uri segments text (when `$n == FALSE` which is default)

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




--------


##### csegments()

`csegments( [$n], [$no_result] )`

Similar to `segments()`, except that this returns segments based on the **<u>c</u>urrent** page.  
Note: it currently has an alias `csegment()`, which is deprecated and will be removed.  
Please refer to [segments()](#segments) for details of parameters, return values and examples.  

**Parameters**

- [mixed **$n** = FALSE]

- [bool/mixed **$no_result** = FALSE]





--------


##### psegments()

`psegments( [$n], [$no_result] )`

Similar to `segments()`, except that this returns segments for the **<u>p</u>arameters** only.  
Note: it currently has an alias `psegment()`, which is deprecated and will be removed.  
Please refer to [segments()](#segments) for details of parameters, return values and examples.  

**Parameters**

- [mixed **$n** = FALSE]

- [bool/mixed **$no_result** = FALSE]





--------


##### fsegments()

`fsegments( [$n], [$no_result] )`

Similar to `segments()`, except that this returns segments based on the **<u>f</u>ull path**.  
This is useful if your application is nested under a sub-directory.  
  
Please note that `fsegments()` does not have portability as it relies on web root instead of application root. For instance, if you move the application into a deeper sub-directory, it will have different returns.  
  
Please refer to [segments()](#segments) for details of parameters, return values and examples.  

**Parameters**

- [mixed **$n** = FALSE]

- [bool/mixed **$no_result** = FALSE]





--------


##### site_url()

`site_url( [$uri] )`

Make a proper full web address of the URI based on the **application root** defined in index.php.  
Useful for pages in `pages` with assets under other sub-folders of root (e.g. `/img/`).  
Note:   
- If the uri has a scheme (e.g. `http://` ) , it will not be prep'd.  
- If no uri is inputted, the base url will be returned.  
- If your index.php is NOT on the same level as application root, please REMEMBER to add the extra segment when you call this as this function is NOT based on current url.  

**Parameters**

- [string **$uri** = '']
  - URI to check and set

**Return Values**

- *String* - the complete url

**Examples**

  
```php  
echo site_url();		// prints: http://your_domain.com  
echo site_url( 'img/test.png');		// prints: http://your_domain.com/img/test.png  
```  




--------


##### current_url()

`current_url( [$uri] )`

Make a proper full web address of the URI based on **current page url**.  
Useful for pages in sub-folder (`pages/folder1`) with assets under the same sub-folder.  
Note:  
- If the uri has a scheme (e.g. http:// ) , it will not be prep'd.  
- If no uri is inputted, the base url will be returned.  

**Parameters**

- [string **$uri** = ""]
  - URI to check and set

**Return Values**

- *String* - the complete URL

**Examples**

  
The url is: http://your_domain.com/example/test/  
"example" is the directory where the application is located.  
"test" is the handler.  
```php  
echo current_url( 'image.png');		// prints: http://your_domain.com/pages/example/test/image.png  
echo current_url();		// prints: http://your_domain.com/pages/example/test  
```  




--------


#### Other Helpers in Core
##### is_php()

`is_php( [$version] )`

Determines if the current version of PHP is greater then the supplied value  

**Parameters**

- [string **$version** = '5.0.0']
  - the version number to check agains if system version is greater than that

**Return Values**

- *TRUE* - if current php version is equal to or greater than `$version`
- *FALSE* - otherwise




--------


##### config_item()

`config_item( $item )`

Read the config item with the item name specified  

**Parameters**

- string **$item**
  - the config item name to read

**Return Values**

- *Mixed* - value of the config item
- *FALSE* - if the item cannot be found

**Examples**

  
```php  
echo config_item('title');  
```  




--------


##### log_message()

`log_message( $msg, [$level] )`

Log a message in logs. This adds date time automatically. If the severity level is lower than that specified in settings, the message will not be logged.  
*ERROR* is the highest level; Then *DEBUG*; *INFO* is the lowest;  

**Parameters**

- text **$msg**
  - Message to log
- [enum **$level** = 'error']
  - Severity level of the message ( *ERROR* / *DEBUG* / *INFO* )

**Return Values**

- *Void*

**Examples**

  
```php  
if( $TEST ) { log_message( 'testing log' ); }  
// the following line is added in a log file in logs folder:  
// ERROR - 2015-12-11 16:52:08 --> tesing log  
```  




--------


##### redirect()

`redirect( [$uri], [$method], [$http_response_code] )`

Redirect by HTTP header.  

**Parameters**

- [string **$uri** = '']
  - URI to be directed
- [enum **$method** = 'location']
  - Redirect method ( *location* / *refresh* )
- [int **$http_response_code** = '302']
  - Force http response code, for location method only

**Return Values**

- *Void*

**Examples**

  
```php  
if( TRUE )  
	redirect( 'users' );  
```  




--------


##### load_helper()

`load_helper( $helper_name )`

Load a helper. Add a log if the helper file is not found.    
If the helper is already loaded previously, it will not be loaded again.  

**Parameters**

- string **$helper_name**
  - name of the helper to be loaded

**Return Values**

- *Void*

**Examples**

  
```php  
load_helper('my_accessories');  
// Note that the file should be named "my_accessories_helper.php" in "helpers" directory.  
```  




--------


##### addjs()

`addjs( $script, $is_link )`

Add a JavaScript block in the application, so as to load after page content (by [`printjs()`](#printjs)).  

**Parameters**

- string **$script**
  - Script block to add
- bool **$is_link**
  - Specify *TRUE* if `$script` specifies a link to script file instead of codes

**Return Values**

- *Void*

**Examples**

  
```php  
addjs( "$('body').what_you_want_to_do(...)");  
addjs( '/js/vendor/script.js' , TRUE );  
```  




--------


##### printjs()

`printjs(  )`

Returns the JavaScript code blocks (added by [`addjs()`](#addjs) ) so as to print out in html template (footer).  

**Parameters**

- *nil*

**Return Values**

- *String* - String of HTML code

**Examples**

  
```html  
<?=printjs()?>  
</body>  
```  




--------


##### set_page_title()

`set_page_title( $title )`

Set part of the `<title>` in `<head>` of the page.    
Set the header template with **`%PAGE_TITLE%`** for this to show up.  

**Parameters**

- string **$title**
  - Page title to be shown

**Return Values**

- *Void*

**Examples**

  
```php  
set_page_title( 'Admin Area');  
```  




--------


##### incl()

`incl( $filename )`

Include file based on application root.    
It will check if the file exist. If the file name does not exist, it will also append extensions ".php" and ".inc.php" to search.  

**Parameters**

- string **$filename**
  - file name to be included

**Return Values**

- *Void*

**Examples**

  
```php  
incl('header');		// you should have a file named "header.php" or "header.inc.php" in the application root path.  
incl('incl/myfile.php');  
```  

**Changelog**

- Added on: 2016-02-05  




--------




--------




--------


## Main

The main helpers contains a mix of useful functions that should be most needed by all applications, and some base functions for other functions to rely on.

This is currently put in helpers category, but in essence this is like in a mix of core and helper. Therefore this is moved out as a separate section so as for easy reference.

(The differences of "core" & "main" is defined by, if those in "main" is missing, the framework would still runs, probably in reduced functionality, while missing those in "core" cannot and the framework will die immediately.)



--------


### Development Functions

Since `die()` is frequently use in conjunction with these functions, you can specify `'die'` as one of the parameters to kill the script. (You can use the constant `DIE` and `die` as well)



--------


##### echob()

`echob( $arg1, ... )`

Print arguments in new lines with `<br>` tag.  

**Parameters**

- mixed **$arg1, ...**
  - Arguments to be printed. Strings or array of string. 'die' to `die()`. (In essence, it will also print objects using `printr()`)

**Return Values**

- *Void*

**Examples**

  
```php  
echob( 'a','b' );  
// prints:   
// a  
// b  
```  

**Changelog**

- 2016-02-15  
	-  now accepts array of strings (previously only strings)  




--------


##### printr()

`printr( $arg1, ... )`

Print arguments using `print_r()` for unlimited number of arguments with proper styles (`<pre>`).  

**Parameters**

- mixed **$arg1, ...**
  - Arguments to be printed.

**Return Values**

- *Void*

**Examples**

  
```php  
printr($_SERVER, $P);  
```  




--------


##### vardump()

`vardump( $arg1, ... )`

Print argument using `var_dump()` for unlimited number of arguments. As opposed to `printr()`, no styling is added in favor of viewing source.  

**Parameters**

- mixed **$arg1, ...**
  - Arguments to be printed.

**Return Values**

- *Void*

**Examples**

  
```php  
vardump( $array1, $object2 , 'die' , $wont_show );		// kills the script after printing $object2  
```  




--------




--------


### Checking Functions
##### _required()

`_required( $required, $options )`

To check if `$options` has the array keys specified in `$required`  

**Parameters**

- array **$required**
  - keys that are required to exist
- array **$options**
  - array to be checked against

**Return Values**

- *TRUE* - if ALL required keys are present
- *FALSE* - otherwise

**Examples**

  
```php  
if( ! _required( array(  
		'username',  
		'password',  
	) , $options ) ) return FALSE;  
```  




--------


##### _default()

`_default( $defaults, $options )`

To set default values in `$options`.  

**Parameters**

- array **$defaults**
  - Default values in `key => value` pairs
- array **$options**
  - The input array to set the default values if key is not present

**Return Values**

- *Array*

**Examples**

  
```php  
$opts = _default( array(  
		'date' => date('Ymd'),  
		), $options);  
```  




--------




--------


### if it is... Functions
##### is_json()

`is_json( $string, [$return_data] )`

Check if input string is json encoded.  

**Parameters**

- string **$string**
  - input string to be checked
- [bool **$return_data** = FALSE]
  - Return decoded data if TRUE

**Return Values**

- *TRUE* - if string is json encoded
- *FALSE* - otherwise
- *Array* - of data is `$return_data` set to TRUE

**Examples**

  
```php  
if( $decoded = is_json( $str, TRUE ) ) { ... }  
```  




--------


##### is_serialized()

`is_serialized( $value, [$return_data] )`

Check if an input is valid PHP serialized string.  

**Parameters**

- string **$value**
  - Input string to be checked
- [bool **$return_data** = FALSE]
  - Return unserialized data if TRUE

**Return Values**

- *TRUE* - if the input is serialized
- *FALSE* - otherwise
- *Array* - of data is `$return_data` is TRUE

**Examples**

  
```php  
if( $unserialized = is_serialized( $str, TRUE ) ) { ... }  
```  

**Changelog**

- 2016-02-18  
	- If the value is a serialized FALSE only, return an array with FALSE as the only item.  




--------


##### is_assoc()

`is_assoc( $array )`

Check if the input array is associative array.  

**Parameters**

- array **$array**
  - Input array to be checked

**Return Values**

- *TRUE* - if input array is an associative array
- *FALSE* - otherwise

**Examples**

  
```php  
if( ! is_assoc( $data ) ) { ... }  
```  




--------


##### url_exists()

`url_exists( $url )`

Check if an url exists.    
Note: In essence only check if the server response with 200 (OK) code  

**Parameters**

- string **$url**
  - Input url to be checked

**Return Values**

- *TRUE* - if the url exists
- *FALSE* - otherwise

**Examples**

  
```php  
if( url_exist( 'http://www.example.com/test.html' ) ) { ... }  
```  




--------




--------


### Email Related Functions
##### hide_email()

`hide_email( $email, [$text], [$id] )`

Email obfuscation with rot13 with proper JavaScript code to show it nicely.  

**Parameters**

- string **$email**
  - Email address to obfuscate
- [string **$text** = '']
  - Text to show on email link. Leave *blank* to show email address (treated email text, not plain text)
- [string **$id** = uniqid()]
  - Specify ID of the element. Useful if you will reference it in some JavaScript code. Otherwise it will be a random unique id.

**Return Values**

- *String* - of html code (`<a>` tag)

**Examples**

  
```php  
<p><b>Email</b>: <?=hide_email('test@example.com');?></p>  
```  




--------


##### send_email()

`send_email( $options )`

Prep headers and send email using php `mail()` function.  
  
Note: Keep in mind that even if the email was accepted by smtp server for delivery, it does NOT mean the email is actually sent and received by your recipients.  

**Parameters**

- array **$options**
  - array with the following properties:

**Properties**

- array **$to**
  - "To" recipients; can also be csv
- array **$cc**
  - "Cc" recipients; can also be csv
- array **$bcc**
  - "Bcc" recipients; can also be csv
- [string **$from** = config_item('email_from')]
  - Send email to be shown.
- string **$subject**
  - email subject
- string / array **$message**
  - mail message content, which can be array or string. The message will be imploded with `"
  - \n"` (new line) if it is in an array so that you can compose the message easier.
- [bool **$html** = TRUE]
  - Set the email in html format. FALSE if should be in plain text.
- [string **$smtp** = config_item('email_smtp')]
  - SMTP server to be used
- [string **$charset** = config_item('email_charset')]
  - Character set to be used. The default is "utf-8"

**Return Values**

- *String* - if accepted for delivery, the hash value of the address parameter
- *FALSE* - on failure.

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




--------




--------


### Time Related Functions
##### timestr()

`timestr( [$type], [$format] )`

Return a string of the time type in specified date format.     
The time types are defined in [settings.php - date section](#dates).  
  
This time string is useful in time comparisons.  

**Parameters**

- [string **$type** = '']
  - Time type defined in `settings.php`. If this is *empty*, returns string as of the time now. You can also specify custom date here directly if you are not using the time types defined. (see examples below)
- [string **$format** = YmdHis]
  - Php [date format](http://php.net/manual/en/function.date.php "PHP date&#40;&#41;") to output

**Return Values**

- *String* - of formatted time
- *FALSE* - if the type is not set or the custom date is invalid.

**Examples**

  
```php  
echo timestr();		// echo time now (e.g. 201512121234)  
echo timestr( 'start' );		// echo 201512311338  
echo timestr( 'end' , 'Y-m-d H:i');		// echo 2015-12-31 13:38  
echo timestr( '2015-1-23 12:34');		// echo 201501231234  
```  




--------


##### time_started()

`time_started( [$type] )`

Checks if current time is already past the specific time.  

**Parameters**

- [string **$type** = 'start']
  - Time type defined or custom date (refer to [`timestr()`](#timestr) )

**Return Values**

- *TRUE* - if the time already past
- *FALSE* - otherwise

**Examples**

  
```php  
if( ! time_started() )  
	echo "Application period is not yet started.";  
```  




--------


##### time_ended()

`time_ended( [$type] )`

Checks if current time is still not yet past the specific time.  

**Parameters**

- [string **$type** = 'end']
  - Time type defined or custom date (refer to [`timestr()`](#timestr) )

**Return Values**

- *TRUE* - if the time is still not yet past
- *FALSE* - otherwise

**Examples**

  
```php  
if( time_ended() )  
	echo "Application period is already ended.";  
else  
	// show form  
	...  
```  




--------




--------


### Miscellaneous Functions
##### die_nicely()

`die_nicely( [$text], [$caption], [$include_header] )`

Die nicely with styles. Useful to show simple error message immediately without having the need to make a new page.  

**Parameters**

- [string **$text** = '']
  - Error message content to display (wrapped with `<p>`)
- [string **$caption** = '']
  - Error message caption to display (wrapped with `<h2>`).
- [bool **$include_header** = FALSE]
  - Include header.inc.php if *TRUE* - since `header.inc.php` already included before loading the page file, the use is very limited before header is included by index.php. For instance, making a custom library and this is called before `header.inc.php` is loaded. However, if this is called too early before main helper is loaded, this function will fail to be called anyway (PHP error). 
  -  No effect if `$ws_loader['incl_header']` is FALSE. 
  - NOTE: footer is always included; again if `$ws_loader['incl_footer']` is FALSE, footer will not be included.

**Return Values**

- *Void*

**Examples**

  
```php  
if( ! valid_user() )  
{  
	die_nicely( 'You are not allowed to access this page.' , 'Access Denied');  
}  
```  




--------


##### get_require()

`get_require( $filename )`

require a php file and return the result after the code is run. That is, normally we will get some html code or text as how your required file design. Sometimes you may not want to include the php file directly for various reasons and only need to results.  

**Parameters**

- string **$filename**
  - file path and name

**Return Values**

- *String*

**Examples**

  
```php  
$result = get_require( '/some/path/to/file' );  
```  




--------


##### empty_default()

`empty_default( $value, $default )`

Returns default value if input value is empty (check with `empty()`).  

**Parameters**

- string **$value**
  - Input value to be checked if it is empty. Note that this is passed by reference. (`&$value`)
- string **$default**
  - Default value to set to the input variable if it is empty

**Return Values**

- *Void*

**Examples**

  
```php  
$str = '';  
empty_default( $str , '123' );		// $str = '123'  
$str2 = '456';  
empty_default( $str2 , '123' );		// $str2 = '456'  
```  




--------


##### html()

`html( $element, [$attributes], [$html_close_comment] )`

Prepare a html element.    
  
Note: This is not an intelligent function. You must give instructions if that is a self-closing element or is an element with close tag. Defaults to self-closing element (i.e. no close tag will be made).  

**Parameters**

- string **$element**
  - Element name to be printed. E.g. a, form, input, etc.
- [array **$attributes** = '']
  - Any attributes to be printed inside the open tag. Sub array items can also be array. For details please refer to [`_print_attributes()`](#_print_attributes). You may also specify '' (blank) for $attributes if no attributes to add if you need close comment (below).
- [bool **$html_close_comment** = FALSE]
  - If *TRUE*, add a html comment after close tag to make view source better. Text to add is from id and class attributes (see examples). No effect for self-closing elements.

**Return Values**

- *String* - html code generated

**Examples**

  
  
Basic usage:  
```php  
echo html( 'a' , array( 'href' => 'www.example.com', 'title' => 'Hover Text'), 'Test Website');  
// Prints: <a href="www.example.com" title="Hover Text">Test Website</a>  
  
echo html( 'div' , array( 'id' => 'div1' ) , "Test" , '/ #div1');  
// Prints: <div id="div1">Test</div> <!-- / #div1 -->  
  
echo html( 'img', array( 'src' => 'test.png' );  
// Prints: <img src="test.png">  
  
echo html( 'div', array( 'class' => 'myclass' , '' );  
// Prints: <div class="myclass"></div>  
```  
What makes this function really useful is you can modify the attributes array before generating the tag:  
```php  
$attr = array( 'class' => 'myclass' );  
if( $P['a'] == FALSE )  
{  
	$attr['class'] => 'yourclass';  
}  
echo html( 'div' , $attr , 'Sample Text' );  
// if $P['a'] is really false:  
// prints: <div class="yourclass">Sample Text</div>  
```  
You can also wrap html() into another html() just like a chain:  
```php  
echo html( 'div' , '' ,   
		html( 'h4' , '' ,   
			html( 'a' , $attr, 'A link in a h4 in a div')  
		)  
	);  
```  




--------


##### div()

`div( [$html], [$class], [$attributes], [$html_close_comment] )`

Wraps html code into a `<div>` element.    
  
(A shorthand of [html()]('html'))  

**Parameters**

- [string **$html** = '']
  - html code to wrap into the div
- [string **$class** = '']
  - class of the div tag
- [array **$attributes** = '']
  - other attributes of the div tag
- [bool **$html_close_comment** = TRUE]
  - If *TRUE*, add a html comment after close tag to make better view source. Text to add is from id and class attributes. No effect for self-closing elements. 
  - **Note:** different from [`html()`](#html) where the default is *FALSE*

**Return Values**

- *String* - html code generated

**Examples**

  
```php  
echo div( html( 'p' , '' , 'Hello World!') );  
// prints:  
// <div><p>Hello World!</p></div>  
```  

**Changelog**

- Added on: 2016-01-22  




--------


##### _flatten_attributes()

`_flatten_attributes( [$attributes] )`

Flatten the 2nd level array for html elements so that it will make it easier to manipulate while it is an array.  
  
You do not need to call this function if you are using [`_print_attributes()`](#_print_attributes).  

**Parameters**

- [array **$attributes** = '']
  - Array of element attributes in `key => value` pairs

**Return Values**

- *Array* - (one-dimensional array)

**Examples**

  
```php  
$attr['class'][] = 'class1';  
$attr['class'][] = 'class2';  
$attr['id'] = 'id';  
$attr = _flatten_attributes( $attr );  
// $attr = array( 'class' => 'class1 class2', 'id' => 'id' );  
```  




--------


##### _print_attributes()

`_print_attributes( [$attributes] )`

Print html tag attributes **if** the attribute **has some values**, i.e. not an empty string `''`.  
  
Set the value to *NULL* to print the attribute name for boolean attributes.  
  
You do not need to call this function if you use [`html()`](#html).  

**Parameters**

- [array **$attributes** = '']
  - Array of element attributes in `key => value` pairs, of *any* attributes (e.g. id, class, etc.)

**Return Values**

- *String* - of attributes

**Examples**

  
```php  
$attr['class'][] = 'class1';	// will be printed  
$attr['class'][] = 'class2';	// will be printed  
$attr['id'] = 'id';				// will be printed  
$attr['style'] = '';			// will NOT be printed since blank  
$attr['disabled'] = NULL;		// will be printed since it is NULL  
echo '<img' . _print_attributes( $attr ) .'>';  
// prints: <img class="class1 class2" id="id" disabled>  
```  

**Changelog**

- 2016-03-30  
	- fixed an issue that the attribute is not printed when the value is zero  




--------


##### add_scheme()

`add_scheme( $url, [$scheme] )`

Add a scheme if no scheme is defined in the $url. A scheme can be `http://`, `ftp://`, `https://`, `file://`, etc.  
  
Normally, you will not call this manually in the application, but from other url-handling helper functions.  

**Parameters**

- string **$url**
  - url to be checked
- [string **$scheme** = 'http://']
  - scheme to add if no scheme is stated

**Return Values**

- *String* - URL with added scheme

**Examples**

  
```php  
$url = 'abc.example.com';  
echo add_scheme( $url );  
// prints: http://abc.example.com  
  
$url2 = 'http://def.example.com';  
echo add_scheme( $url, 'https://' );  
// prints: http://def.example.com since a scheme is present  
```  




--------


##### remove_scheme()

`remove_scheme( $url )`

Remove scheme (e.g. http:// ) from a url.  

**Parameters**

- string **$url**
  - input url

**Return Values**

- *String* - url without scheme

**Examples**

  
```php  
echo remove_scheme( http://www.example.com );  
// prints: www.example.com  
```  




--------


##### char()

`char( $char, [$num] )`

Create a character repeatedly.  

**Parameters**

- string **$char**
  - the character to be created
- [int **$num** = 1]
  - number of times to be repeated

**Return Values**

- *String* - generated characters

**Examples**

  
```php  
echo char( '*' , 10 );  
// prints: **********  
```  




--------


##### t()

`t( [$num] )`

Create tab character ("\t") repeatedly. A shorthand to `char("\t")`.  
  
This is useful to indenting html source for debugging.  

**Parameters**

- [int **$num** = 1]
  - Indentation level (number of tabs)

**Return Values**

- *String*

**Examples**

  
```php  
echo t(0) . '<table>';  
echo t(1) . '<tr>...';  
echo t(2) . '<td>...';  
....  
```  




--------


##### nl()

`nl( [$num] )`

This function has 2 types of results (see examples):  
  
1. Create newline character ("\n") repeatedly. A shorthand to `char("\n")`.  
2. Warp the input text (html code) with newline character to both ends.  
  
This is useful to format html source for debugging.  

**Parameters**

- [int/string **$num** = 1]
  - number of newline chars OR input html

**Return Values**

- *Void*

**Examples**

  
Use 1: (normally to be used together with `t()`)  
```php  
echo '<div>' . nl() . t() . '<p>';  
// prints:  
// <div>  
//    <p>  
```  
  
Use 2:  
```php  
$html1 = "<div><p>Hello World!</p></div>";  
$html2 = "<div><p>See You!</p></div>";  
$html3 = "<div><p>Next Time!</p></div>";  
echo $html1 . nl( $html2 ) . $html3;  
// prints:  
// <div><p>Hello World!</p></div>  
// <div><p>See You!</p></div>  
// <div><p>Next Time!</p></div>  
  
// for comparison:  
echo $html1 . $html2 . $html3;  
// prints:  
// <div><p>Hello World!</p></div><div><p>See You!</p></div><div><p>Next Time!</p></div>  
```  




--------




--------




--------


## Helpers

Helpers, as the name suggests, help you with tasks. Each helper file is a collection of functions in a particular category. Helper files located in `./helpers/`. All helper file names should ends with `_helper.php`, e.g. `array_helper.php`.

To load a helper in a page, use `load_helper( 'helper_name' );` (e.g. `load_helper('array');`). To auto-load a helper for the whole site, add the name of helper(s) in `$config['helpers']` in `settings.php`.

Since most likely we will have our own helper functions in each application (and for that specific application), a blank `local_helper.php` is here and set to auto-load by default.




--------


### array

We deal with arrays a lot so the array helpers are here to help.



--------


##### tsv2array()

`tsv2array( $data, [$has_header], [$row_key], [$delimiter], [$convert_spaces] )`

Convert tab-separated values string to 2-dimensional array. If the data supplied is already an array, does nothing.  
  
Note: you can use `//` to comment out a row in a data for convenience.  

**Parameters**

- string **$data**
  - Delimited string data to be converted
- [bool **$has_header** = TRUE]
  - TRUE to make first array item as the key of the 2nd level array (and the first item will be removed in the array)
- [bool/string **$row_key** = TRUE]
  - If *TRUE*, search for `'id'` field (opinionated value) as the 1st level array keys. 
  -  If *FALSE*, keep numeric 1st level array keys. 
  -  If *string*, search for identifier field as specified in this value and make it as 1st level array keys. Otherwise, the first level array keys are numeric. For example, if your id field is named "row_id", you can pass this string for this parameter, so that the first level keys are properly named to make it into an associative array. Note: if same key value exists, the later ones will have the original numeric key appended after the key value, so that data will not be overwritten and appears as separate array item.
- [string **$delimiter** = "\t"]
  - Column delimiter character.
- [bool **$convert_spaces** = TRUE]
  - If *TRUE*, convert 4 consecutive spaces to tabs before conversion. Editors may replace tabs with spaces automatically.

**Return Values**

- *Array* - of data (2-dimentional array)

**Examples**

  
```php  
$data = tsv2array('  
id	name	title  
john	John Doe	Mr.  
jane	Jane Doe	Ms.  
// 3	This Record is Commented Out  
');  
  
print_r($data):  
// prints:  
// Array  
// (  
//     [john] => Array  
//         (  
//             [id] => john  
//             [name] => John Doe  
//             [title] => Mr.  
//         )  
//   
//     [jane] => Array  
//         (  
//             [id] => jane  
//             [name] => Jane Doe  
//             [title] => Ms.  
//         )  
//   
// )  
```  

**Changelog**

- 2018-01-21  
	Added `$convert_spaces` parameter  




--------


##### array_header_to_keys()

`array_header_to_keys( $array )`

Making first item of array to array keys and remove the 1st item in the result array for 2 dimentional array.  
  
Note: If you are using [`tsv2array()`](#tsv2array), this is automatically called if `$has_header` is *TRUE*.  

**Parameters**

- array **$array**
  - input array

**Return Values**

- *Array* - (prep'd)

**Examples**

  
```php  
$data = array(  
	array( 'key1' , 'key2' , 'key3' ),  
	array( 'value1A' , 'value2A', 'value3A' ),  
	array( 'value1B' , 'value2B', 'value3B' ),  
	);  
  
printr( array_header_to_keys($data) );  
  
// prints:  
// Array  
// (  
//     [0] => Array  
//         (  
//             [key1] => value1A  
//             [key2] => value2A  
//             [key3] => value3A  
//         )  
//     [1] => Array  
//         (  
//             [key1] => value1B  
//             [key2] => value2B  
//             [key3] => value3B  
//         )  
// )  
```  

**Changelog**

- 2016-02-16  
	- Fixed a bug that if the item has no value, the value will becomes *NULL*. Now changes to *''* (blank) string  




--------


##### csv2array()

`csv2array( $text, [$delimiter] )`

Converts comma-delimited (or other delimited type) values to array. Does nothing if the supplied value is already an array.  

**Parameters**

- string **$text**
  - delimited values to be converted
- [string **$delimiter** = ',']
  - delimiter character

**Return Values**

- *Array* - (single level)

**Examples**

  
```php  
$data = csv2array( '1,a,2,b,3,c')  
printr($data);  
// prints:  
// Array  
// (  
//     [0] => 1  
//     [1] => a  
//     [2] => 2  
//     [3] => b  
//     [4] => 3  
//     [5] => c  
// )  
```  




--------


##### array2tsv()

`array2tsv( $haystack, [$make_header], [$delimiter] )`

Convert a 2D array to TSV values. Basically a reverse to [`tsv2array()`](#tsv2array).  

**Parameters**

- array **$haystack**
  - input array (2-dimensional)
- [bool **$make_header** = TRUE]
  - If *TRUE*, make array keys (of first item) to be the header row
- [string **$delimiter** = "\t"]
  - Column delimiter character

**Return Values**

- *String* - (delimited)

**Examples**

  
```php  
$data= array(  
	array( 'id'=>'12345','pw'=>'zxcv'),  
	array( 'id'=>'23456','pw'=>'asdf')  
	);  
print_r( array2tsv( $data ) );  
  
// prints:  
// id       pw  
// 12345	zxcv  
// 23456	asdf  
```  




--------


##### array2list()

`array2list( $data, [$list_type], [$attributes] )`

Create list from array. Can be multi-dimentional array for nested list.  

**Parameters**

- array **$data**
  - Input data array
- [enum **$list_type** = 'ul']
  - Type of list to be generated. Valid values: *ol* / *ul*; ordered list or unordered list
- [array **$attributes** = '']
  - wrapper element (`<ul>` / `<ol>`) attributes. (see [_print_attributes()](#_print_attributes))

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
$set1 = array( 1,2,3,4,5,6,7 );  
echo array2list( $set1 , 'ol' );  
// prints:  
// <ol>  
// 	<li>1</li>  
// 	<li>2</li>  
// 	<li>3</li>  
// 	<li>4</li>  
// 	<li>5</li>  
// 	<li>6</li>  
// 	<li>7</li>  
// </ol>  
  
$set2 = array( 'a','b' => array( 'c','d' ), 'e' => array( 'f','g' ) );  
echo array2list( $set2 );  
// prints:  
// <ul>  
// 	<li>a</li>  
// 	<li>b  
// <ul>  
// 	<li>c</li>  
// 	<li>d</li>  
// </ul>  
// </li>  
// 	<li>e  
// <ul>  
// 	<li>f</li>  
// 	<li>g</li>  
// </ul>  
// </li>  
// </ul>  
```  




--------


##### array2table()

`array2table( $array, [$options] )`

Creates a simple html table from a 2D array. Useful for displaying simple database results. Note:  
  
- if the sub-array key name begins with `file_`, it will auto link to the file in `$options['upload_dir']` directory. (This field should only save the file name)  
- it will replace underscores "_" to spaces by default for table headers (th)  

**Parameters**

- array **$array**
  - input array (2 dimensional)
- [array **$options** = '']
  - optional properties listed below:

**Properties**

- [string **$id** = '']
  - table id
- [string **$class** = '']
  - table class
- [string **$upload_dir** = `$config['upload_dir']`]
  - Directory name for *file* fields
- [array **$search** = '']
  - Search for this in column header (th) and replace with that in $replace
- [array **$replace** = '']
  - Replace with this, must match the item count in $search
- [bool **$counting** = FALSE]
  - If *TRUE*, add a auto counting first column starting from 1

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
$data = tsv2array('  
id	name    title  
john    John Doe    Mr.  
jane    Jane Doe    Ms.  
');  
  
echo array2table($data, array('counting' => true));  
  
// prints:  
// <table class="table table-condensed table-hover">  
// 	<thead>  
// 		<tr>  
// 			<th>#</th>  
// 			<th>Id</th>  
// 			<th>Name</th>  
// 			<th>Title</th>  
// 		</tr>  
// 		</thead>  
// 	<tbody>  
// 		<tr>  
// 			<td>1</td>  
// 			<td>john</td>  
// 			<td>John Doe</td>  
// 			<td>Mr.</td>  
// 		</tr>  
// 		<tr>  
// 			<td>2</td>  
// 			<td>jane</td>  
// 			<td>Jane Doe</td>  
// 			<td>Ms.</td>  
// 		</tr>  
// 	</tbody>  
// </table>  
```  

**Changelog**

- 2017.10.13  
	- fixed an issue where auto counting is not correct  




--------


##### array_extract()

`array_extract( $array, $key )`

Extract an item from an array and remove from original array. Consider it [`array_shift()`](http://php.net/manual/function.array-shift.php) but by a specified key.  

**Parameters**

- array **$array**
  - source array; **array is passed by reference**
- string **$key**
  - item key to be extracted

**Return Values**

- *Array* - extracted array; Also note that the item in the input array is removed

**Examples**

  
```php  
$data = array(  
	'user1' => array( ... ),  
	'user2' => array( ... ),  
	...  
	'user11' => array( ... ),  
	'user12' => array( ... ),  
	'user13' => array( ... ),  
	...  
);  
$result = array_extract( $data, 'user12' );  
  
// $result = array( 'user12' -> array( ... ) );  
// $data = array(  
// 	'user1' => array( ... ),  
// 	'user2' => array( ... ),  
// 	...  
// 	'user11' => array( ... ),  
// 	'user13' => array( ... ),  
// 	...  
// );  
```  




--------


##### array_group_by()

`array_group_by( $array, $group_by_key, [$keep_array_item] )`

Group array data by one of the keys and make it one more dimension deeper  

**Parameters**

- array **$array**
  - input array
- string **$group_by_key**
  - the key of the input array item to be grouped
- [bool **$keep_array_item** = TRUE]
  - if *TRUE*, the value of the key array item will be kept in the deeper level array; 
  -  if *FALSE*, the value of the key array item will be removed otherwise.

**Return Values**

- *Array* - (2 dimensional array)

**Examples**

  
```php  
$data = array(  
	array( 'id' => 1, 'group' => 'admin' ),  
	array( 'id' => 2, 'group' => 'user' ),  
	array( 'id' => 3, 'group' => 'admin' ),  
);  
$data = array_group_by( $data, 'group' );  
print_r( $data );  
  
// prints:  
// Array  
// (  
//     [admin] => Array  
//         (  
//             [0] => Array  
//                 (  
//                     [id] => 1  
//                     [group] => admin  
//                 )  
//             [1] => Array  
//                  (  
//                     [id] => 3  
//                     [group] => admin  
//                  )  
//         )  
//     [user] => Array  
//         (  
//             [0] => Array  
//                 (  
//                     [id] => 2  
//                     [group] => user  
//                 )  
//         )  
// )  
```  
In the example above, if $keep_array_item is set to FALSE, the last level array items with key "group" will be removed.  




--------


##### array_multi_search()

`array_multi_search( $array, $pairs )`

Search multi-dimentional array for the `key=>value` search pairs. All the search pairs must be matched. You can consider it a "AND" query for multiple pairs.  

**Parameters**

- array **$array**
  - input array to be searched
- array **$pairs**
  - array of `search_key=>search_value` pairs

**Return Values**

- *Array* - of search results

**Examples**

  
```php  
$data = tsv2array( ... );  
$results1 = array_multi_search( $data, array( 'id' => '123' ) );  
$results2 = array_multi_search( $data, array( 'surname' => 'Chan', 'firstname' => 'Peter' ) );  
```  




--------


##### array_order_by()

`array_order_by( $array, $col1, [$col1_order], ... )`

Sort database-style results  

**Parameters**

- array **$array**
  - input array to be sorted
- string **$col1**
  - sort by this column name
- [enum **$col1_order** = SORT_ASC]
  - PHP sorting order flag (i.e. `SORT_ASC` / `SORT_DESC` )
-  **...**
  - $col1 and $col1_corder can be repeated for additional sort criteria.

**Return Values**

- *Array* - sorted

**Examples**

  
```php  
$data = array(   
	array( 'user_id' => '132' ),   
	array( 'user_id' => '66'),  
	...  
);  
$data = array_order_by( $data, 'user_id' , SORT_ASC );  
```  




--------


##### array_sort_by_array()

`array_sort_by_array( $array, $order_array, $key_to_order )`

Sort an array by the order of items in the second array. If there are some values in the first array that are not in the order array, those array items will be appended after the ordered items.  

**Parameters**

- array **$array**
  - input array to be sorted
- array **$order_array**
  - the array of items in order; can also use csv.
- string **$key_to_order**
  - the key in the first array to be ordered

**Return Values**

- *Array* - sorted in custom order

**Examples**

  
```php  
$data = array(  
	'user1' => array( 'user_type' =>¡@'admin' ),  
	'user2' => array( 'user_type' =>¡@'user' ),  
	'user3' => array( 'user_type' =>¡@'editor' ),  
);  
$order = array( 'admin', 'editor', 'user' );  
$data = array_sort_by_array( $data, $order, 'user_type' );  
// the $data array will be sorted to this order: user1, user3, user2  
```  




--------


##### array_to_1d()

`array_to_1d( $arr )`

Flattens multi-dimentional array into one-dimentional, while keeping the values only (array keys are lost).  

**Parameters**

- array **$arr**
  - input array to be flattened

**Return Values**

- *Array (1 Dimensional)*

**Examples**

  
```php  
$example = array( 'a' => '1', 'b' => array( 'c' => '2', 'd' => '3' ) );  
printr( array_to_1d( $example ) );  
  
// prints:  
// Array  
// (  
//     [0] => 1  
//     [1] => 2  
//     [2] => 3  
// )  
```  

**Changelog**

- 2017-10-13  
	- named changed from `array_to1d()` inline with other functions.  
	- `array_to1d()` is now an alias, subject to removal.  
- Added on: 2016-02-05  




--------


##### array_trim()

`array_trim( $array )`

Trim all items in the array recursively for space characters.  
  
Note: this will not remove empty array items. Use [`array_filter()`](http://php.net/manual/function.array-filter.php) if you need to remove empty array items.  

**Parameters**

- array **$array**
  - Input array

**Return Values**

- *Array* - with items trimmed

**Examples**

  
```php  
$arr2 = array_trim( $arr );  
```  

**Changelog**

- 2015-12-30  
	- Fixed a bug that child array are not trimmed.  




--------


##### array_value_search()

`array_value_search( $array, $needle )`

Search the array for a value (irrespective to keys).  

**Parameters**

- array **$array**
  - input array to be searched
- string **$needle**
  - value to be searched

**Return Values**

- *Array* - search results. The orginal array key is retained.

**Examples**

  
```php  
$data = tsv2array( ... );  
$results = array_value_search( $data, 'Peter' );  
```  




--------




--------


### authen

The Authentication and Security helper contains functions on this area. However, note that this is not a complete package so you are required to write your own routine with these helpers.



--------


#### reCAPTCHA

These functions resembles the basic usage of reCAPTCHA. Please setup the site key and secure key in `settings.php`.



--------


##### recaptcha_js()

`recaptcha_js(  )`

Return the JavaScript line to be included to use reCAPTCHA. You need to call this to include the script in html `<head>` section.  

**Parameters**

- *nil*

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo recaptcha_js();  
```  




--------


##### recaptcha_verified()

`recaptcha_verified(  )`

Verify the recaptcha submitted in the recaptcha widget. Note that it does not accept any parameters as this will read the POST data for the recaptcha input and settings for secret key.  

**Parameters**

- *nil*

**Return Values**

- *TRUE* - if reCAPTCHA input is valid
- *FALSE* - otherwise
- *NULL* - if either the recaptcha input OR secret key is missing

**Examples**

  
```php  
if( recaptcha_verified() ) { ... }   
```  




--------


##### recaptcha_widget()

`recaptcha_widget( [$size], [$tab_index] )`

Generate a recaptcha div with the site key.  

**Parameters**

- [enum **$size** = normal]
  - valid value: *normal* / *compact*; Note: "compact" size is more like vertical mode
- [int **$tab_index**]
  - tab index value if you are setting tab index for other inputs

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo recaptcha_widget();  
echo recaptcha_widget( 'compact' );  
```  




--------


#### User Login
##### check_ip()

`check_ip( $ips, ... )`

Check if the client's IP address matches with **any** IP addresses specified.  
  
To make it error prone, this function accept *any* numbers of arguments, as well as arguments in array or csv.  
  
An IP address can be either:  
  
1. a full IPv4 address (**xxx.xxx.xxx.xxx**) (you can use an asterisk to substitute any part of the IP as a wildcard) (e.g. 192.\*.1.\*)  
2. predefined keywords for localhost ("**LOCAL**" or "**LOCALHOST**")  

**Parameters**

- array **$ips, ...**
  - List of valid IP addresses, can also be in csv, or even as separate arguments.

**Return Values**

- *TRUE* - if matched *any* of the IP in the arguments
- *FALSE* - otherwise

**Examples**

  
```php  
if( check_ip( '202.168.*.*', LOCAL ) ) ...  
```  




--------


##### user_ip()

`user_ip(  )`

Get user's IP address. Basically an alias to `$_SERVER['REMOTE_ADDR']`, but more reliable.  

**Parameters**

- *nil*

**Return Values**

- *String* - of IP Address

**Examples**

  
```php  
// To prep data to be saved and record user's IP  
$data_to_be_saved[1]['ip'] = user_ip();  
```  




--------


##### valid_user()

`valid_user( $name_to_check, [$type] )`

Check if the user name is a valid user. List of user names can be set in `settings.php`.    
Normally this will work together with other authentication service for checking password, and this function to check if the user is eligible to use this application.  

**Parameters**

- string **$name_to_check**
  - user name to be checked
- [enum **$type** = 'users']
  - valid values: users / admin; You can also add your custom user types in `settings.php`. User type to be checked against

**Return Values**

- *TRUE* - if the name is on list
- *FALSE* - otherwise

**Examples**

  
```php  
if( valid_user( $username ) ) { ... }		// check against list of normal users  
if( valid_user( $username, 'admin' ) { ... }	// check against list of admin users  
```  




--------




--------


### bs_components

The Bootstrap Components helper contains various function to make proper html code for elements in Bootstrap style. Since Bootstrap's styles and components have its own pre-defined code structure, this helper simplifies the need of repeating the same codes again.

The list of functions is added when it is used so do not expect a less-used component will have a function here. All functions in this helper return HTML codes to be printed by yourself.



--------


##### bs_a_btn()

`bs_a_btn( [$href], [$text], [$title], [$size], [$contextual], [$attributes] )`

Create a link in button style which prep url automatically. In essence a shorthand to call [`bs_btn()`](#bs_btn) for links.  

**Parameters**

- [string **$href** = '#nogo']
  - The url to be linked. If is does not have a scheme specified, it assumes internal links and prepend with [`site_url()`](#site_url).
- [string **$text** = '']
  - The visible text on the button / link
- [string **$title** = '']
  - anchor title (hover popup text)
- [enum **$size** = '']
  - Button sizes: xs / sm / lg; ''(blank) or 'md' is the default size - md is a pseudo choice as default size does not need to specify originally.
- [enum **$contextual** = 'default']
  - Button contextual classes. You may also specify ''(blank) for default 
  -  (default / primary / success / info / warning / danger / link)
- [array **$attributes** = array()]
  - other tag attributes

**Return Values**

- *String* - of html code

**Examples**

  
```php  
echo bs_a_btn( 'edit/' . $id , 'Edit' );		// a button  
echo bs_a_btn( 'edit/' . $id , 'Edit', 'xs' , 'link' );		// a link (button style)  
```  

**Changelog**

- 2016-02-12  
	- if $href begins with a "#" character, it will not be prep'd with `site_url()`  
- 2016-02-01  
	- Added $size and $contextual.  




--------


##### bs_accordion()

`bs_accordion( $, $items, [$attributes], [$contextual], [$expanded] )`

Make accordion using panels and collapse.  

**Parameters**

-  **$**

- array **$items**
  - items array. See usage for format.
- [array **$attributes** = array()]
  - panel group attributes
- [enum **$contextual** = 'default']
  - panels' contextual classes ( primary / success / info / warning / danger )
- [mixed **$expanded** = FALSE]
  - FALSE = all collapsed; TRUE = 1st item expanded; string = "header" values of panel to be expanded, can be csv or array

**Return Values**

- *Void*

**Examples**

  
```php  
// $items format  
// Type 1 - for simple header and content pairs  
$items1 = array (  
	'Group 1' => 'some content...',  
	'Group 2' => 'some content...',  
);  
  
// Type 2 - for panels with footer  
$items2 = array(  
	array(  
		'header'	=> 'Group 1',  
		'content'	=> 'some content...',  
		'footer'	=> 'footer text',  
	),  
	array(  
		...  
	),  
);  
  
// first panel will be expanded on load  
echo bs_accordion( $items1, '' , '' , TRUE );  
  
// all panel will be collapsed on load  
echo bs_accordion( $items1 );  
  
// panel with header "Group 3" will be expanded  
echo bs_accordion( $items2 , '', '' , 'Group 3' );  
  
```  




--------


##### bs_alert()

`bs_alert( [$head], [$body], [$contextual], [$dismissible], [$attributes] )`

Generate an alert block  

**Parameters**

- [string **$head** = '']
  - header in bold (Note: separate with $body with a space only)
- [string **$body** = '']
  - message text
- [enum **$contextual** = 'info']
  - contextual classes ( info / success / warning / danger)
- [bool **$dismissible** = FALSE]
  - add a close button if *TRUE*
- [array **$attributes** = array()]
  - html tag attributes in `key => value` pairs to be printed in the `div` element of the alert

**Return Values**

- *String* - HTML code

**Examples**

  
```php  
echo bs_alert( 'Success!', 'Data saved successfully', 'success', TRUE );  
```  




--------


##### bs_btn()

`bs_btn( [$text], [$element], [$size], [$contextual], [$attributes] )`

Create a button or tag with `.btn` class  

**Parameters**

- [string **$text** = '']
  - The visible text on the button
- [enum **$element** = 'button']
  - Element to be used: 
  -  *button* 
  -  *a* / *anchor* (alias to a) - a class="btn" 
  -  *input* - input type=button 
  -  *submit* - input type=submit
- [enum **$size** = '']
  - Button sizes: xs / sm / lg; ''(blank) or 'md' is the default size - md is a pseudo choice as default size does not need to specify originally.
- [enum **$contextual** = 'default']
  - Button contextual classes. You may also specify ''(blank) for default 
  -  (default / primary / success / info / warning / danger / link)
- [array **$attributes** = array()]
  - other tag attributes

**Return Values**

- *String* - of html code

**Examples**

  
```php  
echo bs_btn( 'Edit' );  
```  

**Changelog**

- 2016-01-22  
	- Added alias `bs_button()`.  
	- Removed `type="submit"` for button element.  
	- Added $size and $contextual.  
	- Rewritten to make use of `html()`.  




--------


##### bs_callout()

`bs_callout( [$title], [$content], [$contextual], [$attributes] )`

Create a callout box.  

**Parameters**

- [string **$title** = '']
  - title of the box
- [string **$content** = '']
  - content in the box
- [enum **$contextual** = 'default']
  - contextual classes ( default / primary / info / danger / warning / success )
- [array **$attributes** = array()]
  - tag attributes (on wrapper div)

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo bs_callout( 'Warning' , 'You are not allowed to enter this area.' , 'warning' );  
```  




--------


##### bs_icon()

`bs_icon( $name, [$contextual], [$attributes], [$tag_to_use] )`

Create markup for glyphicon, close button and caret.  

**Parameters**

- enum **$name**
  - *close* - for close icon 
  -  *caret* - for caret 
  -  *valid glyphicon name* - for glyphicons (e.g. asterisk, plus). Refer to the [Bootstrap docs](http://getbootstrap.com/components/#glyphicons).
- [enum **$contextual** = '']
  - text contextual class. Not applicable to "close" and "caret" ( *muted / primary / success / info / warning / danger* )
- [array **$attributes** = array()]
  - other tag attributes
- [string **$tag_to_use** = span]
  - specifiy if you would use another html element (e.g. `i`) to hold the icon.

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo bs_icon( 'remove', 'danger' );  
echo bs_icon( 'close' );  
echo bs_icon( 'caret' );  
```  




--------


##### bs_list_group()

`bs_list_group( $items, [$list_type], [$attributes] )`

Create a list group. Custom list item content is not supported.  

**Parameters**

- array **$items**
  - Items of the list group. See *Examples* for details
- [enum **$list_type** = 'basic']
  - type of list group. ( **basic** / **linked** / **button** ) 
  -  Basic:  `<ul><li>` 
  -  Linked: `<div><a>` 
  -  Button: `<div><button>`
- [array **$attributes** = array()]
  - wrapper div attributes e.g. id, class etc.

**Return Values**

- *String* - of HTML code

**Examples**

  
1. Simple List  
```php  
// this creates a simple list group  
$items1 = array( '1','2','3','4' );  
echo bs_list_group( $items1 );  
  
// prints:  
// <ul class="list-group">  
// 	<li class="list-group-item">1</li>  
// 	<li class="list-group-item">2</li>  
// 	<li class="list-group-item">3</li>  
// 	<li class="list-group-item">4</li>  
// </ul>  
```  
  
2. Linked list  
```  
// make key as the text to be printed, and attributes of the item as the sub array values.  
$items2 = array(  
	'text1' => array( 'class' => 'active' , 'href' => 'http://1.example.com'),  
	'text2' => array( 'class' => 'active' , 'href' => 'http://2.example.com'),  
	// Be reminded to specify "href" for links  
);  
echo bs_list_group( $items2 , 'linked' );  
  
// prints:  
// <div class="list-group">  
// 	<a class="active list-group-item" href="http://1.example.com">text1</a>  
// 	<a class="active list-group-item" href="http://2.example.com">text2</a>  
// </div>  
```  
  
3. Button list  
```  
$items3 = array(  
	'text2' => array( 'type' => 'submit' , 'class' => 'disabled' ),  
	'text3' => array( 'type' => 'submit' , 'class' => 'disabled' ),  
	// Be reminded to specify "type" of buttons ( button / submit / reset)  
	// default type="button" if not set  
	// Also other button attributes if needed (e.g. the class in this example)  
);  
echo bs_list_group( $items3 , 'button' );  
  
// prints:  
// <div class="list-group">  
// 	<button type="submit" class="disabled list-group-item">text2</button>  
// 	<button type="submit" class="disabled list-group-item">text3</button>  
// </div>  
```  
  
4. The other type of `$items` array, for complex "text" content which cannot be put in array key  
```  
$items4 = array(  
	array('text' => 'Complex text that is not suitable to put as array key'),  
	array('text' => html(...), 'href' => ... ),  
);  
```  
  
5. Badges  
```php  
// Simply add "badge" key in the item array:  
$items5a = array(  
	array( 'text' => ... , 'badge' => 'badge_text' ),  
	...  
	);  
);  
  
// for multiple badges, put the badge texts as an sub-array:  
$items5b =  
array(  
	array(  
		'text' => ... ,  
		'badge = >  
		array(  
			'badge_text1',  
			'badge_text2',  
		),  
	),  
);  
```  

**Changelog**

- 2015-01-19  
	- Added support for badge.  




--------


##### bs_panel()

`bs_panel( [$title], [$content], [$footer], [$contextual], [$div_content], [$attributes], [$head_attributes], [$body_attributes] )`

Creates a panel.  

**Parameters**

- [string **$title** = '']
  - Panel heading text. Leave blank for no title
- [string **$content** = '']
  - Panel body text or html
- [string **$footer** = '']
  - Footer text. Leave blank for no footer
- [enum **$contextual** = 'default']
  - Contextual class. ( primary / success / info / warning / danger / default )
- [bool **$div_content** = TRUE]
  - *TRUE* if use `<div class="panel-body">` to wrap content, 
  -  *FALSE* to use custom content html (e.g. wrap with table, list groups); 
  -  Note: no need to add `.panel-body` to tables and list groups
- [array **$attributes** = array()]
  - wrapper div attributes, e.g. id, class, etc.
- [array **$head_attributes** = array()]
  - panel head wrapper div attributes
- [array **$body_attributes** = array()]
  - panel body wrapper div attributes; no effect if $div_content is FALSE.

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo bs_panel( 'Welcome' , html(...) );  
  
// for $content part, you may also use bs_list_group() or table  
echo bs_panel( 'Please select' , bs_list_group( array(...) ) , '' , FALSE );  
```  

**Changelog**

- 2016-02-12  
	- added $head_attributes, $body_attributes to add more flexibility  




--------


##### bs_well()

`bs_well( $html, [$modifier], [$attributes] )`

Create a well to give inset effect.  

**Parameters**

- string **$html**
  - wrap the well to this html code block
- [enum **$modifier** = '']
  - the bs well modifier class ( '' / sm / lg )
- [array **$attributes** = array()]
  - tag attributes

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo bs_well( form_gen_fieldset( $fs1 ) );		// wrap the fieldset in well  
echo bs_well( '<p>Some Text</p>' , 'sm' );		// a small sized well effect  
```  




--------




--------


### bs_form

The Bootstrap Form helper contains a standard use case to help creating forms in Bootstrap style easily. This was developed from an old form helper, which is now deprecated and removed in favour of the use of Bootstrap framework).

Please study the basics of Bootstrap framework before you can use these helpers properly.



--------


#### Standard Use Case

The helper is developed with the consideration of "fieldsets" with multiple fields in a fieldset. Therefore, instead of manually creating form fields individually, we can make use of an array of settings of the fieldset in tab seperated values (TSV). Consider the following code snippet:

```php
$fs1 = tsv2array('
//1	2	3	4	5	6	7	8	9	10	11
id	label	type	validate	desc	placeholder	options	extra	value	append	prepend
sid	Student ID	text	required,custom[integer]
password	password	password	required
');

$form_type = 'horizontal';
echo form_open( '' , $form_type );
echo form_gen_fieldset( form_set_values( $fs1, $P ), '' , $form_type );
echo form_submit( '' , $form_type );
echo form_fieldset_close();
echo form_close();
```

(Note: the number are here to help counting the tabs)

This code block creates a form with the 2 fields (sid, password), in B's horizontal form style.
The use of TSV minimizes the typing required, although in essence the functions accepts array as input. Therefore, you can also modify the array first before generating the form fields.

For the data to input in the TSV is discussed below. You can reorder the TSV, just to change order the column header in the way you prefer.

Please also refer to [`tsv2array()`](#tsv2array) in **arrays** helper. Also, please read below sections for explanations of each helper functions.

For horizontal form type, you can specify the width of label, e.g. `horizontal-6`. The element width would be the remaining width. Otherwise, for site-wide label width, you can modify the constant `HORIZONTAL_FORM_LABEL_WIDTH` in `config/constants.php`.

Please also note that there is a global form disabled state switch. Please refer to [form_disabled()](#form_disabled) for details. However, you can completely ignore it if you do not need this functionality.



--------


##### 1. id

The unique id and the name of the field.

Note: if you have to specify id and name differently, use [html()](#html) to create your own tag as this is out of the standard use case.



--------


##### 2. label

Text label to be displayed. For radio and checkbox, this will be the group label (not the label next to the select option).

If no label tag should be created, put **FALSE** as value.



--------


##### 3. type

The following describes the form element types available in this helper:

type | Description
--- | ---
hidden | a hidden field. *label* attribute has no effect
select | Standard select list make use of `<option>` tags.
select-radio | List of options in radio buttons. Only 1 option can be chosen.
select-checkbox | List of options in checkboxes. Multiple options can be made.
static | text wrapped in `<p>` tag. Specify the text in *value* attribute. The text is aligned on the element side. Note: *label* does still prints and you still need to give an unique *id* although this is not printed.
html | plain html code to output. Specify the code in *label* or *value* attribute. If both attributes are specified, *label* takes precedence and the other discards.
textarea | Standard textarea. Default *rows* = 2. Specify *rows* value in *options* (this is a special case)
checkbox | Single checkbox. Use *desc* attributes to specify text next to the checkbox.
file| Standard file upload field
text | Standard text field
All other valid HTML5 input types | Those input types must begin with `<input`.

See [7. options](#7-options) section below for select options.

Note: There is no type for a single radio option as this is not helpful at all.



--------


##### 4. validate

Add a validation class. In this framework we make use of the [jquery-validationEngine plugin](http://posabsolute.github.io/jQuery-Validation-Engine/ "Complete docs here").

Separate validation rules with comma (,).

Some common validation rules are listed below:

Rule [Keyword / E.g.] | Description
--- | ---
required | A required field
min[0.1] / max[99] | Specify min / max value of the field (value)
minSize[1] / maxSize[200] | Specify min / max character length
custom[email] | valid email address (e.g. test@example.com)
custom[phone] | valid phone (e.g. 30561309, 6543-1234, +58 295416 7216)
custom[url] | valid url address (e.g. http://..., https://..., ftp://...)
custom[date] | valid date (YYYY-MM-DD)
custom[number] | floating points (with optional sign) (e.g. -143.22, .77 , +234.23)
custom[integer] | integers (with optional sign) (e.g. -635, +2201, 738)
ipv4 | An IP (v4) address (e.g. 127.0.0.1)

Note: Multiple "custom" rules are separated with commas with square brackets. e.g. custom[phone,integer]



--------


##### 5. desc

Descriptive text show next to (or under - depends on form type) the field.



--------


##### 6. placeholder

Placeholder text show inside the field, when it is empty.



--------


##### 7. options

This attribute has effect only on the 3 select types. (Special: *options* can also specify the *rows* attribute of *textarea*, just put an integer as options for textarea.)

Options is an array with `value => description` pair in essence. However, to work nicely with TSV, you may also use `value1||desc1, value2||desc2` syntax.

- value: the value to be captured in data
- desc: the text to be shown to user on the select list / checkboxes / radio.



--------


###### a. select options


```php
add_options_set( 'options1', array(
	'1'=>'One' , '2'=>'Two',
) );
$data = tsv2array('
// 1 2 ... 7
id	label ... options
sid	Year ... $options1
');
```

There is a pre-defined `$ws_select_options` variable. You can add item in this array using [`add_options_set()`](#add_options_set) and then specify `$options1` as the option value.

To add a select option easily, you can create the options array first and then use `add_options_set()`. This is also good for those selects with same options set

Two commonly used options has been pre-defined:

1. status (same value&label: Active / Inactive / Deleted )
2. bool (value=>label: Y=>Yes / N=>No )





--------


###### b. serialized  json encoded array

The options can be specified using the `serialize()` or `json_encode()`functions. Either one is fine and the system will detect.

```php
$options1 = array('1'=>'One' , '2'=>'Two');
) ) );
$data = tsv2array('
// 1 2 ... 7
id	label ... options
sid	Year ... ' . serialize( $options1 ) . ' ...
num	Number ... ' . json_encoded( $options1 ) . '...
');
```



--------


###### c. value-desc pair

Specify in the TSV with pre-defined separator: "`||`" (two vertical bar, or <kbd>shift-\</kbd>). This is useful for simple lists.

On the other hand, for a even more simpler list (the value and desc is the same), simply put csv there.

```php
$data = tsv2array('
// 1 2 ... 7
id	label ... options
year	Year ... 1||One,2||Two ...
age	Age	..	14,15,16,17,18
');
```




--------


##### 8. extra

Any extra stuff to put *in* the field's tag. This is not filtered (except we will `trim()` and then add one space in front to the string). You can even put JavaScript call here, examples:  
`disabled`
`onclick="somescript();"`  



--------


##### 9. value

Value (initial value) of the field. For checkbox and radio the one with the value will be set checked.



--------


##### 10&11. append & prepend

Any text or code to append or prepend to the field, using [B's input group addon functionality](http://getbootstrap.com/components/#input-groups-basic).



--------


#### User Functions
##### form_open()

`form_open( [$action], [$type], [$id], [$class], [$multipart], [$extra], [$text], [$method] )`

This makes proper form open tag. It also accept an array as the first argument that include part or all of the arguments as array keys. E.g. `form_open( array( 'id'=> ... , 'action' => ... )`  

**Parameters**

- [string **$action** = '']
  - form handler. If empty, will point back to current page. `htmlentities( $_SERVER['REQUEST_URI'] )`
- [string **$type** = '']
  - Bootstrap form type ( '' / horizontal / inline)
- [string **$id** = '']
  - form id
- [string **$class** = '']
  - class of the form
- [bool **$multipart** = FALSE]
  - TRUE to open multipart form (e.g. for file upload)
- [string **$extra** = '']
  - Anything to add before the form open tag is ended (`<form action="" ... extra_stuff here>`)
- [string **$text** = '']
  - html code or text to add immediately after the open tag is ended `<form>$text...`
- [enum **$method** = 'post']
  - HTTP method ( GET / POST )

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo form_open();		// a simple open tag that points to itself as handler  
  
echo form_open('submit.php','horizontal','form1','capture',TRUE,'disabled');  
// prints:  
// <form action="submit.php" class="form-horizontal capture" id="form1" enctype="multipart/form-data" disabled>  
```  




--------


##### form_close()

`form_close( [$text] )`

Produces a closing `</form>` tag. The only advantage to use this function is it permits you to pass data to it which will be added directly below the tag and you do not have to close php blocks.  

**Parameters**

- [string **$text** = '']
  - html code or text to add immediately after the close tag is ended `</form>\n$text...`

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo form_close( '</div></div>');  
// prints  
// </form>  
// </div></div>  
```  




--------


##### form_gen_fieldset()

`form_gen_fieldset( $fields, [$legend], [$form_type], [$attributes] )`

Generate a fieldset with form fields in Bootstrap style.  
  
In essence, this function is simply a combination call of `form_fieldset_open()` and `form_gen_elements()`. However, to streamline the use case of the form helper, this function is essential.  
  
Note: All elements will have an auto-id generated. For instance, if the id of the field is *field1*, then the `<label>` will have an id *label_field1*, the field element (`<input>`,`<textarea>`, etc.) will have id *field1*. For select options, an auto number will be added, e.g. *field1-1* (starting from 1). There will be an auto id for input group div as well.  

**Parameters**

- array/string **$fields**
  - data of the fieldset. See [Standard User Case](#Standard-Use-Case) section.
- [string/bool **$legend** = '']
  - Text to show as the caption of the fieldset. Specify *FALSE* if no need to create the fieldset tag: `<fieldset>`.
- [enum **$form_type** = '']
  - Bootstrap form type ( '' / horizontal / inline ) 
  -  If $form_type is *horizontal*, you can also specify the label width e.g. *horizontal-4*
- [array **$attributes** = array()]
  - attributes add to fieldset open tag (e.g. id, class, ...)

**Return Values**

- *String* - html code of the whole fieldset (or fields)

**Examples**

  
```php  
$fs1 = tsv2array('  
...  
');  
echo form_gen_fieldset( $fs1, '' , $form_type );  
```  




--------


##### form_fieldset_open()

`form_fieldset_open( [$legend], [$attributes] )`

Create fieldset open tag and legend tag. Normally you will use [form_gen_fieldset()](#form_gen_fieldset) instead.  

**Parameters**

- [string/bool **$legend** = '']
  - Text to show as the caption of the fieldset. No `<legend>` tag will be created if it is an empty string
- [array **$attributes** = array()]
  - Attributes to print in `<fieldset>` tag, e.g. id, class, etc.

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo form_fieldset_open();  
// prints: <fieldset>  
  
echo form_fieldset_open('Please Sign In:', array('id'=>'fs1'));  
// prints: <fieldset id="fs1"><legend>Please Sign In:</legend>  
```  




--------


##### form_fieldset_close()

`form_fieldset_close( [$text] )`

Produces a closing `</fieldset>` tag. The only advantage to use this function is it permits you to pass data to it which will be added directly below the tag and you do not have to close php blocks.  

**Parameters**

- [string **$text** = '']
  - html code or text to add immediately after the close tag is ended `</fieldset>\n$text...`

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo form_fieldset_close( '</div></div>');  
// prints  
// </fieldset>  
// </div></div>  
```  




--------


##### form_submit()

`form_submit( [$text], [$form_type], [$contextual], [$id], [$class], [$extra] )`

Make a submit button.  

**Parameters**

- [string **$text** = 'Submit']
  - Button text
- [enum **$form_type** = '']
  - Bootstrap form type ( '' / horizontal / inline ) 
  -  If $form_type is *horizontal*, you can also specify the label width e.g. *horizontal-4*
- [enum **$contextual** = 'primary']
  - contextual classes
- [string **$id** = '']
  - id of the button
- [string **$class** = '']
  - class of the button
- [string **$extra** = '']
  - extra attributes / text to be included in the tag.

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo form_submit();  
// prints: <button type="submit" class="btn btn-primary">Submit</button>  
  
echo form_submit('','horizontal');  
// prints:  
//	<div class="form-group">  
//		<div class="col-sm-offset-3 col-sm-9">  
//			<button type="submit" class="btn btn-primary">Submit</button>  
//		</div>  
//	</div>  
// note: default constant value is 3  
```  

**Changelog**

- 2016-02-03  
	- Added $contextual; removed $class default.  




--------


##### form_submitted()

`form_submitted(  )`

Check if form is submitted.  

**Parameters**

- *nil*

**Return Values**

- *TRUE* - if form is submitted
- *FALSE* - otherwise

**Examples**

  
```php  
if( form_submitted() ) { // ... }  
```  




--------


##### form_set_values()

`form_set_values( [$fields ], [$data ] )`

This set the `value` attribute in `$fields`, if the key exists in `$data`. This is useful for repopulating form data. Normally you will use together with [form_gen_fieldset()](#form_gen_fieldset).  
  
Consider the tab-separated values you will use. Normally the "value" column is empty. Now this function (re)popoluate the value column in the array with values from the form or from database.  

**Parameters**

- [array  **$fields ** =  ]
  - fields data
- [array  **$data ** =  ]
  - array to search for field value

**Return Values**

- *Array* - prep'd $fields with values from $data

**Examples**

  
```php  
echo form_gen_fieldset( form_set_values( $fs1, $P ) );  
```  




--------


##### form_set_value()

`form_set_value( $field, $data )`

Similar to [form_set_values()](#form_set_values). However this only set value for a single form field. Normally you will not calling this manually and you should simply specify TRUE to the last argument when using [form_element()](#form_element).  

**Parameters**

- array **$field**
  - field array (single field)
- array **$data**
  - values array (e.g. data from post or database)

**Return Values**

- *Array*

**Examples**

  
*No examples for general uses are available at the moment*  

**Changelog**

- Added on: 2016-02-05  




--------


##### form_disabled()

`form_disabled( [$value] )`

This function has two uses (see examples):  
1. Making all form elements in disabled state (or not).  
	- Note: This is a global switch. Meaning that you can change this settings once and change for all fields.  
	- Default disabled state is FALSE. (i.e. you can completely ignore this function if you do not need this.)  
2. Returns the string `disabled` if form is in "disabled" state. (this use is designed for form field helper functions to set the disabled state.)  

**Parameters**

- [bool **$value** = '']
  - Set if the form should be disabled. 
  -  If the value is empty, it returns the string `disabled` if form is in disabled state.

**Return Values**

- *Void* - if setting disabled state (use 1)
- *String/Null* - (use 2)

**Examples**

  
```php  
// for use 1:  
form_disabled( TRUE );		// init  
if( time_started() AND ! time_ended() )  
	form_disabled( FALSE );  
```  

**Changelog**

- Added on: 2016-02-01  




--------


##### form_element()

`form_element( $type, [$form_type], [$name], [$label], [$value], [$options], [$set_value] )`

Creates a single form element  

**Parameters**

- enum **$type**
  - valid form helper input types (see Standard Use Case > [3. type](#3-type))
- [enum **$form_type** = '']
  - Bootstrap form type ( '' / horizontal / inline ) 
  -  If $form_type is *horizontal*, you can also specify the label width e.g. *horizontal-4*
- [string **$name** = '']
  - name & id attributes of the field
- [mixed| '' **$label** = label text. If no label tag should be created, put `FALSE`]

- [string **$value** = '']
  - value attribute
- [array **$options** = array()]
  - other form helper input attributes (name, id, label, type, value, validate, desc, placeholder, options, extra, append, prepend)
- [mixed **$set_value** = FALSE]
  - if want to set value for the element with [form_set_value()](#form_set_value), supply the $data array; FALSE (default) as not using this feature.

**Return Values**

- *String* - of HTML code

**Examples**

  
```php  
echo form_element( 'text' , '' , 'login','Login Name');  
// prints:  
// <div id="form-group_login" class="form-group">  
// 	<label for="login" id="label_login">Login Name</label>  
// 	<input name="login" id="login" class="form-control" type="text">  
// </div>  
```  

**Changelog**

- 2016-02-02  
	- Fixed an issue if $options is not an array. (You can now use `''` if not defined)  




--------


##### add_options_set()

`add_options_set( $name, $options )`

Add a select options set to be used by select types.  

**Parameters**

- string **$name**
  - a name to refer to this options set
- string/array **$options**
  - delimited values or array of values of select options. See Standard Use Case > [7. Options](#7-options)

**Return Values**

- *Void*

**Examples**

  
```php  
add_options_set( 'option1', array(...) );  
```  

**Changelog**

- 2016-01-21  
	- Name changed from `add_select_options()` for clarity. Also changed the way it works.  




--------


##### get_options_set()

`get_options_set( [$option_set], [$no_result], [$fix_numeric_array] )`

Get the select options set (which was added by [add_options_set()](#add_options_set)). Note: the options set are use by [form_gen_fieldset()](#form_gen_fieldset) automatically and rarely you will need to use this manually.  

**Parameters**

- [string **$option_set** = '']
  - name of option set to retrieve. If blank, all options sets will be returned as multi-dimentional array
- [mixed **$no_result** = FALSE]
  - value to return if the option set is not found
- [bool **$fix_numeric_array** = TRUE]
  - if prep the options set to make numeric array to return meaningful values in select types. That is, if your array keys are only numbers, you will get the value of the array item instead. (For associative arrays, you get the array keys instead.)

**Return Values**

- *Array*

**Examples**

  
```php  
if( get_options_set( 'option_set_1' ) )  
{  
	...  
}  
```  

**Changelog**

- 2016-02-12  
	- Renamed from `get_select_option()` for clarity, which is now remained as an alias for backward compatibility  




--------


##### add_option_html()

`add_option_html( $option_set_name, $option_id, $html )`

Add html code to a select option in an option set. This function is to give more flexibility as originally you cannot modify select options easily. For examples, if you have some special html code need to add to a specific option only, this will be helpful.  

**Parameters**

- string **$option_set_name**
  - option set name
- string **$option_id**
  - id (array key) of the option in the set
- string **$html**
  - html code to add for the option

**Return Values**

- *Void*

**Examples**

  
```php  
add_option_html( 'bool' , 'Y' , '<p>Please think twice before your choose yes.</p>');  
```  

**Changelog**

- Added on: 2016-02-05  




--------


##### get_option_html()

`get_option_html( $option_set_name, $option_id )`

Get html to append for an option. This is called automatically when using the form helper. Normally you will not be calling this manually unless you are writing your own helper function.  

**Parameters**

- string **$option_set_name**
  - option set name
- string **$option_id**
  - id of the option in the set

**Return Values**

- *String* - if the option set and option id is found
- *FALSE* - otherwise

**Examples**

  
```php  
echo get_option_html( 'bool' , 'Y');  
```  

**Changelog**

- Added on: 2016-02-05  




--------


#### Internal Functions

A brief description and note on the "internal" functions that is called by other user functions in this helper.

For details, please study the source code.



--------


##### form_gen_elements()

`form_gen_elements( $fields, $form_type )`

Generate all form elements in fields data. You should be using `form_gen_fieldset()` instead of this function. Calls `_prep_tag()`.  

**Parameters**

-  **$fields**

-  **$form_type**





--------


##### form_prep()

`form_prep( $data )`

Formats text so that it can be safely placed in a form field in the event it has HTML tags.  

**Parameters**

- string/array **$data**





--------


##### _prep_tag()

`_prep_tag( $i, $form_type )`

Create a form field tag in Boostrap style with the tag's specifications. This is core function of the form helper to generate elements.  
TODO: form.inline styles  

**Parameters**

-  **$i**

-  **$form_type**





--------


##### _prep_options()

`_prep_options( $options )`

Prep select options properly  

**Parameters**

-  **$options**





--------


##### _fix_options_values()

`_fix_options_values( $select_options )`

prep options set to make numeric array to return meaningful values in select types  

**Parameters**

-  **$select_options**





--------


##### _print_options()

`_print_options( $tag, $type )`

Print out options properly according to select type  

**Parameters**

-  **$tag**

-  **$type**





--------


##### _print_form_attributes()

`_print_form_attributes( $attributes_to_print, $array_with_value )`

Prepare attributes inside a tag clean and nicely for making form elements in form helper  

**Parameters**

-  **$attributes_to_print**

-  **$array_with_value**





--------




--------


### datafile

The Datafile helper contains functions that assist in working with data files. You will use keep data in text files instead of in database. Useful if you do not have access to databases or if the application is simple.

You can create many "dataset" (data file) for convenience. Please refer to Settings > [Datafile Helper](#datafile-helper).

Note: for ALL functions which has set to use 'default' dataset, you can simply use a blank string `''` to keep using the default if you need to pass other arguments. (By the aid of [empty_defaults()](#empty_defaults).)



--------


##### is_unique_record()

`is_unique_record( $key_field, $value, [$dataset] )`

Check if the record already exist in datafile.  

**Parameters**

- string **$key_field**
  - the field name to be checked against
- string **$value**
  - the value of the record to be checked
- [string **$dataset** = 'default']
  - the data file setting to be used. Defined in `settings.php`

**Return Values**

- *TRUE* - if the record is not found (i.e. unique)
- *FALSE* - otherwise (i.e. found in data)

**Examples**

  
```php  
if ( is_unique_record( 'id' , '12345' ) { ... } else { ... }  
```  




--------


##### save_uploaded_file()

`save_uploaded_file( $field_name, [$new_file_name], [$upload_dir], [$allowed_size], [$allowed_exts], [$allowed_types] )`

Save the uploaded file (from form) to the upload directory.  

**Parameters**

- string **$field_name**
  - the form field name of the file
- [string **$new_file_name** = '']
  - Specify new file name if needs to be changed 
  -  BLANK to keep original file name.
- [string **$upload_dir** = 'upload']
  - Save file to this directory 
  -  Relative to application root OR you can specify an absolute path. 
  -  Note: the directory must be created and writable by the apache user 
  -  *if not specified, will defaults to `$config['upload_dir']`*
- [int **$allowed_size** = '']
  - if specified, check the file against this size limit; *if not specified, will defaults to `$config['allowed_size']`*
- [mixed **$allowed_exts** = '']
  - if specified, check the file if it is of one of these file extensions 
  -  an array or csv of extensions 
  -  *if not specified, will defaults to `$config['allowed_exts']`*
- [mixed **$allowed_types** = '']
  - if specified, check the file if it is of this mime type 
  -  an array or csv of mime types 
  -  *if not specified, will defaults to `$config['allowed_types']`*

**Return Values**

- *TRUE* - if the file is successfully saved to the destination directory.
- *FALS* - if the file is FAILED to be saved (but passes the checks). Possible reason is destination directory permissions.
- *Array* - of checking result if there are some errors with the following keys (values in boolean): <br> "size" - file size is within $allowed_size <br> "ext" - file extension is one of the allowed <br> "type" - MIME type is one of the allowed <br> "path_length" - if the file path is too lon
- *NULL* - if the file size is 0 (zero);

**Examples**

  
```php  
$result = save_uploaded_file( 'file_cv' , date('Ymd').'-'.$P['name'].pdf , 2*1024*1024, 'pdf,txt,docx' , 'application/pdf,text/plain,application/msword');  
  
// Note to check against TRUE rather than NOT FALSE, as array of checks is one of the possible return  
if( $result !== TRUE )  
{  
	var_dump( $result ).  
}  
else  
{  
	echo "File successfully uploaded!}  
}  
```  

**Changelog**

- 2016-02-05  
	- renamed from `save_file()` for clarity. Rewritten for its major flaws in original version.  




--------


##### get_data()

`get_data( [$dataset], [$key_field] )`

Get all records from data file as an array, with the first row as array keys.  
  
This is *a helper of helpers*. That is you can achieve the same result by using together with `[open_datafile()](#open_datafile)`, `[array_header_to_keys()](#array_header_to_keys)`, `[make_data_assoc()](#make_data_assoc)`.  

**Parameters**

- [string **$dataset** = 'default']
  - the dataset to be used which defined in `settings.php`
- [string **$key_field** = FALSE]
  - key field to make the data array to be an associative array. *FALSE* (default) to keep it numeric.

**Return Values**

- *Array* - of data retrieved (2-dimensional)
- *FALSE* - if the dataset does not exist

**Examples**

  
```php  
$data = get_data();  
$data = get_data( 'set1' );  
$data = get_data( 'set2', 'user_id' );  
```  




--------


##### get_active_data()

`get_active_data( [$dataset], [$active_key], [$key_field] )`

An extension to [`get_data()`](#get_data). This returns "active" data only.  
  
The value of "active" field must not be evaluated as *FALSE* or *empty*: i.e. 0, NULL, FALSE, and `''` (blank).  

**Parameters**

- [string **$dataset** = 'default']
  - the dataset to be used which defined in `settings.php`
- [string **$active_key** = 'active']
  - the field to be used to evaluate the record is active or not; Default 'active' is an opinionated field name.
- [string **$key_field** = FALSE]
  - key field to make the data array to be an associative array. *FALSE* (default) to keep it numeric.

**Return Values**

- *Array* - of data retrieved (2-dimensional)
- *FALSE* - if the dataset does not exist

**Examples**

  
```php  
$data = get_active_data( 'set1' );  
$data = get_active_data( 'set2', 'status' , 'user_id' );  
```  




--------


##### add_record()

`add_record( $data, [$dataset], [$audit_fields] )`

Prep data and append a single record to data file.  
  
This function will auto *remove* `submit` key in the data array, and *add* `uniqid` (unique id), `date_added`, `ip_addr` attributes. Also add header row if this file is empty. This is useful for saving form results.  
  
This is a *helper of helpers*, which calls [`array_header_to_keys()`](#array_header_to_keys), [`prep_for_datafile()`](#prep_for_datafile), and [`save_datafile()`](#save_datafile).  

**Parameters**

- array **$data**
  - Data to be saved, in array of `key => value` pairs
- [string **$dataset** = default]
  - the dataset to be used which defined in `settings.php`
- [bool **$audit_fields** = TRUE]
  - add audit fields (Unique ID, Date Added, IP Address) values to the record. 
  -  "Unique ID" is generated by `uniqid()` 
  -  "Date Added" is the system date and time when the record is added 
  -  "IP Address" is the user's IP address.

**Return Values**

- *Int* - number of bytes saved (evaluates to TRUE)
- *FALSE* - if the dataset does not exist

**Examples**

  
```php  
$data = array( 'id' => '12345' , 'name' => 'John Doe' )  
$result = add_record( $data );		// if default set  
```  

**Changelog**

- 2016-01-21  
	- Changed name from `save_record()` for clarity.  




--------


##### update_record()

`update_record( $key_field, $key_field_value, $new_data, [$dataset], [$backup], [$update_key_field_value] )`

Update ONE record in the dataset.  
  
Note that it will check against the current data columns. If a column does not exist, the value will not be added to the row; On the other hand, if the existing column is not exist in new data, the old values will be kept.  

**Parameters**

- string **$key_field**
  - key field of the data. Can be *FALSE* if intended to use numeric dataset
- string **$key_field_value**
  - key field value of the record to be updated (must be unique, otherwise, will update the first record in the data file)
- array **$new_data**
  - array of data to be updated (`key=>value` pairs)
- [string **$dataset** = 'default']
  - Dataset to use
- [bool **$backup** = FALSE]
  - Backup data file before update. (See [`backup_dataset()`](#backup_dataset))
- [bool **$update_key_field_value** = FALSE]
  - If the key field value should be updated if the key field exists in $new_data. This is handy as you do not need to remove the key field in the data array beforehand

**Return Values**

- *Int* - for successful updates, number of bytes of data file saved after updates
- *FALSE* - if the dataset is not found
- *NULL* - if the record is not found

**Examples**

  
```php  
$data = array( 'name' => 'New Name' );  
$result = update_record( 'user_id' , '0' , $data );  
if( $results ) { ... }  
```  




--------


##### delete_record()

`delete_record( $key_field, $key_field_value, [$dataset], [$backup] )`

Delete ONE record from data file  

**Parameters**

- string **$key_field**
  - key field of the data. Can be *FALSE* if intended to use numeric dataset
- string **$key_field_value**
  - key field value of the record to be updated (must be unique, otherwise, will update the first record in the data file)
- [string **$dataset** = 'default']
  - Dataset to use
- [bool **$backup** = FALSE]
  - Backup data file before deletion. (See [`backup_dataset()`](#backup_dataset))

**Return Values**

- *Int* - for successful deletes, number of bytes of data file saved after deletion
- *TRUE* - for successful deletes, if no more records in the dataset after deletion
- *FALSE* - if the dataset is not found
- *NULL* - if the record is not found

**Examples**

  
```php  
$result = delete_record( 'user_id', '0' );  
if( $result ) { ... }  
```  

**Changelog**

- 2016-01-21  
	- Added $key_field to use.  




--------


##### add_header_from_keys()

`add_header_from_keys( $data )`

Add a header row to the data. Headers are read from the first array item.  
  
Basically a reverse of [array_header_to_keys()](#array_header_to_keys). You may use it before saving data to a dataset. If the sub-item of the input array is not an associative array, does nothing.  

**Parameters**

- array **$data**
  - data to be saved in array of `key => value` pairs

**Return Values**

- *Array*

**Examples**

  
```php  
$data = array(   
	0 => array(   
		'name' => 'John',   
		'id' => '123456' ),  
	1 => ...  
);  
$data = add_header_from_keys( $data );  
  
// $data = array(   
//	0 => array( 'name' , 'id' ),   
//	1 => array( 'John', '123456' ),  
//	2 => ... );  
```  




--------


##### open_datafile()

`open_datafile( $filename, [$delimiter] )`

Open delimited text data file and load content as array.  
  
The function will replace `"` (double quote) to `&quot;`.  
  
For general uses, [get_data()](#get_data) should be a better choice.  

**Parameters**

- string **$filename**
  - file path and name to use
- [string **$delimiter** = "\\t" (tab)]
  - column delimiter

**Return Values**

- *Array* - of data from data file

**Examples**

  
```php  
$data = open_datafile( '/tmp/data.txt' );  
```  




--------


##### save_datafile()

`save_datafile( $filename, [$open_mode], [$delimiter] )`

Prep data array into delimited values and save to file as text data file.  

**Parameters**

- string **$filename**
  - file path and name to use
- [string **$open_mode** = 'a']
  - [php fopen mode](http://php.net/manual/en/function.fopen.php)
- [string **$delimiter** = "\t" (tab)]
  - column delimiter

**Return Values**

- *Int* - Bytes saved
- *FALSE* - if data is not an array

**Examples**

  
```php  
$result = save_datafile( '/tmp/data.txt', 'a+', ',');		// if csv  
```  




--------


##### prep_for_datafile()

`prep_for_datafile( [$data] )`

Filter and format data text so that it is safe for data file saving.  
  
In essence, what it does to each value:  
- trim()  
- newline (`\n` ,`\r`, `\r\n` character) to `<br>`  
- `\t` (tab) to `' '` (single space)  
- `&amp;` to `&`  
- 3rd (or later) level(s) array will be simply flattened by `json_encode()`.  

**Parameters**

- [array **$data** = array()]
  - data to prep

**Return Values**

- *Array* - of data

**Examples**

  
```php  
$result = save_datafile( 'data.txt', prep_for_datafile( $data ) );  
```  




--------


##### dataset()

`dataset( [$set_name] )`

Genearate the real file path of the dataset.  
  
You should not be using this function unless you are writing your own scripts to access the file directly.  

**Parameters**

- [string **$set_name** = 'default']
  - Name of the dataset

**Return Values**

- *String* - if the dataset is set
- *FALSE* - if the dataset is not found

**Examples**

  
```php  
$file = dataset( 'set1' );  
```  




--------


##### backup_dataset()

`backup_dataset( [$set_name] )`

Backup the data file of the dataset in a sub-directory "backup" in `$config_item['data_path']`. The function will try to create the folder if it does not exist. The filename will be appended with current datetime string.  

**Parameters**

- [string **$set_name** = 'default']
  - dataset to backup

**Return Values**

- *String* - filename of the backup copy
- *FALSE* - if dataset is not found
- *NULL* - if the backup directory is not writable

**Examples**

  
```php  
$bakfile = backup_dataset( 'set1' );  
```  




--------


##### make_data_assoc()

`make_data_assoc( $data, [$key_field] )`

Making a 2-dimentional numeric data array associative, with the key field value as the array item key. If the array is already an associative array, does nothing.  

**Parameters**

- array **$data**
  - input data array
- [string **$key_field** = 'uniqid']
  - key field value to be used as array item key

**Return Values**

- *Array - Associative Array*

**Examples**

  
```php  
$data = make_data_assoc( open_datafile( ... ) , 'user_id' );  
```  

**Changelog**

- 2016-02-11  
	- Changed $key_field default from 'id' to 'uniqid'.  




--------




--------


### db

The database helper aids you in connecting and retrieving data from MySQL database, using MySQLi.

This is in essence a library. However this library is NOT very complete. E.g. data escaping is missing in some parts. Need to use with care, but good enough for general use.



--------


#### Database Configuration

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



--------


#### Connecting to Database

The default set is automatically connected once the library is loaded. All functions manipulate the data is for the **active** set. If you have multiple set and you want to switch the active set, please use `db_set_active( 'set2' )`. To change back to the default set, simply `db_set_active()`.



--------


##### db_set_active()

`db_set_active( [$db_config] )`

Change active DB connection set.  

**Parameters**

- [string **$db_config** = 'default']
  - DB configuration set name

**Return Values**

- *TRUE* - if the active set is changed
- *FALSE* - otherwise.

**Examples**

  
```php  
db_set_active( 'set2' );		// set to use set2  
db_set_active();				// set to use the default set  
```  




--------


##### db_get_active()

`db_get_active(  )`

Get the name of active data connection set  

**Parameters**

- *nil*

**Return Values**

- *String* - name of the dataset

**Examples**

```php  
echo db_get_active();  
// prints: 'default' or whatever set name you defined  
```  




--------


##### db_connect()

`db_connect( $options )`

Open a connection to database.  
  
Note: You should be using [`db_set_active()`](#db_set_active) instead. Otherwise you cannot make use of the other helpers.  

**Parameters**

- array **$options**
  - array of properties

**Properties**

- string **$user**
  - Database user name
- string **$pass**
  - Database password
- string **$db**
  - Database name
- [string **$host** = 'localhost']
  - DB host name

**Return Values**

- *Object* - mysqli_connect() object

**Examples**

  
```php  
$conn = db_connect( array( 'user' => ... , 'pass' => ... , 'db' => 'testdb' ) );  
```  




--------


#### Running Queries

Please use [`db_query()`](#db_query) for a standard SQL query statement. Otherwise, you can also use [`db_select()`](#db_select), [`db_insert()`](#db_insert), [`db_insert_or_update()`](#db_insert_or_update), [`db_update()`](#db_update), [`db_delete()`](#db_delete) for valid queries. Please refer to the API doc of the functions below.



--------


##### db_query()

`db_query( $sql, [$prep_single], [$keep] )`

Make a SQL query to active database. You can make use of this function for custom SQL statements.  
  
This also serves as a "base" function of other querying methods.  

**Parameters**

- string **$sql**
  - SQL statement to run
- [bool **$prep_single** = FALSE]
  - if return a 1-dimesional result array (refer to [`db_select()`](#db_select) )
- [bool **$keep** = TRUE]
  - keep sql statement for debug (refer to [`db_last_queries()`](#db_last_queries) )

**Return Values**

- *FALSE* - on failure
- *Array* - of data for SELECT query
- *Object* - for SHOW, DESCRIBE or EXPLAIN quries
- *TRUE* - for other successful queries.

**Examples**

  
```php  
$data = db_query( "SELECT * FROM test_table WHERE colA = 1" );  
```  




--------


##### db_select()

`db_select( $select, $from, [$where], [$order], [$prep_single] )`

Select data from active database.  
  
This supports simple and straight forward select statements. For complex logics (e.g. grouping, sub-queries), you will still have to write your own sql queries and make use of [`db_query()`](#db_query).  
  
Note: WHERE values will be automatically escaped. See [`escape()`](#escape).  

**Parameters**

- mixed **$select**
  - SELECT portion, can be string or array (glued by a comma ",")
- mixed **$from**
  - FROM table references, can be string or array (glued by a comma ",")
- [mixed **$where** = '']
  - WHERE condition, can be string or array or associative array (glued by "AND", see usage below )
- [mxied **$order** = '']
  - ORDER BY section, can be string or simple array or associative array (glued by "AND", see usage below )
- [bool **$prep_single** = FALSE]
  - if a single record is expected (so it will be a 1-dimensional array instead of 2-dimensional array) to save some codes. 
  -  Note: if the actual result data is more than 1 row, it will still return a 2-dimensional array)

**Return Values**

- *Array* - query results

**Examples**

1. Simple select query  
```php  
$data = db_select( 'username' , 'users' , array( 'u.username' => 'asc' ) );  
// $data will be an two dimensional array: 1st level is indexed array and 2nd level is associative array:  
// $data = array(  
//		0 => array( 'username' => 'john' ),  
//		1 => array( 'username' => 'jane' ),  
//		2 => ... ,  
// );  
```  
  
2. More complex query  
```php  
$select = array( 'u.username' , 'u.password' , 'p.profilepic' );  
// SELECT u.username, u.password, p.profilepic  
  
$from = 'users u, profiles p';  
// FROM users u, profiles p  
  
$where = array( 'u.username' => $_POST['username'], 'p.password' => crypt( $_POST['password'] ) );  
// WHERE `u.username` = 'user1' AND `u.password` = '$1$q2dljdmO$GOqtv0hxwsbXbeldqYzVp0'  
// key and value is glued by "="  
  
$order = array( 'u.username' => 'asc' );  
// ORDER BY `u.username` asc  
  
$data2 = db_select( $select, $from, $where, $order , TRUE );  
// $data2 will be an associative array (one dimensional).  
// $data2 = array( 'username' => '...', 'password' => '...' , 'profilepic' => '...') ;  
```  
  
3. Here we list other possibilities:  
  
A. It is absolutely fine if you write your own portion in simple strings, for all **$select**, **$from**, **$where**, **$order** parts.  
```php  
$select = 'user,pass';  
// SELECT user,pass  
```  
  
B. No special effect for associative array for **$select** and  **$from**, it will just read the values.  
```php  
$from = array( 'a' => 'table1' );  
// FROM table1  
```  
  
C. It is also fine to use indexed array for **$where** and **$order**, and will be glued with AND. Useful to customized the query.  
```php  
$where = array( 'col1 = "a"', 'col2 !="b"' );  
// WHERE col1 = "a" AND col2 != "b"  
```  
```php  
$order = array( 'col1 asc', 'col2 desc');  
// ORDER BY col1 asc AND col2 desc  
```  




--------


##### db_insert()

`db_insert( $table, $data )`

Insert a single record into active database set.  

**Parameters**

- string **$table**
  - table name
- array **$data**
  - data array (associative array)

**Return Values**

- *TRUE* - on success
- *FALSE* - otherwise

**Examples**

  
```php  
$data = array( 'id' => 'jdoe', 'name' => 'John Doe' );  
$result = db_insert( 'user_table' , $data );  
```  




--------


##### db_update()

`db_update( $table, $data, $where )`

Update table for the data with the condition supplied.  

**Parameters**

- string **$table**
  - table name
- array **$data**
  - data array (associative array)
- mixed **$where**
  - condition. See [`db_select()`](#db_select) for how "where" can be specified

**Return Values**

- *Int* - number of rows affected if success
- *FALSE* - on failure

**Examples**

  
```php  
$data = array( 'name' => 'John Doe' );  
$result = db_update( 'user_table' , $data , array( 'id' => 'jdoe' ) );  
```  




--------


##### db_insert_or_update()

`db_insert_or_update( $table, $data )`

Insert a single record into database, or update a record if the primary key value is already exist.  
  
Use with care if you may accidentally rewrites an old record. Not to be used with multiple primary keys table.  

**Parameters**

- string **$table**
  - table name
- array **$data**
  - data array (associative array)

**Return Values**

- *FALSE* - on failure
- *0* - for not updated nor inserted
- *1* - for insert
- *2* - for update

**Examples**

  
```php  
$data = array( 'id' => 'jdoe', 'name' => 'John Doe' );  
$result = db_insert_or_update( 'user_table' , $data );  
```  




--------


##### db_delete()

`db_delete( $table, $where )`

Delete records from table with the condition supplied.  

**Parameters**

- string **$table**
  - table name
- mixed **$where**
  - condition. See [`db_select()`](#db_select) for how "where" can be specified

**Return Values**

- *Int* - number of rows affected if success
- *FALSE* - on failure

**Examples**

  
```php  
$result = db_delete( 'user_table' ,array( 'id' => 'jdoe' ) );  
// the row will be deleted. $result = 1 if there was a record with id = 'jdoe'; 0 if not; FALSE if the record is not found  
```  




--------


#### Query Helpers
##### escape()

`escape( $str )`

Escape and quote values as needed for SQL statement. Note:  
  
- Strings are auto escaped in the querying functions above. Use this for custom SQL statements as needed.  
- to use MySQL functions in the string, put prefix **`fx:`** and escaping will be skipped. e.g. `fx:now()`  

**Parameters**

- string / array **$str**
  - string to be escaped. can also be array to escape repeatedly

**Return Values**

- *String/Array* - escaped values suitable to run in MySQL query

**Examples**

  
```php  
$id = $_POST['id'];  
$sql = 'SELECT * FROM user_table WHERE id=' . escape( $id );  
$query = db_query( $sql );  
```  




--------


##### db_insert_id()

`db_insert_id(  )`

Get the insert ID number from database inserts  

**Parameters**

- *nil*

**Return Values**

- *String* - insert id

**Examples**

  
```php  
echo db_insert_id();  
```  




--------


##### db_table_structure()

`db_table_structure( $table )`

Get table structure  

**Parameters**

- string **$table**
  - Table name

**Return Values**

- *Array* - table structure metadata

**Examples**

  
```php  
printr( db_table_structure( 'user_table' );  
```  




--------


##### db_list_fields()

`db_list_fields( $table )`

Get field (column) names of the table  

**Parameters**

- string **$table**
  - Table name

**Return Values**

- *Array* - field names

**Examples**

  
```php  
foreach( db_list_fields( 'user_table' ) as $col_name )  
{  
	echo "<th>{ $col_name }</th>";  
}  
```  




--------


##### db_last_queries()

`db_last_queries(  )`

Get all sql statments queried (as of this method is executed).  
  
This is useful during development for debugging.  

**Parameters**

- *nil*

**Return Values**

- *Array* - sql statements

**Examples**

  
```php  
printr(  db_last_queries() );  
```  




--------


##### db_is_unique()

`db_is_unique( $table, $field, $value )`

Check if a field-value pair is unique in a table. Useful for checking unique / primary keys before insertion.  

**Parameters**

- string **$table**
  - table name
- string **$field**
  - field name
- string **$value**
  - the value to be checked

**Return Values**

- *TRUE* - if it is unique (does not exist in the table)
- *FALSE* - otherwise

**Examples**

  
```php  
  
```  

**Changelog**

- 2017.10.17  
	- Renamed from "db_unique()" for naming convention  




--------




--------


### dom

DOM helper is the PHP Simple HTML DOM Parser package by S.C. Chen.

Plaese read the [quick start guide](http://simplehtmldom.sourceforge.net/) and [full documentation](http://simplehtmldom.sourceforge.net/manual.htm) at the official site for details.



--------


### krumo

Krumo is a package to replace of `print_r()` and `var_dump()`. Please read the official site for details:  [http://krumo.sourceforge.net/](http://krumo.sourceforge.net/)



--------


##### krumo()

`krumo( $var1, $var2, ... )`

The most (if not the only) useful function in the package. It supports any number of variables of any type.  

**Parameters**

- mixed **$var1, $var2, ...**
  - anything to be printed

**Return Values**

- *Void*

**Examples**

*All examples are taken from the official site.*  
  
```php  
krumo($_SERVER, $_ENV);  
  
$x1->x2->x3->x4->x5->x6->x7->x8->x9 = 'X10';  
krumo($x1);  
```  




--------


##### Other Functions

```php
// print a debug backtrace
krumo::backtrace();

// print all the included(or required) files
krumo::includes();

// print all the included functions
krumo::functions();

// print all the declared classes
krumo::classes();

// print all the defined constants
krumo::defines();


// enable/disable Krumo on-the-fly

// disable Krumo
krumo::disable();

// Krumo is disabled, nothing is printed
krumo::includes();

// enable Krumo
krumo::enable();

// Krumo is enable, printing is OK
krumo::classes();
// This proves to be very useful when your PHP code gets swamped with Krumo calls dumping debuging information, and instead of removing each of those dumps one by one, you can just disable them.
```



--------




--------


### local

The Local helper file is created for your ease to write custom helper functions, especially specific single application. No functions or anything is written here by the framework. This is a just-for-convenience feature. It is fine for you to create new helpers with other names.



--------


### session

Session helper helps in manipulating session in php, as well as adding a "flash data" ability (see "[Flash Data](#flash-data)" section). Instead of helper functions, this is in essence a library for manipulating session. Upon loading the session helper the php session will also be started.



--------


#### Basic Session

We call the basic session "user data" which means the data added to session for user. "Flash data" is some session data that we will only use once and drop after use. However, this is in essence aliases to manipulate with `$_SESSION` superglobals with the exception to hide "flash data" entries. Therefore to use these functions or to use `$_SESSION` directly is up to your preference.



--------


##### set_userdata()

`set_userdata( $key, [$value] )`

Set or update user session data. You may also put an associative array as the only parameter to store multiple session keys at once. (Please see examples for the syntaxes)  

**Parameters**

- Array/String **$key**
  - User data item key or associative array of session items
- [Array/String **$value** = NULL]
  - value to store

**Return Values**

- *Void*

**Examples**

  
```php  
// syntax 1 - single item:   
set_userdata( 'username' , 'john' );  
  
// syntax 2 - multiple items:  
$newdata = array(   
	'username' => 'jane' ,  
	'email' => 'jane@example.com'  
);  
set_userdata( $newdata );  
  
// you can get the session data by: get_userdata('username') and get_userdata('email')  
  
```  

**Changelog**

- 2017.10.17  
	`$key` parameter was renamed from `$data` for clarity  




--------


##### get_userdata()

`get_userdata( [$key] )`

Get user session data.  

**Parameters**

- [string **$key** = `NULL`]
  - User data item key to retrieve. if unspecified (i.e. the default, `NULL`), all user data (in array) will be retrieved.

**Return Values**

- *Array/String* - Vaues of user session data
- *NULL* - if the key is not found

**Examples**

  
```php  
$session_data = get_userdata();  
// get array of all session data (i.e. an alias to $_SESSION, especially when flash data is not used).  
  
$user = get_userdata( 'username ');  
// get a single session item. If it is not set, NULL will be returned.  
// As opposed to $_SESSION, get_userdata will not throw an error if the key is not found.  
```  




--------


##### has_userdata()

`has_userdata( $key )`

Check if the user data item exists.  

**Parameters**

- string **$key**
  - user data item key

**Return Values**

- *TRUE* - if user data item is found
- *FALSE* - otherwise

**Examples**

  
```php  
if( has_userdata( 'username' ) ) { ... }  
```  




--------


##### unset_userdata()

`unset_userdata( $key )`

Remove a user data  

**Parameters**

- string **$key**
  - user data item key

**Return Values**

- *Void*

**Examples**

  
```php  
unset_userdata( 'username' );  
```  




--------


#### Flash Data

This framework supports "flash data", which the session data will only be available for the next server request, and are then removed automatically. This can be very useful, especially for one-time informational, error or status messages.



--------


##### set_flashdata()

`set_flashdata( $key, [$value] )`

Add or change flash data.  

**Parameters**

- array/string **$key**
  - flash data key; or an associative array with `key=>value` pairs. See examples for syntax.
- [string **$value** = '']
  - flash data value; only used if string key is specified in $key

**Return Values**

- *Void*

**Examples**

  
```php  
// syntax 1 - single item:   
set_flashdata( 'message' , 'Hello World' );  
  
// syntax 2 - multiple items:  
$newdata = array(   
	'message' => 'Hello World' ,  
	'error' => 'err1'  
);  
set_flashdata( $newdata );  
// you can get the session data by: get_flashdata('message') and get_userdata('error')  
  
  
// common usage example:  
if( ! valid_user( $username ) )  
{  
	set_flashdata('message','You are not allowed to enter this area.');  
	redirect();  
}  
```  




--------


##### get_flashdata()

`get_flashdata( [$key], [$keep] )`

Fetch a specific flashdata item from the session array.  
  
If `$key` is not specified, an array of all flash data will be fetched  

**Parameters**

- [string **$key** = '']
  - Flash data key
- [bool **$keep** = FALSE]
  - *TRUE* if keep the flash data for next request. (Otherwise will be destroyed automatically)

**Return Values**

- *Array/String* - value of the flash data or array of values
- *NULL* - if the flash data key is not found

**Examples**

  
```php  
<?=get_flashdata( 'message' );?>  
```  




--------


##### has_flashdata()

`has_flashdata( [$key] )`

Check if a flash data item exists  

**Parameters**

- [string **$key** = '']
  - Flash data key

**Return Values**

- *TRUE* - if the flash data key exists
- *FALSE* - otherwise

**Examples**

  
```php  
if( has_flashdata( 'message' );  
```  




--------




--------


### text

The Text Helper file contains functions that assist in working with text.

Most functions in this helper is a shameless copy of text helper from CodeIgniter, and others are adopted from other sources.

For these functions from CodeIgniter 2.0:

##### word_limiter()
##### character_limiter()
##### ascii_to_entities()
##### entities_to_ascii()
##### word_censor()
##### highlight_code()
##### highlight_phrase()
##### word_wrap()
##### ellipsize()

Refer to [CodeIgniter 2.2 User Guide: Text Helper functions](https://www.codeigniter.com/userguide2/helpers/text_helper.html)



--------


##### format_size_unit()

`format_size_unit( $bytes, [$decimals] )`

Convert size in bytes into proper human-readable units (TB/GB/MB/KB/bytes).  

**Parameters**

- int **$bytes**
  - Value to convert in number of bytes
- [int **$decimals**]
  - Correct the size to how many decimal places

**Return Values**

- *String* - formatted text

**Examples**

  
```php  
$value = filesize( 'test.txt' );  
echo "The file size is " . format_size_unit( $value , 2 );  
// prints: The file size is 12.35MB  
```  

**Changelog**

- 2016-02-05  
	- changed default rounding decimal places from 2 to 0 which is more intuitive  




--------


##### ordinal()

`ordinal( $n, [$superscript] )`

Display numbers with ordinal suffix (1st, 42nd, 106th, etc.)  

**Parameters**

- int **$n**
  - input number
- [bool **$superscript** = FALSE]
  - if the suffix should be in superscript (wrapped in `<sup></sup>` tag)

**Return Values**

- *String* - formatted text

**Examples**

  
```php  
echo ordinal(1);  
// prints: 1st  
  
echo ordinal(22,TRUE);  
// prints: 22<sup>nd</sup>  
```  




--------




--------




--------


## JavaScript
### Usage

To add some custom JavaScript calls, you can either:

1. make use of the [`addjs()`](#addjs) helper if the script if for a single page only; or
2. add in the `js/main.js` if this is going to be site wide.

For plugins, put them in the `js/plugins.js` instead of keeping separate files and link in html head. Best to [compress](http://closure-compiler.appspot.com/) it first and put related basic usage info and link in a doc block before the compressed code.



--------


### Plugins

This list all the basic usage and links related documentation of the plugins and packages already included.



--------


#### Mathjax

The default math delimiters are `$$...$$` and `\[...\]` for displayed mathematics, and `\(...\)` for in-line mathematics.

[Documentation](http://docs.mathjax.org/en/latest/start.html) | [Official Site](http://www.mathjax.org)



--------


#### Validation Engine

[Official Site](https://github.com/posabsolute/jQuery-Validation-Engine)

Refer to Bootstrap Form helper - [validate](#4-validate)



--------


#### Rotate13

`$.rot13('test@example.com');`

See [`hide_email()`](#hide_email) helper.

Documentation and Official Site lost.



--------


#### Bootstrap HTML5 Sortable

Make Bootstrap elements sortable (draggable)

[Documentation](http://psfpro.ru/html5sortable/index.html) | [Official Site](https://github.com/psfpro/bootstrap-html5sortable)



--------


#### Bootstrap Popover Extra Placements

Provide additional popover placement positions. Once you have added the "extra-placements" plug-in, instantiate a popover just as normal, but we can use the additional placement options.

[Official Site](https://github.com/dkleehammer/bootstrap-popover-extra-placements)



--------


#### Columnizer

`$('wrapper_tag').columnize({ columns: 5 });`

Make children elements in columns

[Official Site](http://welcome.totheinter.net/columnizer-jquery-plugin/)

Note: You may also use the CSS3 attribute: `column-count`, but this plugins should have better browser support.



--------


#### jQuery Sticky

`$('#sidebar').sticky();`

Replacement of Bootstrap's Affix: makes an element sticky to the the screen (normally for menus)

[Official Site](http://labs.anthonygarand.com/sticky)



--------


#### Smooth Scroll

Enable smooth scroll for in-page bookmark

Add attribute **data-scroll** to `<a>` tags

```html
<a data-scroll href="#bazinga">Anchor Link</a>
...
<span id="bazinga">Bazinga!</span>
```

[Official Site](http://github.com/cferdinandi/smooth-scroll)



--------


#### Quick Pagination

`$("ul.pagination1").quickPagination();`

Covnert long lists and page content into numbered pages

[Documentation](http://www.jquery4u.com/demos/jquery-quick-pagination/) | [Official Site](http://www.sitepoint.com/jquery-quick-pagination-list-items/)



--------


#### Table Sorter

`$('#myTable').tablesorter();`

Make table sortable by headers

[Documentation & Official Site](http://tablesorter.com/docs/)



--------


#### Select All

`$('.mySelector').selectall();`

Select all content of the selector.



--------


#### Masonry (package)

Put elements into piles / wall like styles (auto-fill / shift)

[Documentation & official Site](http://masonry.desandro.com)



--------


#### Malihu Scrollbar

A nice scrollbar for elements. (Other details to be completed)



--------




--------




--------


## CSS
### Framework

Bootstrap CSS framework v3 is used.

Documentations: [CSS](https://getbootstrap.com/docs/3.3/css/) | [Components](https://getbootstrap.com/docs/3.3/components/) | [JavaScript](https://getbootstrap.com/docs/3.3/javascript/) | [All Components in One Page](http://anvoz.github.io/bootstrap-tldr/)

[Official Site](https://getbootstrap.com/docs/3.3/)



--------


### Bootstrap Additionals

Some additional tools for the Bootstrap framework has been added.



--------


#### Callout

```
<div class="bs-callout bs-callout-default">
	<h4>Default Callout</h4>
	This is a default callout.
</div>
```

Callout boxes of the Bootstrap documentation

[Documentation](http://cpratt.co/twitter-bootstrap-callout-css-styles/)

Refer to the [`bs_callout()`](#bs_callout) helper.



--------


#### Responsive Alignment

Added the following responsive floats and text alignment classes in this format:
`[TYPE]-[DIRECTION]-[SCREEN_SIZE]`

Valid *[TYPE]*:
**pull** - for quick floats
**text** - for text alignment

Valid *[DIRECTION]*:
**left** / **right**

Valid *[SCREEN_SIZE]*;
**xs** / **sm** / **md** / **lg**


That is, the available classes are:

`pull-left-xs`, `pull-left-sm`, `pull-left-md`, `pull-left-lg`,
`pull-right-xs`, `pull-right-sm`, `pull-right-md`, `pull-right-lg`,
`text-left-xs`, `text-left-sm`, `text-left-md`, `text-left-lg`,
`text-right-xs`, `text-right-sm`, `text-right-md`, `text-right-lg`,

[Official Site](https://github.com/calebzahnd/Responsive-Alignment-for-Bootstrap)



--------


#### Responsive Line Breaks

Class | Description
---   | ---
`.break-xs/sm/md/lg`   | break **ONLY** on that screen size
`.break-sm/md-up`      | break on that screen size **and** higher
`.break-sm/md/lg-down` | break on screen size **which is lower than** specified.<br> i.e. `.break-md-down` will not break on md

Note: those classes of some screen size that look like missing is intended as they are meaningless. E.g. `.break-xs-up` is actually bare `<br>`.

---
**Examples**

```
<br class="break-sm-up">
<br class="break-md">
<br class="break-lg-down">
```
[Official Site](http://danielmall.com/articles/responsive-line-breaks/)



--------


#### Table

Added the follow classes:

- `.no-hover`
	- Add to `<tr>` if hover style is not needed on that row for table with hovered rows.
		- `<table class="table table-hover"><tr class="no-hover">...`
- `.no-border`
	- Add to `<table>` if the table does not need any border at all while keeping other styling intact.
		- `<table class="table no-border">`
	- for multiple `<tbody>`, originally it is a 2px border separator. this will also make the border transparent to keep some separation.



--------




--------


### Scss Helpers

(This section is to be finished)

###### headings()
`headings`




--------




--------




--------


## Index

Index of functions

{index}

--------



This marks the end of the documentation.
This document is written in [GitHub Flavored Markdown](https://help.github.com/articles/github-flavored-markdown/)


--------



&copy; {cur_year} [Alan Shum](mailto:alanshum88@gmail.com). All rights reserved.




--------




--------




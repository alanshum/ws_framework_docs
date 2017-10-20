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
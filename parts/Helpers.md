Helpers, as the name suggests, help you with tasks. Each helper file is a collection of functions in a particular category. Helper files located in `./helpers/`. All helper file names should ends with `_helper.php`, e.g. `array_helper.php`.

To load a helper in a page, use `load_helper( 'helper_name' );` (e.g. `load_helper('array');`). To auto-load a helper for the whole site, add the name of helper(s) in `$config['helpers']` in `settings.php`.

Since most likely we will have our own helper functions in each application (and for that specific application), a blank `local_helper.php` is here and set to auto-load by default.

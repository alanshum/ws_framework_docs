To add some custom JavaScript calls, you can either:

1. make use of the [`addjs()`](#addjs) helper if the script if for a single page only; or
2. add in the `js/main.js` if this is going to be site wide.

For plugins, put them in the `js/plugins.js` instead of keeping separate files and link in html head. Best to [compress](http://closure-compiler.appspot.com/) it first and put related basic usage info and link in a doc block before the compressed code.
All "pages" of the application should goes in the **pages** directory. For instance, create a "test.php" and you can access it in the web by *http://your-site.com/test*. You may also make sub-directories as needed (but this is not very thoroughly tested).  

You can use add argument to the url with `/`.  

Consider this url:  http://your-site.com/test/arg1/hello  

If you do not have the file `/pages/test/arg1/hello.php` but only `/pages/test.php`, then you can access the rest of the url segment as arguments by using `segments()`. In this case, `segments(0)` will return `'arg1'` and `segments(1)` will return `'hello'`. Please refer to [Core > Segments](#segments) section below for details.  
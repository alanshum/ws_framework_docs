*This records changes affects the base framework. Function API changes are recorded in their own sections.*  

Date       | Description
---------- | -----------
2017-10-17 | Removed `$SS` alias for session as it is not helpful at all. <br> Use `$_SESSION` superglobals or the [Session helper](#session) directly.
2016-03-29 | Fixed the segment behaviour to work properly when the page is under subdirectories. 
2016-02-05 | Added **$ws_loader** - index loader settings. <br> Multi instances of index.php and settings override is now possible. 
2016-01-19 | Added **array** helper. Moved array related helper functions in from main helper.
2016-01-18 | Fixed **%PAGE_TITLE%** showing up incorrectly when `die()`.
2016-01-15 | Template: **%HTML_TITLE%** renamed to **%PAGE_TITLE%** for clarity
2015-12-28 | CSS packages: removed Bourbon and Corpus which is not used nor deployed once after test.
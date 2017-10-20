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

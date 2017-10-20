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
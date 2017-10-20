To be used with [`timestr()`](#timestr) / [`time_started()`](#time_started) / [`time_ended()`](#time_ended).  
You may specify any unambiguous date format, e.g. '2015-01-01 12:34'.  
On the contrary, "01-02-2015" is not advised as this could cause confusion on the order of day and month part.  
You can also define you own "date" settings, that the variable ends with '_date'.  
E.g. `$config['test_date'] = '...'`, and access via `timestr('test')`;

Variable                 | Description
------------------------ | -----------
`$config['start_date']`  | Start date of the application
`$config['end_date']`    | End date of the application

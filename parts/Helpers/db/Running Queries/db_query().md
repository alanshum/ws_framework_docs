**Description**
Make a SQL query to active database. You can make use of this function for custom SQL statements.

This also serves as a "base" function of other querying methods.

--------
**Parameters**
name	type	def_value	desc
sql	string		SQL statement to run
prep_single	bool	FALSE	if return a 1-dimesional result array (refer to [`db_select()`](#db_select) )
keep	bool	TRUE	keep sql statement for debug (refer to [`db_last_queries()`](#db_last_queries) )

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
FALSE	on failure
Array	of data for SELECT query
Object	for SHOW, DESCRIBE or EXPLAIN quries
TRUE	for other successful queries.

--------
**Examples**

```php
$data = db_query( "SELECT * FROM test_table WHERE colA = 1" );
```

--------
**Changelog**


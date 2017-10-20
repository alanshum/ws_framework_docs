**Description**
Similar to `segments()`, except that this returns segments based on the **<u>f</u>ull path**.
This is useful if your application is nested under a sub-directory.

Please note that `fsegments()` does not have portability as it relies on web root instead of application root. For instance, if you move the application into a deeper sub-directory, it will have different returns.

Please refer to [segments()](#segments) for details of parameters, return values and examples.

--------
**Parameters**
name	type	def_value	desc
n	mixed	FALSE	
no_result	bool/mixed	FALSE	

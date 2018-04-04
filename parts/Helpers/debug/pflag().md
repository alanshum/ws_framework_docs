**Description**
You add profiling flags using this function `pflag()` - Call this at each point of interest, passing a descriptive string. The last flag will be used as the "end" flag.

At last, use [`profile_print()`](#profile_print) to print the results.

--------
**Parameters**
name	type	def_value	desc	by_ref
str    string      flag description

--------
**Properties**
name	type	def_value	desc


--------
**Return Values**
type	desc
void

--------
**Examples**

```php
pflag('start');
// .... some scripts ...
pflag('profiling point A')
// .... some scripts ...
pflag('profiling point B')
// .... some scripts ...
pflag('end');
profile_print();
```

prints:
```html
Profiling
Note: the time is between two flags in seconds

start
   0.020248
profiling point A
   0.000052
profiling point B
   0.000594
end

Total Time: 0.02624
```

--------
**Changelog**

2018.04.04 newly added
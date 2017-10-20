Date       | Area            | Description
---------- | --------------- | -----------
           | form helper     | rewrite in favor of html() and add support for optgroup (refer to MRBS)
           | is_json()       | bug? <br> - if the input is integer (2), it returns TRUE.
           | authen helper   | Recaptcha is changed
           | API Docs        | get_require() / get_message() / set_message()
           |                 | recaptcha_verified(): set_message automatically  by default
           |                 | bs-additionals helper: auto-col-width (?)
2017.08.10 |                 | array_helper: array_subval_sort_by_array() / array_to_1d() - rename
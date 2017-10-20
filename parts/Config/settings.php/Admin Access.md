To be used by [`valid_user()`](#valid_user).

Variable                 | Description
------------------------ | -----------
`$config['valid_admin']` | Admin user names
`$config['valid_users']` | Normal users, no need to repeat admin user names

<!-- this is the deprecated version.
`$config['admin_ip']`    | IP of authorized users, to access pages protected by `valid_user()` function; *Note*: localhost user is always allowed.
`$config['admin_key']`   | Key to access pages protected by `valid_user()` function. Note that`admin_ip` takes privilege. Append `?v=the_key` to access by admin key. -->

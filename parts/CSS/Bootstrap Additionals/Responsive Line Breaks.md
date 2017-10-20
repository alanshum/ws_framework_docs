Class | Description
---   | ---
`.break-xs/sm/md/lg`   | break **ONLY** on that screen size
`.break-sm/md-up`      | break on that screen size **and** higher
`.break-sm/md/lg-down` | break on screen size **which is lower than** specified.<br> i.e. `.break-md-down` will not break on md

Note: those classes of some screen size that look like missing is intended as they are meaningless. E.g. `.break-xs-up` is actually bare `<br>`.

---
**Examples**

```
<br class="break-sm-up">
<br class="break-md">
<br class="break-lg-down">
```
[Official Site](http://danielmall.com/articles/responsive-line-breaks/)
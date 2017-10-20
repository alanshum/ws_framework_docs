

--------


##

###



--------


###





--------


####




--------


#### Validation Engine
[Official Site](https://github.com/posabsolute/jQuery-Validation-Engine)
Refer to Bootstrap Form helper - [validate](#4-validate)


--------


#### Rotate13
`$.rot13('test@example.com');`
See [`hide_email()`](#hide_email) helper.
Documentation and Official Site lost.


--------


#### Bootstrap HTML5 Sortable
Make Bootstrap elements sortable (draggable)
[Documentation](http://psfpro.ru/html5sortable/index.html) | [Official Site](https://github.com/psfpro/bootstrap-html5sortable)


--------


#### Bootstrap Popover Extra Placements
Provide additional popover placement positions
Once you have added the "extra-placements" plug-in, instantiate a popover just as normal, but now use on of the additional placement options.
[Official Site](https://github.com/dkleehammer/bootstrap-popover-extra-placements)


--------


#### Columnizer
`$('wrapper_tag').columnize({ columns: 5 });`
Make children elements in columns
[Official Site](http://welcome.totheinter.net/columnizer-jquery-plugin/)

Note: You may also use CSS attribute: `column-count`, but this plugins should have better browser support.


--------


#### jQuery Sticky
Replacement of Bootstrap's Affix / makes an element sticky to the the screen (menus)
`$('#sidebar').sticky();`
[Official Site](http://labs.anthonygarand.com/sticky)


--------


#### Smooth Scroll
Enable smooth scroll (for anchor bookmark)
Add attribute **data-scroll** to `<a>` tags
```html
<a data-scroll href="#bazinga">Anchor Link</a>
...
<span id="bazinga">Bazinga!</span>
```
[Official Site](http://github.com/cferdinandi/smooth-scroll)


--------


#### Quick Pagination
`$("ul.pagination1").quickPagination();`
Covnert long lists and page content into numbered pages
[Documentation](http://www.jquery4u.com/demos/jquery-quick-pagination/) | [Official Site](http://www.sitepoint.com/jquery-quick-pagination-list-items/)


--------


#### Table Sorter
`$('#myTable').tablesorter();`
Make table sortable by headers
[Documentation & Official Site](http://tablesorter.com/docs/)


--------


#### Select All
`$('.mySelector').selectall();`
Select all content of the selector


--------


#### Masonry (package)
[Documentation & official Site](http://masonry.desandro.com)


--------



#### Malihu Scrollbar
(to be complete)

--------

--------


## CSS


--------


### Framework
Bootstrap Framework is used.
Documentations: [CSS](http://getbootstrap.com/css/) | [Components](http://getbootstrap.com/components/) | [JavaScript](http://getbootstrap.com/javascript/) | [All Components in One Page](http://anvoz.github.io/bootstrap-tldr/)
[Official Site](http://getbootstrap.com/)


--------


### Bootstrap Additionals
Some additional tools for the B framework has been added.


--------


#### Callout

```
<div class="bs-callout bs-callout-default">
	<h4>Default Callout</h4>
	This is a default callout.
</div>
```
Callout boxes of the Bootstrap documentation
[Documentation](http://cpratt.co/twitter-bootstrap-callout-css-styles/)

Refer to [`bs_callout()`](#bs_callout) helper.


--------


#### Responsive Alignment
Added the following responsive floats and text alignment classes in this format:
`[TYPE]-[DIRECTION]-[SCREEN_SIZE]`

Valid *[TYPE]*:
**pull** - for quick floats
**text** - for text alignment

Valid *[DIRECTION]*:
**left** / **right**

Valid *[SCREEN_SIZE]*;
**xs** / **sm** / **md** / **lg**

`pull-left-xs`, `pull-left-sm`, `pull-left-md`, `pull-left-lg`,
`pull-right-xs`, `pull-right-sm`, `pull-right-md`, `pull-right-lg`,
`text-left-xs`, `text-left-sm`, `text-left-md`, `text-left-lg`,
`text-right-xs`, `text-right-sm`, `text-right-md`, `text-right-lg`,

[Official Site](https://github.com/calebzahnd/Responsive-Alignment-for-Bootstrap)


--------


#### Responsive Line Breaks

Class | Description
---   | ---
`.break-xs/sm/md/lg`   | break **ONLY** on that screen size
`.break-sm/md-up`      | break on that screen size **and** higher
`.break-sm/md/lg-down` | break on screen size **which is lower than** specified.<br> i.e. `.break-md-down` will not break on md

Note: those classes of some screen size that look like missing is intended as they are meaningless. E.g. `.break-xs-up` is actually bare `<br>`.
**Examples**
```
<br class="break-sm-up">
<br class="break-md">
<br class="break-lg-down">
```
[Official Site](http://danielmall.com/articles/responsive-line-breaks/)


--------


#### Table
Added the follow classes:
- `.no-hover`
	- Add to `<tr>` if hover style is not needed on that row for table with hovered rows.
		- `<table class="table table-hover"><tr class="no-hover">...`
- `.no-border`
	- Add to `<table>` if the table does not need any border at all while keeping other styling intact.
		- `<table class="table no-border">`
	- for multiple `<tbody>`, originally it is a 2px border separator. this will also make the border transparent to keep some separation.


--------


### Scss Helpers
(This section is to be finished)

###### headings()
`headings`


--------


## Index

{index}



--------



This marks the end of the documentation.
This document is written in [GitHub Flavored Markdown](https://help.github.com/articles/github-flavored-markdown/)


--------



&copy; {cur_year} [Alan Shum](mailto:alanshum88@gmail.com).
{/div}

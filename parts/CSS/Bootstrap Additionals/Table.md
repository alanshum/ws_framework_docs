Added the follow classes:

- `.no-hover`
	- Add to `<tr>` if hover style is not needed on that row for table with hovered rows.
		- `<table class="table table-hover"><tr class="no-hover">...`
- `.no-border`
	- Add to `<table>` if the table does not need any border at all while keeping other styling intact.
		- `<table class="table no-border">`
	- for multiple `<tbody>`, originally it is a 2px border separator. this will also make the border transparent to keep some separation.
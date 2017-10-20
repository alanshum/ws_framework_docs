Changelog
//	Todo
Introduction
	Preface
	What's Inside
	License
	Author Info
	Code Style
	Styling of This Document
Using the Framework
	Pages and Segments
	.htaccess
		RewriteBase
		Options to rewrite `www.`
	Templates
	index.php
		Multiple Instances
		Loader Settings
	Pre-defined Variables and Aliases
	Commonly Used Stuff to Note
		CSV, TSV and Array
		Defaults
	File Structure
Config
	settings.php
		Auto-load Helpers
		Title of Application
		Datafile Helper
		Admin Access
		Dates
	constants.php
Core
	URI Segments
		Helper Functions
			segments()
			csegments()
			psegments()
			fsegments()
			site_url()
			current_url()
		Other Helpers in Core
			is_php()
			config_item()
			log_message()
			redirect()
			load_helper()
			addjs()
			printjs()
			set_page_title()
			incl()
Main
	Development Functions
			echob()
			printr()
			vardump()
	Checking Functions
			_required()
			_default()
	if it is... Functions
			is_json()
			is_serialized()
			is_assoc()
			url_exists()
	Email Related Functions
			hide_email()
			send_email()
	Time Related Functions
			timestr()
			time_started()
			time_ended()
	Miscellaneous Functions
			die_nicely()
			get_require()
			empty_default()
			html()
			div()
			_flatten_attributes()
			_print_attributes()
			add_scheme()
			remove_scheme()
			char()
			t()
			nl()
Helpers
	array
			tsv2array()
			array_header_to_keys()
			csv2array()
			array2tsv()
			array2list()
			array2table()
			array_extract()
			array_group_by()
			array_multi_search()
			array_order_by()
			array_sort_by_array()
			array_to_1d()
			array_trim()
			array_value_search()
	authen
		reCAPTCHA
			recaptcha_js()
			recaptcha_verified()
			recaptcha_widget()
		User Login
			check_ip()
//			nis_auth()
			user_ip()
			valid_user()
	bs_components
			bs_a_btn()
			bs_accordion()
			bs_alert()
			bs_btn()
			bs_callout()
			bs_icon()
			bs_list_group()
			bs_panel()
			bs_well()
	bs_form
		Standard Use Case
			1. id
			2. label
			3. type
			4. validate
			5. desc
			6. placeholder
			7. options
				a. select options
				b. serialized  json encoded array
				c. value-desc pair
			8. extra
			9. value
			10&11. append & prepend
		User Functions
			form_open()
			form_close()
			form_gen_fieldset()
			form_fieldset_open()
			form_fieldset_close()
			form_submit()
			form_submitted()
			form_set_values()
			form_set_value()
			form_disabled()
			form_element()
			add_options_set()
			get_options_set()
			add_option_html()
			get_option_html()
		Internal Functions
			form_gen_elements()
			form_prep()
			_prep_tag()
			_prep_options()
			_fix_options_values()
			_print_options()
			_print_form_attributes()
	datafile
			is_unique_record()
			save_uploaded_file()
			get_data()
			get_active_data()
			add_record()
			update_record()
			delete_record()
			add_header_from_keys()
			open_datafile()
			save_datafile()
			prep_for_datafile()
			dataset()
			backup_dataset()
			make_data_assoc()
	db
		Database Configuration
		Connecting to Database
			db_set_active()
			db_get_active()
			db_connect()
		Running Queries
			db_query()
			db_select()
			db_insert()
			db_update()
			db_insert_or_update()
			db_delete()
		Query Helpers
			escape()
			db_insert_id()
			db_table_structure()
			db_list_fields()
			db_last_queries()
			db_is_unique()
	dom
	krumo
			krumo()
			Other Functions
	local
	session
		Basic Session
			set_userdata()
			get_userdata()
			has_userdata()
			unset_userdata()
		Flash Data
			set_flashdata()
			get_flashdata()
			has_flashdata()
	text
			format_size_unit()
			ordinal()
JavaScript
	Usage
	Plugins
		Mathjax
		Validation Engine
		Rotate13
		Bootstrap HTML5 Sortable
		Bootstrap Popover Extra Placements
		Columnizer
		jQuery Sticky
		Smooth Scroll
		Quick Pagination
		Table Sorter
		Select All
		Masonry (package)
		Malihu Scrollbar
CSS
	Framework
	Bootstrap Additionals
		Callout
		Responsive Alignment
		Responsive Line Breaks
		Table
	Scss Helpers
Index

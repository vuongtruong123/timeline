{strip}
{if $system['css_customized']}
	<style type="text/css">
		body {
			background: {$system['css_background']};
		}

		a, 
		.data-content .name a, 
		.text-link,
		.post-stats-alt, 
		.post-stats .fa, 
		.side-nav>li.active>a,
		.navbar-container .data-content .name a {
			color: {$system['css_link_color']};
		}

		.btn-primary, .btn-primary:focus, .btn-primary:hover {
			background: {$system['css_btn_primary']}!important;
			border-color: {$system['css_btn_primary']}!important;
		}

		.main-header {
			background: {$system['css_header']};
		}

		.main-header .user-menu {
			border-left-color: {$system['css_header']};
		}

		.main-header .navbar-form .form-control {
			background: {$system['css_header_search']};
			color: {$system['css_header_search_color']};
		}

		.main-header .navbar-form .form-control::-webkit-input-placeholder {
			color: {$system['css_header_search_color']};
		}
		.main-header .navbar-form .form-control:-moz-placeholder {
			color: {$system['css_header_search_color']};
			opacity: 1;
		}
		.main-header .navbar-form .form-control:-ms-input-placeholder {
			color: {$system['css_header_search_color']};
		}

		.main-header .nav .open>a.user-menu, 
		.main-header .nav .open>a.user-menu:hover, 
		.main-header .nav .open>a.user-menu:focus {
			background: {$system['css_menu_background']};
			border-color: {$system['css_menu_background']};
		}

		.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus,
		.nav-home.nav-pills>li.active>a, 
		.nav-home.nav-pills>li.active>a:hover, 
		.nav-home.nav-pills>li.active>a:focus {
			background: {$system['css_menu_background']};
		}

	</style>
{/if}
{/strip}
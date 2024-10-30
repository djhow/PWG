<?php

if ( ! defined( 'CM_NEWS_VERSION' ) ) {
	define( 'CM_NEWS_VERSION', wp_get_theme()->get( 'Version' ) );
}
require_once get_template_directory().'/includes/Bootstrap.php';
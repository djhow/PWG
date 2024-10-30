<?php

namespace Codemanas\CmNews;
require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';

class AssetsHandler {
	private static ?AssetsHandler $instance = null;

	public static function get_instance(): ?AssetsHandler {
		return is_null( self::$instance ) ? self::$instance = new self() : self::$instance;
	}

	private function __construct() {
		add_action( 'wp_enqueue_scripts', [$this,'register_editor_styles'] );

		add_action( 'tgmpa_register', [$this, 'custom_register_required_plugins'] );
	}

	public function custom_register_required_plugins(): void {
		$plugins = array(

			// This is an example of how to include a plugin bundled with a theme.
			array(
				'name'      => __('CM Blocks', 'cm-news'),
				'slug'      => 'cm-blocks',
				'required'  => false,
			),

			array(
				'name'      => __('Search With Typesemse', 'cm-news'),
				'slug'      => 'search-with-typesense',
				'required'  => false,
			)
		);

		$config = array(
			'id'           => 'custom',
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
		);

		tgmpa( $plugins, $config );
	}


	public function register_editor_styles(): void {
		wp_register_style(
			'cm-news-block-style',
			get_theme_file_uri( 'assets/css/style' . '.css' ),
			array('dashicons'),
			CM_NEWS_VERSION
		);
		wp_enqueue_style( 'cm-news-block-style' );

		wp_register_script(
			'cm-news-custom-scripts',
			get_theme_file_uri( 'assets/js/custom' . '.js' ),
			array(),
			CM_NEWS_VERSION,
			true
		);
		wp_enqueue_script( 'cm-news-custom-scripts' );
	}
}
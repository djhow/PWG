<?php

namespace Codemanas\CmNews;

class Setup {
	private static ?Setup $instance = null;

	public static function get_instance(): ?Setup {
		return is_null( self::$instance ) ? self::$instance = new self()
			: self::$instance;
	}

	private function __construct() {
		add_action( 'after_setup_theme', [ $this, 'register_support' ] );
		// Using this hook instead of enqueue_block_editor_assets since the dashicons css could not load in the enqueue_block_editor_assets hook
		add_action( 'enqueue_block_assets', [ $this, 'editor_assets' ] );
		add_action( 'init', [ $this, 'register_block_pattern_categories' ],
			10 );
	}

	public function editor_assets() {
		if ( is_admin()) {
			wp_enqueue_style( 'cm-news-editor-style',
				get_theme_file_uri( 'assets/css/editor-style.css' ),
				array( 'dashicons' ),
				CM_NEWS_VERSION );
		}
	}
	public function register_support(): void {

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );

		load_theme_textdomain('cm-news', get_template_directory() . '/languages');
	}

	public function register_block_pattern_categories(): void {
		register_block_pattern_category(
			'cm-news-podcasts',
			array( 'label' => __( 'Podcasts', 'cm-news' ) )
		);
		register_block_pattern_category(
			'cm-news-fullPage',
			array( 'label' => __( 'Full Page', 'cm-news' ) )
		);
		register_block_pattern_category(
			'query',
			array( 'label' => __( 'Query', 'cm-news' ) )
		);
		register_block_pattern_category(
			'cm-news-header',
			array( 'label' => __( 'Header', 'cm-news' ) )
		);
		register_block_pattern_category(
			'cm-news-footer',
			array( 'label' => __( 'Footer', 'cm-news' ) )
		);
		register_block_pattern_category(
			'cm-news-sidebar',
			array( 'label' => __( 'Sidebar', 'cm-news' ) )
		);
	}
}
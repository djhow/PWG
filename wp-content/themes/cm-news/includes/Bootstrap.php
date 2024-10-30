<?php

namespace Codemanas\CmNews;

use Codemanas\ThemeInfo\ThemeSetting;

final class Bootstrap {
	public static ?Bootstrap $instance = null;

	public static function get_instance(): ?Bootstrap {
		return is_null( self::$instance ) ? self::$instance = new self() : self::$instance;
	}

	public function autoloader(): void {
		// Make sure to use the correct path for your autoloader
		require_once __DIR__ . '/../vendor/autoload.php';
	}

	public function initTheme(): void {
		$translate_strings = $this->get_translate_strings();
		ThemeSetting::get_instance( $translate_strings );
		Setup::get_instance();
		AssetsHandler::get_instance();
		Blocks::get_instance();
	}

	private function get_translate_strings(): array {
		return [
			'live_demo'                            => __( 'Live Demo', 'cm-news' ),
			'documentation'                        => __( 'Documentation', 'cm-news' ),
			'documentation_link'                   => __( 'https://docs.cmblocks.com/cm-news/', 'cm-news' ),
			'cm_blocks_section_subtitle'           => __( 'CM Blocks - WordPress Blocks Unleashed', 'cm-news' ),
			'cm_blocks_section_title'              => __( 'Easily start building your websites with CM Blocks', 'cm-news' ),
			'cm_blocks_section_desc'               => __( 'CM Blocks is a custom WordPress blocks plugin designed to streamline the process of building websites using the WordPress platform. WordPress blocks, introduced with the Gutenberg editor, are content elements that allow users to add various types of content to their posts or pages in a visually appealing and structured manner.', 'cm-news' ),
			'get_cm_block_suite'                   => __( 'Get CM Blocks Suite', 'cm-news' ),
			'cm_blocks_collection_image'           => __( 'CM BLocks Collection images', 'cm-news' ),
			'tab1_title'                           => __( 'Get Started', 'cm-news' ),
			'tab2_title'                           => __( 'Change Log', 'cm-news' ),
			'tab3_title'                           => __( 'CM Blocks', 'cm-news' ),
			'quick_setting'                        => __( 'Quick Settings', 'cm-news' ),
			'header'                               => __( 'Header', 'cm-news' ),
			'sticky_header_info'                   => __( 'To enable sticky header please install', 'cm-news' ),
			'cm_blocks'                            => __( 'CM Blocks', 'cm-news' ),
			'configure_sticky_header'              => __( 'Configure the sticky header feature on or off as needed', 'cm-news' ),
			'learn_more'                           => __( 'Learn More', 'cm-news' ),
			'footer'                               => __( 'Footer', 'cm-news' ),
			'style_variation'                      => __( 'Styles Variation', 'cm-news' ),
			'navigation'                           => __( 'Navigation', 'cm-news' ),
			'all_templates'                        => __( 'All Templates', 'cm-news' ),
			'page_templates'                       => __( 'Page Templates', 'cm-news' ),
			'our_plugins'                          => __( 'Our Plugins', 'cm-news' ),
			'free'                                 => __( 'Free', 'cm-news' ),
			'vcwz_title'                           => __( 'Video Conferencing with Zoom', 'cm-news' ),
			'vcwz_desc'                            => __( 'Video Conferencing with zoom free version', 'cm-news' ),
			'swt_title'                            => __( 'Search With Typesense', 'cm-news' ),
			'swt_desc'                             => __( 'Instant Search With Typesense free version', 'cm-news' ),
			'spb_title'                            => __( 'Simple Popup Block', 'cm-news' ),
			'spb_desc'                             => __( 'A simple and easy to use popup block plugin for block editor', 'cm-news' ),
			'activated'                            => __( 'Activated', 'cm-news' ),
			'install'                              => __( 'Install', 'cm-news' ),
			'help_and_support'                     => __( 'Help and Support', 'cm-news' ),
			'help_and_support_desc'                => __( 'No Problem!! Please create a support ticket. Our dedicated support team will help you to solve your problem', 'cm-news' ),
			'support'                              => __( 'Support', 'cm-news' ),
			'documentation_desc'                   => __( 'From Edit screen of page/post, you can easily import Beautiful Patterns.', 'cm-news' ),
			'review'                               => __( 'Review', 'cm-news' ),
			'leave_a_review'                       => __( 'Leave a Review', 'cm-news' ),
			'leave_a_review_desc'                  => __( 'From Edit screen of page/post, you can easily import Beautiful Patterns.', 'cm-news' ),
			'craft_your_distinctive_web'           => __( '" Craft Your Distinctive Web Presence with Our Design Library "', 'cm-news' ),
			'explore_your_extensive_collection'    => __( 'Explore our extensive collection of expertly crafted patterns and page designs. Choose from a variety of options to create your site exactly as you envision it.', 'cm-news' ),
			'with_just_a_few_clicks'               => __( 'With just a few clicks, easily create beautiful sections anywhere on your site.', 'cm-news' ),
			'our_blocks'                           => __( 'Our Blocks', 'cm-news' ),
			'slider_icon'                          => __( 'Slider Icon', 'cm-news' ),
			'slider'                               => __( 'Slider', 'cm-news' ),
			'create_smooth_and_interactive'        => __( 'Create Smooth and interactive user interface.', 'cm-news' ),
			'docs'                                 => __( 'Docs', 'cm-news' ),
			'accordion_icon'                       => __( 'Accordion Icon', 'cm-news' ),
			'accordion'                            => __( 'Accordion', 'cm-news' ),
			'easy_accordion_which_enhance'         => __( 'Easy Accordion which enhance user experience and make site organized.', 'cm-news' ),
			'masonry_gallery_icon'                 => __( 'Masonry Gallery Icon', 'cm-news' ),
			'masonry_gallery'                      => __( 'Masonry Gallery', 'cm-news' ),
			'simple_grid_based_gallery'            => __( 'Simple grid based gallery inside WordPress content editor.', 'cm-news' ),
			'progress_bar_icon'                    => __( 'Progress Bar Icon', 'cm-news' ),
			'progress_bar'                         => __( 'Progress Bar', 'cm-news' ),
			'beautiful_slider_bar_without_writing' => __( 'Beautiful slider bar without writing long lines of code on WordPress.', 'cm-news' ),
			'countdown_icon'                       => __( 'Countdown Icon', 'cm-news' ),
			'countdown'                            => __( 'Countdown', 'cm-news' ),
			'countdown_desc'                       => __( 'Customizable WordPress blocks that allows user to add timer inside.', 'cm-news' ),
			'counter_icon'                         => __( 'Counter Icon', 'cm-news' ),
			'counter'                              => __( 'Counter', 'cm-news' ),
			'counter_desc'                         => __( 'Create beautiful Counters without writing a bunch of code.', 'cm-news' ),
			'cm_blocks_suite'                      => __( 'Elevate your design with CM Blocks Suite.', 'cm-news' ),
			'cm_blocks_suite_desc'                 => __( 'Unlock Premium Designs and access a collection of unique, high-quality templates that will make your site stand out. With dedicated priority support, you will have everything you need to create exceptional websites effortlessly. Elevate your design capabilities today with our Premium Designs!', 'cm-news' ),
			'get_started_now'                      => __( 'Get Started Now', 'cm-news' ),
		];
	}

	public function __construct() {
		$this->autoloader();
		$this->initTheme();
	}
}

Bootstrap::get_instance();
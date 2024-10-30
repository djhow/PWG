<?php

namespace Codemanas\CmNews;

use DOMDocument;
use DOMXPath;

class Blocks {
	private static ?Blocks $instance = null;

	public static function get_instance(): ?Blocks {
		return is_null( self::$instance ) ? self::$instance = new self()
			: self::$instance;
	}

	private function __construct() {
		add_action( 'init', [ $this, 'register_block_styles' ] );
	}


	public function register_block_styles(): void {
		register_block_style(
			'core/categories',
			array(
				'name'  => 'cm-news-large-categories',
				'label' => __( 'Large Categories',
					'cm-news' ),
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'  => 'cm-news-section-title',
				'label' => __( 'Section Title',
					'cm-news' ),
			)
		);

		register_block_style(
			'core/post-date',
			array(
				'name'         => 'cm-news-date-with-icon',
				'label'        => __( 'Date With Icon',
					'cm-news' ),
				'inline_style' => "
				.is-style-cm-news-date-with-icon:before {
				    content: '';
				    background-repeat: no-repeat;
				    height: 14.5px;
				    width: 16px;
				    vertical-align: middle;
					background: currentColor;
					clip-path: path('M6 12C2.6862 12 0 9.3138 0 6C0 2.6862 2.6862 0 6 0C9.3138 0 12 2.6862 12 6C12 9.3138 9.3138 12 6 12ZM6 10.8C7.27304 10.8 8.49394 10.2943 9.39411 9.39411C10.2943 8.49394 10.8 7.27304 10.8 6C10.8 4.72696 10.2943 3.50606 9.39411 2.60589C8.49394 1.70571 7.27304 1.2 6 1.2C4.72696 1.2 3.50606 1.70571 2.60589 2.60589C1.70571 3.50606 1.2 4.72696 1.2 6C1.2 7.27304 1.70571 8.49394 2.60589 9.39411C3.50606 10.2943 4.72696 10.8 6 10.8ZM6.6 6H9V7.2H5.4V3H6.6V6Z');
					display: inline-block;
				}",
			)
		);

		register_block_style(
			'core/post-author',
			array(
				'name'         => 'cm-news-author-with-icon',
				'label'        => __( 'Author With Icon',
					'cm-news' ),
				'inline_style' => "
				.is-style-cm-news-author-with-icon .wp-block-post-author__content .wp-block-post-author__name:before {
				    content: '';
				    background-repeat: no-repeat;
				    height: 18px;
					  width: 16px;
					  vertical-align: middle;
					  background: currentColor;
					clip-path: path('M5.16669 5.66666C5.16669 4.28594 6.28597 3.16666 7.66669 3.16666C9.0474 3.16666 10.1667 4.28594 10.1667 5.66666C10.1667 7.04737 9.0474 8.16666 7.66669 8.16666C6.28597 8.16666 5.16669 7.04737 5.16669 5.66666ZM9.66313 8.54179C10.5719 7.90959 11.1667 6.85758 11.1667 5.66666C11.1667 3.73366 9.59968 2.16666 7.66669 2.16666C5.73369 2.16666 4.16669 3.73366 4.16669 5.66666C4.16669 6.85758 4.7615 7.90959 5.67025 8.54179C4.96729 8.81564 4.32137 9.23379 3.7776 9.77757C2.74615 10.809 2.16669 12.208 2.16669 13.6667C2.16669 13.9428 2.39054 14.1667 2.66669 14.1667C2.94283 14.1667 3.16669 13.9428 3.16669 13.6667C3.16669 12.4732 3.64079 11.3286 4.48471 10.4847C5.32862 9.64076 6.47321 9.16666 7.66669 9.16666C8.86016 9.16666 10.0048 9.64076 10.8487 10.4847C11.6926 11.3286 12.1667 12.4732 12.1667 13.6667C12.1667 13.9428 12.3905 14.1667 12.6667 14.1667C12.9428 14.1667 13.1667 13.9428 13.1667 13.6667C13.1667 12.208 12.5872 10.809 11.5558 9.77757C11.012 9.23379 10.3661 8.81564 9.66313 8.54179Z');
					display: inline-block;
				}",
			)
		);
		register_block_style(
			'core/tag-cloud',
			array(
				'name'  => 'cm-news-tag-cloud',
				'label' => __( 'White',
					'cm-news' ),
			)
		);
		register_block_style(
			'core/quote',
			array(
				'name'         => 'cm-news-quote-icon',
				'label'        => __( 'Quote With Icon',
					'cm-news' ),
				'inline_style' => "
				.is-style-cm-news-quote-icon:before {
				    content: '';
				    background-repeat: no-repeat;
				    height: 40px;
					  width: 40px;
					  vertical-align: middle;
					  background: var(--wp--preset--color--accent);
					clip-path: path('M15.05 12.9L17.2 8.59998H12.9C8.14855 8.59998 4.30005 14.5985 4.30005 19.35V34.4H19.35V19.35H10.75C10.75 12.9 15.05 12.9 15.05 12.9ZM30.1 19.35C30.1 12.9 34.4001 12.9 34.4001 12.9L36.55 8.59998H32.25C27.4986 8.59998 23.65 14.5985 23.65 19.35V34.4H38.7001V19.35H30.1Z');
					display: inline-block;
					margin-bottom: 20px;
				}",
			)
		);
	}
}
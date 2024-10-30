<?php

function cm_news_magazine_styles() {
	wp_enqueue_style( 'cm-news-magazine-child-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'cm_news_magazine_styles' );
<?php

    $eco_nature_zone_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $eco_nature_zone_scroll_position = get_theme_mod( 'eco_nature_zone_scroll_top_position','Right');
    if($eco_nature_zone_scroll_position == 'Right'){
        $eco_nature_zone_theme_css .='#button{';
            $eco_nature_zone_theme_css .='right: 20px;';
        $eco_nature_zone_theme_css .='}';
    }else if($eco_nature_zone_scroll_position == 'Left'){
        $eco_nature_zone_theme_css .='#button{';
            $eco_nature_zone_theme_css .='left: 20px;';
        $eco_nature_zone_theme_css .='}';
    }else if($eco_nature_zone_scroll_position == 'Center'){
        $eco_nature_zone_theme_css .='#button{';
            $eco_nature_zone_theme_css .='right: 50%;left: 50%;';
        $eco_nature_zone_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $eco_nature_zone_footer_widget_content_alignment = get_theme_mod( 'eco_nature_zone_footer_widget_content_alignment','Left');
    if($eco_nature_zone_footer_widget_content_alignment == 'Left'){
        $eco_nature_zone_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $eco_nature_zone_theme_css .='text-align: left;';
        $eco_nature_zone_theme_css .='}';
    }else if($eco_nature_zone_footer_widget_content_alignment == 'Center'){
        $eco_nature_zone_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $eco_nature_zone_theme_css .='text-align: center;';
        $eco_nature_zone_theme_css .='}';
    }else if($eco_nature_zone_footer_widget_content_alignment == 'Right'){
        $eco_nature_zone_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $eco_nature_zone_theme_css .='text-align: right;';
        $eco_nature_zone_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $eco_nature_zone_copyright_content_alignment = get_theme_mod( 'eco_nature_zone_copyright_content_alignment','Center');
    if($eco_nature_zone_copyright_content_alignment == 'Left'){
        $eco_nature_zone_theme_css .='.footer-menu-left{';
        $eco_nature_zone_theme_css .='text-align: left !important;';
        $eco_nature_zone_theme_css .='}';
    }else if($eco_nature_zone_copyright_content_alignment == 'Center'){
        $eco_nature_zone_theme_css .='.footer-menu-left{';
            $eco_nature_zone_theme_css .='text-align: center !important;';
        $eco_nature_zone_theme_css .='}';
    }else if($eco_nature_zone_copyright_content_alignment == 'Right'){
        $eco_nature_zone_theme_css .='.footer-menu-left{';
            $eco_nature_zone_theme_css .='text-align: right !important;';
        $eco_nature_zone_theme_css .='}';
    }
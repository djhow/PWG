<?php

/**
 * Adds the current user's home club to the beginning of the primary menu.
 *
 * @param array  $items Array of menu items.
 * @param object $args  Menu arguments.
 * @return array Modified array of menu items.
 */
function pwg_add_home_club_to_menu($items, $args)
{
    // Only modify the primary menu
    if ('primary' !== $args->theme_location) {
        return $items;
    }

    // Get current user's home club ID
    $user_id = get_current_user_id();
    if (! $user_id) {
        return $items;
    }

    $home_club_id = get_user_meta($user_id, 'homeclub', true);
    if (! $home_club_id) {
        return $items;
    }

    // Verify the club exists and is published
    $club = get_post($home_club_id);
    if (! $club || 'golfclub' !== $club->post_type || 'publish' !== $club->post_status) {
        return $items;
    }

    // Explicitly force post type permalink
    $club_url = get_permalink($club);

    // Debug the URL (optional)
    error_log('Golf Club URL: ' . $club_url);
    error_log('Golf Club ID: ' . $home_club_id);
    error_log('Golf Club Post Type: ' . $club->post_type);

    // Create new menu item
    $home_club_item = new stdClass();
    $home_club_item->ID               = $home_club_id;
    $home_club_item->db_id           = $home_club_id;
    $home_club_item->title           = sprintf(
        '<i class="fas fa-home"></i> %s',
        esc_html($club->post_title)
    );
    $home_club_item->url             = esc_url($club_url);
    $home_club_item->menu_order      = 0;
    $home_club_item->menu_item_parent = 0;
    $home_club_item->type            = 'post_type';  // Changed from 'custom' to 'post_type'
    $home_club_item->object          = 'golfclub';   // Changed from 'custom' to actual post type
    $home_club_item->object_id       = $home_club_id;
    $home_club_item->classes         = array(
        'menu-item',
        'menu-item-type-post_type',
        'menu-item-object-golfclub',
        'home-club-item'
    );
    $home_club_item->target          = '';
    $home_club_item->attr_title      = sprintf(
        /* translators: %s: Club name */
        __('Visit your home club: %s', 'pwg'),
        esc_attr($club->post_title)
    );
    $home_club_item->description     = '';
    $home_club_item->xfn             = '';
    $home_club_item->status          = '';

    // These additional properties might be needed for some themes
    $home_club_item->current         = is_singular('golfclub') && get_queried_object_id() === $home_club_id;
    $home_club_item->current_item_ancestor = false;
    $home_club_item->current_item_parent = false;

    // Add the home club as the first item
    array_unshift($items, $home_club_item);

    return $items;
}

/**
 * Register the menu filter and add custom CSS.
 */
function pwg_register_menu_modifications()
{
    add_filter('wp_nav_menu_objects', 'pwg_add_home_club_to_menu', 10, 2);

    // Add custom CSS for the home club menu item
    add_action('wp_head', function () {
?>
        <style>
            .home-club-item {
                background-color: #f8f9fa;
                border-radius: 4px;
            }

            .home-club-item a {
                font-weight: 500;
                display: flex;
                align-items: center;
            }

            .home-club-item i {
                margin-right: 5px;
                color: #28a745;
            }
        </style>
<?php
    });
}

add_action('init', 'pwg_register_menu_modifications');

// Add this temporarily to debug permalinks
add_action('init', function () {
    $golf_club_post_type = get_post_type_object('golfclub');
    error_log('Golf Club Rewrite Rules: ' . print_r($golf_club_post_type->rewrite, true));
});

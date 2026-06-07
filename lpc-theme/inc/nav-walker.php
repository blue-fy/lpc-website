<?php
/**
 * LPC_Nav_Walker — accessible navigation walker
 */

if ( ! defined('ABSPATH') ) exit;

class LPC_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="sub-menu" role="list">';
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes   = empty( $item->classes ) ? [] : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $has_children = ( $args->walker->has_children );

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter($classes), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $atts = [];
        $atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = ! empty($item->target) ? $item->target : '';
        $atts['rel']    = ! empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = ! empty($item->url) ? $item->url : '';

        if ( $has_children ) {
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        }

        if ( in_array( 'current-menu-item', $classes ) ) {
            $atts['aria-current'] = 'page';
        }

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty($value) ) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output  = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ( isset($args->link_before) ? $args->link_before : '' ) . $title . ( isset($args->link_after) ? $args->link_after : '' );
        if ( $has_children ) {
            $item_output .= '<i class="ti ti-chevron-down" aria-hidden="true" style="font-size:12px;margin-left:3px;"></i>';
        }
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';

        $output .= apply_filters( 'walker_nav_menu_start_el', '<li' . $class_names . '>' . $item_output, $item, $depth, $args );
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

/**
 * Fallback menu when no menu assigned
 */
function lpc_fallback_menu() {
    $pages = get_pages(['sort_column' => 'menu_order', 'sort_order' => 'ASC']);
    echo '<ul class="primary-nav">';
    foreach ( $pages as $page ) {
        $current = is_page($page->ID) ? ' aria-current="page"' : '';
        echo '<li><a href="' . esc_url(get_permalink($page)) . '"' . $current . '>' . esc_html($page->post_title) . '</a></li>';
    }
    echo '</ul>';
}

function lpc_footer_fallback_menu() {
    $links = [
        __('About','lpc')      => '/about',
        __('Ministries','lpc') => '/ministries',
        __('Sermons','lpc')    => '/sermons',
        __('Branches','lpc')   => '/branches',
        __('Contact','lpc')    => '/contact',
        __('Privacy','lpc')    => '/privacy-policy',
    ];
    echo '<ul class="footer-links">';
    foreach ( $links as $label => $path ) {
        echo '<li><a href="' . esc_url(home_url($path)) . '">' . esc_html($label) . '</a></li>';
    }
    echo '</ul>';
}

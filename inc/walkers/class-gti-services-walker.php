<?php

class GTI_Services_Walker extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){
		$classes = empty( $item->classes ) ? array() : (array)$item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );

		!empty( $class_names ) && $class_names = ' class="'. esc_attr( $class_names ) . '"';

		$output .= "<li id='menu-item-{$item->ID}' $class_names>";

		$attributes  = '';
		$chevron = '';

		!empty( $item->attr_title ) && $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';
		!empty( $item->target ) && $attributes .= ' target="' . esc_attr( $item->target ) .'"';
		!empty( $item->xfn ) && $attributes .= ' rel="' . esc_attr( $item->xfn ) .'"';
		!empty( $item->url ) && $item->url !== '#' && $attributes .= ' href="' . esc_attr( $item->url ) .'"';
		$args->walker->has_children && $chevron = '<div class="menu-item-trigger"><svg width="6" height="10" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M.73 9.7 0 8.99 3.77 5.2 0 1.44.73.7l4.5 4.5-4.5 4.5Z" /></svg></div>';

		$description = ( !empty( $item->description ) && 0 == $depth ) ? '<small class="nav_desc">' . esc_attr( $item->description ) . '</small>' : '';

		$title = apply_filters( 'the_title', $item->title, $item->ID );

		$item_output = $args->before . "<div class='menu-item-link-wrap'><a $attributes>" . $args->link_before . $title . '</a> ' . $chevron . "</div>" . $args->link_after . $description . $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
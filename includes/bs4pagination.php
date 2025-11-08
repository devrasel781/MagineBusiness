<?php
/*---------------------------------------------------
Bootstrap Pagination
----------------------------------------------------*/
if ( ! function_exists( 'magine_pagination' ) ) {
function magine_pagination() {
    global $wp_query;
	$pages = paginate_links( [
			'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'format'       => '?paged=%#%',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'type'         => 'array',
			'show_all'     => false,
			'end_size'     => 3,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => '<i class="fas fa-chevron-left"></i>',
			'next_text'    => '<i class="fas fa-chevron-right"></i>',
			'add_args'     => false,
			'add_fragment' => ''
		]
	);
	if ( is_array( $pages ) ) {
		$pagination = '<ul class="pagination pagination-lg flex-wrap">';
		foreach ($pages as $page) {
            $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }
		$pagination .= '</ul>';
		echo wp_kses_post($pagination);
	}
	return null;
}
}

/*---------------------------------------------------
Bootstrap Pagination for Custom Queries
----------------------------------------------------*/
if ( ! function_exists( 'magine_custom_pagination' ) ) {
function magine_custom_pagination($magine_custom_query) {
    if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
    elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
    else { $paged = 1; }
	$pages = paginate_links( [
			'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			'format'       => '?paged=%#%',
			'current'      => max( 1, $paged ),
			'total'        => $magine_custom_query->max_num_pages,
			'type'         => 'array',
			'show_all'     => false,
			'end_size'     => 3,
			'mid_size'     => 1,
			'prev_next'    => true,
			'prev_text'    => '<i class="fas fa-chevron-left"></i>',
			'next_text'    => '<i class="fas fa-chevron-right"></i>',
			'add_args'     => false,
			'add_fragment' => ''
		]
	);
	if ( is_array( $pages ) ) {
		$pagination = '<ul class="pagination pagination-lg flex-wrap">';
		foreach ($pages as $page) {
            $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }
		$pagination .= '</ul>';
		echo wp_kses_post($pagination);
	}
	return null;
}
}
?>
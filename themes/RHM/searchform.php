<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="form-control search-field" placeholder="<?php echo esc_attr_x( 'Search the blog &hellip;', 'placeholder', 'blog' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
</form>

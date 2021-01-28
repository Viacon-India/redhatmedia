<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<div class="input-group-prepend">
			<button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
		</div>
	</div>
</form>
<?php /* ?>

<form  role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form right-sub-container">
	<div class="input-group">
		<input type="text" placeholder="Search ContentRally" autofocus required
		class="right-sub-container-text" value="<?php echo get_search_query(); ?>" name="s"/>
		<div class="input-group-append ">
			<button class="search-button btn right-sub-container-subscrib" type="submit">
				<i class="fas fa-search"></i>
			</button>
		</div>
	</div>
	<a href="#" id="close-search"><span class="sr-only">Close Search Panel</span><i class="fas fa-times"></i></a>
</form>

<?php */ ?>
<?php //add_shortcode('show_expand_content', 'expand_content_func');
function expand_content_func() { ?>

	
	<div class="expand">
		<div class="open-title">Show</div>
		<div class="open-content" style="display:none;"></div>
		
		<script>
		jQuery(document).ready(function($) {
			$('.open-title').click(function() {
				$('.open-content').toggle('slow');
			});

			var titleIndex = 0;
			$(document).find('.post-card h2').each(function() {
				titleIndex++;
				$(this).attr("id", titleIndex);
				var newTitle = $(this).text();				
				$( ".open-content" ).append( "<a href='#"+titleIndex+"' class='main-title'>"+newTitle+"</a>" );
			});			
		});		
		</script>

	</div>
	

<?php }


add_shortcode('search_page_form', 'search_page_form_func');
function search_page_form_func() { ?>

	<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="input-group">
      <input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentysixteen' ); ?>" 
      value="<?php echo get_search_query(); ?>" name="s" />
			<div class="input-group-prepend">
				<button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
			</div>
		</div>
	</form>

<?php }

if(!function_exists('get_limited_title_func')) {
  function get_limited_title_func($title,$ltr_to_show) {
    
    $title_count = strlen($title);
    echo substr($title,0,$ltr_to_show);
    if($title_count>$ltr_to_show) { echo '...'; } 

  }
}

if(!function_exists('get_limited_content_func')) {
  function get_limited_content_func($content,$ltr_to_show) {
    
    $total_ltr_count = strlen($content);
    echo substr(strip_tags($content),0,$ltr_to_show);
    if($total_ltr_count>$ltr_to_show) { echo '...'; } 

  }
}

/******************* Image alt text *************************/
function get_image_alt_text($image_url) {
  $attachment_id = attachment_url_to_postid( $image_url );
  $image_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true);
  return $image_alt;
}

add_shortcode('get_popular_posts', 'get_popular_posts_func');
function get_popular_posts_func() {
  
    $popular_args = array(
      'post_type' => 'post',
      'post_status'=>'publish', 
      'posts_per_page' => 8,
      'order'     => 'DESC',
      'meta_key' => 'post_views_count',
      'orderby'   => 'meta_value_num'
    );
    $popular_query = get_posts($popular_args); ?>

    <?php if (!empty($popular_query)) { ?>
      
        <div class="myreport-cont">
        <h5 class="asid-content-title">Popular Posts</h5>
          <ul class="my-report-card-ul">
            <?php $pCount = 1;
            foreach($popular_query as $post) { ?>
            
                <li class="my-report-card-li"> 
                  <span class="my-report-card-span"><?php echo $pCount; ?></span>
                  <h4><a href="<?php echo get_the_permalink($post->ID); ?>"><?php get_limited_title_func($post->post_title, 40); ?></a></h4>
                </li>
              
            <?php $pCount++;
            } ?>
          </ul>
        </div>

<?php }
}



add_shortcode('get_recent_posts', 'get_recent_posts_func');
function get_recent_posts_func() {
  
    $recent_args = array(
      'post_type' => 'post',
      'post_status'=>'publish', 
      'posts_per_page' => 8,
      'orderby' => 'date',
      'order'     => 'DESC',
    );
    $recent_query = get_posts($recent_args); ?>

    <?php if (!empty($recent_query)) { ?>

      <div class="headr-banner-asid-contant">
        <h5 class="asid-content-title">Recent Posts</h5>
        <div class="scroll-asid">
          <ul class="asid-ul">
            <?php foreach($recent_query as $post) { ?>
            
                <li class="asid-li">
                    <span class="left-span">
                      <?php echo get_the_post_thumbnail($post->ID,'sidebar-post-thumbnail'); ?>
                    </span>
                    <a class="asid-link" href="<?php echo get_the_permalink($post->ID); ?>">                        
                        <?php get_limited_title_func($post->post_title, 30); ?>
                    </a>
                </li>
              
            <?php } ?>
          </ul>
        </div>
      </div>

<?php }
}


/***********************************************************************/
add_shortcode('get_popular_news_posts', 'get_popular_news_func');
function get_popular_news_func() {
  
    $popular_news_args = array(
      'post_type' => 'news',
      'post_status'=>'publish', 
      'posts_per_page' => 12,
      'order'     => 'DESC',
      'meta_key' => 'post_views_count',
      'orderby'   => 'meta_value_num'
    );
    $popular_news_query = get_posts($popular_news_args); ?>

    <?php if (!empty($popular_news_query)) { ?>
      
        <div class="myreport-cont">
        <h5 class="asid-content-title">Must Read</h5>
          <ul class="my-report-card-ul">
            <?php $pCount = 1;
            foreach($popular_news_query as $post) { ?>
            
                <li class="my-report-card-li"> 
                  <span class="my-report-card-span"><?php echo $pCount; ?></span>
                  <h4><a href="<?php echo get_the_permalink($post->ID); ?>"><?php get_limited_title_func($post->post_title, 40); ?></a></h4>
                </li>
              
            <?php $pCount++;
            } ?>
          </ul>
        </div>

<?php }
}
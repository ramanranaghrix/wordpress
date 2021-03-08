<?php

add_shortcode( 'deal_post', 'display_custom_post_type_deals' );

    function display_custom_post_type_deals($atts){
          // define attributes and their defaults
		$args= shortcode_atts( array (
		'type' => 'post',
		'order' => 'date',
		'orderby' => 'title',
		'posts' => -1,
		'color' => '',
		//'fabric' => '',
		'category' => '',
		), $atts ) ;
		//now
		    // define query parameters based on attributes
		$options = array(
		'post_type' => $args['type'],
		'order' => $args['order'],
		'orderby' => $args['orderby'],
		'posts_per_page' => $args['posts'],
		'color' => $args['color'],
		//'fabric' => $args[fabric],
		'category_name' => $args['category']
		);

        $xyz ='0';
        $query = new WP_Query($options );
        if( $query->have_posts() ){
			?>
			
               <div class="container padding_remove_c">
			  <div class="row">
			  <?php
            while( $query->have_posts() ){
                $query->the_post();
				          ?>
		<div class="col-lg-4 col-sm-12 col-md-6 padding_remove">
	    <div class="deal_day custom<?php echo ($xyz++%4); ?> "> <a href="<?php the_permalink(); ?>"> <?php   the_post_thumbnail(); ?></a>
				<div class="row content_deign"><div class="deal_start  col-lg-12 col-sm-12 col-md-12"><h4 class="title_color"> 
					<a href="<?php the_permalink(); ?>"><?php the_title()  ?> </a></h4>
                     <?php the_excerpt(); ?>

					 </div>
              </div>
               </div>
               </div>
			<?php
                
            }
         
        }
        wp_reset_postdata();
        
    }
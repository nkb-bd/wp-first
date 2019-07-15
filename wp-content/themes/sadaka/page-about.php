<?php
/**
 * The template for displaying pages
 *Template Name:About us page
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	 
	<div class="page-heading text-center" 	style=" background: url(<?php the_field('background_image'); ?>) no-repeat;">
		
	
		<div class="container zoomIn animated">
			<?php
				$page = get_page_by_title( 'About sadaka' );
			 ?>

			<h1 class="page-title"><?php the_field( 'banner_title' ); ?> <span class="title-under"></span></h1>
			<p class="page-description">
				<?php the_field( 'page_des' ); ?>
			</p>
			
		</div>

	</div>

	<div class="main-container">

		<div class="container">

			<div class="row fadeIn animated">

				<div class="col-md-6">
					<?php the_post_thumbnail(); ?>
				</div>

				<div class="col-md-6">
										

					<h2 class="title-style-2"><?php the_title(); ?><span class="title-under"></span></h2>

					<?php the_content(); wp_reset_postdata();  ?>
				
				</div>

			</div> <!-- /.row -->


    <div class="section-home about-us fadeIn animated">

        <div class="container">
           <?php 
           
            $args = array( 'posts_per_page' => 4,'post_type' => 'service' );

            $myposts = get_posts( $args );
                                
            foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            <div class="row">

                <div class="col-md-3 col-sm-6">
                
                  <div class="about-us-col">
                       
                         
                        <div class="col-icon-wrapper">
                          <?php the_post_thumbnail(); ?>
                        </div>

                        <h3 class="col-title"><?php the_title(); ?></h3>
                        
                            <div class="col-details">

                              <?php echo word_count(get_the_excerpt(), '15'); ?>...
                              
                            </div>
                            
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary"> Read more </a>
                    
                  </div>
                  
                </div>
                <?php endforeach; 
			        wp_reset_postdata();
			        ?>
 
            </div>

        </div>
      
    </div>

</div> <!-- /.about-us -->


	    <div class="our-team animate-onscroll fadeIn">

	        <div class="container">

	            <h2 class="title-style-1">Our Team <span class="title-under"></span></h2>

	            
	            <div class="row">
	            	<?php $query = new WP_Query( array( 

	            		'post_type' => 'our_team',	
                        'posts_per_page'   => 4
                                             		 ) );

                              if ( $query->have_posts() ) :
                              while ( $query->have_posts() ) : $query->the_post(); ?> 

	                <div class="col-md-3 col-sm-6">

	                    <div class="team-member">

	                        <div class="thumnail">

	                              <?php the_post_thumbnail(); ?>
	                            
	                        </div>



	                        <h4 class="member-name"><a href="#"> <?php the_title(); ?></a></h4>

	                        <div class="member-position">
	                           <?php the_excerpt(); ?>
	                        </div>

	                        <div class="btn-holder">

	                          <a href="#" class="btn"> <?php the_field('email'); ?> </a>
	                          <a href="#" class="btn"> <?php the_field('fb'); ?> </a>
	                          <a href="#" class="btn"> <?php the_field('google'); ?> </a>
	                          <a href="#" class="btn"> <?php the_field('twitter'); ?> </a>
	                          <a href="#" class="btn"> <?php the_field('linkedin'); ?> </a>
	                          
	                        </div>

	                        

	                    </div> <!-- /.team-member -->
	                    
	                </div>

	         	 <?php endwhile;  
                 ?>

	            </div> <!-- /.row -->

	        </div>
	         <?php  endif;  
	         wp_reset_postdata(); ?>
	    </div>
		


	</div>

	<div class="clearfix"></div>

<?php get_footer(); ?>

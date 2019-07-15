<?php
/**
 *Template Name:Page Causes
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
	<?php $page = get_page_by_title( 'causes' ); ?>
	<div class="page-heading text-center" 	style=" background: url(<?php the_field('background_image'); ?>) no-repeat;">

		<div class="container zoomIn animated">
			
			<h1 class="page-title"><?php the_field( 'banner_title' ); ?> <span class="title-under"></span></h1>
			<p class="page-description">
				<?php the_field( 'page_des' ); ?>
			</p>
			
		</div>

	</div>

	<div class="main-container">

		<div class="our-causes fadeIn animated">

	        <div class="container">

	             <h2 class="title-style-1">Our Causes <span class="title-under"></span></h2>

            <div class="row">
                 <?php 
           
                  $args = array( 'post_type' => 'cause','posts_per_page'   => 8);

                  $myposts = get_posts( $args );
                                      
                  foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

                <div class="col-md-3 col-sm-6">

                    <div class="cause">
                      <div class="cause-img"> <?php the_post_thumbnail(); ?> </div>
                        <div class="progress cause-progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width:  60%;">
                           <?php the_excerpt(); ?>
                          </div>
                        </div>

                        <h4 class="cause-title"><a href="#"><?php the_title(); ?></a></h4>
                        <div class="cause-details">
                          <?php the_content(); ?>    
                        </div>

                        <div class="btn-holder text-center">

                          <a href="<?php the_permalink(); ?>" class="btn btn-primary" data-toggle="modal" data-target="#donateModal"> DONATE NOW</a>
                          
                        </div>

                        

                    </div> <!-- /.cause -->
                    
                </div> 
              <?php endforeach;

              wp_reset_postdata(); ?>

              

            </div>

	         </div>
	        
	    </div> <!-- /.our-causes -->

		


	</div> <!-- /.main-container  -->



<?php //get_sidebar(); ?>
<?php get_footer(); ?>

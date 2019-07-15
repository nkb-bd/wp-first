<?php
/**
 *Template Name:Gallery page
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 
$page = get_page_by_title( 'causes' ); 
?>

	<div class="page-heading text-center" 	style=" background: url(<?php the_field('background_image'); ?>)">

		<div class="container zoomIn animated">
			
			<h1 class="page-title"><?php the_field( 'banner_title' ); ?> <span class="title-under"></span></h1>
			<p class="page-description">
				<?php the_field( 'page_des' ); ?>
			</p>
			
		</div>

	</div>

	<div class="main-container">

		<div class="container gallery fadeIn animated">
			
			<div class="row">
				

					<a href="<?php the_post_thumbnail_url('large');?>" class="col-md-3 col-sm-4 gallery-item lightbox">

						<img src="<?php the_post_thumbnail_url('medium	');?>" alt="">

						<span class="on-hover">
							<span class="hover-caption"><?php the_title() ?></span>
						</span>

					</a> <!-- /.gallery-item -->

					 <!-- /.gallery-item -->
					
				
			</div>
			
		</div>


	</div> <!-- /.main-container  -->
<?php get_footer(); ?>

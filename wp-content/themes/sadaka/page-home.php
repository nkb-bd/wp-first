<?php
/*

Template Name:Page abc Home

 */

get_header(); ?>



    <?php wp_reset_query(); ?>
    <!-- Carousel
    ================================================== -->
    <!-- Php codes for slider -->
     <?php  
     $number = 0; 
     $query=new WP_Query(array( 
                            'post_type' => 'slider'
                        ) );  

             if ($query->have_posts()):
     ?>                           
    <div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel">

          <!-- Indicators -->
          <ol class="carousel-indicators">

             <?php while($query->have_posts()): $query->the_post(); ?>
            
             <li data-target="#homeCarousel" data-slide-to="<?php echo $number++; ?>"></li>
             <?php endwhile; ?>
          </ol>

          
          <div class="carousel-inner" role="listbox">
          <?php while($query->have_posts()):$query->the_post();?>
             
            <div class="item">

             <?php the_post_thumbnail('large'); ?>

              <div class="container">

                <div class="carousel-caption">

                  <h2 class="carousel-title bounceInDown animated slow"><?php the_title(); ?></h2>
                  <h4 class="carousel-subtitle bounceInUp animated slow "><?php the_excerpt(); ?></h4>
                  <a href="#" class="btn btn-lg btn-secondary hidden-xs bounceInUp animated slow" data-toggle="modal" data-target="#donateModal">DONATE NOW</a>

                </div> <!-- /.carousel-caption -->

              </div>


            </div> <!-- /.item -->
            
       
               <?php endwhile; ?>
          </div>
          

          <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

    </div><!-- /.carousel -->
    <?php endif; wp_reset_query(); ?>


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
      
    </div> <!-- /.about-us -->

     <div class="section-home home-reasons">

        <div class="container">

            <div class="row">
                 <?php 
           
                  $args = array( 'post_type' => 'post','posts_per_page'   => 2,'order'  => 'ASC');

                  $myposts = get_posts( $args );
                                      
                  foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

                <div class="col-md-6">

                    <div class="reasons-col animate-onscroll fadeIn">

                        <?php the_post_thumbnail(); ?>
                        <div class="reasons-titles">

                            <h3 class="reasons-title"><?php the_title(); ?></h3>
                            <h5 class="reason-subtitle"><?php the_field('sub_head'); ?></h5>
                            
                        </div>

                        <div class="on-hover hidden-xs">
                            
                               <?php the_content(); ?>
                        </div>
                    </div>
                    
                </div>


                <?php 
                  endforeach ;
                  wp_reset_postdata();
                 ?>


            </div>
          
  

        </div>  

    </div> <!-- /.home-reasons -->

    <div class="section-home our-causes animate-onscroll fadeIn">

        <div class="container">

            <h2 class="title-style-1">Our Causes <span class="title-under"></span></h2>

            <div class="row">
                 <?php 
           
                  $args = array( 'post_type' => 'cause','posts_per_page'   => 4);

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

    




    <div class="section-home our-sponsors animate-onscroll fadeIn">
    
        <div class="container">

            <h2 class="title-style-1">Our Sponsors <span class="title-under"></span></h2>

            <ul class="owl-carousel list-unstyled list-sponsors">

              <li> <img src="<?php bloginfo('template_directory');?>/com/assets/images/sponsors/bus.png" alt=""></li>
              <li> <img src="<?php bloginfo('template_directory');?>/com/assets/images/sponsors/wikimedia.png" alt=""></li>
              <li> <img src="<?php bloginfo('template_directory');?>/com/assets/images/sponsors/one-world.png" alt=""></li>
              <li> <img src="<?php bloginfo('template_directory');?>/com/assets/images/sponsors/wikiversity.png" alt=""></li>
              <li> <img src="<?php bloginfo('template_directory');?>/com/assets/images/sponsors/united-nations.png" alt=""></li>

              <li> <img src="<?php bloginfo('template_directory');?>/com/assets/images/sponsors/bus.png" alt=""></li>
              <li> <img src="<?php bloginfo('template_directory');?>/com/assets/images/sponsors/wikimedia.png" alt=""></li>
              <li> <img src="<?php bloginfo('template_directory');?>/com/assets/images/sponsors/one-world.png" alt=""></li>
              <li> <img src="<?php bloginfo('template_directory');?>/com/assets/images/sponsors/wikiversity.png" alt=""></li>
              <li> <img src="<?php bloginfo('template_directory');?>/com/assets/images/sponsors/united-nations.png" alt=""></li>

            </ul>

        </div>
    </div>  
</div>
</div>
</div>
<!-- /.our-sponsors -->

<?php get_footer(); ?>

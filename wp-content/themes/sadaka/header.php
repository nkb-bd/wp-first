<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>


 <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>

        <!-- Bootsrap -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/com/assets/css/bootstrap.min.css">

        <!-- Font awesome -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/com/assets/css/font-awesome.min.css">

        <!-- Owl carousel -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/com/assets/css/owl.carousel.css">
        <!-- PrettyPhoto -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/com/assets/css/prettyPhoto.css">

        <!-- Template main Css -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/com/assets/css/style.css">
        
        <!-- Modernizr -->
        <script src="<?php bloginfo('template_directory');?>/com/assets/js/modernizr-2.6.2.min.js"></script>

	<?php wp_head(); ?>
</head>

    <body>


     <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                       <a class="navbar-brand" href="index.html"><img src="<?php bloginfo('template_directory');?>/com/assets/images/sadaka-logo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="service.html">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="project.html">Portfolio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="blog.html">Blog</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                        <a class="dropdown-item" href="elements.html">Elements</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                                
                                <li> <i class="fa fa-phone"></i> <a href="tel:"><?php echo ot_get_option( 'tel'); ?></a> </li>
                                <li> <i class="fa fa-envelope"></i> <a href="mailto:contact@sadaka.org"><sadaka class="org"><?php echo ot_get_option( 'mail_to'); ?></sadaka></a> </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>


    </header>

     <div class="container">
                  <div class="row">

                    <div class="col-sm-6 col-xs-12">

                        <ul class="list-unstyled list-inline header-contact">
            
                            <li> <i class="fa fa-phone"></i> <a href="tel:"><?php echo ot_get_option( 'tel'); ?></a> </li>
                             <li> <i class="fa fa-envelope"></i> <a href="mailto:contact@sadaka.org"><sadaka class="org"><?php echo ot_get_option( 'mail_to'); ?></sadaka></a> </li>
                       </ul> <!-- /.header-contact  -->
                      
                    </div>

                    <div class="col-sm-6 col-xs-12 text-right">

                        <ul class="list-unstyled list-inline header-social">


                             <?php
                             
                              $query = new WP_Query( array( 'post_type' => 'social_link',
                                                             'orderby'          => 'date',
                                                             'order'            => 'ASC',
                                                          ) );

                              if ( $query->have_posts() ) :
                              while ( $query->have_posts() ) : $query->the_post(); ?> 
                                  
                                 <li> <a href="#"> <?php the_content(); ?></a> </li>
                                    

                              <?php endwhile; wp_reset_postdata(); 
                               endif; ?>
                       </ul> <!-- /.header-social  -->
                      
                    </div>


                  </div>
              </div>
    <!-- Header part end-->

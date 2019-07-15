<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
  


    <footer class="main-footer">

        <div class="footer-top">
            
        </div>


        <div class="footer-main">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-4">

                        <div class="footer-col">

                        	<?php dynamic_sidebar('footer_one')  ?>

                         </div>

                    </div>

                    <div class="col-md-4">

                        <div class="footer-col">

                        <?php dynamic_sidebar('footer_two')  ?>

                        

                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="footer-col">
                            <div class="footer-form" >
                              <?php dynamic_sidebar('footer_three')  ?>
                           </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>



                </div>
                
                
            </div>

            
        </div>

        <div class="footer-bottom">

       <div class="container">
            <div class="pull-right">
                <?php echo ot_get_option( 'copyright'); ?> <a href="http://www.ouarmedia.com" target="_blank">Ouarmedia</a>
            </div>
              <?php    wp_reset_postdata(); ?>

            <div class="pull-left">
                 <?php $defaults = array(

                    'theme_location'  =>'footer_menu',

                     'menu' => 'footer Menu',
                   
                    
                    'menu_class'      => 'nav navbar-nav',
                  
                );
                    ?>
 
                    <?php wp_nav_menu( $defaults ); ?>
            </div>
            <div class="clearfix"></div>

       </div>


           
        </div>
        
    </footer> <!-- main-footer -->




    <!-- Donate Modal -->
    <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">DONATE NOW</h4>
          </div>
          <div class="modal-body">

                <form class="form-donation">

                        <h3 class="title-style-1 text-center">Thank you for your donation <span class="title-under"></span>  </h3>

                        <div class="row">

                            <div class="form-group col-md-12 ">
                                <input type="text" class="form-control" id="amount" placeholder="AMOUNT(€)">
                            </div>

                        </div>


                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="firstName" placeholder="First name*">
                            </div>

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="lastName" placeholder="Last name*">
                            </div>
                        </div>


                        <div class="row">

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="email" placeholder="Email*">
                            </div>

                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="phone" placeholder="Phone">
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="address" placeholder="Address">
                            </div>

                        </div>


                        <div class="row">

                            <div class="form-group col-md-12">
                                <textarea cols="30" rows="4" class="form-control" name="note" placeholder="Additional note"></textarea>
                            </div>

                        </div>

                        <div class="row">

                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary pull-right" name="donateNow" >DONATE NOW</button>
                            </div>

                        </div>



                       
                    
                </form>
            
          </div>
        </div>
       
      </div>

    </div> <!-- /.modal -->





    <!--  Scripts
    ================================================== -->

   <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>

    <!-- Bootsrap javascript file -->
    <script src="<?php bloginfo('template_directory'); ?>/com/assets/js/bootstrap.min.js"></script>
        <script>
        jQuery(document).ready(function(){
          $(".carousel-indicators li:first").addClass("active");
          $(".carousel-inner .item:first").addClass("active");
        });
        </script>
    
    <!-- owl carouseljavascript file -->
    <script src="<?php bloginfo('template_directory'); ?>/com/assets/js/owl.carousel.min.js"></script>

    <!-- Google map  -->
    <script src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
    
          <!-- PrettyPhoto javascript file -->
        <script src="<?php bloginfo('template_directory'); ?>/com/assets/js/jquery.prettyPhoto.js"></script>
    
    
    <!-- Template main javascript -->
    <script src="<?php bloginfo('template_directory'); ?>/com/assets/js/main.js"></script>
    <?php wp_footer();?>

    </body>
</html>

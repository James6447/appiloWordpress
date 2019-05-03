<?php
/**
 * Footer section for our theme
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php global $parallel; ?>

        <section class="copyright">

            <div class="container">

                <div class="row">

                    <div class="col-md-6">
                        <h3>About Us</h3>
                        <br>
                        <p>Duis ut justo vitae leo molestie facilisis non a odio. Integer facilisis ligula ex, sed consectetur odio pharetra sagittis. Sed in sodales elit. Ut sit amet sem sapien. Morbi ultrices semper dui a accumsan. Proin lobortis varius sem, id vulputate elit fringilla et. Donec a posuere risus. Nunc venenatis quis dui quis bibendum. Morbi molestie nisi ac orci iaculis mollis.</p>
                    </div>

                    <div class="col-md-6">
                        <h3>Contact Us</h3>
                        <?php echo do_shortcode('[ufbl form_id="3"]'); ?>
                    </div>


<!--                    <div class="col-md-6">-->
<!---->
<!--                        <div class="copyrightinfo">-->
<!---->
<!--                            <p>-->
<!--                                --><?php //if ( $parallel['copyright-text'] ) : ?>
<!---->
<!--                                --><?php //echo wp_kses_post($parallel['copyright-text']); ?>
<!---->
<!--                                --><?php //else : ?>
<!---->
<!--                                <a href="--><?php //echo esc_url( __( 'https://wordpress.org/', 'parallel' ) ); ?><!--">--><?php //printf( __( 'Powered by %s', 'parallel' ), 'WordPress' ); ?><!--</a>-->
<!---->
<!--                                <span class="sep"> | </span>-->
<!---->
<!--                                <a href="--><?php //echo esc_url( __( 'https://www.themely.com/', 'parallel' ) ); ?><!--">--><?php //printf( __( 'Made with &#10084; by %s', 'parallel' ), 'Themely' ); ?><!--</a>-->
<!---->
<!--                                --><?php //endif; ?>
<!--                            </p>-->
<!---->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                    <div class="col-sm-12 col-md-6 col-lg-6">-->
<!---->
<!--                        <ul class="socials pull-right">-->
<!--                            -->
<!--                            --><?php //if ($parallel['footer-facebook']) { ?><!--<li><a target="_blank" href="--><?php //echo esc_url($parallel['footer-facebook']); ?><!--"><i class="fa fa-facebook fa-lg"></i></a></li>--><?php //} ?><!-- -->
<!--                            -->
<!--                            --><?php //if ($parallel['footer-twitter']) { ?><!--<li><a target="_blank" href="--><?php //echo esc_url($parallel['footer-twitter']); ?><!--"><i class="fa fa-twitter fa-lg"></i></a></li>--><?php //} ?><!-- -->
<!--                            -->
<!--                            --><?php //if ($parallel['footer-googleplus']) { ?><!--<li><a target="_blank" href="--><?php //echo esc_url($parallel['footer-googleplus']); ?><!--"><i class="fa fa-google-plus fa-lg"></i></a></li>--><?php //} ?><!-- -->
<!--                            -->
<!--                            --><?php //if ($parallel['footer-github']) { ?><!--<li><a target="_blank" href="--><?php //echo esc_url($parallel['footer-github']); ?><!--"><i class="fa fa-github fa-lg"></i></a></li>--><?php //} ?><!-- -->
<!--                            -->
<!--                            --><?php //if ($parallel['footer-behance']) { ?><!--<li><a target="_blank" href="--><?php //echo esc_url($parallel['footer-behance']); ?><!--"><i class="fa fa-behance fa-lg"></i></a></li>--><?php //} ?>
<!--                            -->
<!--                            --><?php //if ($parallel['footer-linkedin']) { ?><!--<li><a target="_blank" href="--><?php //echo esc_url($parallel['footer-linkedin']); ?><!--"><i class="fa fa-linkedin fa-lg"></i></a></li>--><?php //} ?>
<!--                            -->
<!--                            --><?php //if ($parallel['footer-instagram']) { ?><!--<li><a target="_blank" href="--><?php //echo esc_url($parallel['footer-instagram']); ?><!--"><i class="fa fa-instagram fa-lg"></i></a></li>--><?php //} ?>
<!--                            -->
<!--                            --><?php //if ($parallel['footer-youtube']) { ?><!--<li><a target="_blank" href="--><?php //echo esc_url($parallel['footer-youtube']); ?><!--"><i class="fa fa-youtube fa-lg"></i></a></li>--><?php //} ?>
<!--                        -->
<!--                        </ul>-->
<!---->
<!--                    </div>-->

                </div>

            </div>

        </div>

        </section>

        <?php if( is_page_template( 'template-home.php' ) ) get_template_part('sections/custom'); ?>

        <?php wp_footer(); ?>
    
    </body>

</html>
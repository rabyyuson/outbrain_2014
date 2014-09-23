<?php

/**
 * Template Name: Offices
 *
 * The template for the offices page
 * @url: www.outbrain.com/about/offices
 *
 * -----------------------------------------------------------------------------
 */

get_header(); ?>
<div class="container page-template about offices" role="main">
    <div class="row hero">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="details">
                    <h1><?php echo strtoupper( $post->post_title ); ?></h1>
                </div>
            </div>
        </div>
    </div>
    <?php
        // Reference the about page template navigation menu
        include_once( TEMPLATEPATH . '/inc/templates/page-templates/about/navigation.php' );
    ?>
    <div class="row head">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">Where to find us</h2>
                <p class="description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin blandit consequat lorem vitae efficitur. Vestibulum sit amet libero tempus, sollicitudin lectus ac, lobortis quam. Quisque in ornare felis. Quisque dapibus enim id interdum tincidunt. Vivamus pellentesque egestas luctus.
                </p>
            </div>
        </div>
    </div>
    <div class="row locations">
        <div class="inner clearfix">
            <div class="columns twelve">
                <ul class="navigation">
                    <li class="current"><a href="javascript:void(0)">New York</a></li>
                    <li><a href="javascript:void(0)">Netanya</a></li>
                    <li><a href="javascript:void(0)">London</a></li>
                    <li><a href="javascript:void(0)">Paris</a></li>
                    <li><a href="javascript:void(0)">Munich</a></li>
                    <li><a href="javascript:void(0)">San Francisco</a></li>
                    <li><a href="javascript:void(0)">Chicago</a></li>
                    <li><a href="javascript:void(0)">Washington</a></li>
                    <li><a href="javascript:void(0)">Singapore</a></li>
                    <li><a href="javascript:void(0)">Sydney</a></li>
                    <li><a href="javascript:void(0)">Atlanta</a></li>
                    <li><a href="javascript:void(0)">São Paolo</a></li>
                    <li><a href="javascript:void(0)">Milan</a></li>
                    <li><a href="javascript:void(0)">Madrid</a></li>
                    <li><a href="javascript:void(0)">Tokyo</a></li>
                </ul>
                <ul class="information">
                    
                    <!-- New York -->
                    <li class="current">
                        <div class="address">
                            39 West 13th Street
                            <br/>
                            New York, NY 10011 USA
                            <br/>
                            646-867-0149
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york.jpg"></div>
                    </li>
                    
                    <!-- Netanya -->
                    <li>
                        <div class="address">
                            Arieh Regev Street 4
                            <br/>
                            Netanya, Israel
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york2.jpg"></div>
                    </li>
                    
                    <!-- London -->
                    <li>
                        <div class="address">
                            6 Ramillies Street
                            <br/> 
                            Soho, London W1F 7TY UK
                            <br/>
                            +44-203-301-2510
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york.jpg"></div>
                    </li>
                    
                    <!-- Paris -->
                    <li>
                        <div class="address">
                            234 Rue du Faubourg Saint-Honoré
                            <br/> 
                            75008 Paris, France
                            <br/>
                            +33184884952
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york2.jpg"></div>
                    </li>
                    
                    <!-- Munich -->
                    <li>
                        <div class="address">
                            St.-Martin-Straße 53
                            <br/>
                            81669 Munich, Germany 
                            <br/>
                            +49-89-716771350
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york.jpg"></div>
                    </li>
                    
                    <!-- San Francisco -->
                    <li>
                        <div class="address">
                            225 Bush Street 
                            <br/>
                            San Francisco, CA 94104 USA
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york2.jpg"></div>
                    </li>
                    
                    <!-- Chicago -->
                    <li>
                        <div class="address">
                            101 North Upper Wacker Drive 
                            <br/>
                            Chicago, IL 60606 USA
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york.jpg"></div>
                    </li>
                    
                    <!-- Washington -->
                    <li>
                        <div class="address">
                            2111 Wilson Boulevard
                            <br/>
                            Arlington, VA 22201 USA
                            <br/>
                            540-729-4348
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york2.jpg"></div>
                    </li>
                    
                    <!-- Singapore -->
                    <li>
                        <div class="address">
                            21 Tanjong Pagar Road 
                            <br/>
                            Singapore 088444
                            <br/>
                            +65-6225-4695
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york.jpg"></div>
                    </li>
                    
                    <!-- Sydney -->
                    <li>
                        <div class="address">
                            241 Commonwealth Street 
                            <br/>
                            Surry Hills NSW 2010, Australia 
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york2.jpg"></div>
                    </li>
                    
                    <!-- Atlanta -->
                    <li>
                        <div class="address">
                            2859 Paces Ferry Road
                            <br/>
                            Atlanta, GA 30339 USA
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york.jpg"></div>
                    </li>
                    
                    <!-- Sao Paolo -->
                    <li>
                        <div class="address">
                            Rua Leopoldo Couto Magalhães Júnior
                            <br/>
                            1-51 - Moema, São Paulo - São Paulo Brazil
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york2.jpg"></div>
                    </li>
                    
                    <!-- Milan -->
                    <li>
                        <div class="address">
                            Via Conservatorio 
                            <br/>
                            22, 20122 Milan Italy 
                            <br/>
                            +39-02-7729-7519
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york.jpg"></div>
                    </li>
                    
                    <!-- Madrid -->
                    <li>
                        <div class="address">
                            Calle Serrano 
                            <br/>
                            93, 28006 Madrid Madrid Spain
                            <br/>
                            +34-91-590-29-64
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york2.jpg"></div>
                    </li>
                    
                    <!-- Tokyo -->
                    <li>
                        <div class="address">
                            Ebisu One Bldg 6F, 1-8-4, Ebisu
                            <br/>
                            Shibuya-ku Tokyo Japan 150-0013
                            <br/>
                            Japan: +03-6409-6061
                            <br/>
                            Outside Japan: +81-3-6409-6061
                        </div>
                        <div class="directions">
                            <a href="javascript:void(0)">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york.jpg"></div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>
<?php get_footer();
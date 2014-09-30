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
<div class="container about offices" role="main">
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
    <div class="row head navigation-clip">
        <div class="inner clearfix">
            <div class="columns twelve">
                <h2 class="title">Where to find us</h2>
                <p class="description">
                    The joy of discovery is a global. We operate offices around the world and we aim to make each of them an accurate reflection of our culture -- a little Outbrainy. Feel free to stop in and say hello.
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
                            39 W 13th Street
                            <br/>
                            New York, NY 10011 USA
                            <br/>
                            1-646-867-149
                        </div>
                        <div class="directions">
                            <a href="https://www.google.com/maps/dir//39+W+13th+St,+New+York,+NY+10011/@40.7363192,-73.9981453,17z/data=!3m1!4b1!4m8!4m7!1m0!1m5!1m1!1s0x89c25999bc55878b:0x8b08f78ea1e50f17!2m2!1d-73.9959995!2d40.7363192" target="_blank">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york.jpg"></div>
                    </li>
                    
                    <!-- Netanya -->
                    <li>
                        <div class="address">
                            Arieh Regev Street 4
                            <br/>
                            Netanya, Israel
                            <br/>
                            +972-73-2238900
                        </div>
                        <div class="directions">
                            <a href="https://www.google.com/maps/place/Arieh+Regev+St+4,+Netanya,+Israel/@32.2818484,34.8632044,17z/data=!3m1!4b1!4m2!3m1!1s0x151d3f7e325de2db:0xf6973a78cb60ec88" target="_blank">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york2.jpg"></div>
                    </li>
                    
                    <!-- London -->
                    <li>
                        <div class="address">
                            6 Ramillies Street
                            <br/> 
                            Soho, London W1F 7TY, UK
                            <br/>
                            +44-203-301-2510
                        </div>
                        <div class="directions">
                            <a href="https://www.google.com/maps/place/6+Ramillies+St,+Soho,+London+W1F+7TY,+UK/@51.5153788,-0.1392263,17z/data=!3m1!4b1!4m2!3m1!1s0x4876052ac793af6b:0xa233f862b99a1781" target="_blank">Get Directions</a>
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
                            <a href="https://www.google.com/maps/place/234+Rue+du+Faubourg+Saint-Honor%C3%A9,+75008+Paris,+France/@48.8763361,2.3029536,17z/data=!3m1!4b1!4m2!3m1!1s0x47e66fc06ebd6007:0xe994142b54e5204d">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york2.jpg"></div>
                    </li>
                    
                    <!-- Munich -->
                    <li>
                        <div class="address">
                            St.-Martin-Straße 53
                            <br/>
                            81669 München, Germany
                            <br/>
                            +49-89-716771350
                        </div>
                        <div class="directions">
                            <a href="https://www.google.com/maps/place/St.-Martin-Stra%C3%9Fe+53,+81669+M%C3%BCnchen,+Germany/@48.119863,11.600828,17z/data=!3m1!4b1!4m2!3m1!1s0x479ddf9b7de6b6ab:0x5e8a8033f2c9502a" target="_blank">Get Directions</a>
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
                            <a href="https://www.google.com/maps/place/225+Bush+Street,+San+Francisco,+CA+94104/@37.79086,-122.40147,17z/data=!3m1!4b1!4m2!3m1!1s0x8085806f937e666d:0xdba83743068dd900" target="_blank">Get Directions</a>
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
                            <a href="https://www.google.com/maps/place/101+N+Upper+Wacker+Dr,+Chicago,+IL+60606/@41.8835892,-87.6363918,15z/data=!4m2!3m1!1s0x880e2cb85afab5d3:0x7a17381d6871f55e?sa=X&ei=taIlVPiVCcmfyATqm4FY&ved=0CB0Q8gEwAA" target="_blank">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york.jpg"></div>
                    </li>
                    
                    <!-- Washington -->
                    <li>
                        <div class="address">
                            2111 Wilson Boulevard
                            <br/>
                            Arlington, VA 22201 USA
                        </div>
                        <div class="directions">
                            <a href="https://www.google.com/maps/place/2111+Wilson+Blvd,+Arlington,+VA+22201/@38.8919159,-77.0854019,17z/data=!3m1!4b1!4m2!3m1!1s0x89b7b661ff2aaef5:0x5a3dc39c6773688a" target="_blank">Get Directions</a>
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
                            +65-3159-0520
                        </div>
                        <div class="directions">
                            <a href="https://www.google.com/maps/place/21+Tanjong+Pagar+Rd,+Singapore+088444/@1.279466,103.844022,17z/data=!3m1!4b1!4m2!3m1!1s0x31da196d59f18143:0x6decf9e0bdf343e2" target="_blank">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york.jpg"></div>
                    </li>
                    
                    <!-- Sydney -->
                    <li>
                        <div class="address">
                            241 Commonwealth Street 
                            <br/>
                            Surry Hills NSW 2010, Australia 
                            <br/>
                            +61-2-9099-3923
                        </div>
                        <div class="directions">
                            <a href="https://www.google.com/maps/place/241+Commonwealth+St,+Surry+Hills+NSW+2010,+Australia/@-33.883614,151.209694,17z/data=!3m1!4b1!4m2!3m1!1s0x6b12ae22057f458f:0x14f52421bcb68576" target="_blank">Get Directions</a>
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
                            <a href="https://www.google.com/maps/place/2859+Paces+Ferry+Rd,+Atlanta,+GA+30339/@33.8677883,-84.4688859,17z/data=!3m1!4b1!4m2!3m1!1s0x88f5044291a26f03:0xead14c7de9893179" target="_blank">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york.jpg"></div>
                    </li>
                    
                    <!-- Sao Paolo -->
                    <li>
                        <div class="address">
                            R. Leopoldo Couto Magalhães Júnior
                            <br/>
                            1 - Moema, São Paulo - SP, Brazil
                        </div>
                        <div class="directions">
                            <a href="https://www.google.com/maps/place/R.+Leopoldo+Couto+Magalh%C3%A3es+J%C3%BAnior,+1+-+Moema,+S%C3%A3o+Paulo+-+SP,+Brazil/@-23.5894386,-46.6849041,17z/data=!3m1!4b1!4m2!3m1!1s0x94ce5741553847bf:0x85d94a32e977c5eb" target="_blank">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york2.jpg"></div>
                    </li>
                    
                    <!-- Milan -->
                    <li>
                        <div class="address">
                            Via Conservatorio
                            <br/>
                            22, 20122 Milano, Italy
                            <br/>
                            +39-02-77297519
                        </div>
                        <div class="directions">
                            <a href="https://www.google.com/maps/place/Via+Conservatorio,+22,+20122+Milano,+Italy/@45.4658916,9.2028109,17z/data=!3m1!4b1!4m2!3m1!1s0x4786c6a348b6afa9:0xc5502ec3436611de" target="_blank">Get Directions</a>
                        </div>
                        <div class="background-image" data-image_path="<?php echo get_template_directory_uri(); ?>/images/page-templates/about/offices/new-york.jpg"></div>
                    </li>
                    
                    <!-- Madrid -->
                    <li>
                        <div class="address">
                            Calle Serrano 
                            <br/>
                            93, 28006 Madrid, Spain
                            <br/>
                            +34 91 590 29 64
                        </div>
                        <div class="directions">
                            <a href="https://www.google.com/maps/place/Calle+Serrano,+93,+28006+Madrid,+Spain/@40.4375619,-3.6865147,17z/data=!3m1!4b1!4m2!3m1!1s0xd4228eb95342483:0x2cef4245d9e3621e" target="_blank">Get Directions</a>
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
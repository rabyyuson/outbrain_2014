<?php

/**
 * Template Name: Categories
 *
 * The template for the categories page
 * @url: www.outbrain.com/blog/categories
 *
 * -----------------------------------------------------------------------------
 */

get_template_part( 'inc/templates/blog/header', get_post_format() ); ?>
<div class="container content categories" role="main">
    <div class="row">
        <div class="inner clearfix">
            <div class="columns eight">
                <?php 
                
                    // Get featured promotion box
                    \Outbrain\Classes\Core\Functions::get_header_featured_promotion( 'author_index' );
                    
                    // Filter the users by the following criteria:
                    // a. Do not get users with no post or post count is zero
                    // b. Get "outbrainer" users with an outbrain.com email
                    // c. Get "guest" users without an outbrain.com email
                    
                    $users['data'] = get_users();
                    $users['outbrainers'] = $users['guests'] = array();
                    
                    foreach( $users['data'] as $user ){
                        
                        // Get the post count and only get those users with published posts
                        $post_count = (int)count_user_posts( $user->data->ID );
                        
                        if( $post_count > 0 ){
                            
                            // Get the email address
                            $email['address'] = strtolower( $user->data->user_email );
                            $email['domain'] = explode( '@', $email['address'] );
                            $email['domain'] = $email['domain'][1];

                            // Get the outbrainer users and guest users
                            ( 
                                ( $email['domain'] === 'outbrain.com' ) ? 
                                    array_push( $users['outbrainers'], $user->data ) : 
                                    array_push( $users['guests'], $user->data ) 
                            );
                            
                        }
                        
                    }
                    
                    // Sort the users by display_name
                    function sort_by_display_name( $a, $b ) {
                        return strcmp( $a->display_name, $b->display_name );
                    }
                    
                    usort( $users['outbrainers'], 'sort_by_display_name' );
                    usort( $users['guests'], 'sort_by_display_name' );
                    
                ?>
                <div class="toggle">
                    <a href="javascript:void(0)" class="outbrainers active">Outbrainers</a>
                    <a href="javascript:void(0)" class="guests">Guests</a>
                </div>
                <div class="listings">
                    <div class="listing outbrainers active">
                        <?php \Outbrain\Classes\Core\Functions::get_authors_by_group( $users['outbrainers'] ) ?>
                    </div>
                    <div class="listing guests">
                        <?php \Outbrain\Classes\Core\Functions::get_authors_by_group( $users['guests'] ) ?>
                    </div>
                </div>
            </div>
            <div class="columns four">
                <?php
                    // Get the right content sidebar.
                    get_template_part( 'inc/templates/blog/sidebar-right' );
                ?>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); get_template_part( 'inc/templates/blog/footer', get_post_format() );
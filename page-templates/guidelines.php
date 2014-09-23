<?php

/**
 * Template Name: Guidelines
 *
 * The template for the guidelines page
 * @url: www.outbrain.com/amplify/guidelines
 *
 * -----------------------------------------------------------------------------
 */

get_header(); ?>
<div class="container page guidelines" role="main">
    <div class="row hero">
        <div class="inner clearfix">
            <div class="columns twelve">
                <div class="details">
                    <h1>Trust & Authenticity</h1>
                    <p>our content guidelines</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row content">
        <div class="inner clearfix">
            <div class="columns twelve">
                <?php 
                
                    // Get the post content and the custom fields' questions and answers.
                    // Finally, display the gathered information.
                    global $post;
                    $html .= wpautop( $post->post_content );
                    if( function_exists( 'get_field' ) ){
                        $fields = get_field( $wp_query->query_vars[ 'pagename' ] );
                        if( $fields ) {
                            $html .= '<ul class="accordion">';
                            foreach( $fields as $k => $v ) {
                                $html .= '<li class="entry ' . ( ( $k === count( $fields ) - 1 ) ? 'last' : false ) . '">';
                                    $html .= '<div class="question">' . $v[ 'question' ] . '</div>';
                                    $html .= '<div class="answer">' . $v[ 'answer' ] .'</div>';
                                $html .= '</li>';
                            }
                            $html .= '</ul>';
                            echo $html;
                        }
                    }
                    
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();
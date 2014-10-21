<?php

/**
 * Single Post Template
 *
 * The view for the blog post single page
 * @url: www.outbrain.com/blog/{slug}
 *
 * -----------------------------------------------------------------------------
 */

?>
<div class="social-share">
    <ul>
        <li class="email">
            <a href="mailto: ?subject=Check%20out%20this%20blog%20post%20from%20Outbrain!&amp;body=Blog%20Post%20link%3A%20(<?php echo urlencode( get_the_permalink() ); ?>)%0A%0ASource%3A%20Outbrain%20Blog%20(http%3A%2F%2Fwww.outbrain.com%2Fblog%2F)">
                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/global/social-email.png" />
            </a>
        </li>
        <li class="facebook">
            <a href="javascript:void(0)" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-facebook.png" />
                <div class="count">0</div>
            </a>
        </li>
        <li class="twitter">
            <a href="javascript:void(0)" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-twitter.png" />
                <div class="count">0</div>
            </a>
        </li>
        <li class="googleplus">
            <a href="javascript:void(0)" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-googleplus.png" />
                <div class="count">0</div>
            </a>
        </li>
        <li class="linkedin">
            <a href="javascript:void(0)" target="_blank">
                <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-linkedin.png" />
                <div class="count">0</div>
            </a>
        </li>
    </ul>
</div>
<article>
    <div class="title">
        <?php the_title(); ?>
    </div>
    <div class="meta">
        <time>
            <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
        </time>
        <div class="author">
            <a href="<?php echo get_author_posts_url( $post->post_author ) ?>">
                <?php echo get_the_author(); ?>
            </a>
        </div>
    </div>
    <div class="content">
        <?php the_content(); ?>
    </div>
    <?php if( function_exists( 'get_field' ) && get_field( 'footer_promotion_title' ) ): ?>
        <div class="footer-promotion">
            <div class="image">
                <img src="<?php echo ( function_exists( 'get_field' ) ? get_field( 'footer_promotion_image', $post->ID ) : false ); ?>" />
            </div>
            <div class="information">
                <h3 class="title"><?php echo ( function_exists( 'get_field' ) ? get_field( 'footer_promotion_title', $post->ID ) : false ); ?></h3>
                <p class="description"><?php echo ( function_exists( 'get_field' ) ? get_field( 'footer_promotion_description', $post->ID ) : false ); ?></p>
                <a class="button" href="<?php echo ( function_exists( 'get_field' ) ? get_field( 'footer_promotion_button_link_url', $post->ID ) : false ); ?>">
                    <?php echo ( function_exists( 'get_field' ) ? get_field( 'footer_promotion_button_text', $post->ID ) : false ); ?>
                </a>
            </div>
        </div>
    <?php endif; ?>
    <div class="author_meta">
        <?php
            // Get all user meta information.
            // Take only the first index of the returned array result.
            $user_meta = array_map( function( $array ){ 
                return $array[0]; 
            }, get_user_meta( $post->post_author ) );
        ?>
        <div class="image">
            <?php echo get_avatar( get_the_author_meta( 'user_email' ), 140 ); ?>
        </div>
        <div class="information">
            <h4 class="name">
                <?php echo $user_meta['first_name'] . ' ' . $user_meta['last_name']; ?>
            </h4>
            <p class="biography">
                <?php 
                    // Limit the number of characters for the biography information.
                    // Show an ellipsis and a Read More link at the end.
                    $description = explode( ' ', ( $user_meta['description'] ? $user_meta['description'] : '[ No user bio information ]' ) );
                    $description_html = substr( implode( ' ', $description ), 0, 130 ) . '...';
                    $description_html .= '<a href="'. get_author_posts_url( $post->post_author ) . '">Read More</a>';
                    echo $description_html;
                ?>
            </p>
            <ul class="social">
                <?php 
                    // Get the social network links associated with this user.
                    $social_networks = array(
                        array( 'id' => 'facebook', 'image' => get_template_directory_uri() . '/images/blog/global/social-facebook.png' ),
                        array( 'id' => 'twitter', 'image' => get_template_directory_uri() . '/images/blog/global/social-twitter.png' ),
                        array( 'id' => 'google_plus', 'image' => get_template_directory_uri() . '/images/blog/global/social-googleplus.png' ),
                        array( 'id' => 'linkedin', 'image' => get_template_directory_uri() . '/images/blog/global/social-linkedin.png' ),
                    );
                    foreach( $social_networks as $k => $v ):
                        if( $user_meta[ $v['id'] ] ): ?>
                            <li>
                                <a href="<?php echo $user_meta[ $v['id'] ] ?>" target="_blank">
                                    <img src="<?php echo $v['image'] ?>" />
                                </a>
                            </li>
                <?php   endif;
                    endforeach;
                ?>
            </ul>
        </div>
    </div>
    <div class="recommendations">
        Recommendations will appear here...
    </div>
    <div class="comments">
        <?php ( comments_open() || get_comments_number() ? comments_template() : false ); ?>
    </div>
</article>
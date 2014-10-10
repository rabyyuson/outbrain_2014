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
<article>
    <div class="title">
        <?php the_title(); ?>
    </div>
    <div class="meta">
        <time>
            <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
        </time>
        <div class="author">
            <a href="<?php echo get_the_author_link(); ?>">
                <?php echo get_the_author(); ?>
            </a>
        </div>
        <div class="social">
            <div class="count">Shares</div>
            <ul>
                <li>
                    <a href="javascript:void(0)" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-facebook.png" />
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-twitter.png" />
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-googleplus.png" />
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/blog/home/social-linkedin.png" />
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content">
        <?php the_content(); ?>
    </div>
    <div class="author">
        <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 68 ) ); ?>
        <br/>
        <?php printf( __( 'About %s', 'twentyeleven' ), get_the_author() ); ?>
        <br/>
        <?php the_author_meta( 'description' ); ?>
        <br/><br/>
        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
            <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyeleven' ), get_the_author() ); ?>
        </a>
    </div> 
</article>